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
        Schema::create('lapak_desas', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('nama_produk');
            $table->string('slug');
            $table->text('deskripsi_produk');
            $table->string('harga_produk');
            $table->string('gambar_produk');
            $table->string('kategori_produk');
            $table->string('nama_penjual');
            $table->string('kontak_penjual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lapak_desas');
    }
};
