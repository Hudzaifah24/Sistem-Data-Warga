<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use App\Models\Penduduk;
use App\Models\Warga;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $penduduk = Penduduk::where('kematian', 0)->get();
        $filter = Penduduk::select('dusun')->distinct()->get();
        return view('pages.data-penduduk', compact('penduduk', 'filter'));
    }

    public function search(Request $request)
    {
        $nama = $request->nama;
        $nik = $request->nik;

        if ($request->nik) {
            $penduduk = Penduduk::where('NIK', 'like', '%'.$nik.'%')->get();
        } elseif ($request->nama) {
            $penduduk = Penduduk::where('nama', 'like', '%'.$nama.'%')->get();
        } else {
            $penduduk = Penduduk::where('kematian', 0)->get();
        }

        $filter = Penduduk::select('dusun')->distinct()->get();
        return view('pages.data-penduduk', compact('penduduk', 'filter'));
    }

    public function filter(Request $request)
    {
        if ($request->dusun) {
            $penduduk = Penduduk::where('dusun', $request->dusun)->get();
        } else {
            $penduduk = Penduduk::get();
        }

        $filter = Penduduk::select('dusun')->distinct()->get();
        // return dd($penduduk);
        return view('pages.data-penduduk', compact('penduduk', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dusun = Dusun::get();
        return view('pages.add-penduduk', compact('dusun'));
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
        $dusun = Dusun::find($request->dusun_id);
        $data['dusun'] = $dusun->dusun;

        Penduduk::create($data);
        return redirect()->route('penduduk.index')->with('add', 'Data Berhasil Ditambah');
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
        $penduduk = Penduduk::find($id);
        $dusun = Dusun::get();
        return view('pages.edit-penduduk', compact('penduduk', 'dusun'));
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
        $penduduk = Penduduk::find($id);
        $data = $request->all();
        $dusun = Dusun::find($request->dusun_id);
        $data['dusun'] = $dusun->dusun;

        $penduduk->update($data);
        return redirect()->route('penduduk.index')->with('edit', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Penduduk::find($id);

        $data->kelahiran()->delete();
        $data->delete();
        return redirect()->route('penduduk.index')->with('delete', 'Data Berhasil Dihapus');
    }

    public function nikValue(Request $request, $id)
    {
        $penduduk = Penduduk::find($id);
        $data = $request->only('NIK');

        $penduduk->update($data);
        $penduduk->save();

        return redirect()->route('penduduk.index')->with('edit', 'Tambah NIK Berhasil');
    }

    public function statusValue(Request $request, $id)
    {
        $penduduk = Penduduk::find($id);
        $data = $request->only('status');

        $penduduk->update($data);
        $penduduk->save();

        return redirect()->route('penduduk.index')->with('edit', 'Tambah Status Berhasil');
    }

    public function pekerjaanValue(Request $request, $id)
    {
        $penduduk = Penduduk::find($id);
        $data = $request->only('pekerjaan');

        $penduduk->update($data);
        $penduduk->save();

        return redirect()->route('penduduk.index')->with('edit', 'Tambah Pekkerjaan Berhasil');
    }
}
