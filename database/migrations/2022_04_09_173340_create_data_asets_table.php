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
            $table->increments('id');
            $table->text('kodeAset')->unique();
            $table->string('kategori');
            $table->string('jenisBarang');
            $table->text('tipeBarang');
            $table->integer('jumlahBarang');
            $table->date('tglBeli');
            $table->string('penyimpanan');
            $table->string('gedung');
            $table->string('unit');
            $table->boolean('isInternal')->default(1);
            $table->string('status')->default("kosong");

            $table->unsignedInteger('user_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
