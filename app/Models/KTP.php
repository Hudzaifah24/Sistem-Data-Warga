<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KTP extends Model
{
    use HasFactory;

    protected $table = "ktp";

    protected $fillable = [
        'photo',
        'warga_id',
    ];

    protected $hidden = [];

    public function warga()
    {
        return $this->hasOne(Warga::class, 'warga_id', 'id');
    }
}
