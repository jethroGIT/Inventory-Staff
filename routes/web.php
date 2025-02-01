<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\DpBarangController;
use App\Http\Controllers\DpRuanganController;
use App\Http\Controllers\DetailBarangController;
use App\Http\Controllers\PeminjamanBarangController;
use App\Http\Controllers\PeminjamanRuanganController;
use App\Http\Controllers\RiwayatKerusakanController;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes Barang
    Route::get('barang', [BarangController::class, 'index']);
    Route::get('barang/create', [BarangController::class, 'create']);
    Route::post('barang/store', [BarangController::class, 'store']);
    Route::get('barang/{id}/view', [BarangController::class, 'show']);
    Route::get('barang/{id}/edit', [BarangController::class, 'edit']);
    Route::post('barang/{id}/update', [BarangController::class, 'update']);
    Route::get('barang/{id}/destroy', [BarangController::class, 'destroy']);

    // Routes Detail Barang
    Route::get('detail-barang', [DetailBarangController::class, 'index']);
    Route::get('detail-barang/create', [DetailBarangController::class, 'create']);
    Route::post('detail-barang/store', [DetailBarangController::class, 'store']);
    Route::get('detail-barang/{id}/view', [DetailBarangController::class, 'show']);
    Route::get('detail-barang/{id}/edit', [DetailBarangController::class, 'edit']);
    Route::post('detail-barang/{id}/update', [DetailBarangController::class, 'update']);
    Route::get('detail-barang/{id}/destroy', [DetailBarangController::class, 'destroy']);

    // Routes Riwayat Kerusakan
    Route::get('riwayat-kerusakan', [RiwayatKerusakanController::class, 'index']);
    Route::get('riwayat-kerusakan/create', [RiwayatKerusakanController::class, 'create']);
    Route::post('riwayat-kerusakan/store', [RiwayatKerusakanController::class, 'store']);
    Route::get('riwayat-kerusakan/{id}/view', [RiwayatKerusakanController::class, 'show']);
    Route::get('riwayat-kerusakan/{id}/edit', [RiwayatKerusakanController::class, 'edit']);
    Route::post('riwayat-kerusakan/{id}/update', [RiwayatKerusakanController::class, 'update']);
    Route::get('riwayat-kerusakan/{id}/destroy', [RiwayatKerusakanController::class, 'destroy']);

    //Routes Peminjman
    Route::get('peminjaman', function () {
        return view('peminjaman.index');
    });

    // Routes Peminjaman Barang
    Route::get('peminjaman-barang', [PeminjamanBarangController::class, 'index'])->name('pb');
    Route::get('peminjaman-barang/create', [PeminjamanBarangController::class, 'create']);
    Route::post('peminjaman-barang/store', [PeminjamanBarangController::class, 'store']);
    Route::get('peminjaman-barang/{id}/view', [PeminjamanBarangController::class, 'show']);
    Route::get('peminjaman-barang/{id}/edit', [PeminjamanBarangController::class, 'edit']);
    Route::post('peminjaman-barang/{id}/update', [PeminjamanBarangController::class, 'update']);
    Route::get('peminjaman-barang/{id}/destroy', [PeminjamanBarangController::class, 'destroy']);


    // Routes Detail Peminjaman Barang
    Route::get('peminjaman-barang/dp/create', [DpBarangController::class, 'create'])->name('dpb');
    Route::post('peminjaman-barang/dp/store', [DpBarangController::class, 'store']);
    Route::get('peminjaman-barang/dp/{No_kop}/edit', [DpBarangController::class, 'edit'])->name('dpbe');
    Route::post('peminjaman-barang/dp/{No_kop}/update', [DpBarangController::class, 'update']);

    // Routes Ruangan
    Route::get('ruangan', [RuanganController::class, 'index']);
    Route::get('ruangan/create', [RuanganController::class, 'create']);
    Route::post('ruangan/store', [RuanganController::class, 'store']);
    Route::get('ruangan/{id}/view', [RuanganController::class, 'show']);
    Route::get('ruangan/{id}/edit', [RuanganController::class, 'edit']);
    Route::post('ruangan/{id}/update', [RuanganController::class, 'update']);
    Route::get('ruangan/{id}/destroy', [RuanganController::class, 'destroy']);

    // Routes Peminjaman Ruangan
    Route::get('peminjaman-ruangan', [PeminjamanRuanganController::class, 'index'])->name('pr');
    Route::get('peminjaman-ruangan/create', [PeminjamanRuanganController::class, 'create']);
    Route::post('peminjaman-ruangan/store', [PeminjamanRuanganController::class, 'store']);
    Route::get('peminjaman-ruangan/{id}/view', [PeminjamanRuanganController::class, 'show']);
    Route::get('peminjaman-ruangan/{id}/edit', [PeminjamanRuanganController::class, 'edit']);
    Route::post('peminjaman-ruangan/{id}/update', [PeminjamanRuanganController::class, 'update']);
    Route::get('peminjaman-ruangan/{id}/destroy', [PeminjamanRuanganController::class, 'destroy']);

    // Routes Detail Peminjaman Ruangan
    Route::get('peminjaman-ruangan/dp/create', [DpRuanganController::class, 'create'])->name('dp');
    Route::post('peminjaman-ruangan/dp/store', [DpRuanganController::class, 'store']);
    Route::get('peminjaman-ruangan/dp/{No_kop}/edit', [DpRuanganController::class, 'edit'])->name('dpe');
    Route::post('peminjaman-ruangan/dp/{No_kop}/update', [DpRuanganController::class, 'update'])->name('dpu');
    Route::get('peminjaman-ruangan/dp/{No_kop}/destroy', [DpRuanganController::class, 'destroy'])->name('dpd');

});

require __DIR__.'/auth.php';
