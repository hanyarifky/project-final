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
            $table->string('nama');
            $table->string('nik', 16)->unique()->nullable();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat')->nullable();
            $table->string('agama');
            $table->enum('status_perkawinan', ['belum kawin', 'kawin']);
            $table->enum('status_di_keluarga', ['ayah', 'ibu', 'anak'])->nullable();
            $table->string('pekerjaan');
            $table->enum('status', ['aktif', 'tidak aktif'])->default("aktif");
            $table->foreignId('kartu_keluarga_id')->nullable()->constrained("kartu_keluargas")->onDelete('set null')->onUpdate('cascade');
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
