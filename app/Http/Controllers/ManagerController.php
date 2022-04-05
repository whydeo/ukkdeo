<?php

namespace App\Http\Controllers;
use app\models\user;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manager.index',[
            'data_pesan' => Pesanan::all()->count(),
            'data_meja' => Meja::all()->count(),
            'data_menu' => Menu::all()->count(),
            'data_kategori'=>Kategori::all()->count()
        ]);
    }

    public function laporantrans()
    {
       $datahri = DB::table('pesanans')
                ->select(DB::raw('SUM(total_beli) as total_beli'))
                ->havingRaw('SUM(total_beli) > ?', [0])
                ->get();
        $data=pesanan::paginate(10);
    
        return view ('manager.laporan', compact('data','datahri')); 
    }

 
    public function laporandapat(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $data = pesanan::whereBetween('created_at',array($from, $to))->paginate(10);
        // dd($data);
        return view('manager.laporandapat', compact('data'));
    }
    public function cari(Request $request){
        $from = $request->from;
        $to = $request->to;
        $data = pesanan::whereBetween('created_at',array($from, $to))->paginate(10);

        return view('manager.laporan', compact('data'));
        
    }
    public function search(Request $request)
    {
        $keyword = $request->search;
        $data = pesanan::where('nama_pegawai', 'like', "%" . $keyword . "%")->paginate(5);
        return view('manager.laporan', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function caris(Request $request)
    {
        $keyword = $request->search;
        $data = pesanan::where('created_at', 'like', "%" . $keyword . "%")->paginate(5);
        return view('manager.laporan', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function log()
    {
        $user= User::select()->count();
        // $menu= menu::select()->count();
        // $meja= meja::select()->count();
        // $kategori= kategori::select()->count();
        $pesanan= pesanan::select()->count();
        // $penguna= penguna::select()->count();
        $activity_log= ActivityLog::with('user')->limit(10)->orderBy('id','DESC')->get();
        return view('manager/laporand',compact('user','pesanan','activity_log'));

        // return view('manager.laporan', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        
    }

 
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
