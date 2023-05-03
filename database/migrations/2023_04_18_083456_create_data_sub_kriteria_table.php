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
        Schema::create('data_sub_kriteria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_data_kegiatan');
            $table->foreign('id_data_kegiatan')->references('id')->on('data_kegiatan');
            $table->unsignedBigInteger('id_data_kriteria');
            $table->foreign('id_data_kriteria')->references('id')->on('data_kriteria')->onDelete('cascade');
            $table->string('deskripsi', 200);
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
        Schema::dropIfExists('data_sub_kriteria');
    }
};
