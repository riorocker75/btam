<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengguna;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class Pengguna_seed extends Seeder
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
            'username' => '223355',
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
