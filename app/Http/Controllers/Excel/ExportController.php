<?php

namespace App\Http\Controllers\Excel;

use App\Exports\DusunExport;
use App\Exports\KartuKeluargaDetailExport;
use App\Exports\KartuKeluargaExport;
use App\Exports\KelahiranExport;
use App\Exports\KematianExport;
use App\Exports\MutasiExport;
use App\Exports\PendudukExport;
use App\Http\Controllers\Controller;
use App\Models\DetailKartuKeluarga;
use App\Models\KartuKeluarga;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function dusun()
    {
        return Excel::download(new DusunExport, 'dusun.xlsx');
    }

    public function penduduk()
    {
        return Excel::download(new PendudukExport, 'penduduk.xlsx');
    }

    public function kartuKeluarga()
    {
        return Excel::download(new KartuKeluargaExport, 'kartukeluarga.xlsx');
    }

    public function kartuKeluargaDetail($id)
    {
        $nama = KartuKeluarga::find($id);
        return Excel::download(new KartuKeluargaDetailExport($id), $nama->no_kk.'.xlsx');
    }

    public function kematian()
    {
        return Excel::download(new KematianExport, 'kematian.xlsx');
    }

    public function kelahiran()
    {
        return Excel::download(new KelahiranExport, 'kelahiran.xlsx');
    }

    public function mutasi()
    {
        return Excel::download(new MutasiExport, 'mutasi.xlsx');
    }
}
