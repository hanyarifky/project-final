<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perpindahan extends Model
{
    //

    protected $guarded = ['id'];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }
}
