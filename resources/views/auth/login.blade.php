@extends('auth.layout')

@section('title', 'Giriş Yap')

@section('content')
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Yönetim paneline giriş yap</p>
        <form method="POST" action="{{ route('auth.login.submit') }}">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>
            @endif
            <label class="visually-hidden" for="loginEmail">E-posta</label>
            <div class="input-group mb-3">
                <input id="loginEmail" name="email" type="email" class="form-control" placeholder="E-posta" value="{{ old('email') }}" autocomplete="username" required autofocus />
                <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            </div>
            <label class="visually-hidden" for="loginPassword">Şifre</label>
            <div class="input-group mb-3">
                <input id="loginPassword" name="password" type="password" class="form-control" placeholder="Şifre" autocomplete="current-password" required />
                <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            </div>
            <div class="row align-items-center">
                <div class="col-7">
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="remember" value="1" id="rememberMe" /><label class="form-check-label" for="rememberMe">Beni hatırla</label></div>
                </div>
                <div class="col-5"><div class="d-grid"><button type="submit" class="btn btn-primary">Giriş Yap</button></div></div>
            </div>
        </form>
        <p class="mt-3 mb-1"><a href="{{ route('auth.forgot-password') }}">Şifremi unuttum</a></p>
        <p class="mb-0"><a href="{{ route('auth.register') }}">Yeni hesap oluştur</a></p>
    </div>
</div>
@endsection
