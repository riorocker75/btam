<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = "jurusan";
    public $timestamps = false;

    protected $fillable=[
        'nama'
    ];
}
