<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblLaporan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       if (!Schema::hasTable('laporan')) {
           Schema::create('laporan', function (Blueprint $table) {
               $table->bigIncrements('id');
               $table->text('id_usulan');
               $table->date('tgl_laporan');
               $table->text('jenis')->nullable()->comment('1= laporan kemajuan, 2=laporan akhir');
               $table->text('berkas')->nullable();
               $table->text('logbook')->nullable();
               $table->text('status')->nullable()->comment('1=aktif, 2=non-aktif');
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
        Schema::dropIfExists('laporan');
    }
}
