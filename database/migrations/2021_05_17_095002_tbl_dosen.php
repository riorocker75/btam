<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblDosen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('dosen')) {
            Schema::create('dosen', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('nidn',100);
                $table->string('nama',100);
                $table->integer('telepon')->nullable();
                $table->string('pendidikan_terakhir',100);
                $table->string('email',100);
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
        Schema::dropIfExists('dosen');
    }
}
