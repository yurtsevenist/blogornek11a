@extends('layouts.master')

@section('content')
<main class="inner-page container-shell">
    <header class="inner-hero"><span class="eyebrow">BİZ KİMİZ?</span><h1>Merakla başlayan<br><span>bir hikâye.</span></h1><p>Yazıhane, gündelik hayatın içinden küçük ama değerli fikirleri paylaşmak için kuruldu.</p></header>
    <div class="prose about-copy">
        <p class="lead">Bazen iyi bir cümle günün akışını değiştirir. Bazen de başka birinin hikâyesinde kendinden bir parça bulursun. Yazıhane tam da bu küçük karşılaşmalar için var.</p>
        <h2>Yavaş okumaya küçük bir davet</h2>
        <p>Burada iyi yaşam, üretkenlik, yaratıcılık ve insan olmanın gündelik halleri üzerine yazıyoruz. Büyük cevaplar verme iddiamız yok; merakımızı canlı tutan soruların peşindeyiz.</p>
        <p>Bir fincan kahve eşliğinde okunacak kısa notlardan, üzerine düşünmeye değer uzun hikâyelere kadar… Umarız burada kendine ait bir şey bulursun.</p>
        <blockquote>“Dünya, dikkatini verdiğin şeylerden ibarettir.”</blockquote>
        <a class="button button--primary" href="{{ route('home') }}">Yazılara göz at <span aria-hidden="true">→</span></a>
    </div>
</main>
@endsection
