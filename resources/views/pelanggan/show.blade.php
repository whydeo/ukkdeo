@extends('layouts.dasboard')

@section('style')
    @include('admin.style')
    <style>
       #foto_menu,#foto_menu_up{
        opacity: 1;
        position: static;
      }
    </style>
@endsection

@section('content')
      <div class="panel-header panel-header-sm">
        </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Data Transaksi</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table ">
                    <thead class=" text-primary">
                      <th>nama pemesan </th>
                      <th>menu</th>
                      <th>harga</th>
                      <th>jumlah pesan</th>
                      <th>no meja</th>
                      <th>total pemesanan</th>
                      <th>total bayar</th>
                      <th>kembalian</th>
                      <th>nama pegawai</th>
                      <th>waktu pemesanan</th>


                    </thead>
                    <tbody>
                      @foreach($datapesan as $data)
                      <tr>
                    @if (auth()->user()->name == $data->nama_pegawai )
                      <td>{{$data->nama_pemesan}}</td>
                      <td>{{$data->nama_menu}}</td>
                      <td>{{$data->harga}}</td>
                      <td>{{$data->jumblah}}</td>
                      <td>{{$data->meja}}</td>
                      <td>{{$data->total_beli}}</td>
                      <td>{{$data->total_bayar}}</td>
                      <td>{{$data->kembalian}}</td>
                      <td>{{$data->nama_pegawai}}</td>
                      <td>{{$data->created_at}}</td>
                      </tr>
                    @endif
                      @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>
      {{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="title-modal">Edit Kategori</h5>
                <button type="button" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div> --}}

      @endsection
      @section('script')
        @include('admin.script')
        <script src="{{ asset('js/admin/menu.js') }}"></script>

      @endsection
