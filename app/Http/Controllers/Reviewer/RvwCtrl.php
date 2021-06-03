<?php

namespace App\Http\Controllers\Reviewer;

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
use App\Model\Nilai;


class RvwCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Session::get('login-rv')){
                return redirect('login/user')->with('alert-danger','Dilarang Masuk Terlarang');
            }
            return $next($request);
        });
        
    }
    public function __invoke(){
        $id=Session::get('rv_username');
        $data = Nilai::where('id_reviewer',$id)->get();
        return view('reviewer.dashboard',[
            'data' => $data
        ]);
    }

    function review_proposal($id){
        $data = Nilai::where('id',$id)->get();
        return view('reviewer.penilaian',[
            'data' =>$data
        ]);
    }

    function review_proposal_act(Request $request){
        $nidn =Session::get('rv_username');
        $id =$request->sumber;

        $this->validate($request, [
            'nilai_kreatif' => 'required',
            'nilai_pustaka' => 'required',
            'nilai_metode' => 'required',
            'nilai_luaran' => 'required',
            'nilai_jadwal' => 'required'
        ]);

        DB::table('nilai')->where('id',$id)->update([
            'skor_kreatif' => $request->nilai_kreatif,
            'skor_pustaka' => $request->nilai_pustaka,
            'skor_metode' => $request->nilai_metode,
            'skor_luaran' => $request->nilai_luaran,
            'skor_jadwal' => $request->nilai_jadwal,
            'jumlah' => $request->jumlah,
            'komentar' => $request->komentar,
            'dana_setuju' => $request->dana_setuju,

        ]);     
        return redirect('/dashboard/reviewer')->with('alert-success','Data telah submit');

    }





}
