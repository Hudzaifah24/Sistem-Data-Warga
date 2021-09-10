<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kematian extends Model
{
    use HasFactory;

    protected $table = 'kematian';

    protected $fillable = [
        'penduduk_id',
        'nama',
        'NIK',
        'tempat_kematian',
        'tanggal_kematian',
        'alasan',
        'persetujuan',
    ];

    protected $hidden = [];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id', 'id');
    }

    public function dusun()
    {
        return $this->belongsTo(Dusun::class, 'dusun_id', 'id');
    }
}
