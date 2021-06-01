<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Usulan extends Model
{
    protected $table= "usulan";
    public $timestamps = false;
    protected $fillable =[
     'id_ketua',
     'id_kategoriBantuan',
     'id_jurusan',
     'id_dospem1',
      'judul'
    ];
}
