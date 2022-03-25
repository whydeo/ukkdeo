<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu;
use App\Models\pemesan;
use App\Models\pesan;
use App\Models\user;
use DB;
class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pesan = DB::table('pesan')
        // ->join('pesan_has_pemesan', 'pesan.id_pesan', '=', 'pesan_has_user.id_pesan')
        // ->join('pemesan','pesan_has_pemesan.id_pesan', '=', 'pemesan.id_pemesan')
        // ->join('pesan_has_menu', 'pesan.id_pesan', '=', 'pesan_has_menu.id_pesan')
        // ->join('menu','pesan_has_menu.id_menu', '=', 'menu.id_menu')
        // ->select('pemesan.nama','pesan.*')
        // ->paginate(1);

        return view('pesan.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pesan = DB::table('menu')->get();
        // dd($pesan);
        return view('pesan/create',['pesan' => $pesan]);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
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
