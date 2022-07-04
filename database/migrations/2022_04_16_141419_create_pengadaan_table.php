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
        Schema::create('pengadaan', function (Blueprint $table) {
            $table->string('kodePengadaan')->primary();
            // $table->string('kodePengadaan')->unique();
            // $table->string('jenisBarang1');
            // $table->text('tipeBarang1');
            // $table->integer('jumlahBarang1');
            // $table->string('jenisBarang2')->nullable();
            // $table->text('tipeBarang2')->nullable();
            // $table->integer('jumlahBarang2')->nullable();
            // $table->string('jenisBarang3')->nullable();
            // $table->text('tipeBarang3')->nullable();
            // $table->integer('jumlahBarang3')->nullable();
            // $table->string('jenisBarang4')->nullable();
            // $table->text('tipeBarang4')->nullable();
            // $table->integer('jumlahBarang4')->nullable();
            // $table->string('jenisBarang5')->nullable();
            // $table->text('tipeBarang5')->nullable();
            // $table->integer('jumlahBarang5')->nullable();
            $table->string('kategori');
            $table->text('alasan');
            $table->string('status')->nullable();
            $table->string('role')->nullable();

            
            $table->datetime('waktuPembelian')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('deskripsi2')->nullable();
            $table->string('dokumenPO')->nullable();
            $table->string('dokumenPR')->nullable();
            $table->text('faktur')->nullable();



            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('unit_id')->nullable();
            $table->foreign('unit_id')->references('id')->on('unit');

            $table->string('aset_id')->nullable();
            $table->foreign('aset_id')->references('kodeAset')->on('data_asets');

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
        Schema::dropIfExists('_pengadaan');
    }
};
