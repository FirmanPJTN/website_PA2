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
        Schema::create('pembelian', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenisBarang1');
            $table->text('tipeBarang1');
            $table->integer('jumlahBarang1');
            $table->string('jenisBarang2')->nullable();
            $table->text('tipeBarang2')->nullable();
            $table->integer('jumlahBarang2')->nullable();
            $table->string('jenisBarang3')->nullable();
            $table->text('tipeBarang3')->nullable();
            $table->integer('jumlahBarang3')->nullable();
            $table->string('jenisBarang4')->nullable();
            $table->text('tipeBarang4')->nullable();
            $table->integer('jumlahBarang4')->nullable();
            $table->string('jenisBarang5')->nullable();
            $table->text('tipeBarang5')->nullable();
            $table->integer('jumlahBarang5')->nullable();

            $table->string('pengadaan_id')->nullable();
            $table->foreign('pengadaan_id')->references('kodePengadaan')->on('pengadaan');
            
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
        Schema::dropIfExists('pembelian');
    }
};
