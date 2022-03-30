@extends('layouts.dasboard')

@section('style')
    @include('admin.style')
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
              <div class="card-header">
                <h4 class="card-title">Data Pesanan</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Nama
                      </th>
                      <th>
                        No. Meja
                      </th>
                      <th>
                        Tanggal pesan
                      </th>
                      <th>
                        Pesanan
                      </th>
                      <th>
                        Total
                      </th>
                      <th class="text-center">
                        Aksi
                      </th>
                    </thead>
                    <tbody>
                      @foreach($dtpesan as $pesan)
                      <tr>
                        <td>{{ $pesan->nama_pemesan }}</td>
                        <td>
                          {{ $pesan->meja->no_meja }}
                        </td>
                        <td>{{ $pesan->tgl_pesan }}</td>
                        <td>
                          @foreach($pesan->menupesan as $order)
                          {{ $order->menu->nama_menu }}(x{{ $order->qty }})
                          <br>
                          @endforeach
                        </td>
                        <td>Rp {{ $pesan->Total }}</td>
                        <td>
                          <form class="hapus-pesan" data-id="{{$pesan->id}}" data-nama="{{$pesan->nama_pemesan}}">
                            @csrf
                            <button class="btn btn-sm btn-danger">Hapus</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>
     
      @endsection
      @section('script')
        @include('admin.script')
        <script src="{{ asset('js/admin/pesanan.js') }}"></script>
      @endsection