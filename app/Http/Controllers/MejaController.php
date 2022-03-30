<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use JavaScript;
use DB;
class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.meja.index',[
            'datameja' => Meja::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'no_meja' => 'required',
            'status' => 'required'
        ]);
        Meja::create($request->all());
        return redirect()->route('meja.index')->with('success','Data Berhasil di tambah');
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
    public function edit(Request $request,$id)
    {
        $meja= Meja::find($id);
        return view ('admin/meja/edit', compact('meja'));


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
        // dd($request);
        $request->validate([
            'status'=>'required',
        ]);
       Meja::where('id',$id)->update([
        'status'=>$request['status'],
       ]);
       
        return redirect()->route('meja.index')->with('success', "meja berhasil di update");
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
