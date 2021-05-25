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
            'nama' => 'Teknik Informatika & Komputer',
        ]);
    }
}
