<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeminjamanRuangan;
use App\Models\PeminjamanBarang;
use App\Models\Ruangan;
use App\Models\DetailBarang;
use App\Models\RiwayatKerusakan;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data untuk ringkasan peminjaman ruangan
        $pRuangan = PeminjamanRuangan::where('Status_peminjaman', 'Waiting')->count();

        // Ambil data untuk ringkasan peminjaman barang
        $pBarang = PeminjamanBarang::where('Status_peminjaman', 'Waiting')->count();

        // Ambil data ruangan yang tersedia dan sedang digunakan
        $availableRooms = Ruangan::where('Status', 'Tersedia')->count();
        $occupiedRooms = Ruangan::where('Status', 'Dipinjam')->count();

        // Ambil data barang yang tersedia dan sedang dipinjam
        $availableItems = DetailBarang::where('Status', 'Tersedia')->count();
        $borrowedItems = DetailBarang::where('Status', 'Dipinjam')->count();

        // Ambil data barang yang sedang dalam perbaikan
        $itemsUnderRepair = RiwayatKerusakan::where('Tanggal_perbaikan')->count();


        return view('dashboard', compact(
            'pRuangan',
            'pBarang',
            'availableRooms',
            'occupiedRooms',
            'availableItems',
            'borrowedItems',
            'itemsUnderRepair',
        ));
    }
}