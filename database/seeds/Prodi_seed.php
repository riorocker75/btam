<?php

use Illuminate\Database\Seeder;
use App\Model\Prodi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class Prodi_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prodi')->delete();
        // dospem
        Prodi::create([
            'id' => 1,
            'id_jurusan' => 1,
            'nama' => 'Teknik',
        ]);
    }
}
