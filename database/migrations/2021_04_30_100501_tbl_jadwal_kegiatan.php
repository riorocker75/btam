<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblJadwalKegiatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('jadwalKegiatan')) {
            Schema::create('jadwalKegiatan', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('id_kategoriBantuan');
                $table->text('berkas_pengesahan');
                $table->date('pembukaan_tawaran');
                $table->date('deadline_proposal');
                $table->date('deadline_rek');
                $table->date('deadline_deskevaluasi');
                $table->date('deadline_kemajuan');
                $table->date('deadline_akhir');
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
        Schema::dropIfExists('jadwalKegiatan');

    }
}
