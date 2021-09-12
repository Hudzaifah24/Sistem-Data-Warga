<?php

namespace App\Http\Controllers;

use App\Models\DetailKartuKeluarga;
use App\Models\KartuKeluarga;
use App\Models\Penduduk;
use App\Models\Warga;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class KartuKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kartuKeluarga = KartuKeluarga::orderBy('nama', 'asc')->get();
        $filter = KartuKeluarga::select('nama')->distinct()->get();
        $kartuKeluargaDetail = DetailKartuKeluarga::get();
        return view('pages.data-kartu-keluarga', compact('kartuKeluarga', 'kartuKeluargaDetail', 'filter'));
    }

    public function search(Request $request)
    {
        $nokk = $request->no_kk;
        $penduduk = $request->penduduk;

        if ($nokk) {
            $kartuKeluarga = KartuKeluarga::where('no_kk', 'like', '%'.$nokk.'%')->get();
        } elseif ($penduduk) {
            $kartuKeluarga = KartuKeluarga::where('nama', 'like', '%'.$penduduk.'%')->get();
        } else {
            $kartuKeluarga = KartuKeluarga::get();
        }
        $kartuKeluargaDetail = DetailKartuKeluarga::get();
        $filter = KartuKeluarga::select('nama')->distinct()->get();

        return view('pages.data-kartu-keluarga', compact('kartuKeluarga', 'kartuKeluargaDetail', 'filter'));
    }

    public function filter(Request $request)
    {
        $kartuKeluarga = KartuKeluarga::where('nama', $request->nama)->get();
        $kartuKeluargaDetail = DetailKartuKeluarga::get();
        $filter = KartuKeluarga::select('nama')->distinct()->get();

        // return dd($kartuKeluarga);
        return view('pages.data-kartu-keluarga', compact('kartuKeluarga', 'kartuKeluargaDetail', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penduduk = Penduduk::where('status', 'MENIKAH')->get();
        return view('pages.add-kartu-keluarga', compact('penduduk'));
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
        $penduduk = Penduduk::find($request->penduduk_id);
        $data['nama'] = $penduduk->nama;

        KartuKeluarga::create($data);
        return redirect()->route('kartukeluarga.index')->with('add', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.detail-kartu-keluarga');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datakk = KartuKeluarga::find($id);
        $penduduk = Penduduk::where('status', 'MENIKAH')->get();
        return view('pages.edit-kartu-keluarga', compact('datakk', 'penduduk'));
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
        $datakk = KartuKeluarga::find($id);
        $data = $request->all();

        $datakk->update($data);
        return redirect()->route('kartukeluarga.index')->with('edit', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = KartuKeluarga::find($id);

        $data->details()->delete();
        $data->delete();
        return redirect()->route('kartukeluarga.index')->with('delete', 'Data Berhasil Dihapus');
    }
}
