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
            $table->string('status')->nullable();

            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('unit_id')->nullable();
            $table->foreign('unit_id')->references('id')->on('unit');

            $table->string('id_peminjaman')->nullable();
            $table->foreign('id_peminjaman')->references('kodePeminjaman')->on('peminjaman');
            
            $table->string('id_pengadaan')->nullable();
            $table->foreign('id_pengadaan')->references('kodePengadaan')->on('pengadaan');

            $table->string('id_monitoring')->nullable();
            $table->foreign('id_monitoring')->references('kodeMonitoring')->on('monitoring');

            $table->string('id_pemusnahan')->nullable();
            $table->foreign('id_pemusnahan')->references('kodePemusnahan')->on('pemusnahan');

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
