<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatKerusakan;
use Illuminate\Support\Facades\DB;

class RiwayatKerusakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id = $request->title ?? '';
        $detailRiwayats = RiwayatKerusakan::where('No_inventaris', 'LIKE', '%'.$id.'%')->simplePaginate(10);
        return view('riwayat-kerusakan.index', compact('detailRiwayats', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('riwayat-kerusakan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'No_inventaris' => 'required|string|max:255',
            'Tanggal_kerusakan' => 'required|date',
            'Tanggal_perbaikan' => 'nullable|date|after_or_equal:Tanggal_kerusakan',
            'Detail_kerusakan' => 'required|string|max:1000',
        ]);

        DB::statement('CALL InsertRiwayatKerusakan(?, ?, ?)', [
            $request->No_inventaris,
            $request->Tanggal_kerusakan,
            $request->Detail_kerusakan
        ]);

        session()->flash('success', 'Riwayatt berhasil ditambahkan');
        return redirect('riwayat-kerusakan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $detailRiwayat = RiwayatKerusakan::findOrFail($id);
        return view('riwayat-kerusakan.detail', compact('detailRiwayat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $editDetailRiwayat = RiwayatKerusakan::findOrFail($id);
        return view('riwayat-kerusakan.edit', compact('editDetailRiwayat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'No_inventaris' => 'required|string|max:255',
            'Tanggal_kerusakan' => 'required|date',
            'Tanggal_perbaikan' => 'nullable|date|after_or_equal:Tanggal_kerusakan',
            'Detail_kerusakan' => 'required|string|max:1000',
        ]);

        DB::statement('CALL UpdateRiwayatKerusakan(?, ?, ?, ?, ?)', [
            $id,
            $request->No_inventaris,
            $request->Tanggal_kerusakan,
            $request->Tanggal_perbaikan,
            $request->Detail_kerusakan
        ]);

        session()->flash('success', 'Riwayatt berhasil diupdate');
        return redirect('riwayat-kerusakan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::statement('CALL DeleteRiwayatKerusakan(?)',[
            $id
        ]);

        session()->flash('success', 'Riwayat berhasil dihapus');
        return redirect('riwayat-kerusakan');
    }
}
