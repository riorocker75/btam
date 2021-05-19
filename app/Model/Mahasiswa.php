<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table= "mahasiswa";
    public $timestamps = false;
    protected $fillable =[
      'nim',
      'nama'
      // 'id_jurusan', 
      // 'id_prodi',
      // 'email'
    ];
}
