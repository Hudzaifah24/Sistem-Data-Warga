<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKartuKeluarga extends Model
{
    use HasFactory;

    protected $table = 'kartu_keluarga_detail';

    protected $fillable = [
        'status_dalam_keluarga',
        'kartukeluarga_id',
        'penduduk_id',
    ];

    protected $hidden = [];

    public function kartuKeluarga()
    {
        return $this->belongsTo(KartuKeluarga::class, 'kartukeluarga_id', 'id');
    }

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id', 'id');
    }
}
