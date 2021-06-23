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
            'id_jurusan' => 1,
            'nama' => 'Kontruksi Sipil (D3)',
        ]);
        Prodi::create([
            'id_jurusan' => 1,
            'nama' => 'Kontruksi Gedung (D3)',
        ]);
        Prodi::create([
            'id_jurusan' => 1,
            'nama' => 'Manajemen Kontruksi (D3)',
        ]);
        Prodi::create([
            'id_jurusan' => 1,
            'nama' => 'Perancangan Jalan dan Jembatan (D4)',
        ]);
        Prodi::create([
            'id_jurusan' => 2,
            'nama' => 'Teknik Mesin (D3)',
        ]);
        Prodi::create([
            'id_jurusan' => 2,
            'nama' => 'Teknik Konversi Energi (D3)',
        ]);
        Prodi::create([
            'id_jurusan' => 2,
            'nama' => 'Teknik Alat Berat (D3)',
        ]);
        Prodi::create([
            'id_jurusan' => 2,
            'nama' => 'Teknik Manufaktur (D4)',
        ]);
        Prodi::create([
            'id_jurusan' => 2,
            'nama' => 'Teknik Pembangkit Tenaga Listrik (D4)',
        ]);
        Prodi::create([
            'id_jurusan' => 2,
            'nama' => 'Magister Rekayasa Teknologi Manufaktur (S2)',
        ]);
        Prodi::create([
            'id_jurusan' => 3,
            'nama' => 'Teknik Listrik (D3)',
        ]);
        Prodi::create([
            'id_jurusan' => 3,
            'nama' => 'Teknik Telekomunikasi (D3)',
        ]);
        Prodi::create([
            'id_jurusan' => 3,
            'nama' => 'Teknik Elektronika Industri (D3)',
        ]);
        Prodi::create([
            'id_jurusan' => 3,
            'nama' => 'Teknik Instrumentasi & Kontrol Industri (D4)',
        ]);
        Prodi::create([
            'id_jurusan' => 3,
            'nama' => 'Teknik Otomasi Listrik Industri (D4)',
        ]);
        Prodi::create([
            'id_jurusan' => 3,
            'nama' => 'Teknik Broadband Multimedia (D4)',
        ]);
        Prodi::create([
            'id_jurusan' => 3,
            'nama' => 'Magister Teknik Elektro (S2)',
        ]);
        Prodi::create([
            'id_jurusan' => 4,
            'nama' => 'Teknik Grafika (D3)',
        ]);
        Prodi::create([
            'id_jurusan' => 4,
            'nama' => 'Penerbitan(D3)',
        ]);
        Prodi::create([
            'id_jurusan' => 4,
            'nama' => 'Teknik Industri Cetak Kemasan (D4)',
        ]);
        Prodi::create([
            'id_jurusan' => 4,
            'nama' => 'Desain Grafis (D4)',
        ]);
        Prodi::create([
            'id_jurusan' => 5,
            'nama' => 'Teknik Komputer Jaringan (D1)',
        ]);
        Prodi::create([
            'id_jurusan' => 5,
            'nama' => 'Teknik Informatika (D4)',
        ]);
        Prodi::create([
            'id_jurusan' => 5,
            'nama' => 'Teknik Multimedia Jaringan (D4)',
        ]);
        Prodi::create([
            'id_jurusan' => 5,
            'nama' => 'Teknik Multimedia Digital (D4)',
        ]);
        Prodi::create([
            'id_jurusan' => 6,
            'nama' => 'Akuntansi (D3)',
        ]);
        Prodi::create([
            'id_jurusan' => 6,
            'nama' => 'Keuangan dan Perbankan (D3)',
        ]);
        Prodi::create([
            'id_jurusan' => 6,
            'nama' => 'Keuangan dan Perbankan Syariah (D4)',
        ]);
        Prodi::create([
            'id_jurusan' => 6,
            'nama' => 'Akuntansi Keuangan (D4)',
        ]);
        Prodi::create([
            'id_jurusan' => 6,
            'nama' => 'Manajemen Keuangan (D4)',
        ]);
        Prodi::create([
            'id_jurusan' => 6,
            'nama' => 'Keuangan dan Perbankan (D4)',
        ]);
        Prodi::create([
            'id_jurusan' => 7,
            'nama' => 'Administrasi Bisnis (D3)',
        ]);
        Prodi::create([
            'id_jurusan' => 7,
            'nama' => 'Usaha Jasa Konvensi, Perjalanan Intensif dan Pameran (D4)',
        ]);
        Prodi::create([
            'id_jurusan' => 7,
            'nama' => 'Administrasi Bisnis Terapan (D4)',
        ]);
    }
}
