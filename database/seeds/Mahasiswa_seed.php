<?php

use Illuminate\Database\Seeder;
use App\Model\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class Mahasiswa_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswa')->delete();
        Mahasiswa::create([
            'nama' => 'Sumail',
            'nim' => '112233',
            'telepon' =>'0852765254',
            'email' => "Sumail@gmail.com",
            'jenjang' => "D4",
            'angkatan' => '2017',            
            'id_prodi' => '1',
            'id_jurusan' => '1'            
        ]);
    }
}
