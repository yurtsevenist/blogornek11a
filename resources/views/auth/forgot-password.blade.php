@extends('auth.layout')

@section('title', 'Şifremi Unuttum')

@section('content')
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Şifreni mi unuttun? E-posta adresini gir, sıfırlama adımlarına başlayalım.</p>
        <form onsubmit="return false;">
            <label class="visually-hidden" for="forgotEmail">E-posta</label>
            <div class="input-group mb-3">
                <input id="forgotEmail" name="email" type="email" class="form-control" placeholder="E-posta" autocomplete="email" />
                <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            </div>
            <div class="d-grid"><button type="button" class="btn btn-primary">Sıfırlama bağlantısı gönder</button></div>
        </form>
        <p class="mt-3 mb-1"><a href="{{ route('auth.login') }}">Giriş sayfasına dön</a></p>
        <p class="mb-0"><a href="{{ route('auth.register') }}">Yeni hesap oluştur</a></p>
        <p class="text-secondary small mt-3 mb-0">Şifre sıfırlama işlemi henüz bağlı değildir.</p>
    </div>
</div>
@endsection
