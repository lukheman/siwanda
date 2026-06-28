<?php

use Illuminate\Support\Facades\Route;

// Guest & Auth
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Auth\LoginController;

// Admin Core
use App\Http\Controllers\Admin\LogoutController;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Profile;
use App\Livewire\Admin\UserManagement;


// Admin Keuangan & Manajemen
use App\Livewire\Admin\KategoriTransaksiManagement;
use App\Livewire\Admin\PemasukanManagement;
use App\Livewire\Admin\PengeluaranManagement;
use App\Livewire\Admin\KegiatanManagement;
use App\Livewire\Admin\InventarisManagement;

use App\Livewire\Admin\SisaAnggaran;
use App\Livewire\Admin\LaporanRealisasi;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Guest Routes
Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('/berita-dana-desa', [GuestController::class, 'berita'])->name('berita');

// Auth Routes
Route::middleware('guest:admin,bendahara,kepala_desa,kaur_umum')->group(function () {
    Route::get('/login/admin', [LoginController::class, 'showLoginForm'])->name('login.admin');
    Route::get('/login/bendahara', [LoginController::class, 'showLoginForm'])->name('login.bendahara');
    Route::get('/login/kepala-desa', [LoginController::class, 'showLoginForm'])->name('login.kepala_desa');
    Route::get('/login/kaur-umum', [LoginController::class, 'showLoginForm'])->name('login.kaur_umum');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

    // Portal for login selection (fallback)
    Route::get('/login', function () {
        return view('auth.portal');
    })->name('login');
});

// Shared App Routes (Logout for all roles)
Route::middleware('auth:admin,bendahara,kepala_desa,kaur_umum')->group(function () {
    Route::post('/logout', [LogoutController::class, '__invoke'])->name('logout');
});

// Admin-only Routes
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('/profile', Profile::class)->name('admin.profile');

    // Keuangan & Kegiatan
    Route::get('/kategori-transaksi', KategoriTransaksiManagement::class)->name('admin.kategori');
    Route::get('/pemasukan', PemasukanManagement::class)->name('admin.pemasukan');
    Route::get('/pengeluaran', PengeluaranManagement::class)->name('admin.pengeluaran');
    Route::get('/sisa-anggaran', SisaAnggaran::class)->name('admin.sisa-anggaran');
    Route::get('/kegiatan', KegiatanManagement::class)->name('admin.kegiatan');
    Route::get('/laporan-realisasi', LaporanRealisasi::class)->name('admin.laporan-realisasi');

    // Aset & Inventaris
    Route::get('/inventaris', InventarisManagement::class)->name('admin.inventaris');


    // Pengaturan & Sistem
    Route::get('/users', UserManagement::class)->name('admin.users');

});

// Bendahara-only Routes
Route::prefix('bendahara')->middleware('auth:bendahara')->group(function () {
    Route::get('/dashboard', \App\Livewire\Bendahara\Dashboard::class)->name('bendahara.dashboard');
    Route::get('/profile', \App\Livewire\Bendahara\Profile::class)->name('bendahara.profile');

    // Keuangan & Kegiatan
    Route::get('/pemasukan', PemasukanManagement::class)->name('bendahara.pemasukan');
    Route::get('/pengeluaran', PengeluaranManagement::class)->name('bendahara.pengeluaran');
    Route::get('/sisa-anggaran', SisaAnggaran::class)->name('bendahara.sisa-anggaran');
    Route::get('/laporan-realisasi', LaporanRealisasi::class)->name('bendahara.laporan-realisasi');
    Route::get('/kegiatan', KegiatanManagement::class)->name('bendahara.kegiatan');


});

// Kepala Desa-only Routes
Route::prefix('kepala-desa')->middleware('auth:kepala_desa')->group(function () {
    Route::get('/dashboard', \App\Livewire\KepalaDesa\Dashboard::class)->name('kepala_desa.dashboard');
    Route::get('/profile', \App\Livewire\KepalaDesa\Profile::class)->name('kepala_desa.profile');
    
    // Keuangan & Laporan
    Route::get('/sisa-anggaran', SisaAnggaran::class)->name('kepala_desa.sisa-anggaran');
    Route::get('/laporan-realisasi', LaporanRealisasi::class)->name('kepala_desa.laporan-realisasi');
});

// Kaur Umum-only Routes
Route::prefix('kaur-umum')->middleware('auth:kaur_umum')->group(function () {
    Route::get('/dashboard', \App\Livewire\KaurUmum\Dashboard::class)->name('kaur_umum.dashboard');
    Route::get('/profile', \App\Livewire\KaurUmum\Profile::class)->name('kaur_umum.profile');
    
    // Aset & Inventaris
    Route::get('/inventaris', InventarisManagement::class)->name('kaur_umum.inventaris');
});
