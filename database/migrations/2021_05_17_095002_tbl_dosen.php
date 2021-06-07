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
                $table->string('id_jurusan',100)->nullPable();
                $table->string('nama',100);
                $table->string('telepon',100)->nullable();
                $table->string('pendidikan_terakhir',100);
                $table->text('alamat')->nullable();
                $table->string('email',100)->nullable();
                $table->text('lvl')->nullable()->comment('1=dosen,2=dospem,3=reviewer');
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
