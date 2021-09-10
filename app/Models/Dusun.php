<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    use HasFactory;

    protected $table = 'dusun';

    protected $fillable = [
        'dusun',
        'alamat'
    ];

    protected $hidden = [];

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class, 'dusun_id', 'id');
    }
}
