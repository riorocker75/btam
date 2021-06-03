<?php

use Illuminate\Database\Seeder;
use App\Model\Bank;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class Bank_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bank')->delete();
        // dospem
        Bank::create([
            'id' => 1,
            'nama' => 'BRI',
        ]);
         
        Bank::create([
            'id' => 2,
            'nama' => 'BNI',
        ]);
        
        Bank::create([
            'id' => 3,
            'nama' => 'Mandiri',
        ]);

        Bank::create([
            'id' => 4,
            'nama' => 'BCA',
        ]); 
        

    }
}
