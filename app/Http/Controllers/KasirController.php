<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Http\Requests\StorePesananRequest;
use App\Http\Requests\UpdatePesananRequest;
use App\Models\Kategori;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\Menupesan;
use App\Models\order;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
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

    public function create(request $request)
    {
        return view('pelanggan.order',[
            'order'=>order::with('meja','menu')->latest()->get()
        ]);
    }
    public function order(request $request)
    {

        // $id = auth()->user()->id;

        //  dd($id);

        $request->validate([
            'nama_pemesan' =>'required',
            'meja_id' =>'required',
            'menu_id' =>'required',
            'jumblah' =>'required',
        ]);
         order::create([
            'nama_pemesan'=>$request['nama_pemesan'],
            'id_meja'=>$request['meja_id'],
            'id_menu'=>$request['menu_id'],
            'jumblah'=>$request['jumblah'],
         ]);
         return redirect()->route('kasir.create');
    }


    public function tampung(Request $datapesan){
        //   dd($datapesan);
       $datapesan->validate([
            'nama_pemesan' =>'required',
            'meja_id' =>'required',
            'menu_id' =>'required',
            'jumblah' =>'required',
        ]);
        
       
        $ambil = DB::table('menu')->where('id', $datapesan->menu_id)->get();
        $meja =DB::table('mejas')->where('id',$datapesan->meja_id)->get();
        // dd($semuamenu,$meja,$datapesan);
        return view ('pelanggan.create', compact('datapesan','ambil','meja')); 

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
        activity()->log('kasir melakukan transaksi');

        $print = $request;
            $auth =$email;
            $date = date('Y-m-d H:i');
            // dd($print);q cv
        // return redirect()->route('cetak'.$request);
            return view('pesan.print', compact('print','email','date'));
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

    public function bayar()
    {
        
        $user = DB::table('orders')->get();

        
        foreach ($user as $u) {
            $date = [$u->id_menu];
            foreach ($date as $d) {
                echo $d;
                $a =  DB::table('orders')->where('id', $d)->get();
                echo $a;

            }
        }
        dd($date);
        $harga_menu = DB::table('menu')->where('id', $user->id_menu)->value('harga');

        $data=[];
        $dati=[];
        foreach($user as $entry){
            $data=$entry->nama_pemesan;
            $dati=$entry->menu->harga;
        }
        


        return view('pelanggan.order',[
            'order'=>order::with('meja','menu')->latest()->get()
        ]);
    }
}
