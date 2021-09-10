<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    use HasFactory;

    protected $table = 'kartu_keluarga';

    protected $fillable = [
        'no_kk',
        'nama',
        'penduduk_id',
    ];

    protected $hidden = [];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id', 'id');
    }

    public function details()
    {
        return $this->hasMany(DetailKartuKeluarga::class, 'kartukeluarga_id', 'id');
    }
}
