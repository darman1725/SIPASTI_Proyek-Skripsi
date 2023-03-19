<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('data_sub_kriteria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_data_kriteria');
            $table->foreign('id_data_kriteria')->references('id')->on('data_kriteria');
            $table->string('deskripsi', 200);
            $table->integer('nilai');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_sub_kriteria');
    }
};
