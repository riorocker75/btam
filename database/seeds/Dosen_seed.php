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
            'id_jurusan' => '1',
            'telepon' =>'0852765254',
            'pendidikan_terakhir' => "S2",
            'email' => "Budi@gmail.com",
            'alamat' => "Tanah Abang",
            'lvl' => '1'
        ]);

        Dosen::create([
            'nama' => 'umam',
            'nidn' => '734455',
            'id_jurusan' => '1',
            'telepon' =>'0852765254',
            'pendidikan_terakhir' => "S2",
            'email' => "canda@gmail.com",
            'alamat' => "Tanah Abang",
            'lvl' => '1'
        ]);

        // reviewer
        Dosen::create([
            'nama' => 'Puppey',
            'nidn' => '223355',
            'id_jurusan' => '1',
            'telepon' =>'0852765254',
            'pendidikan_terakhir' => "S2",
            'email' => "Puppey@gmail.com",
            'alamat' => "Tanah Abang",
            'lvl' => '3'

        ]);
        Dosen::create([
            'nama' => 'sumarto',
            'nidn' => '123355',
            'id_jurusan' => '1',
            'telepon' =>'0852765254',
            'pendidikan_terakhir' => "S2",
            'email' => "sumarto@gmail.com",
            'alamat' => "Tanah Abang",
            'lvl' => '3'

        ]);
    }
}
