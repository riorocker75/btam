<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KriteriaNilai extends Model
{
    protected $table = "kriteria_nilai";
    public $timestamps = false;
    protected $fillable=[
        'nama'
    ];
}