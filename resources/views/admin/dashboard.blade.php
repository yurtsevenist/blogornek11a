@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h1 class="mb-0 fs-3">Dashboard</h1>
                        <p class="text-secondary mb-0 mt-1">Blogunun genel durumuna hoş geldin.</p>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Site</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="small-box text-bg-primary">
                            <div class="inner"><h3>20</h3><p>Toplam yazı</p></div>
                            <i class="small-box-icon bi bi-journal-richtext" aria-hidden="true"></i>
                            <a href="#" class="small-box-footer link-light link-underline-opacity-0">Yazıları görüntüle <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="small-box text-bg-success">
                            <div class="inner"><h3>18</h3><p>Yayındaki yazılar</p></div>
                            <i class="small-box-icon bi bi-check2-circle" aria-hidden="true"></i>
                            <a href="#" class="small-box-footer link-light link-underline-opacity-0">Yayın durumunu gör <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="small-box text-bg-warning">
                            <div class="inner"><h3>2</h3><p>Taslak</p></div>
                            <i class="small-box-icon bi bi-pencil-square" aria-hidden="true"></i>
                            <a href="#" class="small-box-footer link-dark link-underline-opacity-0">Taslakları düzenle <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="small-box text-bg-danger">
                            <div class="inner"><h3>8</h3><p>Bekleyen yorum</p></div>
                            <i class="small-box-icon bi bi-chat-dots" aria-hidden="true"></i>
                            <a href="#" class="small-box-footer link-light link-underline-opacity-0">Yorumlara git <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-12 col-xl-8">
                        <div class="card mb-4">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div><h3 class="card-title fw-semibold">Son yazılar</h3><p class="text-secondary mb-0 small">Blogundaki içeriklere genel bakış</p></div>
                                    <a href="#" class="btn btn-sm btn-outline-primary">Tüm yazılar</a>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0">
                                        <thead class="table-light"><tr><th>Yazı başlığı</th><th>Kategori</th><th>Durum</th><th>Görüntülenme</th><th></th></tr></thead>
                                        <tbody>
                                            <tr><td><div class="fw-semibold">Küçük adımların gücü</div><small class="text-secondary">12 Ekim 2026</small></td><td>Kişisel gelişim</td><td><span class="badge text-bg-success">Yayında</span></td><td>1.284</td><td><a href="#" class="btn btn-sm btn-light" aria-label="Yazıyı düzenle"><i class="bi bi-pencil"></i></a></td></tr>
                                            <tr><td><div class="fw-semibold">Dijital dünyada kendine mola ver</div><small class="text-secondary">10 Ekim 2026</small></td><td>İyi yaşam</td><td><span class="badge text-bg-success">Yayında</span></td><td>963</td><td><a href="#" class="btn btn-sm btn-light" aria-label="Yazıyı düzenle"><i class="bi bi-pencil"></i></a></td></tr>
                                            <tr><td><div class="fw-semibold">Yaratıcılık için alan aç</div><small class="text-secondary">08 Ekim 2026</small></td><td>Yaratıcılık</td><td><span class="badge text-bg-warning">Taslak</span></td><td>—</td><td><a href="#" class="btn btn-sm btn-light" aria-label="Yazıyı düzenle"><i class="bi bi-pencil"></i></a></td></tr>
                                            <tr><td><div class="fw-semibold">Daha sakin sabahlar</div><small class="text-secondary">05 Ekim 2026</small></td><td>İyi yaşam</td><td><span class="badge text-bg-success">Yayında</span></td><td>742</td><td><a href="#" class="btn btn-sm btn-light" aria-label="Yazıyı düzenle"><i class="bi bi-pencil"></i></a></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent"><a href="#" class="link-primary text-decoration-none">İçerik yönetimine git <i class="bi bi-arrow-right"></i></a></div>
                        </div>
                    </div>

                    <div class="col-12 col-xl-4">
                        <div class="card mb-4">
                            <div class="card-header"><h3 class="card-title fw-semibold">Son 7 gün</h3></div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-end mb-3"><div><div class="text-secondary small">Toplam görüntülenme</div><strong class="fs-2">8.492</strong></div><span class="badge text-bg-success"><i class="bi bi-arrow-up-right"></i> %12,8</span></div>
                                <div class="d-flex align-items-end gap-2" style="height: 150px" role="img" aria-label="Son yedi gündeki görüntülenme grafiği">
                                    <div class="flex-fill bg-primary rounded-top opacity-50" style="height: 42%" title="Pzt"></div>
                                    <div class="flex-fill bg-primary rounded-top opacity-75" style="height: 66%" title="Sal"></div>
                                    <div class="flex-fill bg-primary rounded-top opacity-50" style="height: 53%" title="Çar"></div>
                                    <div class="flex-fill bg-primary rounded-top opacity-75" style="height: 78%" title="Per"></div>
                                    <div class="flex-fill bg-primary rounded-top" style="height: 62%" title="Cum"></div>
                                    <div class="flex-fill bg-primary rounded-top opacity-75" style="height: 92%" title="Cmt"></div>
                                    <div class="flex-fill bg-primary rounded-top" style="height: 100%" title="Paz"></div>
                                </div>
                                <div class="d-flex justify-content-between text-secondary small mt-2"><span>Pzt</span><span>Sal</span><span>Çar</span><span>Per</span><span>Cum</span><span>Cmt</span><span>Paz</span></div>
                            </div>
                        </div>
                        <div class="card border-0 bg-primary text-white">
                            <div class="card-body d-flex align-items-center gap-3">
                                <div class="rounded-circle bg-white bg-opacity-25 p-3"><i class="bi bi-lightbulb fs-4"></i></div>
                                <div><h3 class="h6 fw-bold mb-1">Yeni bir yazı fikrin mi var?</h3><p class="small mb-2 opacity-75">Fikrini taslağa dönüştürmeye hemen başla.</p><a href="#" class="btn btn-sm btn-light text-primary">Yeni yazı oluştur</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
