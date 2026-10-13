@extends('layouts.master')

@section('content')
<main class="inner-page container-shell">
    <header class="inner-hero"><span class="eyebrow">OKUMA LİSTEN</span><h1>Bir yazı,<br><span>bir fikir.</span></h1><p>Bugün okumak istediğin hikâyeyi seç.</p></header>
    <div class="post-grid">
        @foreach ($posts as $post)
            @include('pages.partials.post-card', ['post' => $post])
        @endforeach
    </div>
</main>
@endsection
