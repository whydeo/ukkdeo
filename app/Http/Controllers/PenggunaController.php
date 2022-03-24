<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penguna;
use App\Models\user;
use App\Models\kasir;
use App\Models\manager;
use DB;
use Illuminate\Support\Facades\Hash;

// use Intervention\Image\Facades\Image;
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
        ->leftjoin('penguna_has_user', 'penguna.id_penguna', '=', 'penguna_has_user.id_penguna')
        ->leftjoin('users','penguna_has_user.id_user', '=', 'users.id')
        ->leftjoin('penguna_has_kasir', 'penguna.id_penguna', '=', 'penguna_has_kasir.id_penguna')
        ->leftjoin('kasir','penguna_has_kasir.id_kasir', '=', 'kasir.id_kasir')
        ->leftjoin('penguna_has_manager', 'penguna.id_penguna', '=', 'penguna_has_manager.id_penguna')
        ->leftjoin('manager','penguna_has_manager.id_manager', '=', 'manager.id_manager')
        ->select('users.id','kasir.id_kasir','penguna.*','manager.id_manager')
        ->get();
        //   dd($peng);
    return view('admin/index',['peng' => $peng]);
    }


    public function create()
    {
        return view('admin.create');    }


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
            // 'image'=>'required',
        ]);

        // $image = $request->file('image');
        // $nameImage = $request->file('image')->getClientOriginalName();
        // $thumbImage = image::make($image->getRealPath())->resize(85, 85);
        // $thumbPath = public_path() . '/image/' . $nameImage;
        // $thumbImage = Image::make($thumbImage)->save($thumbPath);
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'level' => $request['level'],
            'password' => Hash::make($request['password']),
        ]);

        $user->assignRole('admin')->get();

        penguna::create([
            'name'=> $request['name'],
            'no_tlp'=>$request['no_tlp'],
            'level'=>$request['level'],
            'status'=>$request['status'],
            // 'image'=>$request['image'],
            'email'=>$request['email'],
            'password'=>$request['password'],

        ]);

            if($request['level'] == 'level'){
                $id_user = DB::table('users')->where('name', $request['name'])->value('id');

                $id_penguna = DB::table('penguna')->where('name',$request['name'])->value('id_penguna');
                $datasave = [
                    'id_user'=>$id_user,
                    'id_penguna'=>$id_penguna,
                ];

                DB::table('penguna_has_user')->insert($datasave);

            return redirect()->route('pengguna.index')->with('success','Data Berhasil di Input');

            } elseif($request['level'] == 'manager'){

                $id_penguna = DB::table('penguna')->where('name',$request['name'])->value('id_penguna');

                $inputan = [
                    'name'=> $request['name'],
                    'notlp'=>$request['no_tlp'],
                    'level'=>$request['level'],
                    'status'=>$request['status'],
                    // 'image'=>$request['image'],
                    'email'=>$request['email'],
                    'password'=>$request['password'],
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ];
                DB::table('manager')->insert($inputan);

                $id_manager = DB::table('manager')->where('level', $request['level'])->value('id_manager');

                $datasave = [
                    'id_penguna'=>$id_penguna,
                    'id_manager'=>$id_manager,
                ];

                DB::table('penguna_has_manager')->insert($datasave);


            return redirect()->route('pengguna.index')->with('success','Data Berhasil di Input');

            } else {


                $id_penguna = DB::table('penguna')->where('name',$request['name'])->value('id_penguna');

                $inputan = [
                    'name'=> $request['name'],
                    'notlp'=>$request['no_tlp'],
                    'level'=>$request['level'],
                    'status'=>$request['status'],
                    // 'image'=>$request['image'],
                    'email'=>$request['email'],
                    'password'=>$request['password'],
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ];
                DB::table('kasir')->insert($inputan);

                $id_kasir = DB::table('kasir')->where('level', $request['level'])->value('id_kasir');

               $datasave = [
                'id_penguna'=>$id_penguna,
                'id_kasir'=>$id_kasir,
            ];




            DB::table('penguna_has_kasir')->insert($datasave);

            return redirect()->route('pengguna.index')->with('success','Data Berhasil di Input');


            }


            // managefr


            // return redirect()->route('pengguna.index')->with('success','Data Berhasil di Input');

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
    public function edit( $pe)
    {
        $peng = DB::table('penguna')
        ->leftjoin('penguna_has_user', 'penguna.id_penguna', '=', 'penguna_has_user.id_penguna')
        ->leftjoin('users','penguna_has_user.id_user', '=', 'users.id')
        ->leftjoin('penguna_has_kasir', 'penguna.id_penguna', '=', 'penguna_has_kasir.id_penguna')
        ->leftjoin('kasir','penguna_has_kasir.id_kasir', '=', 'kasir.id_kasir')
        ->leftjoin('penguna_has_manager', 'penguna.id_penguna', '=', 'penguna_has_manager.id_penguna')
        ->leftjoin('manager','penguna_has_manager.id_manager', '=', 'manager.id_manager')
        ->leftjoin('model_has_roles', 'penguna.id_penguna', '=', 'model_has_roles.model_id')
        ->leftjoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->where('model_has_roles.model_id', $pe)
        ->select('penguna.level','penguna.status','penguna.name','model_has_roles.model_id')
        ->get();
    //   dd($peng);
        return view('admin/edit',['peng' => $peng]);


    }


    public function update(Request $request, $id )
    {
      
        
     
$request->validate([
        'status'=>'required',
        'level'=>'required',
        ]);
       
        // dd($request->status);
         DB::table('penguna')->where('id_penguna',$id)->update(['status' => $request->status]);

         $deo = DB::table('penguna')->where('id_penguna',$id)->get();
         
        // dd($deo);
        
        if ($deo  == 'manager') {
            DB::table('manager')->where('id_manager',$id)->update(['status' => $deo->status]);
            dd($deo);
        } elseif ($deo == 'kasir'){
            DB::table('kasir')->where('id_kasir',$id)->update(['status' => $deo->status]);

        }
      
        
        
        // DB::table('kasir')->where('id_kasir',$id)->update([
        //     'status' => $request->status,

        // ]);
        // DB::table('manager')->where('id_manager',$id)->update([
        //     'status' => $request->status,

        // ]);


        return redirect()->route('pengguna.index')->with('success','Data Berhasil di update');

    }



    public function destroy($id)
    {
        //
    }
    }