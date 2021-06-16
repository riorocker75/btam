<?php

namespace App\Http\Controllers\Kajur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use File;

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
class KajurCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Session::get('login-kj')){
                return redirect('login/user')->with('alert-danger','Dilarang Masuk Terlarang');
            }
            return $next($request);
        });
        
    }

    public function __invoke(){
        $data= Usulan::where('status','2')->where('status_kajur','1')->get();
        return view('kajur.dashboard',[
            'data' =>$data
        ]);
    }

    function review_proposal($id){
        $data=Usulan::where('id',$id)->get();
        return view('kajur.review_proposal',[
            'data' => $data
        ]);
    }

    
    function review_proposal_act(Request $request){
        $id=$request->sumber;

        DB::table('usulan')->where('id',$id)->update([
            'status' => '2',
            'status_kajur' => '2'
        ]);
        return redirect('/dashboard/kajur')->with('alert-success','Data telah diubah');
    }

    function setuju_proposal_act(Request $request){
        DB::table('usulan')->where('status','2')->update([
            'status_kajur' => '2'
        ]);
        return redirect('/dashboard/kajur')->with('alert-success','Data telah dikirimkan ke admin');

    }
 // profile

 function profile(){
    return view('kajur.profileData'); 

}
function profile_edit(){
    return view('kajur.profileEdit'); 
}
function profile_update(Request $request){
    $nidn= Session::get('kj_username');

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
                'status' => '1'
            ]);
        }
        return redirect('/kajur/profile')->with('alert-success','Data telah diubah');

}



}
