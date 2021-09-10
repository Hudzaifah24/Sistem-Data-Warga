<?php

namespace App\Http\Controllers;

use App\Exports\DesaExport;
use App\Imports\DesaImport;
use App\Models\Desa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desa = Desa::all();
        return view('Pages.data-desa', compact('desa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pages.add-desa');
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

        Desa::create($data);
        return redirect()->route('desa.index')->with('add', 'Tambah Data Berhasil');
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
        $desa = Desa::find($id);

        return view('Pages.edit-desa', compact('desa'));
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
        $desa = Desa::find($id);

        $data = $request->all();

        $desa->update($data);
        return redirect()->route('desa.index')->with('edit', 'Edit Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desa = Desa::find($id);

        $desa->rt()->delete();
        $desa->delete();
        return redirect()->route('desa.index')->with('delete', 'Hapus Data Berhasil');
    }

    public function export()
    {
        return Excel::download(new DesaExport, 'desa.xlsx');
    }

    public function import(Request $request)
    {
        Excel::import(new DesaImport, $request->file('file'));

        return redirect()->back();
    }
}
