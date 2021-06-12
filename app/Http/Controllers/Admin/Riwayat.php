<?php

namespace App\Http\Controllers\Admin;

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

class Riwayat extends Controller
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

    // riwayat unggah proposal
    function riwayat_proposal(){
        $data = Usulan::orderBy('id','desc')->get();
        return view('admin.riwayat.proposal.proposalData',[
            'data' =>$data
        ]);
    }

    // riwayat unggah  laporan kemajua

    function riwayat_kemajuan(){
        $data = Laporan::where('jenis','1')->get();
        return view('admin.riwayat.kemajuan.kemajuanData',[
            'data' =>$data
        ]);
    }


    
    // riwayat unggah  laporan akhit

    function riwayat_akhir(){
        $data = Laporan::where('jenis','2')->get();
        return view('admin.riwayat.akhir.akhirData',[
            'data' =>$data
        ]);
    }

    // hasil peniliaian

    function hasil_nilai(){
        $data = Usulan::where('status','3')->get();
        return view('admin.riwayat.penilaian.nilaiData',[
            'data' =>$data
        ]);
    }


        
    // riwayat rekening

    function riwayat_rekening(){
        $data = UnggahRek::orderBy('id','desc')->get();
        return view('admin.riwayat.rekening.rekeningData',[
            'data' =>$data
        ]);
    }



    // review nilai
    function review_nilai($id){
        $data = Usulan::where('id',$id)->get();
        return view('admin.riwayat.penilaian.nilaiReview',[
            'data' =>$data
        ]);
    }

    function review_nilai_update(Request $request){
        
        $id= $request->sumber;
        // $setuju=$request->setuju;
        // $tolak=$request->tolak;

        if($request->has('setuju')){
            $this->validate($request, [
                'dana' => 'required',
            ]);
            DB::table('usulan')->where('id',$id)->update([
                'biaya' => $request->dana,
                'status' => '4',
                'status_nilai' =>'2'
            ]);

            DB::table('nilai')->where('id_usulan',$id)->update([
                'status_dana' => '1'
            ]);

        }elseif($request->has('tolak')){
            DB::table('usulan')->where('id',$id)->update([
                'status' => '5'
            ]);

            DB::table('nilai')->where('id_usulan',$id)->update([
                'status_dana' => '0'
            ]);
        }
       
        return redirect('/admin/hasil-penilaian')->with('alert-success','Data telah submit');
      
    }



}
