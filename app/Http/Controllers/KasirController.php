<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Http\Requests\StorePesananRequest;
use App\Http\Requests\UpdatePesananRequest;
use App\Models\Kategori;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\Menupesan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use DB;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pelanggan.index',[
            'dtmeja' => Meja::where('status','=','Tersedia')->get(),
            'dtmenu' => Menu::all(),
            'dtkat'=>Kategori::all()
        ]);
    }

    public function create()
    {
         
    }
    public function tampung(Request $datapesan){
       $datapesan->validate([
            'nama_pemesan' =>'required',
            'meja_id' =>'required',
            'menu_id' =>'required',
            'jumblah' =>'required',
        ]);

        // dd($datapesan);
        $menu = DB::table('menu')->where('id', $datapesan->menu_id)->get();
        $meja =DB::table('mejas')->where('id',$datapesan->meja_id)->get();
        // dd($menu,$meja);
        return view ('pelanggan.create', compact('datapesan','menu','meja')); 

    }
    
 
    public function store(Request $request)
    {
       $email= auth()->user()->name;
        //  dd($email);
        $request->validate([
            'nama_pemesan' =>'required',
            'harga' =>'required',
            'nama_menu' =>'required',
            'jumblah' =>'required',
            'meja' =>'required',
            'total_beli' =>'required',
            'total_bayar' =>'required',
            'kembalian' =>'required',
            
        ]);
        Pesanan::create([
            'nama_pemesan'=>$request['nama_pemesan'],
            'harga'=>$request['harga'],
            'nama_menu'=>$request['nama_menu'],
            'jumblah'=>$request['jumblah'],
            'meja'=>$request['meja'],
            'total_beli'=>$request['total_beli'],
            'total_bayar'=>$request['total_bayar'],
            'kembalian'=>$request['kembalian'],
            'nama_pegawai'=>$email,
        ]);
        Meja::find($request->meja_id)->update(['status' => 'Tidak Tersedia']);

        return redirect()->route('kasir.index')->with('success',' transaksi Berhasil di Input');
    }

    public function cetak($id){
        $datapemesan = pesanan::find($id);
        dd($datapemesan);
        return view('pelanggan/cetakpesanan',compact('datapemesan'));
    }
    public function show(Pesanan $pesanan)
    {
      
    }
        public function datatrans()
        {
            $datapesan=pesanan::get();
            return view ('pelanggan.show', compact('datapesan')); 
        }
  
    public function edit(Pesanan $pesanan)
    {
        //
    }

   
    
    public function destroy(Pesanan $pesanan)
    {
        //
    }
}
