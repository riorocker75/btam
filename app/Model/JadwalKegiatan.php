<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JadwalKegiatan extends Model
{
        
    protected $table = "jadwalKegiatan";
    public $timestamps = false;

    protected $fillable=[
        'id_kategoriBantuan',
        'berkas_pengesahan',
        'pembukaan_tawaran',
        'deadline_proposal',
        'deadline_rek',
        'deadline_deskevaluasi',
        'deadline_kemajuan',
        'deadline_akhir'
    ];
}
