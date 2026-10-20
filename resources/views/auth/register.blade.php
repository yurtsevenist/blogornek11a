@extends('auth.layout')

@section('title', 'Hesap Oluştur')

@section('content')
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Yazıhane için yeni hesap oluştur</p>
        <form method="POST" action="{{ route('auth.register.submit') }}">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>
            @endif
            <div aria-hidden="true" style="position:absolute;left:-10000px;width:1px;height:1px;overflow:hidden;">
                <label for="registerWebsite">Bu alanı boş bırakın</label>
                <input id="registerWebsite" name="website" type="text" tabindex="-1" autocomplete="off" />
            </div>
            <label class="visually-hidden" for="registerName">Ad soyad</label>
            <div class="input-group mb-3">
                <input id="registerName" name="name" type="text" class="form-control" placeholder="Ad soyad (3–100 karakter)" value="{{ old('name') }}" minlength="3" maxlength="100" autocomplete="name" required />
                <div class="input-group-text"><span class="bi bi-person"></span></div>
            </div>
            <label class="visually-hidden" for="registerEmail">E-posta</label>
            <div class="input-group mb-3">
                <input id="registerEmail" name="email" type="email" class="form-control" placeholder="E-posta" value="{{ old('email') }}" autocomplete="email" required />
                <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            </div>
            <label class="visually-hidden" for="registerPassword">Şifre</label>
            <div class="input-group mb-3">
                <input id="registerPassword" name="password" type="password" class="form-control" placeholder="Şifre" autocomplete="new-password" required />
                <button class="input-group-text" type="button" data-password-toggle aria-label="Şifreyi göster" aria-pressed="false">
                    <span class="bi bi-eye" aria-hidden="true"></span>
                </button>
            </div>
            <label class="visually-hidden" for="registerPasswordConfirmation">Şifre tekrar</label>
            <div class="input-group mb-3">
                <input id="registerPasswordConfirmation" name="password_confirmation" type="password" class="form-control" placeholder="Şifre tekrar" autocomplete="new-password" required />
                <button class="input-group-text" type="button" data-password-toggle aria-label="Şifreyi göster" aria-pressed="false">
                    <span class="bi bi-eye" aria-hidden="true"></span>
                </button>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="agreeTerms" value="1" id="agreeTerms" {{ old('agreeTerms') ? 'checked' : '' }} required />
                <label class="form-check-label" for="agreeTerms">Kullanıcı sözleşmesini kabul ediyorum.</label>
                <button class="btn btn-link btn-sm p-0 ms-1 align-baseline" type="button" data-bs-toggle="modal" data-bs-target="#userAgreementModal">Sözleşmeyi oku</button>
            </div>
            <div class="alert alert-light border small" role="note">
                <strong>Üyelikte dikkat edilecekler</strong>
                <ul class="mb-0 mt-1 ps-3">
                    <li>Ad soyad alanı 3–100 karakter olmalıdır.</li>
                    <li>Geçerli ve size ait bir e-posta adresi kullanın.</li>
                    <li>Şifreniz en az 8 karakter olmalı ve iki şifre alanı eşleşmelidir.</li>
                    <li>Şifrenizi başkalarıyla paylaşmayın; hesabınızın güvenliğinden siz sorumlusunuz.</li>
                    <li>Kayıt olmak için kullanıcı sözleşmesini okuyup kabul edin.</li>
                </ul>
            </div>
            <div class="d-grid"><button type="submit" class="btn btn-primary">Hesap Oluştur</button></div>
        </form>
        <p class="mt-3 mb-0"><a href="{{ route('auth.login') }}">Zaten hesabım var, giriş yap</a></p>
    </div>
</div>
<div class="modal fade" id="userAgreementModal" tabindex="-1" aria-labelledby="userAgreementModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="userAgreementModalLabel">Kullanıcı Sözleşmesi</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
            </div>
            <div class="modal-body">
                <p>Hesap oluşturarak verdiğiniz bilgilerin doğru olduğunu ve hesabınızı güvenli şekilde kullanacağınızı kabul edersiniz.</p>
                <p>Platformu yasalara ve diğer kullanıcıların haklarına uygun kullanmanız gerekir. Hesabınızla yapılan işlemlerden siz sorumlusunuz.</p>
                <p>Hizmetin güvenliği ve iyileştirilmesi için gerekli kullanım verileri işlenebilir. Sözleşme koşulları güncellendiğinde kullanıcılar bilgilendirilir.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="document.getElementById('agreeTerms').checked = true">Kabul ediyorum</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll('[data-password-toggle]').forEach((button) => {
        button.addEventListener('click', () => {
            const input = button.parentElement.querySelector('input');
            const icon = button.querySelector('span');
            const showPassword = input.type === 'password';

            input.type = showPassword ? 'text' : 'password';
            button.setAttribute('aria-label', showPassword ? 'Şifreyi gizle' : 'Şifreyi göster');
            button.setAttribute('aria-pressed', String(showPassword));
            icon.classList.toggle('bi-eye', !showPassword);
            icon.classList.toggle('bi-eye-slash', showPassword);
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
@endsection
