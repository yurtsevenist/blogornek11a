    <footer class="app-footer">
        <div class="float-end d-none d-sm-inline">Yazıhane içerik yönetimi</div>
        <strong>© {{ date('Y') }} Yazıhane.</strong> Tüm hakları saklıdır.
    </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
@if (session('toast'))
    <script>
        toastr.options = { closeButton: true, progressBar: true, positionClass: 'toast-top-right', timeOut: 4500 };
        toastr.success(@json(session('toast')));
    </script>
@endif
<script src="{{ asset('admintema/js/adminlte.min.js') }}"></script>
</body>
</html>
