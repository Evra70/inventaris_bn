<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBarangKeluar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_barang_keluar', function (Blueprint $table) {
            $table->increments('barang_id');
            $table->string('nama_barang');
            $table->string('tgl_keluar');
            $table->integer('jml_keluar');
            $table->string('lokasi');
            $table->string('penerima');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_barang_keluar');
    }
}
