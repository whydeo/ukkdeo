<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $menu = DB::table('menu')
        ->join('menu_has_transaksi', 'menu.id_menu', '=', 'menu_has_transaksi.id_menu')
        ->join('transaksi', 'menu_has_transaksi.id_transaksi', '=', 'transaksi.id_transaksi')
        ->join('menu_has_user', 'menu.id_menu', '=', 'menu_has_user.id_menu')
        ->join('users','menu_has_user.id_user', '=', 'users.id')
        ->select('users.*', 'manager.*','penguna.*','kasir.*')
        ->get();

        return view('menu/index',['peng' => $menu]);
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
          // dd($request);
          $request->validate([
            'nama'=>'required',
            'makanan'=>'required',
            'minuman'=>'required',
            'kategori'=>'required',
            'harga'=>'required',
            'image'=>'required',
        ]);

        $image = $request->file('image');
        $nameImage = $request->file('image')->getClientOriginalName();
        $thumbImage = image::make($image->getRealPath())->resize(85, 85);
        $thumbPath = public_path() . '/imagemenu/' . $nameImage;
        $thumbImage = Image::make($thumbImage)->save($thumbPath);

        $id_manager = DB::table('manager')->where('name', $request['name'])->value('id_manager');

        $id_menu = DB::table('menu')->where('nama',$request['nama'])->value('id_menu');
        $datasave = [
            'id_manager'=>$id_manager,
            'id_menu'=>$id_menu,
        ];

        DB::table('menu_has_manager')->insert($datasave);

    return redirect()->route('menu.index')->with('success','Data Berhasil di Input');
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
