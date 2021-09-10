<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use Illuminate\Http\Request;

class TruncateController extends Controller
{
    public function dusun()
    {
        Dusun::truncate();
        return redirect()->route('dusun.index')->with('delete', 'Semua Data Berhasil Dihapus');
    }
}
