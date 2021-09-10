<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use App\Models\Kelahiran;
use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class KelahiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dusun = Dusun::get();
        $filter = Kelahiran::select('jenis_kelamin')->distinct()->get();
        $filterDusun = Kelahiran::select('dusun')->distinct()->get();
        $kelahiran = Kelahiran::get();
        return view('pages.data-kelahiran', compact('kelahiran', 'dusun', 'filter', 'filterDusun'));
    }

    public function search(Request $request)
    {
        $dusun = $request->dusun;
        $penduduk = $request->penduduk;

        if ($penduduk) {
            $kelahiran = Kelahiran::where('namaKelahiran', 'like', '%'.$penduduk.'%')->get();
        } else {
            $kelahiran = Kelahiran::get();
        }

        $dusun = Dusun::get();
        $filter = Kelahiran::select('jenis_kelamin')->distinct()->get();
        $filterDusun = Kelahiran::select('dusun')->distinct()->get();
        return view('pages.data-kelahiran', compact('kelahiran', 'dusun', 'filter', 'filterDusun'));
    }

    public function filter(Request $request)
    {
        $jenisKelamin = $request->jenis_kelamin;
        $dusun = $request->dusun;

        if ($dusun) {
            $kelahiran = Kelahiran::where('dusun', 'like', '%'. $dusun .'%')->get();
        } elseif ($jenisKelamin) {
            $kelahiran = Kelahiran::where('jenis_kelamin', 'like', '%'. $jenisKelamin .'%')->get();
        } else {
            $kelahiran = Kelahiran::get();
        }

        $dusun = Dusun::get();
        $filterDusun = Kelahiran::select('dusun')->distinct()->get();
        $filter = Kelahiran::select('jenis_kelamin')->distinct()->get();
        return view('pages.data-kelahiran', compact('kelahiran', 'dusun', 'filter', 'filterDusun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penduduk = Penduduk::get();
        $dusun = Dusun::get();
        return view('pages.add-kelahiran', compact('penduduk', 'dusun'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->dusun_id;
        $dusun = Dusun::find($id);
        $data = $request->except(['persetujuan', 'namaKelahiran']);
        $data['kelahiran'] = 1;

        $kelahiran = $request->only(['namaKelahiran', 'persetujuan', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'dusun']);
        if ($request->persetujuan) {
            $namaFile = time().'.'.$request->file('persetujuan')->extension();
            $request->file('persetujuan')->move(public_path('persetujuan_kelahiran'), $namaFile);
            $kelahiran['persetujuan'] = $namaFile;
        }
        $kelahiran['namaKelahiran'] = $request->nama;
        $kelahiran['tempat_lahir'] = $request->tempat_lahir;
        $kelahiran['tanggal_lahir'] = $request->tanggal_lahir;
        $kelahiran['jenis_kelamin'] = $request->jenis_kelamin;
        if ($request->dusun_id) {
            $kelahiran['dusun'] = $dusun->dusun;
            $data['dusun'] = $dusun->dusun;
        }

        // dd($data);

        Kelahiran::create($kelahiran);
        Penduduk::create($data);
        return redirect()->route('kelahiran.index')->with('add', 'Data Berhasil Ditambah');
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
        $kelahiran = Kelahiran::find($id);

        return view('pages.edit-kelahiran', compact('penduduk', 'kelahiran'));
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
        $kelahiran = Kelahiran::find($id);
        $data = $request->all();

        if ($request->file('persetujuan')) {
            unlink('persetujuan_kelahiran/'. $kelahiran->persetujuan);

            $namaFile = time().'.'.$request->file('persetujuan')->extension();
            $request->file('persetujuan')->move(public_path('persetujuan_kelahiran'), $namaFile);
            $data['persetujuan'] = $namaFile;
        } else {
            $data['persetujuan'] = $kelahiran->persetujuan;
        }

        $kelahiran->update($data);
        return redirect()->route('kelahiran.index')->with('edit', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelahiran = Kelahiran::find($id);
        if ($kelahiran->persetujuan) {
            unlink('persetujuan_kelahiran/'. $kelahiran->persetujuan);
        }
        $kelahiran->delete();
        return redirect()->route('kelahiran.index')->with('delete', 'Data Berhasil Dihapus');
    }
}
