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
use App\Model\Dosen;
use App\Model\Mahasiswa;


class PenggunaCtrl extends Controller
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


    // bagian data dosen

    function dosen(){
        $data= Dosen::orderBy('id','asc')->get();
        return view('admin.pengguna.dosenData',[
            'data' => $data
        ]);
    }
    function dosen_add(){
        return view('admin.pengguna.dosenAdd');
    }

    function dosen_act(Request $request){

        $this->validate($request, [
            'nama' => 'required',
            'nidn' => 'required',
        ]);
        $request->validate([
            'avatar' => 'file|image|mimes:jpeg,png,jpg|max:2048'
           ]);
   
        $avatar= $request->file('avatar');
        $inf_avatar =rand(10000,99999)."_".rand(1000,9999).".".$avatar->getClientOriginalExtension();
        $tujuan_upload ='upload/user';

        $avatar->move($tujuan_upload,$inf_avatar);

        DB::table('dosen')->insert([
            'nama' =>$request->nama,
            'nidn' =>$request->nidn,
            'pendidikan_terakhir' =>$request->pendidikan,
            'id_jurusan' =>$request->jurusan,
            'alamat' =>$request->alamat,
            'telepon' =>$request->telp,
            'email' =>$request->email,
            'avatar' =>$inf_avatar
        ]);

        if($request->pass != "" ){
            DB::table('pengguna')->insert([
                'username' => $request->nidn,
                'password' => bcrypt($request->pass),
                'level' => '2',
                'status' => '1'
            ]);
        }else{
            DB::table('pengguna')->insert([
                'username' => $request->nidn,
                'password' => bcrypt($request->nidn),
                'level' => '2',
                'status' => '1'
            ]);
        }


        return redirect('/admin/pengguna/dosen')->with('alert-success','Data telah ditambahkan');

    }

    function dosen_edit($id){

    }

    function dosen_update(Requset $request){

    }

    function dosen_delete($id){

    }



    // bagian reviewer
    function review(){

    }
    function review_add(){

    }

    function review_act(Requset $request){

    }

    function review_edit($id){

    }

    function review_update(Requset $request){

    }

    function review_delete($id){

    }




    // bagian mahasiswa

    function mahasiswa(){

    }
    function mahasiswa_add(){

    }

    function mahasiswa_act(Requset $request){

    }

    function mahasiswa_edit($id){

    }

    function mahasiswa_update(Requset $request){

    }

    function mahasiswa_delete($id){

    }




}
