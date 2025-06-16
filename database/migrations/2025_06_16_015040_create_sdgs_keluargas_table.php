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
        Schema::create('sdgs_keluargas', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->uuid('uuid_penduduk');
            // Tujuan 1: Tanpa Kemiskinan
            $table->boolean('miskin')->default(false);

            // Tujuan 2: Tanpa Kelaparan
            $table->boolean('akses_pangan')->default(false);

            // Tujuan 3: Kehidupan Sehat dan Sejahtera
            $table->boolean('bpjs')->default(false);
            $table->boolean('difabel')->default(false);

            // Tujuan 4: Pendidikan Berkualitas
            $table->string('pendidikan_terakhir')->nullable();

            // Tujuan 5: Kesetaraan Gender
            $table->boolean('perempuan_bekerja')->default(false);

            // Tujuan 6: Air Bersih dan Sanitasi
            $table->boolean('akses_air_bersih')->default(false);

            // Tujuan 7: Energi Bersih
            $table->boolean('listrik')->default(false);

            // Tujuan 8: Pekerjaan Layak
            $table->boolean('pekerjaan_layak')->default(false);

            // Tujuan 9: Infrastruktur
            $table->boolean('akses_internet')->default(false);

            // Tujuan 10: Ketimpangan
            $table->boolean('disabilitas')->default(false);

            // Tujuan 11: Permukiman Layak
            $table->boolean('rumah_layak')->default(false);

            // Tujuan 12: Sampah
            $table->boolean('pengelolaan_sampah')->default(false);

            // Tujuan 13: Perubahan Iklim
            $table->boolean('terdampak_bencana')->default(false);

            // Tujuan 14 & 15: Lingkungan
            $table->boolean('pelestari_lingkungan')->default(false);

            // Tujuan 16: Keadilan
            $table->boolean('ikut_musyawarah')->default(false);

            // Tujuan 17: Kemitraan
            $table->boolean('ikut_organisasi')->default(false);

            $table->string('tahun')->nullable(); // untuk tracking per tahun pendataan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sdgs_keluargas');
    }
};
