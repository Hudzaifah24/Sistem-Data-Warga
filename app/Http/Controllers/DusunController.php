<?php

namespace App\Http\Controllers;

use App\Http\Requests\DusunRequest;
use App\Models\Dusun;
use Illuminate\Http\Request;

class DusunController extends Controller
{
    public function API()
    {
        return response()->json(Dusun::all());
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dusun = Dusun::orderBy('dusun', 'asc')->get();
        $filter = Dusun::select('alamat')->distinct()->get();
        return view('pages.data-dusun', compact('dusun', 'filter'));
    }

    public function search(Request $request)
    {
        $nama = $request->dusun;

        if ($nama) {
            $dusun = Dusun::where('dusun', 'like', '%'.$nama.'%')->get();
        } else {
            $dusun = Dusun::get();
        }

        $filter = Dusun::select('alamat')->distinct()->get();
        return view('pages.data-dusun', compact('dusun', 'filter'));
    }

    public function filter(Request $request)
    {
        $alamat = $request->alamat;

        if ($alamat) {
            $dusun = Dusun::where('alamat', 'like', '%'.$alamat.'%')->get();
        } else {
            return ;
        }

        $filter = Dusun::select('alamat')->distinct()->get();
        // return dd($dusun);
        return view('pages.data-dusun', compact('dusun', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.add-dusun');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DusunRequest $request)
    {
        $data = $request->all();

        Dusun::create($data);
        return redirect()->route('dusun.index')->with('add', 'Data Berhasil Ditambah');
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
        $dusun = Dusun::find($id);
        return view('pages.edit-dusun', compact('dusun'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DusunRequest $request, $id)
    {
        $dusun = Dusun::find($id);
        $data = $request->all();

        $dusun->update($data);
        return redirect()->route('dusun.index')->with('edit', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dusun = Dusun::find($id);

        $dusun->penduduk()->delete();
        $dusun->delete();
        return redirect()->route('dusun.index')->with('delete', 'Data Berhasil Dihapus');
    }
}
