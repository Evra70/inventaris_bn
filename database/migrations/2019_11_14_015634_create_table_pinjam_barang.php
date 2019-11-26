<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePinjamBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_pinjam_barang', function (Blueprint $table) {
            $table->increments('pinjam_id');
            $table->integer('peminjam_id');
            $table->string('tgl_pinjam',16);
            $table->integer('barang_id');
            $table->string('nama_barang',40);
            $table->integer('jml_barang');
            $table->string('tgl_kembali',16);
            $table->string('kondisi',1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_pinjam_barang');
    }
}
