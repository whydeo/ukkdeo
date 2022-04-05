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
        // $month = request('month', date('m'));
        // dd($month);

//         $bln = DB::table('pesanans')
//         ->select('created_at', DB::raw('SUM(total_beli) as total_beli'))
//         ->where('created_at', '=', 'created_at'->format('m'))
//         ->havingRaw('SUM(total_beli) > ?', [0])
//         ->get();
// dd($bln);

    $day = DB::table('pesanans')
                ->select('created_at', DB::raw('SUM(total_beli) as total_beli'))
                ->where('created_at', '>=', date('Y-m-d-h-i-s'))
                ->havingRaw('SUM(total_beli) > ?', [0])
                ->get();
                //  dd($day);
        $data=pesanan::paginate(10);


        return view ('manager.laporan', compact('data','day'));
    }


    public function laporandapat(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $data = pesanan::whereBetween('created_at',array($from, $to))->paginate(10);
        // dd($data);
        $day = DB::table('pesanans')
                ->select('created_at', DB::raw('SUM(total_beli) as total_beli'))
                ->where('created_at', '>=', date('Y-m-d-h-i-s'))
                ->havingRaw('SUM(total_beli) > ?', [0])
                ->get();
        return view('manager.laporandapat', compact('data','day'));
    }
    public function cari(Request $request){
        $from = $request->from;
        $to = $request->to;
        $data = pesanan::whereBetween('created_at',array($from, $to))->paginate(10);
        $day = DB::table('pesanans')
                ->select('created_at', DB::raw('SUM(total_beli) as total_beli'))
                ->where('created_at', '>=', date('Y-m-d-h-i-s'))
                ->havingRaw('SUM(total_beli) > ?', [0])
                ->get();

        return view('manager.laporan', compact('data','day'));

    }
    public function search(Request $request)
    {
        $keyword = $request->search;
        $data = pesanan::where('nama_pegawai', 'like', "%" . $keyword . "%")->paginate(5);
        $day = DB::table('pesanans')
                ->select('created_at', DB::raw('SUM(total_beli) as total_beli'))
                ->where('created_at', '>=', date('Y-m-d-h-i-s'))
                ->havingRaw('SUM(total_beli) > ?', [0])
                ->get();
        return view('manager.laporan', compact('data','day'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function totall(Request $request)
    {
        $keyword = $request->search;
        $data = pesanan::where('created_at', 'like', "%" . $keyword . "%")
        ->sum('total_beli');
        // ->paginate(5);
        //   dd($keyword);

        return view('manager.laporantotal', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function caris(Request $request)
    {
        $keyword = $request->search;
        $data = pesanan::where('created_at', 'like', "%" . $keyword . "%")->paginate(5);
        $day = DB::table('pesanans')
                ->select('created_at', DB::raw('SUM(total_beli) as total_beli'))
                ->where('created_at', '>=', date('Y-m-d-h-i-s'))
                ->havingRaw('SUM(total_beli) > ?', [0])
                ->get();
        return view('manager.laporan', compact('data','day'))->with('i', (request()->input('page', 1) - 1) * 5);
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
