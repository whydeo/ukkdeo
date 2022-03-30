<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Menupesan;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/kategori.index',[
            'datakategori' => Kategori::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        Kategori::create($request->all());
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori= kategori::find($id);
        return view ('admin/kategori/edit', compact('kategori'));
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
            'nama_kategori'=>'required',
        ]);
       kategori::where('id',$id)->update([
        'nama_kategori'=>$request['nama_kategori'],
       ]);
       
        return redirect()->route('kategori.index')->with('success', "meja berhasil di update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idkategori)
    {
        $idmenu = Menu::where('kategori_id',$idkategori)->select('id')->get();
        foreach ($idmenu as $menu) {
            $idpemesan = Menupesan::where('menu_id',$menu->id)->select('pesanan_id')->distinct()->get();
            foreach($idpemesan as $pemesan){
                Menupesan::where('pesanan_id',$pemesan->pesanan_id)->delete();
                Pesanan::destroy($pemesan->pesanan_id);
            }
        }
        Menu::where('kategori_id',$idkategori)->delete();
        Kategori::destroy($idkategori);
        return redirect('kategori/datakategori');
    }
    
}
