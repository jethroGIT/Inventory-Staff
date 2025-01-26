<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    /** @use HasFactory<\Database\Factories\RuanganFactory> */
    use HasFactory;

    protected $table = 'ruangan';
    public $timestamps = false;

    protected $primaryKey = 'No_ruangan'; // -> deklarasi primary key untuk Eloquent ORM
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable= [
        'No_ruangan', // -> deklarasi column yg akan diisi oleh mass asignment
        'Nama_ruangan',
        'Kapasitas_orang',
        'Status'
    ];
}
