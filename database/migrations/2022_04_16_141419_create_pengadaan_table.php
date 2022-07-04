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
