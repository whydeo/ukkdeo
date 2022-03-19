<?php

namespace App\Http\Controllers;

use App\Models\coba;
use Illuminate\Http\Request;

class CobaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coba = coba::latest()->paginate(5);
        return view('coba.index', compact('coba'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coba.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'keterangan'=>'required',
        ]);

        coba::create($request->all());    

        return redirect()->route('coba.index')->with('success', "Data Berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\coba  $coba
     * @return \Illuminate\Http\Response
     */
    public function show(coba $coba)
    {
        return view('coba.index', compact('coba'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\coba  $coba
     * @return \Illuminate\Http\Response
     */
    public function edit(coba $coba)
    {
        // dd($fasilitaskmr);
        // $fasilitaskmrr = DB::table('fasilitaskmr')->where('id_fasilitaskmr', $fasilitaskmr)->get();
        // dd($fasilitaskmrr);
        return view('coba.edit', compact('coba'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\coba  $coba
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, coba $coba)
    {
        // dd($request);
        $request->validate([
            'nama'=>'required',
            'keterangan'=>'required',
        ]);
        $coba->update($request->all());
        return redirect()->route('coba.index')->with('success', "Data berhasil diubah");
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\coba  $coba
     * @return \Illuminate\Http\Response
     */
    public function destroy(coba $coba)
    {
        $coba->delete();
        return redirect()->route('coba.index')->with('success', 'Data berhasil dihapus');
    }
}
