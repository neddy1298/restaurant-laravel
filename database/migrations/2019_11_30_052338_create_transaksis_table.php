<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_transaksis', function (Blueprint $table) {
            $table->increments('id_transaksi');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_order');
            $table->dateTime('tanggal');
            $table->integer('total_bayar');
            $table->timestamp('created_at');

            $table->foreign('id_order')->references('id_order')->on('tbl_orders')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_transaksis');
    }
}