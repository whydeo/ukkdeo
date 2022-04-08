@extends('layouts.dasboard')

@section('style')
@include('admin.style')
<style>
    #foto_menu,
    #foto_menu_up {
        opacity: 1;
        position: static;
    }

</style>
@endsection

@section('content')
<!-- End Navbar -->
{{-- <div class="panel-header panel-header-lg">
        <canvas id="bigDashboardChart"></canvas>
      </div> --}}
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Data Menu</h4>
                    <a class="btn btn-success" href="{{route('kasir.index')}}">tambah pesanan</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="text-primary">
                                <th>nama pemesan</th>
                                <th>menu</th>
                                <th>
                                    harga
                                </th>
                                <th>
                                    nomor meja
                                </th>
                                <th class="text-center">
                                   jumlah
                                </th>
                            </thead>
                            <tbody>
                                @foreach($order as $key=>$item)
                                <tr>
                                    <td style="display: none">{{ $item->id }}</td>
                                  
                                    <td>{{ $item->nama_pemesan }}</td>
                                    <td>{{ $item->menu->nama_menu }}</td>
                                    <td>Rp {{ $item->menu->harga }}</td>
                                    <td>{{ $item->meja->no_meja }}</td>
                                    <td>{{ $item->jumblah }}</td>
                                  
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <form action="/kasir/create" method="post">
                        {{ csrf_field() }}
                        <input class="btn btn-danger" type="submit" value="check-out">
                    </form>
                    <a class="btn btn-success text-white" href="{{ route('bayar')}}">bayar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
                @endsection
                @section('script')
                @include('admin.script')
                <script src="{{ asset('js/admin/menu.js') }}"></script>

                @endsection
