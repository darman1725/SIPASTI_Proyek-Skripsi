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
        Schema::create('data_penilaian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_data_alternatif');
            $table->foreign('id_data_alternatif')->references('id')->on('data_alternatif');
            $table->unsignedBigInteger('id_data_kriteria');
            $table->foreign('id_data_kriteria')->references('id')->on('data_kriteria');
            $table->integer('nilai');
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
        Schema::dropIfExists('data_penilaian');
    }
};
