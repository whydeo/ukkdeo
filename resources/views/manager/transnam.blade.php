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
                <form class="form" method="get" action="{{ route('carinama') }}">
                        <div class="form-group w-100 mb-3">
                            <label for="search" class="d-block mr-2">Pencarian</label>
                            <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan nama pegawai">
                            <button type="submit" class="btn btn-primary mb-1">Cari</button>
                        </div>
                    </form>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                <div class="container-fluid">
                    <div class="row">
                        <table class="table table-hover table-bordered">
                            <tr>
                                <th>Nama Pelanggan</th>
                                <th>Nama Menu</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Nama Pegawai</th>
                                <th>Tanggal</th>
                            </tr>
                            @foreach($data as $u)
                            <tr>
                            <td>{{$u->nama_pemesan}}</td>
                            <td>{{$u->nama_menu}}</td>
                            <td>{{$u->jumblah}}</td>
                            <td>{{$u->total_beli}}</td>
                            <td>{{$u->nama_pegawai}}</td>
                            <td>
                                {{$u->created_at}}
                               {{-- <a href="createkasir" class="btn btn-warning">Pesan</a>  --}}
                            </td>
                            </tr>
                            @endforeach 
                        </table>
                    </div>
</div>
    </div>
</div>
@endsection
