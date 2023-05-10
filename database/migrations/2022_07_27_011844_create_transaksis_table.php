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
            $table->string('invoice_no');
            $table->date('tgl_sewa');
            $table->date('tgl_kembali');
            $table->integer('lama_sewa');
            $table->enum('supir',['Yes', 'No']);
            $table->integer('total_bayar');
            $table->string('status');
            $table->unsignedbigInteger('id_mobil');
            $table->foreign('id_mobil')->references('id')->on('mobils')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedbigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
