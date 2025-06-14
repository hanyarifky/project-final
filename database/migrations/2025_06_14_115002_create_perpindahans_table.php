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
        Schema::create('perpindahans', function (Blueprint $table) {
            $table->id();
            $table->foreignId("penduduk_id")->constrained()->onDelete("cascade");
            $table->date("tanggal_pindah");
            $table->string("alamat_asal");
            $table->string("alamat_tujuan");
            $table->string("alasan_pindah");
            $table->enum("status_perpindahan", ['sementara', 'permanen']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perpindahans');
    }
};
