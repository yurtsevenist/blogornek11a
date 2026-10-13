@extends('auth.layout')

@section('title', 'Hesap Oluştur')

@section('content')
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Yazıhane için yeni hesap oluştur</p>
        <form onsubmit="return false;">
            <label class="visually-hidden" for="registerName">Ad soyad</label>
            <div class="input-group mb-3">
                <input id="registerName" name="name" type="text" class="form-control" placeholder="Ad soyad" autocomplete="name" />
                <div class="input-group-text"><span class="bi bi-person"></span></div>
            </div>
            <label class="visually-hidden" for="registerEmail">E-posta</label>
            <div class="input-group mb-3">
                <input id="registerEmail" name="email" type="email" class="form-control" placeholder="E-posta" autocomplete="email" />
                <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            </div>
            <label class="visually-hidden" for="registerPassword">Şifre</label>
            <div class="input-group mb-3">
                <input id="registerPassword" name="password" type="password" class="form-control" placeholder="Şifre" autocomplete="new-password" />
                <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="agreeTerms" />
                <label class="form-check-label" for="agreeTerms">Kullanım koşullarını kabul ediyorum.</label>
            </div>
            <div class="d-grid"><button type="button" class="btn btn-primary">Hesap Oluştur</button></div>
        </form>
        <p class="mt-3 mb-0"><a href="{{ route('auth.login') }}">Zaten hesabım var, giriş yap</a></p>
        <p class="text-secondary small mt-3 mb-0">Bu sayfa şimdilik yalnızca tasarımdır; kayıt işlemi henüz bağlı değildir.</p>
    </div>
</div>
@endsection
