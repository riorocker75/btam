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


// unggah laporan kemajuan

// unggah laporan final

// unggah rekening
