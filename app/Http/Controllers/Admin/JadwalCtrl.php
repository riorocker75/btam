<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Model\Admin;

use App\Model\JadwalKegiatan;
use App\Model\KategoriBantuan;



class JadwalCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Session::get('login-adm')){
                return redirect('login/user');
            }
            return $next($request);
        });
        
    }

    function jadwal_kegiatan(){
        $data= JadwalKegiatan::orderBy('id','asc')->get();
        return view('admin.jadwal.jadwalData',[
            'data' =>$data
        ]);
    }

    function jadwal_kegiatan_add(){
        return view('admin.jadwal.jadwalAdd');
    }





    
}
