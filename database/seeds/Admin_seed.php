<?php

use Illuminate\Database\Seeder;
use App\Model\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class Admin_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->delete();
        
        Admin::create([
            'nama' => 'Adel Maul',
            'username' => 'admin',
            'telepon' => '0852765209',
            'email' => "Adelmaul@gmail.com",
        ]);

    }
}
