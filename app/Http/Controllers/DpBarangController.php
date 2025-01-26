<?php

namespace App\Http\Controllers;

use App\Models\DpBarang;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDpBarangRequest;
use App\Http\Requests\UpdateDpBarangRequest;
use App\Models\PeminjamanBarang;

class DpBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $noKop = $request->get('No_kop');
        return view('dpBarang.create', compact('noKop'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'No_kop' => 'required|string',
            'No_inventaris' => 'required|array',
            'Tanggal_pinjam' => 'required|array',
            'Tanggal_kembali' => 'required|array',
            'Jam_awal' => 'required|array',
            'Jam_akhir' => 'required|array',
        ]);
    
        // Ambil data array dari request
        $noKop = $request->No_kop;
        $noInventarisArray = $request->No_inventaris;
        $tanggalPinjamArray = $request->Tanggal_pinjam;
        $tanggalKembaliArray = $request->Tanggal_kembali;
        $jamAwalArray = $request->Jam_awal;
        $jamAkhirArray = $request->Jam_akhir;
    
        // Simpan setiap detail ke database
        foreach ($noInventarisArray as $index => $noInventaris) {
            DpBarang::create([
                'No_kop' => $noKop,
                'No_inventaris' => $noInventaris,
                'Tanggal_pinjam' => $tanggalPinjamArray[$index],
                'Tanggal_kembali' => $tanggalKembaliArray[$index],
                'Jam_awal' => $jamAwalArray[$index],
                'Jam_akhir' => $jamAkhirArray[$index],
            ]);
        }
    
        session()->flash('success', 'Surat berhasil ditambahkan');
        return redirect()->route('pb');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(DpBarang $dpBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dpBarang = DpBarang::where('No_kop', $id)->get();
        $noKop = PeminjamanBarang::where('No_kop', $id)->first();
        return view('dpBarang.edit', compact('dpBarang', 'noKop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Ambil data array dari request
        $noKop = $request->No_kop;
        $noInventarisArray = $request->No_barang; // Menggunakan No_barang dari form
        $tanggalPinjamArray = $request->Tanggal_pinjam;
        $tanggalKembaliArray = $request->Tanggal_kembali;
        $jamAwalArray = $request->Jam_awal;
        $jamAkhirArray = $request->Jam_akhir;
    
        // Ambil semua data peminjaman barang untuk No_kop yang sesuai
        $dpBarang = DpBarang::where('No_kop', $noKop)->get();
    
        // Menghapus data barang yang tidak ada dalam array yang dikirim dari form
        $barangToDelete = $dpBarang->filter(function ($barang) use ($noInventarisArray, $tanggalPinjamArray, $jamAwalArray, $jamAkhirArray) {
            // Cek jika kombinasi kolom tidak ada di dalam array yang dikirim
            return !in_array($barang->No_inventaris, $noInventarisArray) || 
                !in_array($barang->Tanggal_pinjam, $tanggalPinjamArray) || 
                !in_array($barang->Jam_awal, $jamAwalArray) || 
                !in_array($barang->Jam_akhir, $jamAkhirArray);
        });
    
        // Hapus barang yang tidak ada di dalam array
        foreach ($barangToDelete as $barang) {
            $barang->delete();
        }
    
        // Menambah atau memperbarui data
        foreach ($noInventarisArray as $index => $noInventaris) {
            // Cek apakah kombinasi ini sudah ada
            $existingBarang = DpBarang::where('No_kop', $noKop)
                                        ->where('No_inventaris', $noInventaris)
                                        ->where('Tanggal_pinjam', $tanggalPinjamArray[$index])
                                        ->where('Jam_awal', $jamAwalArray[$index])
                                        ->where('Jam_akhir', $jamAkhirArray[$index])
                                        ->first();
    
            if ($existingBarang) {
                // Jika data sudah ada, lakukan update
                $existingBarang->update([
                    'Tanggal_kembali' => $tanggalKembaliArray[$index],
                ]);
            } else {
                // Jika data belum ada, lakukan create (insert baru)
                DpBarang::create([
                    'No_kop' => $noKop,
                    'No_inventaris' => $noInventaris,
                    'Tanggal_pinjam' => $tanggalPinjamArray[$index],
                    'Tanggal_kembali' => $tanggalKembaliArray[$index],
                    'Jam_awal' => $jamAwalArray[$index],
                    'Jam_akhir' => $jamAkhirArray[$index],
                ]);
            }
        }
    
        // Flash message untuk pemberitahuan berhasil
        session()->flash('success', 'Surat berhasil diupdate');
        // Redirect ke halaman yang sesuai setelah update
        return redirect()->route('pb');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {

    }
}
