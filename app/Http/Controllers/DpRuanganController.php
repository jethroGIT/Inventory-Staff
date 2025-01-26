<?php

namespace App\Http\Controllers;

use App\Models\DpRuangan;

use Illuminate\Http\Request;
use App\Models\PeminjamanRuangan;
use App\Http\Requests\StoreDpRuanganRequest;
use App\Http\Requests\UpdateDpRuanganRequest;

class DpRuanganController extends Controller
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

        return view('dpRuangan.create', compact('noKop'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;

        $request->validate([
            'No_kop' => 'required|string',
            'No_ruangan' => 'required|array',
            'Tanggal_pinjam' => 'required|array',
            'Tanggal_kembali' => 'required|array',
            'Jam_awal' => 'required|array',
            'Jam_akhir' => 'required|array',
        ]);
    
        // Ambil data array dari request
        $noKop = $request->No_kop;
        $noRuanganArray = $request->No_ruangan;
        $tanggalPinjamArray = $request->Tanggal_pinjam;
        $tanggalKembaliArray = $request->Tanggal_kembali;
        $jamAwalArray = $request->Jam_awal;
        $jamAkhirArray = $request->Jam_akhir;
    
        // Simpan setiap detail ke database
        foreach ($noRuanganArray as $index => $noRuangan) {
            DpRuangan::create([
                'No_kop' => $noKop,
                'No_ruangan' => $noRuangan,
                'Tanggal_pinjam' => $tanggalPinjamArray[$index],
                'Tanggal_kembali' => $tanggalKembaliArray[$index],
                'Jam_awal' => $jamAwalArray[$index],
                'Jam_akhir' => $jamAkhirArray[$index],
            ]);
        }

        session()->flash('success', 'Surat berhasil ditambahkan');
        return redirect()->route('pr');
    }

    /**
     * Display the specified resource.
     */
    public function show(DpRuangan $dpRuangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dpRuangan = DpRuangan::where('No_kop', $id)->get();
        $noKop = PeminjamanRuangan::where('No_kop', $id)->first();
        return view('dpRuangan.edit', compact('dpRuangan', 'noKop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Ambil data array dari request
        $noKop = $request->No_kop;
        $noRuanganArray = $request->No_ruangan;
        $tanggalPinjamArray = $request->Tanggal_pinjam;
        $tanggalKembaliArray = $request->Tanggal_kembali;
        $jamAwalArray = $request->Jam_awal;
        $jamAkhirArray = $request->Jam_akhir;

        // Ambil semua data peminjaman ruangan untuk No_kop yang sesuai
        $dpRuangan = DpRuangan::where('No_kop', $noKop)->get();

        // Menghapus data ruangan yang tidak ada dalam array yang dikirim dari form
        $ruanganToDelete = $dpRuangan->filter(function ($ruangan) use ($noRuanganArray, $tanggalPinjamArray, $jamAwalArray, $jamAkhirArray) {
            // Cek jika kombinasi kolom tidak ada di dalam array yang dikirim
            return !in_array($ruangan->No_ruangan, $noRuanganArray) || 
                !in_array($ruangan->Tanggal_pinjam, $tanggalPinjamArray) || 
                !in_array($ruangan->Jam_awal, $jamAwalArray) || 
                !in_array($ruangan->Jam_akhir, $jamAkhirArray);
        });

        // Hapus ruangan yang tidak ada di dalam array
        foreach ($ruanganToDelete as $ruangan) {
            $ruangan->delete();
        }

        // Menambah atau memperbarui data
        foreach ($noRuanganArray as $index => $noRuangan) {
            // Cek apakah kombinasi ini sudah ada
            $existingRuangan = DpRuangan::where('No_kop', $noKop)
                                        ->where('No_ruangan', $noRuangan)
                                        ->where('Tanggal_pinjam', $tanggalPinjamArray[$index])
                                        ->where('Jam_awal', $jamAwalArray[$index])
                                        ->where('Jam_akhir', $jamAkhirArray[$index])
                                        ->first();

            if ($existingRuangan) {
                // Jika data sudah ada, lakukan update
                $existingRuangan->update([
                    'Tanggal_kembali' => $tanggalKembaliArray[$index],
                ]);
            } else {
                // Jika data belum ada, lakukan create (insert baru)
                DpRuangan::create([
                    'No_kop' => $noKop,
                    'No_ruangan' => $noRuangan,
                    'Tanggal_pinjam' => $tanggalPinjamArray[$index],
                    'Tanggal_kembali' => $tanggalKembaliArray[$index],
                    'Jam_awal' => $jamAwalArray[$index],
                    'Jam_akhir' => $jamAkhirArray[$index],
                ]);
            }
        }

        session()->flash('success', 'Surat berhasil diupdate');
        return redirect()->route('pr');
    }
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $destroyR = DpRuangan::where('No_ruangan', $id)->delete();
        session()->flash('success', 'Peminjaman berhasil dihapus');
        return redirect()->route('pr');
    }
}
