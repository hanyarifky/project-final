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
        Schema::create('kematians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penduduk_id')->constraint()->onDelete('cascade');
            $table->integer('umur');
            $table->date('tanggal_kematian');
            $table->time('waktu_kematian');
            $table->enum('sebab_kematian', ['sakit biasa/tua', 'wabah penyakit', 'kecelakaan', 'kriminalitas', 'bunuh diri', 'lainnya']);
            $table->string('tempat_kematian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kematians');
    }
};
