<?php

namespace App\Http\Controllers;
use App\Models\transaksi;
use App\Models\user;
use DB;
use Intervention\Image\Facades\Image;

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
        ->join('menu_has_user', 'menu.id_menu', '=', 'menu_has_user.id_menu')
        ->join('users','menu_has_user.id_user', '=', 'users.id')
        ->select('users.name','menu.*')
        ->get();

        return view('menu/index',['menu' => $menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create');
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
            'kategori'=>'required',
            'harga'=>'required',
            'image'=>'required',
        ]);

        $image = $request->file('image');
        $nameImage = $request->file('image')->getClientOriginalName();
        $thumbImage = image::make($image->getRealPath())->resize(85, 85);
        $thumbPath = public_path() . '/imagemenu/' . $nameImage;
        $thumbImage = Image::make($thumbImage)->save($thumbPath);
        // dd($request,$image);
        return menu::create([
            'nama'=> $request['nama'],
            'kategori'=>$request['kategori'],
            'harga'=>$request['harga'],
           'image'=>$request['image'],
            'created_at' => date("Y-m-d H:i:s"),
           'updated_at' => date("Y-m-d H:i:s")
        ]);


        // dd($request);
//         $inputan = [
//             'nama'=> $request['nama'],
//             'kategori'=>$request['kategori'],
//             'harga'=>$request['harga'],
//            'image'=>$request['image'],
//             'created_at' => date("Y-m-d H:i:s"),
//            'updated_at' => date("Y-m-d H:i:s")
// ];

//         $inputan= DB::table('menu')->insert();

        // $id_users = DB::table('users')->where('name', $request['name'])->value('id');
        // $id_menu = DB::table('menu')->where('nama',$request['nama'])->value('id_menu');
        // $datasave = [
        //     'id'=>$id_users,
        //     'id_menu'=>$id_menu,
        // ];

        // DB::table('menu_has_user')->insert($datasave);

    return redirect()->route('menu')->with('success','Data Berhasil di Input');
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
