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
use App\Model\Panduan;

class PanduanCtrl extends Controller
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

    function panduan(){
        $data =Panduan::orderBy('id','asc')->get();
        return view('admin.panduan.panduanData',[
            'data' => $data
        ]);
    }

    function panduan_add(){
        return view('admin.panduan.panduanAdd');
    }

    function panduan_act(Request $request){
        $this->validate($request, [
            'nama' => 'required|max:100'
        ]);
        $request->validate([
             'berkas' => 'required|mimes:pdf|max:20000'
        ]);
         
        $berkas= $request->file('berkas');
        $inf_berkas =rand(10000,99999)."_".rand(1000,9999).".".$berkas->getClientOriginalExtension();
        $tujuan_upload ='upload/panduan';

        $berkas->move($tujuan_upload,$inf_berkas);
        DB::table('panduan')->insert([
            'nama' =>$request->nama,
            'file_panduan' => $inf_berkas
        ]);

        return redirect('/admin/panduan')->with('alert-success','Data telah ditambahkan');

    }
    
    function panduan_delete($id){
        $berkas_hapus=Panduan::where('id',$id)->first();
        File::delete('upload/panduan/'.$berkas_hapus->file_panduan);

        Panduan::where('id',$id)->delete();
        return redirect('/admin/panduan')->with('alert-success','Data telah dihapus');

    }



}
