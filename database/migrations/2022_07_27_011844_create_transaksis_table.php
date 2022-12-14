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
            $table->string('name');
            $table->string('nik');
            $table->enum('jenis_kelamin',['Laki-laki', 'Perempuan']);
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('email');
            $table->date('tgl_sewa');
            $table->date('tgl_kembali');
            $table->integer('total_bayar');
            $table->integer('lama_sewa');
            $table->enum('supir',['Yes', 'No']);
            $table->string('status');
            $table->unsignedbigInteger('id_mobil');
            $table->foreign('id_mobil')->references('id')->on('mobils');
            $table->unsignedbigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
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
