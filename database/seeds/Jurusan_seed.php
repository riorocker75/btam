<?php

use Illuminate\Database\Seeder;
use App\Model\Jurusan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class Jurusan_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jurusan')->delete();
        // dospem
        Jurusan::create([
            'id' => 1,
            'nama' => 'Teknik Sipil'
        ]);
        Jurusan::create([
            'id' => 2,
            'nama' => 'Teknik Mesin'
        ]);
        Jurusan::create([
            'id' => 3,
            'nama' => 'Teknik Elektro'
        ]);
        Jurusan::create([
            'id' => 4,
            'nama' => 'Teknik Grafika dan Penerbitan'
        ]);
        Jurusan::create([
            'id' => 5,
            'nama' => 'Teknik Informatika & Komputer'
        ]);
        Jurusan::create([
            'id' => 6,
            'nama' => 'Akuntansi'
        ]);
        Jurusan::create([
            'id' => 7,
            'nama' => 'Administrasi Niaga'
        ]);
    }
}
