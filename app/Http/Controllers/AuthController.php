<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
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
}
