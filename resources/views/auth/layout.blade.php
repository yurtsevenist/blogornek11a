<!doctype html>
<html lang="tr" data-bs-theme="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="color-scheme" content="light" />
    <title>@yield('title') | Yazıhane</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.3.0/index.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="{{ asset('admintema/css/adminlte.min.css') }}" />
</head>
<body class="login-page bg-body-secondary">
    <main class="login-box">
        <h1 class="login-logo"><a href="{{ route('home') }}"><b>Yazı</b>hane</a></h1>
        @yield('content')
    </main>
</body>
</html>
