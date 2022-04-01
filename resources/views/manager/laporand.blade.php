@extends('layouts.dasboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Laporan</h4>
                    </div>
                </div>
                <form action="{{route('caris')}}" method="get">
                  @csrf
                  <input type="date" placeholder="Cari Tanggal" name="search" class="form-control w-25 d-inline">
                  <button type="submit" class="btn btn-primary mb-1">Cari</button>
                </form>  
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
        <p>{{ $message }}</p>
        </div>
        @endif
        @if ($message = Session::get('error'))
        <div class="alert alert-danger">
        <p>{{ $message }}</p>
        </div>
        @endif

               <div class="container">
                    <div class="container-fluid">
                            <div class="row">
                                <table class="table table-hover table-bordered">
                                    <tr><th>No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Nama Menu</th>
                                        <th>Jumlah</th>
                                        <th>Total Harga</th>
                                        <th>Nama Pegawai</th>
                                        <th>Tanggal</th>
                                    </tr>
                                    @foreach($data as $key=> $u)
                                    <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$u->nama_pemesan}}</td>
                                    <td>{{$u->nama_menu}}</td>
                                    <td>{{$u->jumblah}}</td>
                                    <td>{{$u->total_beli}}</td>
                                    <td>{{$u->nama_pegawai}}</td>
                                    <td>
                                        {{$u->created_at}}
                                    </td>
                                    </tr>
                                    @endforeach 
                                </table>
                            </div>
        </div>
            </div>
               </div>
</div>
@endsection
