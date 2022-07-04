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
        Schema::create('data_asets', function (Blueprint $table) {
            $table->string('kodeAset')->primary();
            // $table->text('kodeAset')->unique();
            // $table->string('kategori');
            $table->string('jenisBarang');
            $table->text('tipeBarang');
            $table->integer('jumlahBarang');
            $table->string('gambarBarang')->nullable();
            $table->date('tglBeli');
            $table->string('penyimpanan');
            // $table->string('gedung');
            $table->boolean('isInternal')->default(1);
            $table->string('status')->default("ada");

            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('unit')->onDelete('cascade');

            $table->unsignedInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');

            $table->unsignedInteger('gedung_id');
            $table->foreign('gedung_id')->references('id')->on('gedung')->onDelete('cascade');


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
        Schema::dropIfExists('data_asets');
    }
};
