<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\ReusableNotificationMail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'agreeTerms' => ['accepted'],
            'website' => ['prohibited'],
        ], [
            'password.confirmed' => 'Şifre alanları birbiriyle eşleşmiyor.',
            'agreeTerms.accepted' => 'Kayıt olmak için kullanıcı sözleşmesini kabul etmelisiniz.',
            'email.email' => 'Geçerli bir e-posta adresi girin.',
            'email.unique' => 'Bu e-posta adresi zaten kayıtlı.',
            'website.prohibited' => 'Kayıt isteği geçersiz.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        $user->role = User::ROLE_USER;
        $user->save();

        Auth::login($user);
        $request->session()->regenerate();
        $this->updateLastLogin($user, $request);

        return redirect()->route('home')->with('toast', 'Hesabınız oluşturuldu, hoş geldiniz ' . $user->name . '!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => 'E-posta adresi veya şifre hatalı.',
            ]);
        }

        $request->session()->regenerate();

        $user = $request->user();
        $this->updateLastLogin($user, $request);
        if (in_array($user->role, ['admin', 'editor', 'author'], true)) {
            return redirect()->route('admin.dashboard')->with('toast', 'Hoş geldiniz, ' . $user->name . '!');
        }

        return redirect()->route('home')->with('toast', 'Hoş geldiniz, ' . $user->name . '!');
    }

    public function logout(Request $request)
    {
        $name = $request->user()->name;
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('toast', 'Güle güle, ' . $name . '. Oturumunuz kapatıldı.');
    }

    public function sendPasswordResetCode(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email:rfc,dns', 'max:255'],
        ]);

        $email = mb_strtolower($validated['email']);
        $user = User::where('email', $email)->first();

        if ($user) {
            $code = $this->generatePasswordResetCode();
            $token = Str::random(64);

            DB::table('password_resets')->updateOrInsert(
                ['email' => $email],
                [
                    'token' => Hash::make($token),
                    'code' => Hash::make($code),
                    'created_at' => now(),
                ]
            );

            Mail::to($user->email)->send(new ReusableNotificationMail(
                title: 'Şifre sıfırlama kodunuz',
                greeting: 'Merhaba ' . $user->name . ',',
                messageText: 'Şifrenizi yenilemek için aşağıdaki 8 karakterli kodu kullanabilir veya güvenli bağlantıya tıklayabilirsiniz. Kod ve bağlantı 10 dakika boyunca geçerlidir. Bu isteği siz başlatmadıysanız e-postayı dikkate almayın.',
                code: $code,
                actionUrl: route('auth.password.reset.form', ['token' => $token, 'email' => $user->email]),
                actionText: 'Şifre sıfırlama sayfasını aç',
                footerText: 'Güvenliğiniz için bu kodu kimseyle paylaşmayın.'
            ));
        }

        return back()
            ->with('status', 'Bu e-posta kayıtlıysa sıfırlama kodu gönderildi. Gelen kutunuzu ve gereksiz postaları kontrol edin.')
            ->with('reset_email', $validated['email']);
    }

    public function resetPassword(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            'code' => ['nullable', 'string', 'size:8'],
            'token' => ['nullable', 'string', 'size:64'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'code.size' => 'Sıfırlama kodu 8 karakter olmalıdır.',
            'token.size' => 'Sıfırlama bağlantısı geçersiz veya süresi dolmuş.',
            'password.confirmed' => 'Şifre alanları birbiriyle eşleşmiyor.',
        ]);

        $email = mb_strtolower($validated['email']);
        $reset = $this->getActivePasswordReset($email);

        $hasCode = ! empty($validated['code']);
        $hasToken = ! empty($validated['token']);

        if (! $hasCode && ! $hasToken) {
            throw ValidationException::withMessages([
                'code' => 'E-postadaki sıfırlama kodunu girin veya e-postadaki bağlantıyı kullanın.',
            ]);
        }

        $codeIsValid = $hasCode && $reset && ! empty($reset->code) && Hash::check($validated['code'], $reset->code);
        $tokenIsValid = $hasToken && $reset && Hash::check($validated['token'], $reset->token);

        if (! $reset || $reset->email !== $email || (! $codeIsValid && ! $tokenIsValid)) {
            throw ValidationException::withMessages([
                'code' => 'Sıfırlama kodu veya bağlantısı geçersiz ya da süresi dolmuş. Yeni kod isteyin.',
            ]);
        }

        $user = User::where('email', $email)->first();
        if (! $user) {
            DB::table('password_resets')->where('email', $email)->delete();
            throw ValidationException::withMessages([
                'code' => 'Sıfırlama kodu geçersiz veya süresi dolmuş. Yeni kod isteyin.',
            ]);
        }

        $user->forceFill([
            'password' => Hash::make($validated['password']),
            'remember_token' => Str::random(60),
        ])->save();
        DB::table('password_resets')->where('email', $email)->delete();

        return redirect()->route('auth.login')->with('status', 'Şifreniz yenilendi. Yeni şifrenizle giriş yapabilirsiniz.');
    }

    public function showPasswordResetForm(Request $request, string $token)
    {
        $validated = $request->validate([
            'email' => ['required', 'email:rfc,dns', 'max:255'],
        ]);

        $email = mb_strtolower($validated['email']);
        $reset = $this->getActivePasswordReset($email);

        if (! $reset || $reset->email !== $email || ! Hash::check($token, $reset->token)) {
            return redirect()->route('auth.forgot-password')->with('status', 'Sıfırlama bağlantısı geçersiz veya süresi dolmuş. Yeni bir kod isteyin.');
        }

        return view('auth.reset-password', [
            'email' => $validated['email'],
            'token' => $token,
        ]);
    }

    private function generatePasswordResetCode(): string
    {
        $letters = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz';
        $digits = '23456789';
        $all = $letters . $digits;
        $characters = [
            $letters[random_int(0, strlen($letters) - 1)],
            $digits[random_int(0, strlen($digits) - 1)],
        ];

        for ($index = 0; $index < 6; $index++) {
            $characters[] = $all[random_int(0, strlen($all) - 1)];
        }

        for ($index = count($characters) - 1; $index > 0; $index--) {
            $swapIndex = random_int(0, $index);
            [$characters[$index], $characters[$swapIndex]] = [$characters[$swapIndex], $characters[$index]];
        }

        return implode('', $characters);
    }

    private function getActivePasswordReset(string $email): ?object
    {
        $reset = DB::table('password_resets')->where('email', $email)->first();

        if (! $reset || ! $reset->created_at || Carbon::parse($reset->created_at)->addMinutes(10)->isPast()) {
            if ($reset) {
                DB::table('password_resets')->where('email', $email)->delete();
            }

            return null;
        }

        return $reset;
    }

    private function updateLastLogin(User $user, Request $request): void
    {
        $user->forceFill([
            'last_login_ip' => $request->ip(),
            'last_login_device' => $request->userAgent(),
            'last_login_at' => now(),
        ])->save();
    }
}
