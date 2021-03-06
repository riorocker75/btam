<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','Admin\AdminCtrl');


/*
=========================== 
		Login User
===========================
*/
Route::get('/login/user' ,'Auth\AdminLogin');

Route::post('/LoginValidate','Auth\AdminLogin@loginCheck');
Route::get('/logout/user' ,'Auth\AdminLogin@logout');
// Route::get('/pengaturan/user' ,'Auth\AdminLogin@logout');
// daftar mahasiswa
Route::get('/daftar/mahasiswa' ,'Auth\AdminLogin@daftar_siswa');
Route::post('/daftar/mahasiswa/act' ,'Auth\AdminLogin@daftar_siswa_act');

// ajax daftar
Route::post('/ajax/daftar/cek-prodi' ,'AjaxCtrl@cek_prodi');

/*
=========================== 
		Admin
===========================
*/
Route::get('/dashboard/admin' ,'Admin\AdminCtrl');


// daftar bantuan
Route::get('/admin/kategori-bantuan' ,'Admin\AdminCtrl@kategori_bantuan');

Route::get('/admin/kategori-bantuan/add' ,'Admin\AdminCtrl@kategori_bantuan_add');
Route::post('/admin/kategori-bantuan/act' ,'Admin\AdminCtrl@kategori_bantuan_act');
Route::get('/admin/kategori-bantuan/edit/{id}' ,'Admin\AdminCtrl@kategori_bantuan_edit');
Route::post('/admin/kategori-bantuan/update' ,'Admin\AdminCtrl@kategori_bantuan_update');
Route::get('/admin/kategori-bantuan/delete/{id}' ,'Admin\AdminCtrl@kategori_bantuan_delete');


// start jadwal kegiatan
Route::get('/admin/jadwal-kegiatan' ,'Admin\JadwalCtrl@jadwal_kegiatan');

Route::get('/admin/jadwal-kegiatan/add' ,'Admin\JadwalCtrl@jadwal_kegiatan_add');
Route::post('/admin/jadwal-kegiatan/act' ,'Admin\JadwalCtrl@jadwal_kegiatan_act');
Route::get('/admin/jadwal-kegiatan/edit/{id}' ,'Admin\JadwalCtrl@jadwal_kegiatan_edit');
Route::post('/admin/jadwal-kegiatan/update' ,'Admin\JadwalCtrl@jadwal_kegiatan_update');
Route::get('/admin/jadwal-kegiatan/delete/{id}' ,'Admin\JadwalCtrl@jadwal_kegiatan_delete');


// start penugasan reviewer
Route::get('/admin/penugasan-reviewer/' ,'Admin\Penugasan');
Route::get('/admin/penugasan-reviewer/pilih/{id}' ,'Admin\Penugasan@pilih_review');

Route::post('/admin/penugasan-reviewer/act' ,'Admin\Penugasan@tugas_act');



// Riwayat

// riwayat proposal
Route::get('/admin/riwayat/data-proposal' ,'Admin\Riwayat@riwayat_proposal');

// riwayat kemajuan
Route::get('/admin/riwayat/data-kemajuan' ,'Admin\Riwayat@riwayat_kemajuan');

// riwayat akhir
Route::get('/admin/riwayat/data-akhir' ,'Admin\Riwayat@riwayat_akhir');

// riwayat rekening
Route::get('/admin/riwayat/data-rekening' ,'Admin\Riwayat@riwayat_rekening');
Route::get('/admin/riwayat/detail/data-rekening/{id}' ,'Admin\Riwayat@riwayat_rekening_det');


// hasil penilaian
Route::get('/admin/hasil-penilaian' ,'Admin\Riwayat@hasil_nilai');
Route::get('/admin/hasil-penilaian/review/{id}' ,'Admin\Riwayat@review_nilai');

Route::post('/admin/hasil-penilaian/update' ,'Admin\Riwayat@review_nilai_update');

// riwayat pendanaan
Route::get('admin/riwayat-pendanaan' ,'Admin\Riwayat@riwayat_pendanaan');
Route::post('admin/riwayat-pendanaan/cetak' ,'Admin\Riwayat@cetak_pendanaan');


/*
=========================== 
		Review File
===========================
*/

//jadwal kegiatan berkas
Route::get('/upload/berkas/{id}','AjaxCtrl@viewfile_pdf');



// start prodi & jurusan
// jurusan
Route::get('/admin/daftar-jurusan' ,'Admin\ProdiCtrl@jurusan');

Route::post('/admin/daftar-jurusan/act' ,'Admin\ProdiCtrl@jurusan_act');
Route::get('/admin/daftar-jurusan/edit/{id}' ,'Admin\ProdiCtrl@jurusan_edit');
Route::post('/admin/daftar-jurusan/update' ,'Admin\ProdiCtrl@jurusan_update');
Route::get('/admin/daftar-jurusan/delete/{id}' ,'Admin\ProdiCtrl@jurusan_delete');

// prodi
Route::get('/admin/daftar-prodi' ,'Admin\ProdiCtrl@prodi');

