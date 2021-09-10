<?php

namespace App\Http\Controllers\Excel;

use App\Http\Controllers\Controller;
use App\Imports\DusunImport;
use App\Imports\KartuKeluargaImport;
use App\Imports\KelahiranImport;
use App\Imports\KematianImport;
use App\Imports\MutasiImport;
use App\Imports\PendudukImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function dusun(Request $request)
    {
        $request->validate([
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

        Excel::import(new DusunImport, $request->file('file'));

        return redirect()->back()->with('add', 'Data Berhasil Ditambah');
    }

    public function penduduk(Request $request)
    {
        $request->validate([
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

        Excel::import(new PendudukImport, $request->file('file'));

        return redirect()->back()->with('add', 'Data Berhasil Ditambah');
    }

    public function kartukeluarga(Request $request)
    {
        $request->validate([
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

        Excel::import(new KartuKeluargaImport, $request->file('file'));

        return redirect()->back()->with('add', 'Data Berhasil Ditambah');
    }

    public function kematian(Request $request)
    {
        $request->validate([
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

        Excel::import(new KematianImport, $request->file('file'));

        return redirect()->back()->with('add', 'Data Berhasil Ditambah');
    }

    public function kelahiran(Request $request)
    {
        $request->validate([
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

        Excel::import(new KelahiranImport, $request->file('file'));

        return redirect()->back()->with('add', 'Data Berhasil Ditambah');
    }

    public function mutasi(Request $request)
    {
        $request->validate([
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

        Excel::import(new MutasiImport, $request->file('file'));

        return redirect()->back()->with('add', 'Data Berhasil Ditambah');
    }
}
