<!doctype html>
<html lang="tr" data-theme="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Fikirler, notlar ve ilham veren hikâyeler." />
    <meta name="color-scheme" content="light dark" />
    <title>{{ $pageTitle ?? 'Yazıhane — Fikirlerin buluşma noktası' }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('tema/assets/favicon.ico') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="{{ asset('tema/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('tema/css/blog.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" />
    <script>
        try { document.documentElement.dataset.theme = localStorage.getItem('blog-theme') || (matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'); } catch (e) {}
    </script>
</head>
<body>
    <nav class="site-nav" aria-label="Ana navigasyon">
        <div class="site-nav__inner">
            <a class="brand" href="{{ route('home') }}" aria-label="Yazıhane ana sayfa">
                <span class="brand__mark" aria-hidden="true">y.</span>
                <span>yazıhane</span>
            </a>
            <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-menu" aria-label="Menüyü aç">
                <span></span><span></span>
            </button>
            <div class="nav-links" id="primary-menu">
                <a href="{{ route('home') }}">Keşfet</a>
                <a href="{{ route('about') }}">Hakkında</a>
                <a href="{{ route('contact') }}">İletişim</a>
                @auth
                    <div class="account-menu">
                        <button class="login-link account-menu__toggle" type="button" aria-expanded="false" aria-controls="account-menu" id="account-menu-toggle">
                            Hesabım <span aria-hidden="true">⌄</span>
                        </button>
                        <div class="account-menu__panel" id="account-menu" hidden>
                            <span class="account-menu__name">{{ auth()->user()->name }}</span>
                            <a class="account-menu__item" href="#" aria-disabled="true" title="Yakında">Ayarlarım</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="account-menu__item" type="submit">Oturum kapat</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a class="login-link" href="{{ route('auth.login') }}">Giriş Yap</a>
                @endauth
                <button class="theme-toggle" type="button" aria-label="Koyu temaya geç" title="Temayı değiştir">
                    <span class="theme-toggle__icon" aria-hidden="true">☾</span>
                    <span class="theme-toggle__label">Görünüm</span>
                </button>
            </div>
        </div>
    </nav>
