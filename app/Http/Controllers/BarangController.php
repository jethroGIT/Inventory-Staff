<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id = $request->title ?? '';
        $barangs = Barang::where('Id_barang', 'LIKE', '%' . $id . '%')->simplePaginate(10);

        return view('barang.index', compact('barangs', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Tanggal_kedatangan' => 'required|date',
            'Jenis_barang' => 'required|max:20',
            'Jumlah_barang' => 'required|integer|min:1',
        ]);
    
        // Barang::create($request->all());
        DB::statement('CALL InsertBarang(?, ?, ?)', [
            $request->Tanggal_kedatangan,
            $request->Jenis_barang,
            $request->Jumlah_barang
        ]);

        session()->flash('success', 'Barang berhasil ditambahkan');
        return redirect('barang');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $detailBarang = Barang::findOrFail($id);
        return view('barang.detail', compact('detailBarang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $editBarang = Barang::findOrFail($id);
        return view('barang.edit', compact('editBarang'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Tanggal_kedatangan' => 'required|date',
            'Jenis_barang' => 'required|max:20',
            'Jumlah_barang' => 'required|integer|min:1',
        ]);

        $updateBarang = Barang::findOrFail($id);

        // $updateBarang->update($request->all());
        DB::statement('CALL UpdateBarang(?, ?, ?, ?)', [
            $id,
            $request->Tanggal_kedatangan,
            $request->Jenis_barang,
            $request->Jumlah_barang
        ]);
        
        session()->flash('success', 'Barang berhasil diupdate');
        return redirect('barang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // $destroyBarang = Barang::where('Id_barang', $id)->delete();
        DB::statement('CALL DeleteBarang(?)',[
            $id
        ]);

        session()->flash('success', 'Barang berhasil dihapus');
        return redirect('barang');
    }
}
