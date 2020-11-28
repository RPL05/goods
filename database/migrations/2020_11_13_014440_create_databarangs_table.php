<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('databarangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_barang')->unique();
            $table->string('nama_barang');
            $table->string('tanggal');
            $table->string('images');
            $table->string('jumlah_barang');
            $table->string('harga_beli');
            $table->string('harga_jual');
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
        Schema::dropIfExists('databarangs');
    }
}
