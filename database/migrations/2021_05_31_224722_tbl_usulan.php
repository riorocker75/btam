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
                // $table->date('tgl_unggah_kemajuan')->nullable();
                // $table->text('laporan_kemajuan')->nullable();
                // $table->date('tgl_unggah_akhir')->nullable();
                // $table->text('laporan_akhir')->nullable();

                $table->text('status')->nullable()->comment('1= Diproses, 2=Disetujui, 3=Didanai, 4=Ditolak');
                $table->text('unggah_terakhir')->nullable()->comment('1= pencairan_dana, 2=lap_kemajuan, 3=lap_akhir');
                $table->text('status_biaya')->nullable()->comment('0=belum dibiayai, 1=dibayai');
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
