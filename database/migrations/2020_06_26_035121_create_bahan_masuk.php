<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBahanMasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahan_masuk', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('bahan_id');
            $table->string('nama')->nullable();
            $table->float('jumlah')->nullable();
            $table->string('nama_pengguna')->nullable();
            $table->timestamps();

            $table->foreign('bahan_id')->references('id')->on('bahan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bahan_masuk');
    }
}
