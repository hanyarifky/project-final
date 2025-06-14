<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penduduk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kartuKeluarga()
    {
        return $this->belongsTo(KartuKeluarga::class, 'kartu_keluarga_id');
    }

    public function kelahiran()
    {
        return $this->hasOne(Kelahiran::class);
    }

    public function kematian()
    {
        return $this->hasOne(Kematian::class);
    }
}
