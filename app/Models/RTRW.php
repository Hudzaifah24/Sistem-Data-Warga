<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RTRW extends Model
{
    use HasFactory;

    protected $table = "rtrw";

    protected $fillable = [
        'RT',
        'RW',
        'desa_id',
    ];

    protected $hidden = [];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id', 'id');
    }
}
