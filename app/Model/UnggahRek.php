<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UnggahRek extends Model
{
    protected $table = "unggah_rek";
    public $timestamps = false;

    protected $fillable=[
        'id_usulan',
    ];
}
