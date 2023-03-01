<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mobil');
            $table->string('slug')->unique();
            $table->string('foto');
            $table->string('status');
            $table->integer('harga');
            $table->integer('tahun');
            $table->string('no_polisi');
            $table->string('warna');
            $table->unsignedbigInteger('id_merk');
            $table->foreign('id_merk')->references('id')->on('merks')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('mobils');
    }
}
