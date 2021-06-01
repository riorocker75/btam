<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Str;

use App\Model\Admin;
use App\Model\Mahasiswa;
use App\Model\Dosen;
use App\Model\Pengguna;
use App\Model\KategoriBantuan;
use App\Model\JadwalKegiatan;
use App\Model\Laporan;
use App\Model\UnggahRek;

use App\Model\Usulan;


class DaftarUsCtrl extends Controller
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

        $data = JadwalKegiatan::orderBy('id','asc')->get();
        return view('mahasiswa.usulan.usulanData',[
            'data' => $data
        ]);
    }

    function unggah_proposal($id){
        $data = JadwalKegiatan::where('id',$id)->get();
       return view('mahasiswa.usulan.unggah_proposal',[
           'data' =>$data
       ]); 
    }

    function unggah_proposal_act(Request $request){
        $this->validate($request, [
            'nim_ketua' => 'required',
            'dosen_1' => 'required',
            'judul' => 'required',
            'luaran_wajib' => 'required',
            'biaya' => 'required',
            'surat_aktif' => 'required|mimes:pdf|max:20000',
            'surat_nyata' => 'required|mimes:pdf|max:20000',
            'surat_proposal' => 'required|mimes:pdf|max:20000',
        ]);

        $tujuan_upload ='upload/syarat';

        // surat aktif
        $surat_aktif= $request->file('surat_aktif');
        $inf_surat_aktif =rand(10000,99999)."_".rand(1000,9999).".".$surat_aktif->getClientOriginalExtension();
        $surat_aktif->move($tujuan_upload,$inf_surat_aktif);      

        // surat pernyataan
        $surat_nyata= $request->file('surat_nyata');
        $inf_surat_nyata =rand(100000,999999)."_".rand(1000,9999).".".$surat_nyata->getClientOriginalExtension();
        $surat_nyata->move($tujuan_upload,$inf_surat_nyata);      


        //surat Proposal
        $surat_proposal= $request->file('surat_proposal');
        $inf_surat_proposal =rand(1000,9999)."_".rand(1000,9999).".".$surat_proposal->getClientOriginalExtension();
        $surat_proposal->move($tujuan_upload,$inf_surat_proposal);      
   
        DB::table('usulan')->insert([
            'id_ketua' =>$request->nim_ketua,
            'id_kategoriBantuan' =>$request->kategori,
            'id_jurusan' => $request->id_jurusan,
            'id_dospem1' => $request->dosen_1,
            'id_dospem2' => $request->dosen_2,
            'judul' => $request->judul,
            'biaya' => $request->biaya,
            'nama_anggota1' => $request->anggota_1,
            'nama_anggota2' => $request->anggota_2,
            'luaran' => $request->luaran_wajib,
            'luaran_tambah' => $request->luaran_tambahan,
            'tahun_usulan' => date('Y'),
            'tgl_unggah_proposal' => date('Y-m-d'),
            'surat_aktif' =>  $inf_surat_aktif,
            'berkas_proposal' => $inf_surat_proposal,
            'surat_nyata' => $inf_surat_nyata,
            'status' => '1'
            
        ]);
    
        return redirect('/mahasiswa/daftar-usulan')->with('alert-success','Menunggu Proses Review');

    }












}
