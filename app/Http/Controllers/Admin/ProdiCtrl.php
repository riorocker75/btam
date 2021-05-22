<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Model\Admin;

use App\Model\Prodi;
use App\Model\Jurusan;

class ProdiCtrl extends Controller
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

        // start prodi

        // start jurusan
        function jurusan(){
            $data = Jurusan::orderBy('id','asc')->get();
            return view('admin.prodi.jurusanData', [
                'data' =>$data
            ]);
        }


        function jurusan_act(Request $request){
            $this->validate($request, [
                'nama' => 'required',
            ]);
            DB::table('jurusan')->insert([
                'nama' =>$request->nama,
            ]);
            return redirect('/admin/daftar-jurusan')->with('alert-success','Data telah ditambahkan');
        }

        
        function jurusan_edit($id){
            $data_edit = DB::table('jurusan')->where('id',$id)->get();
            $data = Jurusan::orderBy('id','asc')->get();
            return view('admin.prodi.jurusanEdit', [
                'data' => $data,
                'data_edit' => $data_edit
                ]);
           
        }

        function jurusan_update(Request $request){
            $this->validate($request, [
                'nama' => 'required',
            ]);
            $id=$request->sumber;
           Jurusan::where('id', $id)->update([
                'nama' => $request->nama
            ]);
            return redirect('/admin/daftar-jurusan')->with('alert-success','Data telah diubah');
        }

        function jurusan_delete($id){
            DB::table('jurusan')->where('id',$id)->delete();
            return redirect('/admin/daftar-jurusan')->with('alert-success','Data telah terhapus');
        }


        // start prodi

        function prodi(){
            $data = Prodi::orderBy('id','asc')->get();
            return view('admin.prodi.prodiData', [
                'data' =>$data
            ]);
        }

        function prodi_act(Request $request){
            $this->validate($request, [
                'nama' => 'required',
                'jurusan' => 'required',

            ]);
            DB::table('prodi')->insert([
                'nama' =>$request->nama,
                'id_jurusan' =>$request->jurusan,
            ]);
            return redirect('/admin/daftar-prodi')->with('alert-success','Data telah ditambahkan');
        }

          
        function prodi_edit($id){
            $data_edit = DB::table('prodi')->where('id',$id)->get();
            $data = Prodi::orderBy('id','asc')->get();
            return view('admin.prodi.prodiEdit', [
                'data' => $data,
                'data_edit' => $data_edit
                ]);
           
        }

        function prodi_update(Request $request){
            $this->validate($request, [
                'nama' => 'required',
                'jurusan' => 'required',
            ]);
            $id=$request->sumber;
           Prodi::where('id',$id)->update([
                'nama' =>$request->nama,
                'id_jurusan' =>$request->jurusan,
            ]);
            return redirect('/admin/daftar-prodi')->with('alert-success','Data telah diubah');
        }

        function prodi_delete($id){
            DB::table('prodi')->where('id',$id)->delete();
            return redirect('/admin/daftar-prodi')->with('alert-success','Data telah terhapus');
        }


}
