<!-- resources/views/dashboard.blade.php -->
@extends('layout')

@section('title', 'Dashboard')

@section('content')
    <div >
        <h1 class="text-3xl font-bold text-dark mb-4">Dashboard</h1>

        <div class="row">
            <!-- Card untuk Peminjaman Ruangan -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-primary fw-bold">Peminjaman Ruangan</h2> <!-- Tambahkan fw-bold -->
                        <p class="card-text">Menunggu Persetujuan: <span class="fw-bold text-primary">{{ $pRuangan }}</span></p>
                    </div>
                </div>
            </div>

            <!-- Card untuk Peminjaman Barang -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-success fw-bold">Peminjaman Barang</h2> <!-- Tambahkan fw-bold -->
                        <p class="card-text">Menunggu Persetujuan: <span class="fw-bold text-success">{{ $pBarang }}</span></p>
                    </div>
                </div>
            </div>

            <!-- Card untuk Ruangan Tersedia -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-purple fw-bold">Ruangan Tersedia</h2> <!-- Tambahkan fw-bold -->
                        <p class="card-text">Tersedia: <span class="fw-bold text-purple">{{ $availableRooms }}</span></p>
                        <p class="card-text">Dipinjam: <span class="fw-bold text-purple">{{ $occupiedRooms }}</span></p>
                    </div>
                </div>
            </div>

            <!-- Card untuk Barang Tersedia -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-warning fw-bold">Barang Tersedia</h2> <!-- Tambahkan fw-bold -->
                        <p class="card-text">Tersedia: <span class="fw-bold text-warning">{{ $availableItems }}</span></p>
                        <p class="card-text">Dipinjam: <span class="fw-bold text-warning">{{ $borrowedItems }}</span></p>
                    </div>
                </div>
            </div>

            <!-- Card untuk Barang dalam Perbaikan -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-danger fw-bold">Barang dalam Perbaikan</h2> <!-- Tambahkan fw-bold -->
                        <p class="card-text">Jumlah: <span class="fw-bold text-danger">{{ $itemsUnderRepair }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection