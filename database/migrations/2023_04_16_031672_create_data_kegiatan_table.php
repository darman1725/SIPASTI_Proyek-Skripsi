<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('data_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('jenis');
            $table->text('level');
            $table->string('gambar');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->text('detail_kegiatan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_kegiatan');
    }
};