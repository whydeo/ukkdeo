<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function showpesan()
    {
        return view('admin.pesanan.index',[
            'dtpesan' => Pesanan::with('meja','menupesan')->latest()->get(),
        ]);
    }
    
    public function hapuspesan($id){
        Pesanan::destroy($id);
        return redirect('/admin/datapesan');
    }
}
