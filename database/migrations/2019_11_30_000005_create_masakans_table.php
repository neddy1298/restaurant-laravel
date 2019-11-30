<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasakansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_masakans', function (Blueprint $table) {
            $table->increments('id_masakan');
            $table->string('gambar_masakan')->nullable()->default('default.jpg');
            $table->string('nama_masakan');
            $table->integer('harga');
            $table->text('status_masakan');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_masakans');
    }
}
