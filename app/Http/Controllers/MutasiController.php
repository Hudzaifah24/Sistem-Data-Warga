<?php

namespace App\Http\Controllers;

use App\Models\Mutasi;
use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MutasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mutasi = Mutasi::orderBy('nama', 'asc')->get();
        $filter = Mutasi::select('persetujuan')->distinct()->get();
        return view('pages.data-mutasi', compact('mutasi', 'filter'));
    }

    public function search(Request $request)
    {
        $penduduk = $request->penduduk;

        if ($penduduk) {
            $mutasi = Mutasi::where('nama', 'like', '%'.$penduduk.'%')->get();
        } else {
            $mutasi = Mutasi::get();
        }
        $filter = Mutasi::select('persetujuan')->distinct()->get();

        return view('pages.data-mutasi', compact('mutasi', 'filter'));
    }

    public function filter(Request $request)
    {
        $persetujuan = $request->persetujuan;

        if ($persetujuan) {
            $mutasi = Mutasi::where('persetujuan', 'like', '%'. $persetujuan .'%')->get();
        } else {
            $mutasi = Mutasi::get();
        }
        $filter = Mutasi::select('persetujuan')->distinct()->get();

        return view('pages.data-mutasi', compact('mutasi', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penduduk = Penduduk::get();
        return view('pages.add-mutasi', compact('penduduk'));
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

        $id = $request->penduduk_id;
        $penduduk = Penduduk::find($id);

        $data['nama'] = $penduduk->nama;
        $data['alamat_sebelum'] = $penduduk->dusun;

        Mutasi::create($data);

        return redirect()->route('mutasi.index')->with('add', 'Data Berhasil Ditambah');
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
        $mutasi = Mutasi::find($id);
        $penduduk = Penduduk::get();
        return view('pages.edit-mutasi', compact('mutasi', 'penduduk'));
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
        $mutasi = Mutasi::find($id);
        $data = $request->all();

        $id = $request->penduduk_id;
        $penduduk = Penduduk::find($id);

        $data['nama'] = $penduduk->nama;
        $data['alamat_sebelum'] = $penduduk->dusun;

        $mutasi->update($data);
        return redirect()->route('mutasi.index')->with('edit','Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Mutasi::find($id);
        $data->delete();

        return redirect()->route('mutasi.index')->with('delete', 'Data Berhasil Dihapus');
    }

    public function approv(Request $request, $id)
    {
        $data = $request->only('persetujuan');
        $mutasi = Mutasi::find($id);

        $mutasi->update($data);

        if ($request->persetujuan==1) {
            return redirect()->back()->with('edit', 'Mutasi Disetujui');
        } elseif ($request->persetujuan==0) {
            return redirect()->back()->with('delete', 'Mutasi Tidak Disetujui');
        }
    }
}
