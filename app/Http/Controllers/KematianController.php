<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use App\Models\Kematian;
use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class KematianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kematian = Kematian::orderBy('nama', 'asc')->get();
        $filter = Kematian::select('tempat_kematian')->distinct()->get();
        return view('pages.data-kematian', compact('kematian', 'filter'));
    }

    public function search(Request $request)
    {
        $nama = $request->nama;
        $nik = $request->NIK;

        if ($nama) {
            $kematian = Kematian::where('nama', 'like', '%'.$nama.'%')->get();
        } elseif ($nik) {
            $kematian = Kematian::where('NIK', $nik)->get();
        } else {
            $kematian = Kematian::get();
        }

        $filter = Kematian::select('tempat_kematian')->distinct()->get();
        return view('pages.data-kematian', compact('kematian', 'filter'));
    }

    public function filter(Request $request)
    {
        $tempat = $request->tempat_kematian;

        if ($tempat) {
            $kematian = Kematian::where('tempat_kematian', 'like', '%'. $tempat .'%')->get();
        } else {
            $kematian = Kematian::get();
        }

        $filter = Kematian::select('tempat_kematian')->distinct()->get();
        return view('pages.data-kematian', compact('kematian', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penduduk = Penduduk::where('kematian', 0)->get();
        return view('pages.add-kematian', compact('penduduk'));
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
        $penduduk->kematian = 1;
        $penduduk->save();

        if ($request->hasFile('persetujuan')) {
            $namafile = time().'.'.$request->file('persetujuan')->extension();
            $request->file('persetujuan')->move(public_path('persetujuan_kematian'), $namafile);
            $data['persetujuan'] = $namafile;
        }

        $data['nama'] = $penduduk->nama;
        $data['NIK'] = $penduduk->NIK;

        $kematian = Kematian::create($data);

        return redirect()->route('kematian.index')->with('add', 'Data Berhasil Ditambah');
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
        $kematian = Kematian::find($id);
        $penduduk = Penduduk::get();
        return view('pages.edit-kematian', compact('kematian', 'penduduk'));
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
        $kematian = Kematian::find($id);
        $penduduk = Penduduk::find($request->penduduk_id);
        $data = $request->all();
        $data['nama'] = $penduduk->nama;

        if ($request->file('persetujuan')) {
            if ($kematian->persetujuan==null) {
                unlink('persetujuan_kematian/'. $kematian->persetujuan);
            }

            $namafile = time().'.'.$request->file('persetujuan')->extension();
            $request->file('persetujuan')->move(public_path('persetujuan_kematian'), $namafile);
            $data['persetujuan'] = $namafile;
        } else {
            $data['persetujuan'] = $kematian->persetujuan;
        }

        $kematian->update($data);
        return redirect()->route('kematian.index')->with('edit', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kematian = Kematian::find($id);
        if ($kematian->persetujuan) {
            unlink('persetujuan_kematian/'. $kematian->persetujuan);
        }

        $kematian->delete();
        $kematian->penduduk()->delete();
        return redirect()->back()->with('delete', 'Data Berhasil Dihapus');
    }
}
