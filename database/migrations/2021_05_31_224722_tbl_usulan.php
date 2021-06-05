<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblUsulan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('usulan')) {
            Schema::create('usulan', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('id_ketua');
                $table->integer('id_kategoriBantuan');
                $table->integer('id_jurusan');
                $table->integer('id_dospem1');
                $table->integer('id_dospem2')->nullable();
                $table->text('judul');
                $table->text('biaya')->nullable();
                $table->string('nama_anggota1',100)->nullable();
                $table->string('nama_anggota2',100)->nullable();
                $table->text('luaran')->nullable();
                $table->text('luaran_tambah')->nullable();
                $table->text('tahun_usulan')->nullable();
                $table->text('surat_aktif')->nullable();
                $table->text('surat_nyata')->nullable();
                $table->date('tgl_unggah_proposal')->nullable();
                $table->text('berkas_proposal')->nullable();

                $table->text('status')->nullable()->comment('1= Diproses, 2=Disetujui, 3=Penilaian, 4=Didanai, 5=Ditolak');
                $table->text('status_nilai')->nullable()->comment('1= Diproses, 2=Dinilai');
                $table->text('status_rek')->nullable()->comment('1= Diproses, 2=Diterima,3=Tidak mengirim');
                $table->text('status_kemajuan')->nullable()->comment('1= Diproses, 2=Diterima,3=Tidak mengirim');
                $table->text('status_akhir')->nullable()->comment('1= Diproses, 2=Diterima,3=Tidak mengirim');

            });
        }                                    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usulan');

    }
}
