<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Model\Admin;
use App\Model\Mahasiswa;
use App\Model\Dosen;
use App\Model\Pengguna;
use App\Model\KategoriBantuan;
use App\Model\JadwalKegiatan;
use App\Model\Laporan;
use App\Model\UnggahRek;

use App\Model\Usulan;
use App\Model\Jurusan;
use App\Model\Prodi;


class AjaxCtrl extends Controller
{
    



    // upload berkas di jadwal kegiatan

    
    function viewfile_pdf($id){
        $file='upload/berkas/'.$id.'.pdf';
        header('Content-Type: application/pdf');
        return response()->file(
            public_path($file)
        );
       
    }

    function viewfile_panduan($id){
        $file='upload/panduan/'.$id.'.pdf';
        header('Content-Type: application/pdf');
        return response()->file(
            public_path($file)
        );
    }

    function cek_prodi(Request $request){
        $jurusan =$request->jurusan;
        $pro= Prodi::where('id_jurusan',$jurusan)->first();
        $pro_nama=$pro->nama;
        $pro_id =$pro->id;
        echo "
        <div class='form-group'>
        <label>PRODI</label>
            <div class='input-group mb-3'>
                <div class='input-group-prepend'>
                    <span class='input-group-text'><i class='fas fa-graduation-cap'></i></span>
                </div>
                <select class='form-control' name='prodi' readonly>
                    <option value='$pro_id'>$pro_nama</option>
                </select>
            </div>
        </div>
        ";
    }

  
 






}
