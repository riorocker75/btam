<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblNilai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('nilai')) {
            Schema::create('nilai', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('id_usulan');
                $table->text('id_reviewer')->nullable();
                $table->text('skor_kreatif')->nullable();
                $table->text('skor_pustaka')->nullable();
                $table->text('skor_metode')->nullable();
                $table->text('skor_luaran')->nullable();
                $table->text('skor_jadwal')->nullable();
                $table->text('nilai_kreatif')->nullable();
                $table->text('nilai_pustaka')->nullable();
                $table->text('nilai_metode')->nullable();
                $table->text('nilai_luaran')->nullable();
                $table->text('nilai_jadwal')->nullable();
                $table->text('jumlah')->nullable();
                $table->text('komentar')->nullable();
                $table->text('dana_setuju')->nullable();
                $table->text('status')->nullable()->comment('1 =reviewer 1, 2=reviewer=2');
                $table->text('status_dana')->nullable()->comment('1=disteujui, 0=tidak distujui');

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
        Schema::dropIfExists('nilai');
    }
}
