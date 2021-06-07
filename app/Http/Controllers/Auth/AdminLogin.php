<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Model\Admin;
use App\Model\Mahasiswa;
use App\Model\Dosen;
use App\Model\Pengguna;

use App\Model\Notif;
use App\Model\Syarat;
class AdminLogin extends Controller
{
     function __invoke(){
        if(!Session::get('login-adm')){
            return view('login/index_user');
        }else{
            return redirect('/dashboard/admin');
        }
    }

    function loginCheck(Request $request){
    	$username = $request->username;
        $password = $request->password;
        $data = Pengguna::where('username',$username)->first();
        $data_ds=Dosen::where('nidn', $username)->first();


        if($data){
            if($data->level == 1){
                    Session::flush();
                    $data_adm=Admin::where('username', $username)->first();
                    
                    if(Hash::check($password,$data->password)){
                        Session::put('adm_id', $data->id);
                        Session::put('adm_username', $data->username);
                        Session::put('nama', $data_adm->nama);
                        Session::put('level', 1);
                        Session::put('login-adm',TRUE);
                        return redirect('/dashboard/admin')->with('alert-success','Selamat Datang Kembali');
                    }else{
                        return redirect('/login/user')->with('alert-danger','Password atau Username, Salah !');
                    }
            

                // end cek data admin di buat
            }elseif($data->level == 2){
           
                 Session::flush();
                
                if(Hash::check($password,$data->password)){
                    Session::put('ds_id', $data->id);
                    Session::put('ds_username', $data_ds->nidn);
                    Session::put('nama', $data_ds->nama);
                    Session::put('level', 2);
                    Session::put('login-ds',TRUE);
                    return redirect('/dashboard/dosen')->with('alert-success','Selamat Datang');
                }else{
                    return redirect('/login/user')->with('alert-danger','Password atau NIDN, Salah !');
                }
         
            // end cek data ada atau tidak
            }elseif($data->level == 3){
                Session::flush();
                   
                        if(Hash::check($password,$data->password)){
                        Session::put('rv_id', $data->id);
                        Session::put('rv_username', $data_ds->nidn);
                        Session::put('nama', $data_ds->nama);

                        Session::put('level', 3);
                        Session::put('login-rv',TRUE);
                            return redirect('/dashboard/reviewer')->with('alert-success','Selamat Datang Kembali');
                        }else{
                            return redirect('/login/user')->with('alert-danger','Password atau NIDN, Salah !');
                        }   

            }elseif($data->level == 4){
                // Session::flush();
                $data_mh=Mahasiswa::where('nim', $username)->first();
                
                if(Hash::check($password,$data->password)){
                    Session::put('mh_id', $data->id);
                    Session::put('mh_username', $data_mh->nim);
                    Session::put('nama', $data_mh->nama);
                    Session::put('level', 4);
                    Session::put('login-mh',TRUE);
                    return redirect('/dashboard/mahasiswa')->with('alert-success','Selamat Datang Kembali');
                }else{
                    return redirect('/login/user')->with('alert-danger','Password atau NIIM, Salah !');
                }

        }else{
                return redirect('/login/user')->with('alert-danger','Tidak meliki akses kesini');
            }
                // end cek level 
    }else{
        return redirect('/login/user')->with('alert-danger','Password atau Usernam,NIDN,NIM Salah !');
    }
    // cek kebenaran input


    }

    function daftar_siswa(){
        return view('login.daftar_siswa');
    }

    function daftar_siswa_act(Request $request){
        $nim=$request->nim;
        $this->validate($request, [
            'nama' => 'required|max:50',
            'nim' => 'required|max:10|unique:mahasiswa,nim'
        ]);  
        
        DB::table('mahasiswa')->insert([
            'nama' =>$request->nama,
            'nim' =>$request->nim,
            'jenjang' =>$request->jenjang,
            'id_jurusan' =>$request->jurusan,
            'id_prodi' =>$request->prodi,
            'angkatan' =>$request->angkatan,
        ]);

        DB::table('pengguna')->insert([
            'username' => $request->nim,
            'password' => bcrypt($request->pass),
            'level' => '4',
            'status' => '1'
        ]);
        return redirect('/login/user')->with('alert-success','Daftar Berhasil Login dengan akun anda');

    }

  public function logout(){
        Session::flush();
        return redirect('/login/user')->with('alert-success','Logout berhasil');
    }
}
