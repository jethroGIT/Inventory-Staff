<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanRuangan;
use App\Http\Requests\StorePeminjamanRuanganRequest;
use App\Http\Requests\UpdatePeminjamanRuanganRequest;
use App\Models\DpRuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanRuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id = $request->title ?? '';
        $peminjamans = PeminjamanRuangan::where('No_kop', 'LIKE', '%'.$id.'%')->simplePaginate(10);
        return view('peminjaman-ruangan.index', compact('peminjamans', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peminjaman-ruangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'No_kop' => 'required|unique:peminjaman_ruangan|max:20',
            'Nama_peminjam' => 'required|max:50',
            'Jabatan_peminjam' => 'required|max:50',
            'No_hp' => 'required|max:20',
            'Email' => 'required|email|max:50',
            'Keterangan' => 'nullable|max:50',
            'Nama_pengembali' => 'nullable|max:50',
            'Nama_petugas_pengambilan' => 'nullable|max:50',
            'Nama_petugas_pengembalian' => 'nullable|max:50',
        ]);
    
        // Set default value for 'Status_peminjaman' to 'waiting'
        $data = $request->all();
        $data['Status_peminjaman'] = 'Waiting';
    
        PeminjamanRuangan::create($data);
    
        return redirect()->route('dp', ['No_kop' => $request->No_kop]);
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $detailPeminjamanRuangan = PeminjamanRuangan::findOrFail($id);
        $detailRuangan = DpRuangan::where('No_kop', $id)->get();
        
        return view('peminjaman-ruangan.detail', compact('detailPeminjamanRuangan', 'detailRuangan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $editRuangan = PeminjamanRuangan::findOrFail($id);
        return view('peminjaman-ruangan.edit', compact('editRuangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $updatePeminjaman = PeminjamanRuangan::findOrFail($id);
        $updatePeminjaman->update($request->all());
        return redirect()->route('dpe', ['No_kop' => $request->No_kop]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $destroyPR = PeminjamanRuangan::where('No_kop', $id)->delete();
        session()->flash('success', 'Peminjaman berhasil dihapus');
        return redirect()->route('pr');
    }
}
