<?php

namespace App\Http\Controllers\Cetak;

use App\Http\Controllers\Controller;
use App\Models\DetailKartuKeluarga;
use Illuminate\Http\Request;
use App\Models\Dusun;
use App\Models\KartuKeluarga;
use App\Models\Kelahiran;
use App\Models\Kematian;
use App\Models\Mutasi;
use App\Models\Penduduk;

class CetakController extends Controller
{
    public function dusun()
    {
        $dusun = Dusun::get();
        return view('print.dusun', compact('dusun'));
    }

    public function penduduk()
    {
        $penduduk = Penduduk::get();
        return view('print.penduduk', compact('penduduk'));
    }

    public function kartuKeluarga()
    {
        $kartuKeluarga = KartuKeluarga::get();
        $kartuKeluargaDetail = DetailKartuKeluarga::get();
        return view('print.kartu-keluarga', compact('kartuKeluarga', 'kartuKeluargaDetail'));
    }

    public function kartuKeluargaDetail($id)
    {
        $kartuKeluarga = KartuKeluarga::find($id);
        $kartuKeluargaDetail = DetailKartuKeluarga::get();
        return view('print.detail-kartu-keluarga', compact('kartuKeluarga', 'kartuKeluargaDetail'));
    }

    public function kematian()
    {
        $kematian = Kematian::get();
        $dusun = Dusun::get();
        return view('print.kematian', compact('kematian', 'dusun'));
    }

    public function kelahiran()
    {
        $dusun = Dusun::get();
        $kelahiran = Kelahiran::get();
        return view('print.kelahiran', compact('kelahiran', 'dusun'));
    }

    public function mutasi()
    {
        $mutasi = Mutasi::get();
        return view('print.mutasi', compact('mutasi'));
    }
}
