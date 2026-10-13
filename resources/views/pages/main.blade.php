@extends('layouts.master')

@section('content')
<main>
    <section class="hero-wrap">
        <div class="hero container-shell">
            <div class="hero__copy">
                <span class="eyebrow"><span class="eyebrow__dot"></span> MERAK EDENLER İÇİN BİR BLOG</span>
                <h1>Biraz ilham,<br><span>biraz nefes.</span></h1>
                <p>Günlük hayatın içinden fikirler, yeni başlangıçlar ve akılda kalan hikâyeler. Kendine bir kahve al, okumaya başla.</p>
                <a class="button button--primary" href="#yazilar">Yazıları keşfet <span aria-hidden="true">↓</span></a>
            </div>
            <div class="hero-art" aria-label="Yazı ve kahve temalı illüstrasyon" role="img">
                <div class="hero-art__sun"></div><div class="hero-art__leaf hero-art__leaf--one"></div><div class="hero-art__leaf hero-art__leaf--two"></div>
                <div class="hero-art__card"><span class="hero-art__spark">✳</span><span class="hero-art__card-title">iyi şeyler<br>zaman alır.</span><span class="hero-art__line"></span><span class="hero-art__caption">bugün kendine iyi bak</span></div>
                <span class="hero-art__orbit hero-art__orbit--one"></span><span class="hero-art__orbit hero-art__orbit--two"></span>
                <span class="hero-art__tiny hero-art__tiny--one">✦</span><span class="hero-art__tiny hero-art__tiny--two">✳</span>
            </div>
        </div>
    </section>

    <section class="content-section container-shell" id="yazilar">
        <div class="section-heading">
            <div><span class="eyebrow">OKUMA LİSTEN</span><h2>Son yazılar</h2></div>
            <a class="text-link" href="{{ route('post') }}">Tüm yazılar <span aria-hidden="true">↗</span></a>
        </div>
        <div class="post-grid">
            @foreach ($posts as $index => $post)
                @include('pages.partials.post-card', ['post' => $post, 'featured' => $index === 0])
            @endforeach
        </div>
        <div class="newsletter"><div><span class="eyebrow">ARADA BİR MERHABA</span><h2>Güzel fikirler<br>paylaştıkça çoğalır.</h2><p>Okuduğun yazılar hakkında konuşmak ya da bize bir fikir bırakmak ister misin?</p></div><div class="newsletter-form"><a class="button button--primary" href="{{ route('contact') }}">Bize yaz <span aria-hidden="true">→</span></a><small>Her meraklı sese kapımız açık.</small></div></div>
    </section>
</main>
@endsection
