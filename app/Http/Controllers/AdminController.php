<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\models\user;
use App\Models\penguna;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\ActivityLog;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= User::select()->count();
        $menu= menu::select()->count();
        $meja= meja::select()->count();
        $kategori= kategori::select()->count();
        $pesanan= pesanan::select()->count();
        $penguna= penguna::select()->count();
        $activity_log= ActivityLog::with('user')->limit(10)->orderBy('id','DESC')->get();
        return view('admin/logaktif',compact('user','menu','meja','kategori','pesanan','penguna','activity_log'));

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
        //
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
