<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penguna;
use App\Models\user;
use App\Models\kasir;
use App\Models\manager;
use DB;
use Illuminate\Support\Facades\Hash;

use Intervention\Image\Facades\Image;
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
        ->join('manager','penguna_has_manager.id_manager', '=', 'manager.id_manager')
        ->join('penguna_has_kasir', 'penguna.id_penguna', '=', 'penguna_has_kasir.id_penguna')
        ->join('kasir', 'penguna_has_kasir.id_kasir', '=', 'kasir.id_kasir')
        ->select('users.*', 'manager.*','penguna.*','kasir.*')
        ->get();

        $pengguna = DB::table('penguna')->get();

    return view('admin/index',['peng' => $pengguna]);
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
            'image'=>'required',
        ]);

        $image = $request->file('image');
        $nameImage = $request->file('image')->getClientOriginalName();
        $thumbImage = image::make($image->getRealPath())->resize(85, 85);
        $thumbPath = public_path() . '/image/' . $nameImage;
        $thumbImage = Image::make($thumbImage)->save($thumbPath);
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
            'image'=>$request['image'],
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
                    'image'=>$request['image'],
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

                $id_kasir = DB::table('kasir')->where('level', $request['level'])->value('id_kasir');


               $datasave = [
                'id_penguna'=>$id_penguna,
                'id_kasir'=>$id_kasir,
            ];


            $inputan = [
                'name'=> $request['name'],
                'notlp'=>$request['no_tlp'],
                'level'=>$request['level'],
                'status'=>$request['status'],
                'image'=>$request['image'],
                'email'=>$request['email'],
                'password'=>$request['password'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ];


            DB::table('penguna_has_kasir')->insert($datasave);
            DB::table('kasir')->insert($inputan);

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
    public function edit($pengguna)
    {
// dd($pengguna);
        $pengguna= DB::table('penguna')->where('id_penguna', $pengguna)->get();

        return view('admin/edit', ['pengguna'=>$pengguna]);


    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'no_tlp'=>'required',
            'level'=>'required',
            'status'=>'required',
            'email'=>'required',
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);



        $nama_kasir= DB::table('kasir')->where('id_kasir', $id)->value('name');
        $nama_manager= DB::table('manager')->where('id_manager',$id)->value('name');
        // $nama_admin=DB::table('admin')->where('id_admin',$id)->value('name');


        DB::table('penguna')->where('id_penguna', $id )->update([
            'name' => $request->name,
            'no_tlp' => $request->no_tlp,
            'level' => $request->level,
            'status' => $request->status,
            'email' => $request->email,
            'password' => $request->password,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);


        if ($request['level'] == 'level') {

            DB::table('user')->where('id',$id)->update([
                'name'=>$request->name,
                'password'=>$request->password,
                'email' => $request->email,
                'level'=>$request->level,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);

        } elseif ($request['level']=='manager') {

            $level = DB::table('manager')->where('id_manager', $id)->value('name');


            if($level == $request->name){
                DB::table('manager')->where('id_manager',$id)->update([
                    'name' => $request->name,
                    'notlp' => $request->no_tlp,
                    'level' => $request->level,
                    'status' => $request->status,
                    'email' => $request->email,
                    'password' => $request->password,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ]);
            } else {
                // dd($id);
                DB::table('manager')->where('id_manager', $id)->delete();

                DB::table('kasir')->insert([
                    'name' => $request->name,
                    'notlp' => $request->no_tlp,
                    'level' => $request->level,
                    'status' => $request->status,
                    'email' => $request->email,
                    'image' => $request->email,
                    'password' => $request->password,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ]);
            }


        }
        elseif ($request['level']=='kasir') {
            DB::table('kasir')->where('id_kasir',$id)->update([
                    'name'=> $request['name'],
                    'notlp'=>$request['no_tlp'],
                    'level'=>$request['level'],
                    'status'=>$request['status'],
                    'email'=>$request['email'],
                    'password'=>$request['password'],
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
            ]);


        }



 return redirect()->route('pengguna.index')->with('success', "Data pengguna berhasil di update");
        // return redirect('admin/index');
    }


    public function destroy($id)
    {
        //
    }
}
