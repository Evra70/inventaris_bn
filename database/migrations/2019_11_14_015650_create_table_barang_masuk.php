<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBarangMasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_barang_masuk', function (Blueprint $table) {
            $table->increments('barang_id');
            $table->string('nama_barang');
            $table->string('tgl_masuk');
            $table->integer('jml_masuk');
            $table->integer('suplier_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_barang_masuk');
    }
}
