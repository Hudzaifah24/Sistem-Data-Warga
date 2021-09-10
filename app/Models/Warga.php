<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warga extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "wargas";

    protected $fillable = [
        'nama',
        'no_kk',
        'NIK',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'gol_darah',
        'pendidikan',
        'pekerjaan',
        'status_perkawinan',
        'status_hubungan_dalam_keluarga',
        'alamat',
        'kewarganegaraan',
        'no_paspor',
        'no_KITAS_KITAP',
        'nama_ayah',
        'nama_ibu',
        'desa_id',
        'rt_id',
        'berlaku',
        'kecamatan',
        'kota',
        'provinsi',
        'TTD',
        'photo',
    ];

    protected $hidden = [];

    public function ktp()
    {
        return $this->hasOne(KTP::class, 'warga_id', 'id');
    }

    public function phones()
    {
        return $this->hasMany(Phone::class, 'warga_id', 'id');
    }

    public function kk()
    {
        return $this->belongsTo(KartuKeluarga::class, 'id', 'warga_id');
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id', 'id');
    }

    public function rt()
    {
        return $this->hasOne(RTRW::class, 'id', 'rt_id');
    }
}
