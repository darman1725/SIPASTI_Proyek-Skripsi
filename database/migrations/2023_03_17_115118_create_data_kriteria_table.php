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
        Schema::create('data_kriteria', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan', 100);
            $table->string('kode_kriteria', 100);
            $table->double('bobot');
            $table->string('jenis', 100);
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
        Schema::dropIfExists('data_kriteria');
    }
};

