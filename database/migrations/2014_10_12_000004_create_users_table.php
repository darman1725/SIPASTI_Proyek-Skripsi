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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('nama_lengkap', 255);
            $table->string('username', 50)->unique();
            $table->string('password', 255);
            $table->string('level', 50)->default('user');
            $table->string('npwp', 20)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin', 10)->nullable();
            $table->string('agama', 20)->nullable();
            $table->string('status_perkawinan', 20)->nullable();
            $table->string('pendidikan_terakhir', 50)->nullable();
            $table->string('no_handphone', 20)->nullable();
            $table->string('pekerjaan', 50)->nullable();
            $table->string('catatan', 255)->nullable();
            $table->text('pengalaman')->nullable();
            $table->string('pas_foto', 255)->nullable();
            $table->string('foto_ktp', 255)->nullable();
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
        Schema::dropIfExists('users');
    }
};