<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $table = "phones";

    protected $fillable = [
        'phone',
        'status',
        'warga_id',
    ];

    protected $hidden = [];

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id', 'id');
    }
}
