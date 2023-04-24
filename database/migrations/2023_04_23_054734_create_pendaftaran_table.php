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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_data_user');
            $table->foreign('id_data_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_data_kegiatan');
            $table->foreign('id_data_kegiatan')->references('id')->on('data_kegiatan');
            $table->string('provinsi');
            $table->string('kabupaten_kota');
            $table->string('jabatan');
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
        Schema::dropIfExists('pendaftaran');
    }
};
