<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    private function updateLastLogin(User $user, Request $request): void
    {
        $user->forceFill([
            'last_login_ip' => $request->ip(),
            'last_login_device' => $request->userAgent(),
            'last_login_at' => now(),
        ])->save();
    }
}
