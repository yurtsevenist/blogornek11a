@extends('auth.layout')

@section('title', 'Yeni Şifre Belirle')

@section('content')
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Yeni şifreni belirle</p>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('auth.password.reset') }}">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}" />
            <input type="hidden" name="token" value="{{ $token }}" />
            <label class="visually-hidden" for="resetPassword">Yeni şifre</label>
            <input id="resetPassword" name="password" type="password" class="form-control mb-3" placeholder="Yeni şifre (en az 8 karakter)" minlength="8" autocomplete="new-password" required />
            <label class="visually-hidden" for="resetPasswordConfirmation">Yeni şifre tekrar</label>
            <input id="resetPasswordConfirmation" name="password_confirmation" type="password" class="form-control mb-3" placeholder="Yeni şifre tekrar" minlength="8" autocomplete="new-password" required />
            <div class="d-grid"><button type="submit" class="btn btn-primary">Şifremi yenile</button></div>
        </form>
        <p class="mt-3 mb-0"><a href="{{ route('auth.login') }}">Giriş sayfasına dön</a></p>
    </div>
</div>
@endsection
