<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanBarang extends Model
{
    /** @use HasFactory<\Database\Factories\PeminjamanBarangFactory> */
    use HasFactory;

    // Nama tabel
    protected $table = 'peminjaman_barang';

    // Composite primary key
    // protected $primaryKey = ['No_kop', 'No_inventaris', 'Tanggal_pinjam', 'Jam_awal', 'Jam_akhir'];
    protected $primaryKey = 'No_kop';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'No_kop',
        'Nama_peminjam',
        'Jabatan_peminjam',
        'No_hp',
        'Email',
        'Keterangan',
        'Nama_pengembali',
        'Nama_petugas_pengambilan',
        'Nama_petugas_pengembalian',
        'Status_peminjaman',
    ];
}
