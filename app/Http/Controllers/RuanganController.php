<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Http\Requests\StoreRuanganRequest;
use App\Http\Requests\UpdateRuanganRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id = $request->title ?? '';
        $ruangans = Ruangan::where('Nama_ruangan', 'LIKE', '%' . $id . '%')->simplePaginate(10);
        // $tersedia = Ruangan::where('Status', 'Tersedia')->count();
        // $tidaktersedia = Ruangan::where('Status', 'Tidak Tersedia')->count();
        return view('ruangan.index', compact('ruangans', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ruangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nama_ruangan' => 'required|max:50',
            'Kapasitas_orang' => 'required',
            'Status' => 'required|max:20'
        ]);

        // Ruangan::create($request->all());
        DB::statement('CALL InsertRuangan(?, ?, ?)', [
            $request->Nama_ruangan,
            $request->Kapasitas_orang,
            $request->Status
        ]);
        
        
        session()->flash('success', 'Ruangan berhasil ditambahkan');
        return redirect('ruangan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $detailRuangan = Ruangan::findOrFail($id);
        return view('ruangan.detail', compact('detailRuangan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $editruangan = Ruangan::findOrFail($id);
        return view('ruangan.edit', compact('editruangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Nama_ruangan' => 'required|max:50',
            'Kapasitas_orang' => 'required|integer|min:1', 
            'Status' => 'required|max:20,' 
        ]);

        $updateruangan = Ruangan::findOrFail($id);

        // $updateruangan->update($request->all());
        DB::statement('CALL UpdateRuangan(?, ?, ?, ?)', [
            $id,
            $request->Nama_ruangan,
            $request->Kapasitas_orang,
            $request->Status,
        ]);


        session()->flash('success', 'Barang berhasil diupdate');
        return redirect('ruangan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // $destroyruangan = Ruangan::where('No_ruangan', $id)->delete();
        DB::statement('CALL DeleteRuangan(?)',[
            $id
        ]);

        session()->flash('success', 'Ruangan berhasil dihapus');
        return redirect('ruangan');
    }
}
