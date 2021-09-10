<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelahiran extends Model
{
    use HasFactory;

    protected $table = 'kelahiran';

    protected $fillable = [
        'namaKelahiran',
        'dusun',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'persetujuan',
    ];

    protected $hidden = [];

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class, 'penduduk_id', 'id');
    }
}
