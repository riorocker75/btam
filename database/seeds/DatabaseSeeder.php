<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
         $this->call(Pengguna_sed::class);
         $this->call(Admin_seed::class);
         $this->call(Mahasiswa_seed::class);
         $this->call(Dosen_seed::class);
         $this->call(Jurusan_seed::class);
         $this->call(Prodi_seed::class);
         $this->call(Bank_seed::class);



    }
}
