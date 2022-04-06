@extends('layouts.dasboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg- col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Laporan</h4>
                    </div>
                </div>
                <form action="{{route('carimanager')}}" method="get">
                    @csrf
                    <div class="form-group row">
                        <label for="from" class=" col-sm-2">Date From:</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control input-sm w-200" id="from" name="from"  required>
                        </div>
                        <label for="to" class="col-form-label col-sm-2">Date to:</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control input-sm w-200" id="to" name="to" required>
                        </div>
                        <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search"></i>cari</button>
                        </div>
                    </div>
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


            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <form class="form" method="get" action="{{ route('caris') }}">
                        <div class="form-group w-100 mb-3">
                            <label for="search" class="d-block mr-2">Pencarian by date</label>
                            <input type="date" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan nama pegawai">
                            <button type="submit" class="btn btn-primary mb-1">Cari</button>
                        </div>
                    </form>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <form class="form" method="get" action="{{ route('carinama') }}">
                            <div class="form-group w-100 mb-3">
                                <label for="search" class="d-block mr-2">Pencarian by named</label>
                                <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan nama pegawai">
                                <button type="submit" class="btn btn-primary mb-1">Cari</button>
                            </div>
                    </form>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
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
                                    {{-- @isset($search) --}}
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
                                       {{-- <a href="createkasir" class="btn btn-warning">Pesan</a>  --}}
                                    </td>
                                    </tr>
                                    @endforeach
                                </table>
                                    {{-- @endisset --}}
                                    <tr>
                                  </tr>
                                  <br>
                                  <tr>
                                      <td>total pemasukan hari ini RP: {{$output}}</td>
                                  </tr>
                                  <br>
                                  <tr>
                                      <td>total pemasukan bulan ini RP: {{$outpat}}</td>
                                  </tr>



                            </div>
        </div>
            </div>
               </div>
</div>
@endsection
