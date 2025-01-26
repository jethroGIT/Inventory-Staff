<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeminjamanBarang;
use App\Http\Requests\StorePeminjamanBarangRequest;
use App\Http\Requests\UpdatePeminjamanBarangRequest;
use App\Models\DpBarang;

class PeminjamanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id = $request->title ?? '';
        $peminjamans = PeminjamanBarang::where('No_kop', 'LIKE', '%' . $id . '%')->simplePaginate(10);
        return view('peminjaman-barang.index', compact('peminjamans', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peminjaman-barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'No_kop' => 'required|unique:peminjaman_barang|max:20', // Maksimal 20 karakter, unik
            'Nama_peminjam' => 'required|max:50', // Maksimal 50 karakter
            'Jabatan_peminjam' => 'required|max:50', // Maksimal 50 karakter
            'No_hp' => 'required|max:20', // Maksimal 20 karakter
            'Email' => 'required|email|max:50', // Email valid, maksimal 50 karakter
            'Keterangan' => 'nullable|max:50', // Opsional (nullable), maksimal 50 karakter
            'Nama_pengembali' => 'nullable|max:50', // Opsional, maksimal 50 karakter
            'Nama_petugas_pengambilan' => 'nullable|max:50', // Opsional, maksimal 50 karakter
            'Nama_petugas_pengembalian' => 'nullable|max:50', // Opsional, maksimal 50 karakter
        ]);

        // Set default value for 'Status_peminjaman' to 'waiting'
        $data = $request->all();
        $data['Status_peminjaman'] = 'Waiting';

        // Simpan data peminjaman barang
        PeminjamanBarang::create($data);

        return redirect()->route('dpb', ['No_kop' => $request->No_kop]);
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $detailPeminjamanBarang = PeminjamanBarang::findOrFail($id);
        $detailBarang = DpBarang::where('No_kop', $id)->get();

        return view('peminjaman-barang.detail', compact('detailPeminjamanBarang', 'detailBarang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $editBarang = PeminjamanBarang::findOrFail($id);
        return view('peminjaman-barang.edit', compact('editBarang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $updatePeminjaman = PeminjamanBarang::findOrFail($id);
        $updatePeminjaman->update($request->all());
        return redirect()->route('dpbe', ['No_kop' => $request->No_kop]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $destroyPR = PeminjamanBarang::where('No_kop', $id)->delete();
        session()->flash('success', 'Peminjaman berhasil dihapus');
        return redirect()->route('pb');
    }
}
