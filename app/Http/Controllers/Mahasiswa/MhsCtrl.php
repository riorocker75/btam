<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Str;
use App\Model\Panduan;

use App\Model\Admin;
use App\Model\Mahasiswa;
use App\Model\Dosen;
use App\Model\Pengguna;
use App\Model\KategoriBantuan;
use App\Model\JadwalKegiatan;
use App\Model\Laporan;
use App\Model\UnggahRek;

use App\Model\Usulan;
class MhsCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Session::get('login-mh')){
                return redirect('login/user')->with('alert-danger','Dilarang Masuk Terlarang');
            }
            return $next($request);
        });
        
    }
    public function __invoke(){
        $nim=Session::get('mh_username');
        $data= Usulan::where('id_ketua',$nim)->get();
        return view('mahasiswa.dashboard',[
            'data' =>$data
        ]);
    }

    function panduan(){
        $data =Panduan::orderBy('id','asc')->get();
        return view('mahasiswa.panduan',[
            'data' => $data
        ]); 
    }


    
    function profile(){
       
        return view('mahasiswa.profileData'); 
    }

    function profile_edit(){
        $nim= Session::get('mh_username');
        $data =Mahasiswa::where('nim',$nim)->first();
        return view('mahasiswa.profileEdit',[
            'data' => $data
        ]); 
    }

    
    function profile_update(Request $request){
        $nim= Session::get('mh_username');
        $this->validate($request, [
            'nama' => 'required|max:50',
            'telp' => 'max:16'
        ]);
        $request->validate([
            'avatar' => 'file|image|mimes:jpeg,png,jpg|max:2048'
           ]);
            
           $avatar= $request->file('avatar');

           if($avatar != ""){
                $inf_avatar =rand(10000,99999)."_".rand(1000,9999).".".$avatar->getClientOriginalExtension();
                $tujuan_upload ='upload/user';
        
                $avatar->move($tujuan_upload,$inf_avatar);

                $avatar_hapus=Mahasiswa::where('nim',$nim)->first();
                File::delete('upload/user/'.$avatar_hapus->avatar);
    
                Mahasiswa::where('nim',$nim)->update([
                  'avatar' => $inf_avatar
               ]);
           }
           DB::table('mahasiswa')->where('nim',$nim)->update([
               'nama' =>$request->nama,
               'jenjang' =>$request->jenjang,
                'id_jurusan' =>$request->jurusan,
                'id_prodi' =>$request->prodi,
                'angkatan' =>$request->angkatan,
                'telepon' =>$request->telp,
                'email' =>$request->email
           ]);

           if($request->pass != "" ){
                DB::table('pengguna')->where('username',$request->nim)->update([
                    'password' => bcrypt($request->pass),
                    'level' => '4',
                    'status' => '1'
                ]);
            }
            return redirect('/mahasiswa/profile')->with('alert-success','Data telah diubah');

    }

    function riwayat_usulan(){
        $nim =Session::get('mh_username');
        $data=Usulan::where('id_ketua',$nim)->get();
        return view('mahasiswa.riwayatData',[
            'data' => $data
        ]);
    }


    function rekening_edit($id){
        $nim =Session::get('mh_username');
        $data=UnggahRek::where('id_usulan',$id)->get();
        return view('mahasiswa.usulan.rekeningEdit',[
            'data' => $data
        ]);
    }
    function rekening_update(Request $request){
        $this->validate($request, [
            'no_rek' => 'required',
            'nama_rek' => 'required',
            'nama_bank' => 'required',
            'foto_rek' => 'mimes:jpeg,png,jpg|max:1000',
        ]);
        $id= $request->sumber;
        $tujuan_upload ='upload/berkas';
        
        $fr= $request->file('surat_aktif');
        
        if($fr != ""){
            $foto_rek= $request->file('foto_rek');
            $inf_foto_rek =rand(10000,99999)."_".rand(1000,9999).".".$foto_rek->getClientOriginalExtension();
            $foto_rek->move($tujuan_upload,$inf_foto_rek);  
        
            $fr_hapus=UnggahRek::where('id_usulan',$id)->first();
            File::delete('upload/berkas/'. $fr_hapus->foto);
            UnggahRek::where('id_usulan',$id)->update([
                'foto' => $inf_foto_rek
            ]);    
        }
        
        
        
        DB::table('unggah_rek')->where('id_usulan',$id)->update([
            'nomor_rek' => $request->no_rek,
            'nama_rek' => $request->nama_rek,
            'nama_bank' => $request->nama_bank
        ]);
        
        return redirect('/mahasiswa/riwayat')->with('alert-success','Data telah diubah');
         
    }
    function rekening_review($id){

    }

    
}
