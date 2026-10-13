<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="color-scheme" content="light" />
    <title>@yield('title', 'Yönetim Paneli') | Yazıhane</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="{{ asset('admintema/css/adminlte.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" />
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<div class="app-wrapper">
    <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button" aria-label="Menüyü aç veya kapat">
                        <i class="bi bi-list"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-md-block"><a href="{{ route('home') }}" class="nav-link">Siteyi görüntüle</a></li>
            </ul>
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item me-2"><span class="nav-link small text-secondary">Yönetim Paneli</span></li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-bs-toggle="dropdown" href="#" aria-label="Kullanıcı menüsü">
                        <img src="{{ asset('admintema/assets/img/user2-160x160.jpg') }}" alt="Yönetici" class="rounded-circle" width="32" height="32" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <span class="dropdown-item-text fw-semibold">{{ auth()->user()->name }}</span>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('home') }}"><i class="bi bi-box-arrow-up-right me-2"></i>Siteye dön</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item" type="submit"><i class="bi bi-box-arrow-right me-2"></i>Çıkış yap</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
