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
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->increments('id');
            $table->text('deskripsi');
            $table->string('role')->nullable();
            $table->string('kodePeminjaman')->nullable();
            $table->string('kodePemusnahan')->nullable();
            $table->string('kodeMonitoring')->nullable();
            $table->string('kodePengadaan')->nullable();
            $table->string('status')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('unit_id')->nullable();
            $table->unsignedInteger('aset_id')->nullable();
            $table->unsignedInteger('peminjaman_id')->nullable();
            $table->unsignedInteger('pengadaan_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('aset_id')->references('id')->on('data_asets')->onDelete('cascade');
            $table->foreign('peminjaman_id')->references('id')->on('peminjaman')->onDelete('cascade');
            $table->foreign('pengadaan_id')->references('id')->on('pengadaan')->onDelete('cascade');
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
        Schema::dropIfExists('notifikasi');
    }
};
