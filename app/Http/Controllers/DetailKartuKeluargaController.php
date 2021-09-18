<?php

namespace App\Http\Controllers;

use App\Models\DetailKartuKeluarga;
use App\Models\KartuKeluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class DetailKartuKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.detail-kartu-keluarga');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $penduduk = Penduduk::with('kartukeluarga')->doesntHave('detailKartuKeluarga')->doesntHave('kematian')->get();
        $kartuKeluarga = KartuKeluarga::find($id);

        return view('pages.detail-add-kartu-keluarga', compact('penduduk', 'kartuKeluarga'));
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
        $kker = DetailKartuKeluarga::where('penduduk_id', (request('penduduk_id')))->get();
        foreach ($kker as $a) {
            if (isset($a->penduduk_id)) {
                return back()->with('err', 'Penduduk Sudah Memiliki Kartu Keluarga');
            }
        }

        DetailKartuKeluarga::create($data);
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
        $penduduk = Penduduk::get();
        $detailkk = DetailKartuKeluarga::find($id);
        return view('pages.detail-edit-kartu-keluarga', compact('penduduk', 'detailkk'));
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
        $detailkk = DetailKartuKeluarga::find($id);
        $data = $request->all();

        $detailkk->update($data);
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
        $data = DetailKartuKeluarga::find($id);

        $data->delete();
        return redirect()->back();
    }
}
