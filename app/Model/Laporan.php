<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = "laporan";
    public $timestamps = false;

    protected $fillable=[
        'id_usulan',
        'tgl_laporan'
    ];
}
