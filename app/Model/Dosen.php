<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
     protected $table= "dosen";
    public $timestamps = false;
    protected $fillable =[
      'nidn',
      'nama',
      'pendidikan_terakhir', 
      'email'
    ];
}
