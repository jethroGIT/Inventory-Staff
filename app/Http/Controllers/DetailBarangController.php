<?php

namespace App\Http\Controllers;

use App\Models\DetailBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreDetailBarangRequest;
use App\Http\Requests\UpdateDetailBarangRequest;

class DetailBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id = $request->title ?? '';
        $detailBarangs = DetailBarang::where('Nama_barang', 'LIKE', '%'.$id.'%')->simplePaginate(10);
        return view('detailBarang.index', compact('detailBarangs', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('detailBarang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'Id_barang' => 'required|max:20',
            'Nama_barang' => 'required|max:50',
            'Merk_barang' => 'required|max:50',
            'Status' => 'required|in:Tersedia,Tidak Tersedia',
        ]);
    
        DB::statement('CALL InsertDetailBarang(?, ?, ?, ?)', [
            $request->Id_barang,
            $request->Nama_barang,
            $request->Merk_barang,
            $request->Status
        ]);
    
        session()->flash('success', 'Barang berhasil ditambahkan');
        return redirect('detail-barang');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $detailBarang = DetailBarang::findOrFail($id);
        return view('detailBarang.detail', compact('detailBarang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $editDetailBarang = DetailBarang::findOrFail($id);
        return view('detailBarang.edit', compact('editDetailBarang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Id_barang' => 'required|max:20',
            'Nama_barang' => 'required|max:50',
            'Merk_barang' => 'required|max:50',
            'Status' => 'required|in:Tersedia,Tidak Tersedia',
        ]);

        $updateDetailBarang = DetailBarang::findOrFail($id);

        // $updateDetailBarang->update($request->all());
        DB::statement('CALL UpdateDetailBarang(?, ?, ?, ?, ?)', [
            $id,
            $request->Id_barang,
            $request->Nama_barang,
            $request->Merk_barang,
            $request->Status
        ]);

        session()->flash('success', 'Barang berhasil diupdate');
        return redirect('detail-barang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // $destroyBarang = DetailBarang::where('No_inventaris', $id)->delete();
        DB::statement('CALL DeleteDetailBarang(?)',[
            $id
        ]);

        session()->flash('success', 'Barang berhasil dihapus');
        return redirect('detail-barang');
    }
}
