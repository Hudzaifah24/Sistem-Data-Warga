<?php

namespace App\Http\Controllers;

use App\Models\KTP;
use App\Models\Warga;
use Illuminate\Http\Request;

class KTPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ktp = Warga::all();
        return view('Pages.KTP', compact('ktp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penduduk = Warga::all();
        return view('Pages.add-ktp', compact('penduduk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();

        // $fileTtd = time().'.'.$request->TTD->extension();
        // $request->TTD->move(public_path('TandaTangan'), $fileTtd);
        // $data['TTD'] = $fileTtd;

        // $filePhoto = time().'.'.$request->photo->extension();
        // $request->photo->move(public_path('Photo'), $filePhoto);
        // $data['photo'] = $filePhoto;

        // KTP::create($data);
        // return redirect()->route('ktp.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
