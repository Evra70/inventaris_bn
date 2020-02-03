<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_barang', function (Blueprint $table) {
            $table->increments('barang_id');
            $table->string('nama_barang');
            $table->string('spesifikasi');
            $table->string('lokasi');
            $table->string('kondisi');
            $table->string('sumber_dana');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_barang');
    }
}
