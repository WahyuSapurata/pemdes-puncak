<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('nik');
            $table->string('kk');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('agama');
            $table->string('status_perkawinan');
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->string('dusun');
            $table->string('rt');
            $table->string('rw');
            $table->string('kewarganegaraan');
            $table->string('pendidikan_terakhir');
            $table->string('golongan_darah');
            $table->string('status_dalam_keluarga');
            $table->string('ayah');
            $table->string('ibu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};