Route::post('/admin/daftar-prodi/act' ,'Admin\ProdiCtrl@prodi_act');
Route::get('/admin/daftar-prodi/edit/{id}' ,'Admin\ProdiCtrl@prodi_edit');
Route::post('/admin/daftar-prodi/update' ,'Admin\ProdiCtrl@prodi_update');
Route::get('/admin/daftar-prodi/delete/{id}' ,'Admin\ProdiCtrl@prodi_delete');



// panduan 
Route::get('/admin/panduan' ,'Admin\PanduanCtrl@panduan');
Route::get('/admin/panduan/add' ,'Admin\PanduanCtrl@panduan_add');

Route::post('/admin/panduan/act' ,'Admin\PanduanCtrl@panduan_act');
Route::get('/admin/panduan/delete/{id}' ,'Admin\PanduanCtrl@panduan_delete');

Route::get('/upload/panduan/{id}','AjaxCtrl@viewfile_panduan');

// ----------------------------
// data pengusul
// data dosen

Route::get('/admin/pengguna/dosen' ,'Admin\PenggunaCtrl@dosen');

Route::get('/admin/pengguna/dosen/add' ,'Admin\PenggunaCtrl@dosen_add');
Route::post('/admin/pengguna/dosen/act' ,'Admin\PenggunaCtrl@dosen_act');
Route::get('/admin/pengguna/dosen/edit/{id}' ,'Admin\PenggunaCtrl@dosen_edit');
Route::post('/admin/pengguna/dosen/update' ,'Admin\PenggunaCtrl@dosen_update');
Route::get('/admin/pengguna/dosen/delete/{id}' ,'Admin\PenggunaCtrl@dosen_delete');



// data reviewer
Route::get('/admin/pengguna/reviewer' ,'Admin\PenggunaCtrl@reviewer');

Route::get('/admin/pengguna/reviewer/add' ,'Admin\PenggunaCtrl@reviewer_add');
Route::post('/admin/pengguna/reviewer/act' ,'Admin\PenggunaCtrl@reviewer_act');
Route::get('/admin/pengguna/reviewer/delete/{id}' ,'Admin\PenggunaCtrl@reviewer_delete');

// data kajur
Route::get('/admin/pengguna/kajur' ,'Admin\PenggunaCtrl@kajur');

Route::get('/admin/pengguna/kajur/add' ,'Admin\PenggunaCtrl@kajur_add');
Route::post('/admin/pengguna/kajur/act' ,'Admin\PenggunaCtrl@kajur_act');
Route::get('/admin/pengguna/kajur/delete/{id}' ,'Admin\PenggunaCtrl@kajur_delete');

// data mahasiswa

Route::get('/admin/pengguna/mahasiswa' ,'Admin\PenggunaCtrl@mahasiswa');

Route::get('/admin/pengguna/mahasiswa/add' ,'Admin\PenggunaCtrl@mahasiswa_add');
Route::post('/admin/pengguna/mahasiswa/act' ,'Admin\PenggunaCtrl@mahasiswa_act');
Route::get('/admin/pengguna/mahasiswa/edit/{id}' ,'Admin\PenggunaCtrl@mahasiswa_edit');
Route::post('/admin/pengguna/mahasiswa/update' ,'Admin\PenggunaCtrl@mahasiswa_update');
Route::get('/admin/pengguna/mahasiswa/delete/{id}' ,'Admin\PenggunaCtrl@mahasiswa_delete');



// -----------------------


/*
=========================== 
		Dosen
===========================
*/
Route::get('/dashboard/dosen' ,'Dospem\DsnCtrl');

Route::get('/dosen/review-proposal/{id}' ,'Dospem\DsnCtrl@review_proposal');
Route::post('/dosen/review-proposal/act' ,'Dospem\DsnCtrl@review_proposal_act');



/*
=========================== 
		Reviewer
===========================
*/

Route::get('/dashboard/reviewer' ,'Reviewer\RvwCtrl');
Route::get('/reviewer/review-proposal/{id}' ,'Reviewer\RvwCtrl@review_proposal');
Route::post('/reviewer/review-proposal/act' ,'Reviewer\RvwCtrl@review_proposal_act');
Route::post('/reviewer/review-proposal/update' ,'Reviewer\RvwCtrl@review_proposal_update');

Route::get('/reviewer/lihat-nilai/{id}' ,'Reviewer\RvwCtrl@lihat_nilai');

Route::get('/reviewer/riwayat-nilai' ,'Reviewer\RvwCtrl@riwayat_nilai');


/*
=========================== 
		Kajur
===========================
*/
Route::get('/dashboard/kajur' ,'Kajur\KajurCtrl');

Route::get('/kajur/review-proposal/{id}' ,'Kajur\KajurCtrl@review_proposal');
Route::post('/kajur/review-proposal/act' ,'Kajur\KajurCtrl@review_proposal_act');
Route::post('/kajur/approve-proposal/act' ,'Kajur\KajurCtrl@setuju_proposal_act');


