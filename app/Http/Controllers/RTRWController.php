<?php

namespace App\Http\Controllers;

use App\Exports\RTRWExport;
use App\Imports\RTRWImport;
use App\Models\Desa;
use App\Models\RTRW;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RTRWController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rt = RTRW::get();
        return view('Pages.data-rt-rw', compact('rt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $desa = Desa::all();

        return view('Pages.add-RTRW', compact('desa'));
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

        RTRW::create($data);
        return redirect()->route('rw.index')->with('add', 'Add Data Berhasil');
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
        $rt = RTRW::find($id);
        $desa = Desa::all();

        return view('Pages.edit-RTRW', compact('desa', 'rt'));
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
        $rt = RTRW::find($id);

        $data = $request->all();

        $rt->update($data);
        return redirect()->route('rw.index')->with('edit', 'Edit Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rt = RTRW::find($id);

        $rt->delete();
        return redirect()->route('rw.index')->with('delete', 'Hapus Data Berhasil');
    }

    public function export()
    {
        return Excel::download(new RTRWExport, 'RTRW.xlsx');
    }

    public function import(Request $request)
    {
        Excel::import(new RTRWImport, $request->file('file'));

        return redirect()->back();
    }
}
