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

use App\Model\JadwalKegiatan;
use App\Model\KategoriBantuan;



class JadwalCtrl extends Controller
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

    function jadwal_kegiatan(){
        $data= JadwalKegiatan::orderBy('id','asc')->get();
        return view('admin.jadwal.jadwalData',[
            'data' =>$data
        ]);
    }

    function jadwal_kegiatan_add(){
        return view('admin.jadwal.jadwalAdd');
    }

    function jadwal_kegiatan_act(Request $request){
        $this->validate($request, [
            'kategori' => 'required',
            'penawaran' => 'required',
            'deadline_proposal' => 'required',
            'deadline_rekening' => 'required',
            'deadline_desk' => 'required',
            'deadline_kemajuan' => 'required',
            'deadline_akhir' => 'required'
        ]);

        // $request->validate([
        //  'berkas' => 'mimes:pdf|max:20000'
        // ]);

        // $berkas= $request->file('berkas');
        // $inf_berkas =rand(10000,99999)."_".rand(1000,9999).".".$berkas->getClientOriginalExtension();
        // $tujuan_upload ='upload/berkas';

        // $berkas->move($tujuan_upload,$inf_berkas);

        DB::table('jadwalKegiatan')->insert([
            'id_kategoriBantuan' =>$request->kategori,
            'pembukaan_tawaran' =>$request->penawaran,
            'deadline_proposal' =>$request->deadline_proposal,
            'deadline_rek' =>$request->deadline_rekening,
            'deadline_deskevaluasi' =>$request->deadline_desk,
            'deadline_kemajuan' =>$request->deadline_kemajuan,
            'deadline_akhir' =>$request->deadline_akhir,
            // 'berkas_pengesahan' => $inf_berkas
        ]);
        return redirect('/admin/jadwal-kegiatan')->with('alert-success','Data telah ditambahkan');
    }


    function jadwal_kegiatan_edit($id){
        $data_edit = DB::table('jadwalKegiatan')->where('id',$id)->get();
        return view('admin.jadwal.jadwalEdit', [
            'data_edit' => $data_edit
            ]);
    }

    function jadwal_kegiatan_update(Request $request){
        $this->validate($request, [
            'kategori' => 'required',
            'penawaran' => 'required',
            'deadline_proposal' => 'required',
            'deadline_rekening' => 'required',
            'deadline_desk' => 'required',
            'deadline_kemajuan' => 'required',
            'deadline_akhir' => 'required'
        ]);

        // $request->validate([
        //  'berkas' => 'mimes:pdf|max:20000'
        // ]);
        
        $id=$request->sumber;



        // $berkas= $request->file('berkas');
        
        // if($berkas != ""){
        //     $inf_berkas =rand(10000,99999)."_".rand(1000,9999).".".$berkas->getClientOriginalExtension();
        //     $tujuan_upload ='upload/berkas';
    
        //     $berkas->move($tujuan_upload,$inf_berkas);
            
        //     // penghapusan berkas lama
        //     $berkas_hapus=JadwalKegiatan::where('id',$id)->first();
        //     File::delete('upload/berkas/'.$berkas_hapus->berkas_pengesahan);

        //     JadwalKegiatan::where('id',$id)->update([
        //       'berkas_pengesahan' => $inf_berkas
        //    ]);
        // }
        JadwalKegiatan::where('id', $id)->update([
            'id_kategoriBantuan' =>$request->kategori,
            'pembukaan_tawaran' =>$request->penawaran,
            'deadline_proposal' =>$request->deadline_proposal,
            'deadline_rek' =>$request->deadline_rekening,
            'deadline_deskevaluasi' =>$request->deadline_desk,
            'deadline_kemajuan' =>$request->deadline_kemajuan,
            'deadline_akhir' =>$request->deadline_akhir
        ]);
        return redirect('/admin/jadwal-kegiatan')->with('alert-success','Data telah diubah');
    }


    
}
