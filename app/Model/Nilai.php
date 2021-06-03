<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table= "nilai";
    public $timestamps = false;
    protected $fillable =[
        'id_usulan',
    ];
}
