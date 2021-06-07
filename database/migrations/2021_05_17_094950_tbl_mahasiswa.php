<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('mahasiswa')) {
            Schema::create('mahasiswa', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('nama',100);
                $table->string('nim',100);
                $table->string('telepon',100)->nullable();
                $table->text('jenjang')->nullable();
                $table->text('angkatan')->nullable();
                $table->integer('id_jurusan')->nullable();
                $table->integer('id_prodi')->nullable();
                $table->string('email',100)->nullable();
                $table->text('avatar')->nullable();
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
        Schema::dropIfExists('mahasiswa');

    }
}
