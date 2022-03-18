<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penguna;
use App\Models\user;
use App\Models\kasir;
use App\Models\manager;
use DB;
class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peng = DB::table('penguna')
        ->join('penguna_has_user', 'penguna.id_penguna', '=', 'penguna_has_user.id_penguna')
        ->join('users', 'penguna_has_user.id_user', '=', 'users.id')
        ->join('penguna_has_manager', 'penguna.id_penguna', '=', 'penguna_has_manager.id_penguna')
        ->join('manager', 'penguna_has_manager.id_manager', '=', 'manager.id_manager')
        ->join('penguna_has_kasir', 'penguna.id_penguna', '=', 'penguna_has_kasir.id_penguna')
        ->join('kasir', 'penguna_has_kasir.id_kasir', '=', 'kasir.id_kasir')
        ->select('users.*', 'manager.*','penguna.*','kasir.*')
        ->get();
    return view('admin/index', compact('peng'));
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
            'name'=>'required',
            'no_tlp'=>'required',
            'level'=>'required',
            'status'=>'required',
            'email'=>'required',
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $image = $request->file('image');
        $nameImage = $request->file('image')->getClientOriginalName();
        $thumbImage = Image::make($image->getRealPath())->resize(85, 85);
        $thumbPath = public_path() . '/image/' . $nameImage;
        $thumbImage = Image::make($thumbImage)->save($thumbPath);
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $user->assignRole('penguna')->get();
         penguna::create([
            'name'=> $request['name'],
            'no_tlp'=>$request['no_tlp'],
            'level'=>$request['level'],
            'status'=>$request['status'],
            'email'=>$request['email'],
            
        ]);
            $id_user = DB::table('users')->where('name', $request['name'])->value('id');
            $datasave = [
                'id_penguna'=>$id_penguna,
                'id_user'=>$id,
        ];
            $insert = DB::table('penguna_has_user')->insert($datasave);    
            $id_manager = DB::table('manager')->where('manager', $request['manager'][$i])->value('id_manager');
    
            $datasave = [
                'id_penguna'=>$id_penguna,
                'id_manager'=>$id_manager,
            ];
            $insert = DB::table('penguna_has_manager')->insert($datasave);     
            $id_kasir = DB::table('kasir')->where('kasir', $request['kasir'][$i])->value('id_kasir');
            
            $datasave = [
                'id_penguna'=>$id_penguna,
                'id_kasir'=>$id_kasir,
            ];
            $insert = DB::table('penguna_has_kasir')->insert($datasave);

            return redirect()->route('admin/index')->with('success','Data Berhasil di Input');
  
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
