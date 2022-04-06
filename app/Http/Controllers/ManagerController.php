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

        $data = pesanan::select([
            DB::raw('sum(total_beli) as `sum`'), 
            DB::raw('DATE(created_at) as day')
            ])->groupBy('day')
            ->where('created_at', '>=', Carbon::now()->subWeeks(1))
            ->get();    
        $output = [];
        foreach($data as $entry) {
            $output= $entry->sum;
        }
        $datass = pesanan::select([
            DB::raw('sum(total_beli) as `sum`'), 
            DB::raw(' MONTH(created_at) month')
            ])->groupBy('month')
            ->where('created_at', '>=',Carbon::now()->subMonth())
            ->get();    
        $outpat = [];
        foreach($datass as $entry) {
            $outpat= $entry->sum;
        }
        // dd($outpat);
        
        $data=pesanan::paginate(10);


        return view ('manager.laporan', compact('data','output','outpat'));
    }


    public function laporandapat(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $data = pesanan::whereBetween('created_at',array($from, $to))->paginate(10);
     
        return view('manager.laporandapat', compact('data'));
    }
    public function cari(Request $request){

        $data = pesanan::select([
            DB::raw('sum(total_beli) as `sum`'), 
            DB::raw('DATE(created_at) as day')
            ])->groupBy('day')
            ->where('created_at', '>=', Carbon::now()->subWeeks(1))
            ->get();    
        $output = [];
        foreach($data as $entry) {
            $output= $entry->sum;
        }
        $datass = pesanan::select([
            DB::raw('sum(total_beli) as `sum`'), 
            DB::raw(' MONTH(created_at) month')
            ])->groupBy('month')
            ->where('created_at', '>=',Carbon::now()->subMonth())
            ->get();    
        $outpat = [];
        foreach($datass as $entry) {
            $outpat= $entry->sum;
        }

       
        $from = $request->from;
        $to = $request->to;
        $data = pesanan::whereBetween('created_at',array($from, $to))->paginate(10);
  
        return view('manager.laporan', compact('data' ,'output','outpat'));

    }
    public function search(Request $request)
    {

        
        $data = pesanan::select([
            DB::raw('sum(total_beli) as `sum`'), 
            DB::raw('DATE(created_at) as day')
            ])->groupBy('day')
            ->where('created_at', '>=', Carbon::now()->subWeeks(1))
            ->get();    
        $output = [];
        foreach($data as $entry) {
            $output= $entry->sum;
        }
        $datass = pesanan::select([
            DB::raw('sum(total_beli) as `sum`'), 
            DB::raw(' MONTH(created_at) month')
            ])->groupBy('month')
            ->where('created_at', '>=',Carbon::now()->subMonth())
            ->get();    
        $outpat = [];
        foreach($datass as $entry) {
            $outpat= $entry->sum;
        }

        $keyword = $request->search;
        $data = pesanan::where('nama_pegawai', 'like', "%" . $keyword . "%")->paginate(5);
     
        return view('manager.laporan', compact('data','output','outpat'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function totall(Request $request)
    {
        $keyword = $request->search;
        $data = pesanan::where('created_at', 'like', "%" . $keyword . "%")
        ->sum('total_beli');


        return view('manager.laporantotal', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function caris(Request $request)
    {
        
        $data = pesanan::select([
            DB::raw('sum(total_beli) as `sum`'), 
            DB::raw('DATE(created_at) as day')
            ])->groupBy('day')
            ->where('created_at', '>=', Carbon::now()->subWeeks(1))
            ->get();    
        $output = [];
        foreach($data as $entry) {
            $output= $entry->sum;
        }
        $datass = pesanan::select([
            DB::raw('sum(total_beli) as `sum`'), 
            DB::raw(' MONTH(created_at) month')
            ])->groupBy('month')
            ->where('created_at', '>=',Carbon::now()->subMonth())
            ->get();    
        $outpat = [];
        foreach($datass as $entry) {
            $outpat= $entry->sum;
        }

        $keyword = $request->search;
        $data = pesanan::where('created_at', 'like', "%" . $keyword . "%")->paginate(5);
  
        return view('manager.laporan', compact('data','output','outpat'))->with('i', (request()->input('page', 1) - 1) * 5);
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
