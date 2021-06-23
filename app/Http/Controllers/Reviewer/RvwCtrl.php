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
        $nl=Nilai::where('id',$id)->first();
        $usl = Usulan::where('id',$nl->id_usulan)->first();

        $this->validate($request, [
            'nilai_kreatif' => 'required',
            'nilai_pustaka' => 'required',
            'nilai_metode' => 'required',
            'nilai_luaran' => 'required',
            'nilai_jadwal' => 'required'
        ]);
        $nk=$request->nilai_kreatif;
        $np=$request->nilai_pustaka;
        $nm=$request->nilai_metode;
        $nl=$request->nilai_luaran;
        $nj =$request->nilai_jadwal;
        $jumlah=$nk+$np+$nm+$nl+$nj;
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
            'jumlah' => $jumlah,
            'komentar' => $request->komentar,
            'dana_setuju' => $request->dana_setuju,

        ]);   
        
        if($usl->jumlah > 1){
            $jumlah_lama = $usl->jumlah;
            $total=$jumlah + $jumlah_lama;
            DB::table('usulan')->where('id',$usl->id)->update([
                'jumlah' => $total
            ]); 
        }else{
            DB::table('usulan')->where('id',$usl->id)->update([
                'jumlah' => $jumlah
            ]); 
        }
        
        return redirect('/dashboard/reviewer')->with('alert-success','Data telah submit');

    }

    function review_proposal_update(Request $request){
        $nidn =Session::get('rv_username');
        $id =$request->sumber;
        $nl=Nilai::where('id',$id)->first();
        $usl = Usulan::where('id',$nl->id_usulan)->first();

        $this->validate($request, [
            'nilai_kreatif' => 'required',
            'nilai_pustaka' => 'required',
            'nilai_metode' => 'required',
            'nilai_luaran' => 'required',
            'nilai_jadwal' => 'required'
        ]);
        $nk=$request->nilai_kreatif;
        $np=$request->nilai_pustaka;
        $nm=$request->nilai_metode;
        $nl=$request->nilai_luaran;
        $nj =$request->nilai_jadwal;
        $jumlah=$nk+$np+$nm+$nl+$nj;

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
            'jumlah' => $jumlah,
            'komentar' => $request->komentar,
            'dana_setuju' => $request->dana_setuju,

        ]);   
        
    
        DB::table('usulan')->where('id',$usl->id)->update([
            'jumlah' => $jumlah
        ]); 
        return redirect('/dashboard/reviewer')->with('alert-success','Data telah submit');

    }

    function lihat_nilai($id){
        $data = Nilai::where('id',$id)->get();
        return view('reviewer.lihat_nilai',[
            'data' =>$data
        ]);
    }


    // profile

    function profile(){
        return view('reviewer.profileData'); 

    }
    function profile_edit(){
        return view('reviewer.profileEdit'); 
    }
    function profile_update(Request $request){
        $nidn= Session::get('rv_username');

        $this->validate($request, [
            'nama' => 'required',
            'telp' => 'max:10'
        ]);
        $request->validate([
            'avatar' => 'file|image|mimes:jpeg,png,jpg|max:2048'
           ]);
            
           $avatar= $request->file('avatar');

           if($avatar != ""){
                $inf_avatar =rand(10000,99999)."_".rand(1000,9999).".".$avatar->getClientOriginalExtension();
                $tujuan_upload ='upload/user';
        
                $avatar->move($tujuan_upload,$inf_avatar);

                $avatar_hapus=Dosen::where('nidn',$nidn)->first();
                File::delete('upload/user/'.$avatar_hapus->avatar);
    
                Dosen::where('nidn',$nidn)->update([
                  'avatar' => $inf_avatar
               ]);
           }
           DB::table('dosen')->where('nidn',$nidn)->update([
               'nama' =>$request->nama,
               'pendidikan_terakhir' =>$request->pendidikan,
               'id_jurusan' =>$request->jurusan,
               'alamat' =>$request->alamat,
               'telepon' =>$request->telp,
               'email' =>$request->email
           ]);

           if($request->pass != "" ){
                DB::table('pengguna')->where('username',$nidn)->update([
                    'username' => $request->nidn,
                    'password' => bcrypt($request->pass),
                    'level' => '3',
                    'status' => '1'
                ]);
            }
            return redirect('/reviewer/profile')->with('alert-success','Data telah diubah');

    }

    function riwayat_nilai(){
        $nidn =Session::get('rv_username');
        $data = Nilai::where('id_reviewer',$nidn)->get();
        return view('reviewer.riwayat_nilai',[
            'data' =>$data
        ]);
    }
    


}
