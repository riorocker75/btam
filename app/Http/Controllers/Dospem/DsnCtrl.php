<?php

namespace App\Http\Controllers\Dospem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Str;

use App\Model\Admin;
use App\Model\Mahasiswa;
use App\Model\Dosen;
use App\Model\Pengguna;
use App\Model\KategoriBantuan;
use App\Model\JadwalKegiatan;
use App\Model\Laporan;
use App\Model\UnggahRek;

use App\Model\Usulan;
class DsnCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Session::get('login-ds')){
                return redirect('login/user')->with('alert-danger','Dilarang Masuk Terlarang');
            }
            return $next($request);
        });
        
    }
    public function __invoke(){
        $nidn=Session::get('ds_username');
        $data= Usulan::where('id_dospem1',$nidn)
                ->orWhere('id_dospem2',$nidn)->get();
        return view('dospem.dashboard',[
            'data' =>$data
        ]);
    }


    function review_proposal($id){
        $data=Usulan::where('id',$id)->get();
        return view('dospem.review_proposal',[
            'data' => $data
        ]);
    }

    
    function review_proposal_act(Request $request){
        $id=$request->sumber;

        DB::table('usulan')->where('id',$id)->update([
            'status' => '2',
        ]);
        return redirect('/dashboard/dosen')->with('alert-success','Data telah diubah');

    }


}
