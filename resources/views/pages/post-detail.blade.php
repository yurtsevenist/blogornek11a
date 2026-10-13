@extends('layouts.master')

@section('content')
<main class="article-page container-shell">
    <a class="back-link" href="{{ route('post') }}"><span aria-hidden="true">←</span> Tüm yazılar</a>
    <header class="article-header">
        <span class="category-pill">{{ mb_strtoupper($post->category ?? 'Genel', 'UTF-8') }}</span>
        <h1>{{ $post->title }}</h1>
        <p class="article-deck">{{ $post->excerpt }}</p>
        <div class="author-row"><span class="avatar">{{ mb_substr($post->author_name ?? 'Y', 0, 1, 'UTF-8') }}</span><div><strong>{{ $post->author_name ?? 'Yazıhane ekibi' }}</strong><span>{{ optional($post->published_at)->format('d.m.Y') ?? 'Tarih belirtilmedi' }} · {{ $post->read_time ?? 1 }} dk okuma</span></div></div>
    </header>
    <div class="article-cover article-cover--{{ ['sage', 'peach', 'lilac'][$post->id % 3] }}" role="img" aria-label="{{ $post->title }} illüstrasyonu" @if ($post->cover_image) style="background-image: linear-gradient(135deg, rgba(39,43,42,.08), rgba(39,43,42,.22)), url('{{ asset($post->cover_image) }}')" @endif>
        @if ($post->id % 3 === 1)
            <span class="art-sun"></span><span class="art-plant">✳</span>
        @elseif ($post->id % 3 === 2)
            <span class="art-moon">☾</span><span class="art-window"><i></i><i></i><i></i><i></i></span>
        @else
            <span class="art-scribble">~</span><span class="art-flower">✿</span>
        @endif
        <span class="art-note">{{ $post->category }}</span>
    </div>
    <article class="prose article-body">
        @foreach (preg_split('/\R{2,}/', trim($post->body)) as $index => $paragraph)
            <p @if ($index === 0) class="lead" @endif>{{ $paragraph }}</p>
        @endforeach
    </article>
    <div class="article-end"><span>Bu yazı sana iyi geldiyse paylaş.</span><a class="read-link" href="{{ route('post') }}">Başka yazılar keşfet <span aria-hidden="true">→</span></a></div>
</main>
@endsection
