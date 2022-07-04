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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->string('kodePeminjaman')->primary();
            $table->integer('jumlahPinjam');
            $table->date('tglKembali');
            $table->text('tujuan');
            $table->string('status')->nullable();
            $table->text('alasan')->nullable();
            $table->datetime('waktuPengembalian')->nullable();
            $table->text('catatan')->nullable();

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
        Schema::dropIfExists('peminjaman');
    }
};
