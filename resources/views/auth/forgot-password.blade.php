@extends('auth.layout')

@section('title', 'Şifremi Unuttum')

@section('content')
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">E-posta adresini gir, sana 10 dakika geçerli bir sıfırlama kodu ve bağlantısı gönderelim.</p>
        @if (session('status'))
            <div class="alert alert-success" role="status">{{ session('status') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('auth.forgot-password.send') }}">
            @csrf
            <label class="visually-hidden" for="forgotEmail">E-posta</label>
            <div class="input-group mb-3">
                <input id="forgotEmail" name="email" type="email" class="form-control" placeholder="E-posta" value="{{ old('email', session('reset_email')) }}" autocomplete="email" required />
                <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            </div>
            <div class="d-grid"><button type="submit" class="btn btn-primary">Sıfırlama kodu gönder</button></div>
        </form>
        @if (session('reset_email') || $errors->has('code') || $errors->has('password'))
            <hr />
            <p class="small text-secondary">E-postadaki bağlantıyı kullanabilir veya 8 karakterli kodla yeni şifre belirleyebilirsin.</p>
            <form method="POST" action="{{ route('auth.password.reset') }}">
                @csrf
                <input type="hidden" name="email" value="{{ session('reset_email', old('email')) }}" />
                <label class="visually-hidden" for="resetCode">Sıfırlama kodu</label>
                <div class="input-group mb-3">
                    <input id="resetCode" name="code" type="text" class="form-control" placeholder="8 karakterli kod" value="{{ old('code') }}" minlength="8" maxlength="8" autocomplete="one-time-code" />
                    <div class="input-group-text"><span class="bi bi-shield-lock"></span></div>
                </div>
                <label class="visually-hidden" for="resetPassword">Yeni şifre</label>
                <input id="resetPassword" name="password" type="password" class="form-control mb-3" placeholder="Yeni şifre (en az 8 karakter)" minlength="8" autocomplete="new-password" required />
                <label class="visually-hidden" for="resetPasswordConfirmation">Yeni şifre tekrar</label>
                <input id="resetPasswordConfirmation" name="password_confirmation" type="password" class="form-control mb-3" placeholder="Yeni şifre tekrar" minlength="8" autocomplete="new-password" required />
                <div class="d-grid"><button type="submit" class="btn btn-success">Şifremi yenile</button></div>
            </form>
        @endif
        <p class="mt-3 mb-1"><a href="{{ route('auth.login') }}">Giriş sayfasına dön</a></p>
        <p class="mb-0"><a href="{{ route('auth.register') }}">Yeni hesap oluştur</a></p>
    </div>
</div>
@endsection
