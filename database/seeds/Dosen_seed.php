<?php

use Illuminate\Database\Seeder;
use App\Model\Dosen;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class Dosen_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dosen')->delete();
        // dospem
        Dosen::create([
            'nama' => 'Budi',
            'nidn' => '334455',
            'telepon' =>'0852765254',
            'pendidikan_terakhir' => "Strata 2",
            'email' => "Budi@gmail.com",
            'avatar' => 1

        ]);

        // reviewer
        Dosen::create([
            'nama' => 'Puppey',
            'nidn' => '223355',
            'telepon' =>'0852765254',
            'pendidikan_terakhir' => "Strata 2",
            'email' => "Puppey@gmail.com",
            'avatar' => 1

        ]);
    }
}
