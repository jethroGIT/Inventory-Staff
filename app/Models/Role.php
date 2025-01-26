<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $primaryKey = 'id'; // -> deklarasi primary key untuk Eloquent ORM
    protected $keyType = 'int';
    public $incrementing = false;

    protected $fillable= [
        'name'
    ];
}
