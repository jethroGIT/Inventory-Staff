<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanRuangan extends Model
{
    /** @use HasFactory<\Database\Factories\PeminjamanRuanganFactory> */
    use HasFactory;

    protected $table = 'peminjaman_ruangan'; // -> deklarasi nama table di database
    public $timestamps = false;

    protected $primaryKey = 'No_kop'; // -> deklarasi primary key untuk Eloquent ORM
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable= [
        'No_kop', // -> deklarasi column yg akan diisi oleh mass asignment
        'Nama_peminjam',
        'Jabatan_peminjam',
        'No_hp',
        'Email',
        'Keterangan',
        'Nama_pengembali',
        'Nama_petugas_pengambilan',
        'Nama_petugas_pengembalian',
        'Status_peminjaman'
    ];
}
