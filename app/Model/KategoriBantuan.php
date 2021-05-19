<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KategoriBantuan extends Model
{
   
    protected $table = "kategoriBantuan";
    public $timestamps = false;
    protected $fillable=[
        'nama',
        'syarat_pendidikan',
        'min_anggota',
        'max_anggota',
        'min_biaya',
        'max_biaya'
    ];
}
