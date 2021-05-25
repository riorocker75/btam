<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Panduan extends Model
{
    protected $table= "panduan";
    public $timestamps = false;
    protected $fillable =[
        'nama',
        'file_panduan'
    ];

}
