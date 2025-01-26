<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DpBarang extends Model
{
    /** @use HasFactory<\Database\Factories\PeminjamanBarangFactory> */
    use HasFactory;

    // Nama tabel
    protected $table = 'dp_barang';

    // Primary key
    protected $primaryKey = 'No_kop';
    public $timestamps = false;
    public $incrementing = false;

    // Daftar kolom yang dapat diisi (fillable)
    protected $fillable = [
        'No_kop',
        'No_inventaris',
        'Tanggal_pinjam',
        'Tanggal_kembali',
        'Jam_awal',
        'Jam_akhir',
    ];
}
