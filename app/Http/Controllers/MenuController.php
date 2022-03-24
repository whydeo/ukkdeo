<?php

namespace App\Http\Controllers;
use App\Models\transaksi;
use App\Models\user;
use App\Models\menu;
use App\Models\Kategori;
use DB;
use Illuminate\Pagination\Paginator;
// use Intervention\Image\Facades\Image;
use File;
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
        // ->join('menu_has_kategori', 'menu.id_menu', '=', 'menu_has_kategori.id_menu')
        // ->join('kategori','menu_has_kategori.id_kategori', '=', 'kategori.id_kategori')
        ->select('users.name','menu.*')
        ->paginate(1);

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

          $request->validate([
            'nama'=>'required',
            'harga'=>'required',
            'image'=>'required',
        ]);



       
        $file           = $request->file('image');
        $nama_file      = $file->getClientOriginalName();
        $file->move('imagemenu',$file->getClientOriginalName());
         menu::create([
            'nama'=> $request['nama'],
            'kategori'=>$request['kategori'],
            'harga'=>$request['harga'],
           'image'=>$nama_file,
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



        $user =auth()->user()->id;
        $id_menu = DB::table('menu')->where('nama',$request['nama'])->value('id_menu');
        $datasave = [
            'id_user'=>$user,
            'id_menu'=>$id_menu,
        ];
        DB::table('menu_has_user')->insert($datasave);

      
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
        $menu= menu::find($id);
        return view ('menu/show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu= menu::find($id);
        return view ('menu/edit', compact('menu'));
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
        $request->validate([
            'nama'=>'required',
            'kategori'=>'required',
            'harga'=>'required',
            'image'=>'required',
           
        ]);
        DB::table('menu')->where('id_menu', $id )->update([
            'nama'=> $request['nama'],
            'kategori'=>$request['kategori'],
            'harga'=>$request['harga'],
           'image'=>$request['image'],
        ]);
        return redirect()->route('menu')->with('success', "Data pengguna berhasil di update");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('menu')->where('id_menu', $id)->delete();
        return redirect()->route('menu')->with('success', "menu berhasil dihapus");
    }
}
