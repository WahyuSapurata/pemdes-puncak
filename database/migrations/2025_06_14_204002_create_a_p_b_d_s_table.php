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
        Schema::create('a_p_b_d_s', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('tahun');
            $table->string('jenis');
            $table->string('sumber');
            $table->string('uraian');
            $table->string('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a_p_b_d_s');
    }
};
