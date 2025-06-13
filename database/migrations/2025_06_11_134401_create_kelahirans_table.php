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
        Schema::create('kelahirans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penduduk_id')->constrained()->onDelete('cascade');
            $table->enum("jenis_kelahiran", ['tunggal', 'kembar 2', 'kembar 3', 'lainnya']);
            $table->string('anak_ke');
            $table->string('berat_bayi');
            $table->string('panjang_bayi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelahirans');
    }
};
