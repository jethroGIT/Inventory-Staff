<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBarang extends Model
{
    /** @use HasFactory<\Database\Factories\DetailBarangFactory> */
    use HasFactory;

    protected $table = 'detail_barang'; // Nama tabel

    protected $primaryKey = 'No_inventaris';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'No_inventaris',
        'Id_barang',
        'Nama_barang',
        'Merk_barang',
        'Status'
    ];
}
