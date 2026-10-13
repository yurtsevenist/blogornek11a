@extends('layouts.master')

@section('content')
<main class="inner-page container-shell">
    <header class="inner-hero"><span class="eyebrow">BİZE YAZ</span><h1>Bir merhaba<br><span>iyi gelir.</span></h1><p>Bir fikrin, sorun ya da sadece paylaşmak istediğin bir şey mi var? Buradayız.</p></header>
    <div class="contact-panel"><div class="contact-panel__icon" aria-hidden="true">✉</div><div><h2>İletişim bilgisi yakında</h2><p>İletişim kanalımızı hazırlıyoruz. Bu arada Yazıhane'deki yazıları keşfedebilir, fikirlerini bir sonraki ziyaretinde bizimle paylaşabilirsin.</p><a class="read-link" href="{{ route('home') }}">Yazıları keşfet <span aria-hidden="true">→</span></a></div></div>
</main>
@endsection
