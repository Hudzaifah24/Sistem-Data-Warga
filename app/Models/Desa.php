<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desa';

    protected $fillable = [
        'desa',
    ];

    protected $hidden = [];

    public function wargas()
    {
        return $this->hasMany(Warga::class, 'desa_id', 'id');
    }

    public function rt()
    {
        return $this->hasMany(RTRW::class, 'desa_id', 'id');
    }
}
