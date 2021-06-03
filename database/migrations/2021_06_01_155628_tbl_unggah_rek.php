<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblUnggahRek extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       if (!Schema::hasTable('unggah_rek')) {
           Schema::create('unggah_rek', function (Blueprint $table) {
               $table->bigIncrements('id');
               $table->text('id_usulan');
               $table->text('nomor_rek')->nullable();
               $table->text('nama_rek')->nullable();
               $table->date('tgl')->nullable();
               $table->text('nama_bank')->nullable();
               $table->text('foto')->nullable();
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
        Schema::dropIfExists('unggah_rek');
    }
}
