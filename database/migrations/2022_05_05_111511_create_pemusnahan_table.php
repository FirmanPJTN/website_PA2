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
        Schema::create('pemusnahan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kodePemusnahan')->unique();
            $table->string('role')->nullable();
            $table->string('unit')->nullable();
            $table->text('gambar')->nullable();
            $table->string('jenisBarang1')->nullable();
            $table->text('tipeBarang1')->nullable();
            $table->integer('jumlahBarang1')->nullable();
            $table->string('gambarBarang1')->nullable();
            $table->string('jenisBarang2')->nullable();
            $table->text('tipeBarang2')->nullable();
            $table->integer('jumlahBarang2')->nullable();
            $table->string('gambarBarang2')->nullable();
            $table->string('jenisBarang3')->nullable();
            $table->text('tipeBarang3')->nullable();
            $table->integer('jumlahBarang3')->nullable();
            $table->string('gambarBarang3')->nullable();
            $table->string('jenisBarang4')->nullable();
            $table->text('tipeBarang4')->nullable();
            $table->integer('jumlahBarang4')->nullable();
            $table->string('gambarBarang4')->nullable();
            $table->string('jenisBarang5')->nullable();
            $table->text('tipeBarang5')->nullable();
            $table->integer('jumlahBarang5')->nullable();
            $table->string('gambarBarang5')->nullable();
            $table->datetime('waktuPemusnahan')->nullable();
            $table->text('alasan')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('status')->nullable();

            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('unit_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('unit_id')->references('id')->on('unit')->onDelete('cascade');


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
        Schema::dropIfExists('pemusnahan');
    }
};