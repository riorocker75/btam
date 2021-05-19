<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblKategoriBantuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('kategoriBantuan')) {
            Schema::create('kategoriBantuan', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('nama',100);
                $table->text('syarat_pendidikan');
                $table->integer('min_anggota');
                $table->integer('max_anggota');
                $table->integer('min_biaya');
                $table->integer('max_biaya');
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
        Schema::dropIfExists('kategoriBantuan');
    }
}
