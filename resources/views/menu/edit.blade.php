@extends('layouts.dasboard')

@section('content')
<div class="container ml-2 mt-4">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tambah Data</h2>
            </div>
            <div class="pull-right mt-4 mb-2">
                <a class="btn btn-primary" href="{{ route('menu') }}">Kembali</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Maaf</strong> Data yang anda inputkan bermasalah.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('update', $menu->id_menu) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <input type="hidden" name="id_menu" value="{{ $menu->id_menu }}">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama :</strong>
                    <input type="text" name="nama" class="form-control" placeholder="cth.kopi" value="{{ $menu->nama}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>kategori:</strong>
                    <input type="text" name="kategori" class="form-control" placeholder="cth. Televisi 4inch"value="{{ $menu  ->kategori}}" >
                </div>
            </div>
             
        </div>
  
    
            <strong for="">harga</strong>
            <div class="input-group mb-3">
                <input type="harga" class="form-control" value="{{ $menu  ->harga}}" name="harga" placeholder="harga">
            </div>
            <strong for="">image </strong>
            <div class="input-group mb-3">
                <input id="image" type="text" class="form-control " name="image" placeholder="image" value="{{ $menu  ->image}}">
            </div>
        
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>

    </form>
</div>
@endsection
