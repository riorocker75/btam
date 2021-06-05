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

        $tujuan_upload ='upload/berkas';

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
    
        return redirect('/dashboard/mahasiswa')->with('alert-success','Menunggu Proses Review');

    }


    // bagian unggah rekening
    function unggah_rekening($id){
        $data = Usulan::where('id',$id)->get();
       return view('mahasiswa.usulan.unggah_rekening',[
           'data' =>$data
       ]); 
    }

    function unggah_rekening_act(Request $request){
        $this->validate($request, [
            'sumber' => 'required',
            'no_rek' => 'required',
            'nama_rek' => 'required',
            'nama_bank' => 'required',
            'foto_rek' => 'required|mimes:jpeg,png,jpg|max:1000',
        ]);

        $tujuan_upload ='upload/berkas';

        // surat aktif
        $foto_rek= $request->file('foto_rek');
        $inf_foto_rek =rand(10000,99999)."_".rand(1000,9999).".".$foto_rek->getClientOriginalExtension();
        $foto_rek->move($tujuan_upload,$inf_foto_rek);      

     
        DB::table('unggah_rek')->insert([
            'id_usulan' =>$request->sumber,
            'nomor_rek' => $request->no_rek,
            'nama_rek' => $request->nama_rek,
            'nama_bank' => $request->nama_bank,
            'foto' =>$inf_foto_rek,
            'tgl' => date('Y-m-d')
        ]);
    
        return redirect('/dashboard/mahasiswa')->with('alert-success','Data rekening telah di ajukan');

    }

       // bagian unggah kemajuan
       function unggah_kemajuan($id){
        //buat logic status disini jika tidak sama alihakan ke page lain
            $data = Usulan::where('id',$id)->get();
            return view('mahasiswa.usulan.unggah_kemajuan',[
                'data' =>$data
            ]); 
         }

         function unggah_kemajuan_act(Request $request){
            $this->validate($request, [
                'sumber' => 'required',
                'log_book' => 'required|mimes:pdf|max:20000',
                'laporan' => 'required|mimes:pdf|max:20000',
            ]);
    
            $tujuan_upload ='upload/berkas';
    
            // logbook
            $log_book= $request->file('log_book');
            $inf_log_book =rand(10000,99999)."_".rand(1000,9999).".".$log_book->getClientOriginalExtension();
            $log_book->move($tujuan_upload,$inf_log_book);      
    
                
             // laporan
             $laporan= $request->file('laporan');
             $inf_laporan =rand(10000,99999)."_".rand(1000,9999).".".$laporan->getClientOriginalExtension();
             $laporan->move($tujuan_upload,$inf_laporan);      
     
            DB::table('laporan')->insert([
                'id_usulan' =>$request->sumber,
                'jenis' => '1',
                'berkas' =>  $inf_laporan,
                'logbook' => $inf_log_book,
                'tgl_laporan' => date('Y-m-d')
            ]);
        
            return redirect('/dashboard/mahasiswa')->with('alert-success','Data telah dikirim');
    
        }

       // bagian unggah akhir
       function unggah_akhir($id){
        //    buat logic status disini jika tidak sama alihakan ke page lain
        $data = Usulan::where('id',$id)->get();
            return view('mahasiswa.usulan.unggah_akhir',[
                'data' =>$data
            ]); 
         }

         function unggah_akhir_act(Request $request){
            $this->validate($request, [
                'sumber' => 'required',
                'laporan' => 'required|mimes:pdf|max:20000',
            ]);
    
            $tujuan_upload ='upload/berkas';
          
             // laporan
             $laporan= $request->file('laporan');
             $inf_laporan =rand(10000,99999)."_".rand(1000,9999).".".$laporan->getClientOriginalExtension();
             $laporan->move($tujuan_upload,$inf_laporan);      
     
            DB::table('laporan')->insert([
                'id_usulan' =>$request->sumber,
                'jenis' => '2',
                'berkas' =>  $inf_laporan,
                'tgl_laporan' => date('Y-m-d')
            ]);
        
            return redirect('/dashboard/mahasiswa')->with('alert-success','Data telah dikirim');
    
        }








}
