<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pesan');
            $table->integer('total_bayar');
            $table->unsignedbigInteger('id_pembayaran');
            $table->unsignedbigInteger('id_mobil');
            $table->foreign('id_pembayaran')->references('id')->on('pembayarans');
            $table->foreign('id_mobil')->references('id')->on('mobils');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
