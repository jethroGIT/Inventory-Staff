<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    /** @use HasFactory<\Database\Factories\BarangFactory> */
    use HasFactory;

    protected $table = 'barang';
    public $timestamps = false;

    protected $primaryKey = 'Id_barang'; // -> deklarasi primary key untuk Eloquent ORM
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable= [
        'Id_barang', // -> deklarasi column yg akan diisi oleh mass asignment
        'Tanggal_kedatangan',
        'Jenis_barang',
        'Jumlah_barang',
    ];
}
