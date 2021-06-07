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
use App\Model\Pengguna;



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

        $nidn=$request->nidn;
        $this->validate($request, [
            'nama' => 'required|max:50',
            'nidn' => 'required|max:16|unique:dosen,nidn',
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
            DB::table('dosen')->insert([
                'nama' =>$request->nama,
                'nidn' =>$request->nidn,
                'pendidikan_terakhir' =>$request->pendidikan,
                'id_jurusan' =>$request->jurusan,
                'alamat' =>$request->alamat,
                'telepon' =>$request->telp,
                'email' =>$request->email,
                'lvl' => '1',
                'avatar' =>$inf_avatar
            ]);
        }else{
            DB::table('dosen')->insert([
                'nama' =>$request->nama,
                'nidn' =>$request->nidn,
                'pendidikan_terakhir' =>$request->pendidikan,
                'id_jurusan' =>$request->jurusan,
                'alamat' =>$request->alamat,
                'telepon' =>$request->telp,
                'email' =>$request->email,
                'lvl' => '1',
            ]);
        }
      

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
        $data=Dosen::where('id',$id)->get();
        return view('admin.pengguna.dosenEdit',[
            'data' => $data
        ]);
    }

    function dosen_update(Request $request){
        $id=$request->sumber;
        $nidn= $request->nidn;
        $this->validate($request, [
            'nama' => 'required',
            'nidn' => 'required|max:16|unique:dosen,nidn,'.$nidn.',nidn',
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

                $avatar_hapus=Dosen::where('id',$id)->first();
                File::delete('upload/user/'.$avatar_hapus->avatar);
    
                Dosen::where('id',$id)->update([
                  'avatar' => $inf_avatar
               ]);
           }
           DB::table('dosen')->where('id',$id)->update([
               'nama' =>$request->nama,
               'nidn' =>$request->nidn,
               'pendidikan_terakhir' =>$request->pendidikan,
               'id_jurusan' =>$request->jurusan,
               'alamat' =>$request->alamat,
               'telepon' =>$request->telp,
               'email' =>$request->email
           ]);

           if($request->pass != "" ){
                DB::table('pengguna')->where('username',$request->nidn)->update([
                    'username' => $request->nidn,
                    'password' => bcrypt($request->pass),
                    'level' => '2',
                    'status' => '1'
                ]);
            }
            return redirect('/admin/pengguna/dosen')->with('alert-success','Data telah diubah');

    }

    function dosen_delete($id){
        $avatar=Dosen::where('id',$id)->first();
        File::delete('upload/user/'.$avatar->avatar);
        Dosen::where('id',$id)->delete();
        Pengguna::where('username',$avatar->nidn)->delete();
        return redirect('/admin/pengguna/dosen')->with('alert-success','Data telah dihapus');

    }



    // bagian reviewer
    function reviewer(){
        $data= Dosen::where('lvl','3')->get();
        return view('admin.pengguna.reviewerData',[
            'data' => $data
        ]);
    }
 
    function reviewer_act(Request $request){
        $this->validate($request, [
            'nidn' => 'required'
        ]);     

        $nidn =$request->nidn;

        DB::table('dosen')->where('nidn',$nidn)->update([
            'lvl' => '3'
        ]);
        return redirect('/admin/pengguna/reviewer')->with('alert-success','Data telah ditambahkan');

    }

    function reviewer_delete($id){
      
        DB::table('dosen')->where('id',$id)->update([
            'lvl' => '1'
        ]);
        return redirect('/admin/pengguna/reviewer')->with('alert-success','Data telah dihapus');

    }




    // bagian mahasiswa

    function mahasiswa(){
        $data = Mahasiswa::orderBy('id','asc')->get();
        return view('admin.pengguna.siswaData',[
            'data' => $data
        ]);
    }
    function mahasiswa_add(){
        return view('admin.pengguna.siswaAdd');
    }

    function mahasiswa_act(Request $request){
        $nim=$request->nim;
        $this->validate($request, [
            'nama' => 'required|max:10',
            'nim' => 'required|max:16|unique:mahasiswa,nim',
            'avatar' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'telp' => 'max:10'
        ]);
        // $request->validate([
        //    ]);
   
        $avatar= $request->file('avatar');
     

        if($avatar != ""){
            // $avatar= $request->file('avatar');

            $inf_avatar =rand(10000,99999)."_".rand(1000,9999).".".$avatar->getClientOriginalExtension();
            $tujuan_upload ='upload/user';
    
            $avatar->move($tujuan_upload,$inf_avatar);
            DB::table('mahasiswa')->insert([
                'nama' =>$request->nama,
                'nim' =>$request->nim,
                'jenjang' =>$request->jenjang,
                'id_jurusan' =>$request->jurusan,
                'id_prodi' =>$request->prodi,
                'angkatan' =>$request->angkatan,
                'telepon' =>$request->telp,
                'email' =>$request->email,
                'avatar' =>$inf_avatar
            ]);
        }else{
            DB::table('mahasiswa')->insert([
                'nama' =>$request->nama,
                'nim' =>$request->nim,
                'jenjang' =>$request->jenjang,
                'id_jurusan' =>$request->jurusan,
                'id_prodi' =>$request->prodi,
                'angkatan' =>$request->angkatan,
                'telepon' =>$request->telp,
                'email' =>$request->email,
            ]);
        }
     

        if($request->pass != "" ){
            DB::table('pengguna')->insert([
                'username' => $request->nim,
                'password' => bcrypt($request->pass),
                'level' => '4',
                'status' => '1'
            ]);
        }else{
            DB::table('pengguna')->insert([
                'username' => $request->nim,
                'password' => bcrypt($request->nim),
                'level' => '4',
                'status' => '1'
            ]);
        }


        return redirect('/admin/pengguna/mahasiswa')->with('alert-success','Data telah ditambahkan');   
    }

    function mahasiswa_edit($id){
        $data=Mahasiswa::where('id',$id)->get();
        return view('admin.pengguna.siswaEdit',[
            'data' => $data
        ]);
    }

    function mahasiswa_update(Request $request){
        $nim= $request->nim;
        $id=$request->sumber;
        $this->validate($request, [
            'nama' => 'required|max:50',
            'nim' => 'required|max:16|unique:mahasiswa,nim,'.$nim.',nim',
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

                $avatar_hapus=Mahasiswa::where('id',$id)->first();
                File::delete('upload/user/'.$avatar_hapus->avatar);
    
                Mahasiswa::where('id',$id)->update([
                  'avatar' => $inf_avatar
               ]);
           }
           DB::table('mahasiswa')->where('id',$id)->update([
               'nama' =>$request->nama,
               'nim' =>$request->nim,
               'jenjang' =>$request->jenjang,
                'id_jurusan' =>$request->jurusan,
                'id_prodi' =>$request->prodi,
                'angkatan' =>$request->angkatan,
                'telepon' =>$request->telp,
                'email' =>$request->email
           ]);

           if($request->pass != "" ){
                DB::table('pengguna')->where('username',$request->nim)->update([
                    'username' => $request->nim,
                    'password' => bcrypt($request->pass),
                    'level' => '4',
                    'status' => '1'
                ]);
            }
            return redirect('/admin/pengguna/mahasiswa')->with('alert-success','Data telah diubah');

    }

    function mahasiswa_delete($id){
        $avatar=Mahasiswa::where('id',$id)->first();
        File::delete('upload/user/'.$avatar->avatar);
        Mahasiswa::where('id',$id)->delete();
        Pengguna::where('username',$avatar->nim)->delete();
        return redirect('/admin/pengguna/mahasiswa')->with('alert-success','Data telah dihapus');
    }


    // bagian reviewer




}
