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

        DB::table('nilai')->where('id',$id)
            ->where('id_reviewer',$nidn)->update([
            'skor_kreatif' => $request->skor_kreatif,
            'skor_pustaka' => $request->skor_pustaka,
            'skor_metode' => $request->skor_metode,
            'skor_luaran' => $request->skor_luaran,
            'skor_jadwal' => $request->skor_jadwal,
            'nilai_kreatif' => $request->nilai_kreatif,
            'nilai_pustaka' => $request->nilai_pustaka,
            'nilai_metode' => $request->nilai_metode,
            'nilai_luaran' => $request->nilai_luaran,
            'nilai_jadwal' => $request->nilai_jadwal,

            'jumlah' => $request->jumlah,
            'komentar' => $request->komentar,
            'dana_setuju' => $request->dana_setuju,

        ]);     
        return redirect('/dashboard/reviewer')->with('alert-success','Data telah submit');

    }

    function review_proposal_update(Request $request){
        $nidn =Session::get('rv_username');
        $id =$request->sumber;

        $this->validate($request, [
            'nilai_kreatif' => 'required',
            'nilai_pustaka' => 'required',
            'nilai_metode' => 'required',
            'nilai_luaran' => 'required',
            'nilai_jadwal' => 'required'
        ]);

        DB::table('nilai')->where('id',$id)
            ->where('id_reviewer',$nidn)->update([
            'skor_kreatif' => $request->skor_kreatif,
            'skor_pustaka' => $request->skor_pustaka,
            'skor_metode' => $request->skor_metode,
            'skor_luaran' => $request->skor_luaran,
            'skor_jadwal' => $request->skor_jadwal,
            'nilai_kreatif' => $request->nilai_kreatif,
            'nilai_pustaka' => $request->nilai_pustaka,
            'nilai_metode' => $request->nilai_metode,
            'nilai_luaran' => $request->nilai_luaran,
            'nilai_jadwal' => $request->nilai_jadwal,

            'jumlah' => $request->jumlah,
            'komentar' => $request->komentar,
            'dana_setuju' => $request->dana_setuju,

        ]);     
        return redirect('/dashboard/reviewer')->with('alert-success','Data telah submit');

    }

    function lihat_nilai($id){
        $data = Nilai::where('id',$id)->get();
        return view('reviewer.lihat_nilai',[
            'data' =>$data
        ]);
    }





}
