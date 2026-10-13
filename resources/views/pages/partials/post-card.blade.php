@php($art = ['sage', 'peach', 'lilac'][$post->id % 3])
<article class="post-card {{ !empty($featured) ? 'post-card--featured' : '' }}">
    <a class="post-card__image post-card__image--{{ $art }}" href="{{ route('post.detail', ['id' => $post->id]) }}" aria-label="{{ $post->title }} yazısını oku">
        @if ($art === 'peach')
            <span class="art-sun"></span><span class="art-plant">✳</span>
        @elseif ($art === 'lilac')
            <span class="art-moon">☾</span><span class="art-window"><i></i><i></i><i></i><i></i></span>
        @else
            <span class="art-scribble">~</span><span class="art-flower">✿</span>
        @endif
        <span class="art-note">{{ $post->category }}</span>
        <span class="post-card__category">{{ mb_strtoupper($post->category ?? 'Genel', 'UTF-8') }}</span>
    </a>
    <div class="post-card__body">
        <div class="post-meta"><span>{{ optional($post->published_at)->format('d.m.Y') ?? 'Tarih belirtilmedi' }}</span><span class="meta-dot"></span><span>{{ $post->read_time ?? 1 }} dk okuma</span></div>
        <h3><a href="{{ route('post.detail', ['id' => $post->id]) }}">{{ $post->title }}</a></h3>
        <p>{{ $post->excerpt }}</p>
        <a class="read-link" href="{{ route('post.detail', ['id' => $post->id]) }}">Yazıyı oku <span aria-hidden="true">→</span></a>
    </div>
</article>
