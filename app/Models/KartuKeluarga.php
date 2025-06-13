<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    /** @use HasFactory<\Database\Factories\KartuKeluargaFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi ke Table Penduduk
    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'kartu_keluarga_id');
    }
}
