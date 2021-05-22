<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = "prodi";
    public $timestamps = false;
    protected $fillable=[
        'id_jurusan',
        'nama',
    ];
}
