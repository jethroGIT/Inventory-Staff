<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DpRuangan extends Model
{
    /** @use HasFactory<\Database\Factories\DpRuanganFactory> */
    use HasFactory;
    protected $table = 'dp_ruangan'; // Nama tabel

    protected $primaryKey = 'No_kop';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'No_kop',
        'No_ruangan',
        'Tanggal_pinjam',
        'Tanggal_kembali',
        'Jam_awal',
        'Jam_akhir',
    ];
}
