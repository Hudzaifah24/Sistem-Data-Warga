<?php

namespace App\Http\Controllers\Excel;

use App\Exports\DusunTemplateExport;
use App\Exports\KartuKeluargaDetailTemplateExport;
use App\Exports\KartuKeluargaTemplateExport;
use App\Exports\KelahiranTemplateExport;
use App\Exports\KematianTemplateExport;
use App\Exports\MutasiTemplateExport;
use App\Exports\PendudukTemplateExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TemplateController extends Controller
{
    public function dusun()
    {
        return Excel::download(new DusunTemplateExport, 'dusunTemplate.xlsx');
    }

    public function penduduk()
    {
        return Excel::download(new PendudukTemplateExport, 'pendudukTemplate.xlsx');
    }

    public function kartuKeluarga()
    {
        return Excel::download(new KartuKeluargaTemplateExport, 'kartukeluargaTemplate.xlsx');
    }

    public function kartuKeluargaDetail()
    {
        return Excel::download(new KartuKeluargaDetailTemplateExport, 'DetailKartuKeluargaTemplate.xlsx');
    }

    public function kematian()
    {
        return Excel::download(new KematianTemplateExport, 'kematianTemplate.xlsx');
    }

    public function kelahiran()
    {
        return Excel::download(new KelahiranTemplateExport, 'kelahiranTemplate.xlsx');
    }

    public function mutasi()
    {
        return Excel::download(new MutasiTemplateExport, 'mutasiTemplate.xlsx');
    }
}
