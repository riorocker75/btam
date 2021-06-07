<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('admin')){
            Schema::create('admin', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('username',100);
                $table->string('nama',100);
                $table->string('telepon',100)->nullable();
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
        Schema::dropIfExists('admin');
    }
}
