<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_transaksi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('produkId')->unsigned();
            $table->bigInteger('userId')->unsigned();
            $table->integer('harga');
            $table->integer('jumlah');
            $table->integer('diskon');
            $table->integer('hargaTotal');
            $table->integer('bayarTotal');
            $table->timestamps();

            $table->foreign('produkId')->on('produk')->references('id');
            $table->foreign('userId')->on('user')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk_transaksi');
    }
};
