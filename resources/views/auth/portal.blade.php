@component('layouts.guest', ['type' => 'guest', 'title' => 'Pilih Akses Login - PANDUWA'])
    <div class="container py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center mb-5">
                <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px; font-size: 2rem;">
                    <i class="fas fa-users-cog"></i>
                </div>
                <h1 class="fw-bold">Pilih Akses Sistem</h1>
                <p class="text-muted lead">Silakan pilih peran Anda untuk masuk ke dalam sistem PANDUWA.</p>
            </div>
        </div>

        <div class="row g-4 justify-content-center max-w-4xl mx-auto">
            <!-- Admin -->
            <div class="col-md-6 col-lg-3">
                <a href="{{ route('login.admin') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm h-100 transition-hover text-center p-4 rounded-4" style="background: #f8fafc;">
                        <div class="mb-3 text-primary">
                            <i class="fas fa-user-shield fa-3x"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-1">Admin</h4>
                        <p class="text-muted small mb-0">Kelola master data dan pengguna</p>
                    </div>
                </a>
            </div>

            <!-- Bendahara -->
            <div class="col-md-6 col-lg-3">
                <a href="{{ route('login.bendahara') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm h-100 transition-hover text-center p-4 rounded-4" style="background: #f8fafc;">
                        <div class="mb-3 text-success">
                            <i class="fas fa-wallet fa-3x"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-1">Bendahara</h4>
                        <p class="text-muted small mb-0">Kelola sirkulasi keuangan desa</p>
                    </div>
                </a>
            </div>

            <!-- Kepala Desa -->
            <div class="col-md-6 col-lg-3">
                <a href="{{ route('login.kepala_desa') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm h-100 transition-hover text-center p-4 rounded-4" style="background: #f8fafc;">
                        <div class="mb-3 text-warning">
                            <i class="fas fa-user-tie fa-3x"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-1">Kepala Desa</h4>
                        <p class="text-muted small mb-0">Pantau dan verifikasi laporan</p>
                    </div>
                </a>
            </div>

            <!-- Kaur Umum -->
            <div class="col-md-6 col-lg-3">
                <a href="{{ route('login.kaur_umum') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm h-100 transition-hover text-center p-4 rounded-4" style="background: #f8fafc;">
                        <div class="mb-3 text-info">
                            <i class="fas fa-box-open fa-3x"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-1">Kaur Umum</h4>
                        <p class="text-muted small mb-0">Kelola data inventaris desa</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endcomponent
