    <footer class="site-footer">
        <div class="site-footer__inner">
            <a class="brand brand--footer" href="{{ route('home') }}"><span class="brand__mark" aria-hidden="true">y.</span><span>yazıhane</span></a>
            <p>Yavaşla, oku, düşün. Güzel fikirler burada başlar.</p>
            <span class="footer-note">© {{ date('Y') }} Yazıhane · Sevgiyle hazırlandı</span>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    @if (session('toast'))
        <script>
            toastr.options = { closeButton: true, progressBar: true, positionClass: 'toast-top-right', timeOut: 4500 };
            toastr.success(@json(session('toast')));
        </script>
    @endif
    <script src="{{ asset('tema/js/blog.js') }}" defer></script>
</body>
</html>
