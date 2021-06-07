<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

use App\Model\KategoriBantuan;
use App\Model\Prodi;
use App\Model\Jurusan;
use App\Model\JadwalKegiatan;


class AdminCtrl extends Controller
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
    public function __invoke(){
        return view('admin.dashboard');
    }

    // bagian kategori bantuan
    function kategori_bantuan(){
        $data = KategoriBantuan::orderBy('id','asc')->get();
        return view('admin.bantuan.kategoriData',[
            'data' => $data
        ]);
    }

    function kategori_bantuan_add(){
        return view('admin.bantuan.kategoriAdd');
    }

    function kategori_bantuan_act(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'jenjang' => 'required',
            'minAnggota' => 'required|max:2',
            'maxAnggota' => 'required|max:4',
            'minBiaya' => 'required|max:10',
            'maxBiaya' => 'required|max:10'
        ]);
        DB::table('kategoriBantuan')->insert([
			'nama' =>$request->nama,
			'syarat_pendidikan' =>$request->jenjang,
			'min_anggota' =>$request->minAnggota,
			'max_anggota' =>$request->maxAnggota,
			'min_biaya' =>$request->minBiaya,
			'max_biaya' =>$request->maxBiaya,
			
		]);
		

		return redirect('admin/kategori-bantuan')->with('alert-success','Data telah ditambahkan');
    }

    function kategori_bantuan_edit($id){
        $data = DB::table('kategoriBantuan')->where('id',$id)->get();
		return view('admin.bantuan.kategoriEdit', ['data' => $data]);
    }


    function kategori_bantuan_update(Request $request){
        $id =  $request->sumber;
        $this->validate($request, [
            'nama' => 'required|max:100',
            'jenjang' => 'required|max:70',
            'minAnggota' => 'required|max:3',
            'maxAnggota' => 'required|max:10',
            'minBiaya' => 'required|max:10',
            'maxBiaya' => 'required|max:10'
        ]);
        KategoriBantuan::where('id',$id)->update([
            'nama' =>$request->nama,
			'syarat_pendidikan' =>$request->jenjang,
			'min_anggota' =>$request->minAnggota,
			'max_anggota' =>$request->maxAnggota,
			'min_biaya' =>$request->minBiaya,
			'max_biaya' =>$request->maxBiaya,
        ]);
		return redirect('/admin/kategori-bantuan')->with('alert-success','Data telah diubah');

    }

    function kategori_bantuan_delete($id){
        DB::table('kategoriBantuan')->where('id',$id)->delete();
		return redirect('/admin/kategori-bantuan')->with('alert-success','Data telah terhapus');
    }


    // bagian jadwal kegiatan







}
