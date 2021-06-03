<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


use App\Model\Admin;
use App\Model\Mahasiswa;
use App\Model\Dosen;
use App\Model\Pengguna;
use App\Model\KategoriBantuan;
use App\Model\JadwalKegiatan;
use App\Model\Laporan;
use App\Model\UnggahRek;

use App\Model\Usulan;


class Penugasan extends Controller
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

    public function __invoke(){
        $data= Usulan::where('status',2)->get();
        return view('admin.penugasan.penugasanData',[
            'data' =>$data
        ]);
    }

    function pilih_review($id){
        $data= Usulan::where('id',$id)->get();
        return view('admin.penugasan.pilihReview',[
            'data' =>$data
        ]);
    }

    function tugas_act(Request $request){
        $id=$request->sumber;
        $this->validate($request, [
            'review1' => 'required',
        ]);

        DB::table('usulan')->where('id',$id)->update([
            'status' => 3,
            'status_nilai' => 1
        ]);

        if($request->review1 != ""){
            DB::table('nilai')->insert([
                'id_usulan' => $id,
                'id_reviewer' => $request->review1,
                'status' => '1'
            ]);
        }

        if($request->review2 != ""){
            DB::table('nilai')->insert([
                'id_usulan' => $id,
                'id_reviewer' => $request->review2,
                'status' => '2'
            ]);
        }
        

        return redirect('/admin/penugasan-reviewer/')->with('alert-success','Data telah submit');


    }




}
