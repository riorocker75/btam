<?php

use Illuminate\Database\Seeder;
use App\Model\Pengguna;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class Pengguna_sed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengguna')->delete();
        Pengguna::create([
            'username' => 'admin',
            'password' =>bcrypt("admin"),
            'level' => 1,
            'status' => 1
        ]);

        Pengguna::create([
            'username' => '334455',
            'password' =>bcrypt("dosen"),
            'level' => 2,
            'status' => 1
        ]);

        
        Pengguna::create([
            'username' => '734455',
            'password' =>bcrypt("dosen"),
            'level' => 2,
            'status' => 1
        ]);

        Pengguna::create([
            'username' => '223355',
            'password' =>bcrypt("reviewer"),
            'level' => 3,
            'status' => 1
        ]);

        Pengguna::create([
            'username' => '123355',
            'password' =>bcrypt("reviewer"),
            'level' => 3,
            'status' => 1
        ]);

        Pengguna::create([
            'username' => '112233',
            'password' =>bcrypt("mahasiswa"),
            'level' => 4,
            'status' => 1
        ]);
    }
}
