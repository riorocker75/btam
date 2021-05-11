<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table= "pengguna";
    public $timestamps = false;
    protected $fillable =[
      'username',
      'password',
      'level',
      'status'
    ];
}
