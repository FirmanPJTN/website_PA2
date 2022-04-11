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
            $table->string('unit');
            $table->boolean('isInternal')->default(1);
            $table->string('status')->default("kosong");

            $table->unsignedInteger('visitor_id')->nullable();
            $table->unsignedInteger('administrator_id')->nullable();
            $table->unsignedInteger('approver_id')->nullable();
            $table->unsignedInteger('transactor_id')->nullable();

            $table->foreign('visitor_id')->references('id')->on('visitors')->onDelete('cascade');
            $table->foreign('administrator_id')->references('id')->on('administrators')->onDelete('cascade');
            $table->foreign('approver_id')->references('id')->on('approvers')->onDelete('cascade');
            $table->foreign('transactor_id')->references('id')->on('transactors')->onDelete('cascade');

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
