<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Menupesan;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use File;
use Image;

use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menu.index',[
            'datakategori'=>Kategori::all(),
            'datamenu'=>Menu::with('kategori')->latest()->get()
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
     
                'foto' => 'image|file',
                'nama_menu' => 'required',
                'kategori_id' => 'required',
                'harga' => 'required',
            ]);
              
            $image = $request->file('foto');
            $nameImage = $request->file('foto')->getClientOriginalName();
        
            $oriPath = public_path() . '/imagemenu/' . $nameImage;
            $oriImage = image::make($image)->save($oriPath);
        
                menu::create([
                'foto'=> $nameImage,
                'nama_menu'=>$request['nama_menu'],
                'kategori_id'=>$request['kategori_id'],
                'harga'=>$request['harga'],
            ]);
                //   dd($request);

            $kat = Kategori::find($request->kategori_id);
            $jml = $kat->jumlah + 1;
            $kat->update(['jumlah' => $jml]);
            activity()->log('menambah menu');
            return redirect()->route('menu.index');
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
    public function edit(request $request ,$id)
    {
        $menu= menu::find($id);
        $kategori= kategori::all();

        // dd($menu->nama_menu);
        return view ('menu/edit', compact('menu','kategori'));
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
            'nama_menu'=>'required',
            'harga'=>'required',           
            'kategori_id'=>'required',           
            'foto'=>'required',           
        ]);
 
           $ubah= menu::find($id);
           $awal=$ubah->foto;
           $sdt=[
            'nama_menu'=>$request['nama_menu'],
            'harga'=>$request['harga'],
            'kategori_id'=>$request['kategori_id'],
            'foto'=>$awal,
           ];
        //    dd($ubah);

           $request->foto->move(public_path().'/imagemenu',$awal);
           $ubah->update($sdt);
           activity()->log('update menu');
           return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idpemesan = Menupesan::where('menu_id',$id)->select('pesanan_id')->distinct()->get();
        foreach($idpemesan as $pemesan){
            Menupesan::where('pesanan_id',$pemesan->pesanan_id)->delete();
            Pesanan::destroy($pemesan->pesanan_id);
        }
        $datamenu = Menu::find($id);
        if ($datamenu->foto != "foto_menu/defaultfoto.png") {
            Storage::delete($datamenu->foto);
        }
        $kat = Kategori::find($datamenu->kategori_id);
        $jml = $kat->jumlah - 1;
        $kat->update(['jumlah' => $jml]);
        Menu::destroy($id);
        return redirect('menu.index ')->with('error', 'Tambah Menu Berhasil!!..');
    }
}
