<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduk';

    protected $fillable = [
        'NIK',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'dusun_id',
        'dusun',
        'RT',
        'RW',
        'kelurahan',
        'kecamatan',
        'agama',
        'status',
        'status_hidup',
        'kelahiran',
        'kematian',
        'pekerjaan',
        'kewarganegaraan',
    ];

    protected $hidden = [];

    public function dusun()
    {
        return $this->belongsTo(Dusun::class, 'dusun_id', 'id');
    }

    public function mutasi()
    {
        return $this->hasMany(Mutasi::class, 'penduduk_id', 'id');
    }

    public function kartuKeluarga()
    {
        return $this->hasMany(KartuKeluarga::class, 'penduduk_id', 'id');
    }

    public function detailKartuKeluarga()
    {
        return $this->hasMany(DetailKartuKeluarga::class, 'penduduk_id', 'id');
    }

    public function kematian()
    {
        return $this->hasMany(Kematian::class, 'penduduk_id', 'id');
    }

    public function kelahiran()
    {
        return $this->hasMany(Kelahiran::class, 'namaKelahiran', 'nama');
    }
}
