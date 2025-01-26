<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RiwayatKerusakan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_kerusakan';
    public $timestamps = false;

    protected $primaryKey = 'Id_kerusakan'; // -> deklarasi primary key untuk Eloquent ORM
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable= [
        'Id_kerusakan', // -> deklarasi column yg akan diisi oleh mass asignment
        'No_inventaris',
        'Tanggal_kerusakan',
        'Tanggal_perbaikan',
        'Detail_kerusakan'
    ];
}
