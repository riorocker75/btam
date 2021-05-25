<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

  
 






}