/*
=========================== 
		Mahasiswa
===========================
*/
Route::get('/dashboard/mahasiswa' ,'Mahasiswa\MhsCtrl');

// daftar usulan
Route::get('/mahasiswa/daftar-usulan' ,'Mahasiswa\DaftarUsCtrl');

// unggah proposal
Route::get('/mahasiswa/daftar-usulan/unggah-proposal/{id}' ,'Mahasiswa\DaftarUsCtrl@unggah_proposal');
Route::post('/mahasiswa/daftar-usulan/unggah-proposal/act' ,'Mahasiswa\DaftarUsCtrl@unggah_proposal_act');

Route::get('/mahasiswa/daftar-usulan/unggah-proposal/review/{id}' ,'Mahasiswa\DaftarUsCtrl@unggah_proposal_review');
Route::get('/mahasiswa/daftar-usulan/unggah-proposal/edit/{id}' ,'Mahasiswa\DaftarUsCtrl@unggah_proposal_edit');

Route::post('/mahasiswa/daftar-usulan/unggah-proposal/update' ,'Mahasiswa\DaftarUsCtrl@unggah_proposal_update');


// riwayat
Route::get('/mahasiswa/riwayat' ,'Mahasiswa\MhsCtrl@riwayat_usulan');

Route::get('/mahasiswa/rekening/edit/{id}' ,'Mahasiswa\MhsCtrl@rekening_edit');
Route::post('/mahasiswa/rekening/update' ,'Mahasiswa\MhsCtrl@rekening_update');
Route::get('/mahasiswa/rekening/review/{id}' ,'Mahasiswa\MhsCtrl@rekening_review');

Route::get('/mahasiswa/kemajuan/edit/{id}' ,'Mahasiswa\MhsCtrl@kemajuan_edit');
Route::post('/mahasiswa/kemajuan/update' ,'Mahasiswa\MhsCtrl@kemajuan_update');
Route::get('/mahasiswa/kemajuan/review/{id}' ,'Mahasiswa\MhsCtrl@kemajuan_review');


Route::get('/mahasiswa/akhir/edit/{id}' ,'Mahasiswa\MhsCtrl@akhir_edit');
Route::post('/mahasiswa/akhir/update' ,'Mahasiswa\MhsCtrl@akhir_update');
Route::get('/mahasiswa/akhir/review/{id}' ,'Mahasiswa\MhsCtrl@akhir_review');






// unggah laporan kemajuan
Route::get('/mahasiswa/daftar-usulan/unggah-kemajuan/{id}' ,'Mahasiswa\DaftarUsCtrl@unggah_kemajuan');
Route::post('/mahasiswa/daftar-usulan/unggah-kemajuan/act' ,'Mahasiswa\DaftarUsCtrl@unggah_kemajuan_act');

// unggah laporan final
Route::get('/mahasiswa/daftar-usulan/unggah-akhir/{id}' ,'Mahasiswa\DaftarUsCtrl@unggah_akhir');
Route::post('/mahasiswa/daftar-usulan/unggah-akhir/act' ,'Mahasiswa\DaftarUsCtrl@unggah_akhir_act');


// unggah rekening
Route::get('/mahasiswa/daftar-usulan/unggah-rekening/{id}' ,'Mahasiswa\DaftarUsCtrl@unggah_rekening');
Route::post('/mahasiswa/daftar-usulan/unggah-rekening/act' ,'Mahasiswa\DaftarUsCtrl@unggah_rekening_act');

// panduan
Route::get('/mahasiswa/panduan' ,'Mahasiswa\MhsCtrl@panduan');





// pengatuaran profile mahaiswa
Route::get('/mahasiswa/profile' ,'Mahasiswa\MhsCtrl@profile');
Route::get('/mahasiswa/profile/edit' ,'Mahasiswa\MhsCtrl@profile_edit');
Route::post('/mahasiswa/profile/update' ,'Mahasiswa\MhsCtrl@profile_update');

// profile admin
Route::get('/admin/profile' ,'Admin\AdminCtrl@profile');
Route::get('/admin/profile/edit' ,'Admin\AdminCtrl@profile_edit');
Route::post('/admin/profile/update' ,'Admin\AdminCtrl@profile_update');

// profile dosen
Route::get('/dosen/profile' ,'Dospem\DsnCtrl@profile');
Route::get('/dosen/profile/edit' ,'Dospem\DsnCtrl@profile_edit');
Route::post('/dosen/profile/update' ,'Dospem\DsnCtrl@profile_update');


// profile Reviwer
Route::get('/reviewer/profile' ,'Reviewer\RvwCtrl@profile');
Route::get('/reviewer/profile/edit' ,'Reviewer\RvwCtrl@profile_edit');
Route::post('/reviewer/profile/update' ,'Reviewer\RvwCtrl@profile_update');


// profile kajur
Route::get('/kajur/profile' ,'Kajur\KajurCtrl@profile');
Route::get('/kajur/profile/edit' ,'Kajur\KajurCtrl@profile_edit');
Route::post('/kajur/profile/update' ,'Kajur\KajurCtrl@profile_update');
