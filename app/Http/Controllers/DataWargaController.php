<?php

namespace App\Http\Controllers;

use App\Exports\WargaExport;
use App\Imports\WargasImport;
use App\Models\Desa;
use App\Models\KartuKeluarga;
use App\Models\KTP;
use App\Models\RTRW;
use App\Models\Warga;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DataWargaController extends Controller
{
    use SoftDeletes;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penduduk = Warga::get();
        return view('Pages.data-warga', compact('penduduk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $desa = Desa::all();
        $rt = RTRW::all();
        return view('Pages.add-data', compact('desa', 'rt'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['berlaku'] = 'Seumur Hidup';

        $fileName = time().'.'.$request->TTD->extension();
        $request->TTD->move(public_path('ttd'), $fileName);
        $data['TTD'] = $fileName;

        $fileNamePhoto = time().'.'.$request->file('photo')->extension();
        $request->file('photo')->move(public_path('photos'), $fileNamePhoto);
        $data['photo'] = $fileNamePhoto;

        // dd($data);
        Warga::create($data);
        return redirect()->route('warga.index')->with('add', 'Tambah Data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penduduk = Warga::find($id);
        $desa = Desa::all();
        $rt = RTRW::all();
        return view('Pages.edit-data', compact('penduduk', 'desa', 'rt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $penduduk = Warga::find($id);
        $data = $request->all();

        // menghapus dan memasukkan Photo
        if ($request->photo==null) {
            $data['photo'] = $penduduk->photo;
        } else {
            if (public_path('photos').'/'.$penduduk->photo==null) {
                unlink('photos/'. $penduduk->photo);
            } else {
                echo '';
            }

            $fileName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('photos'), $fileName);
            $data['photo'] = $fileName;
        }

        // menghapus dan memsukkan TTD
        if ($request->TTD==null) {
            $data['TTD'] = $penduduk->TTD;
        } else {
            if (public_path('ttd').'/'.$penduduk->TTD==null) {
                unlink('ttd/'. $penduduk->TTD);
            } else {
                echo '';
            }

            $fileNameTTD = time().'.'.$request->TTD->extension();
            $request->TTD->move(public_path('ttd'), $fileNameTTD);
            $data['TTD'] = $fileNameTTD;
        }

        $penduduk->update($data);
        return redirect()->route('warga.index')->with('add', 'Edit Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Warga::find($id);
        $data->delete();

        return redirect()->route('warga.index')->with('delete', 'Hapus Data Berhasil');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export()
    {
        return Excel::download(new WargaExport, 'penduduk.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $req)
    {
        Excel::import(new WargasImport,$req->file('file'));

        return back();
    }
}
