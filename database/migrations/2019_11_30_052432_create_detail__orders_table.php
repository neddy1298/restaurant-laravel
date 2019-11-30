<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_detail_order', function (Blueprint $table) {
            $table->increments('id_detail_order');
            $table->unsignedInteger('id_order');
            $table->unsignedInteger('id_masakan');
            $table->text('keterangan');
            $table->text('status_detail_order');
            $table->timestamp('created_at');

            $table->foreign('id_order')->references('id_order')->on('tbl_orders')->onDelete('cascade');
            $table->foreign('id_masakan')->references('id_masakan')->on('tbl_masakans')->onDelete('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_detail__orders');
    }
}
