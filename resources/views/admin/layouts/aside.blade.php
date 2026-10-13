    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}" class="brand-link">
                <img src="{{ asset('admintema/assets/img/AdminLTELogo.png') }}" alt="Yazıhane" class="brand-image opacity-75 shadow" />
                <span class="brand-text fw-light">Yazıhane Admin</span>
            </a>
        </div>
        <div class="sidebar-wrapper">
            <nav class="mt-2" aria-label="Yönetim menüsü">
                <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu">
                    <li class="nav-header">İÇERİK YÖNETİMİ</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                            <i class="nav-icon bi bi-speedometer2"></i><p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="nav-icon bi bi-journals"></i><p>Yazılar <span class="nav-badge badge text-bg-primary me-3">20</span></p></a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="nav-icon bi bi-plus-square"></i><p>Yeni yazı</p></a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="nav-icon bi bi-tags"></i><p>Kategoriler</p></a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="nav-icon bi bi-chat-left-text"></i><p>Yorumlar <span class="nav-badge badge text-bg-warning me-3">8</span></p></a>
                    </li>
                    <li class="nav-header">SİTE</li>
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link"><i class="nav-icon bi bi-box-arrow-up-right"></i><p>Blogu görüntüle</p></a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
