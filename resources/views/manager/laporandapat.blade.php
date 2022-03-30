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
                <form action="{{route('laporandapat')}}" method="get">
                    @csrf
                    <div class="form-group row">
                        <label for="from" class="col-form-label col-sm-2">Date From:</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control input-sm w-100" id="from" name="from"  required>
                        </div>
                        <label for="to" class="col-form-label col-sm-2">Date to:</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control input-sm w-100" id="to" name="to" required>
                        </div>
                        <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary mb-1"><i class="fa fa-search"></i>search</button>
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
                <div class="container-fluid">
                    <div class="row">
                        <table class="table table-hover table-bordered">
                            <tr>
                                <th>Total pendapatan</th>
                                <th>Tanggal</th>
                            </tr>
                            @foreach($data as $u)
                            <tr>
                            <td>{{$u->total_beli}}</td>
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

