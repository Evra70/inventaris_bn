<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_stok', function (Blueprint $table) {
            $table->increments('barang_id');
            $table->integer('jml_masuk');
            $table->integer('jml_keluar');
            $table->integer('jml_pinjam');
            $table->integer('total_barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('t_stok');
    }
}
