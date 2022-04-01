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
                <button class="btn btn-primary" id="btn-Tambah-menu" data-toggle="modal" data-target="#exampleModalCenter"> <i class="fas fa-plus"></i> Tambah menu</button>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Foto</th>
                      <th>Nama</th>
                      <th>
                        Harga
                      </th>
                      <th>
                        Kategori
                      </th>
                      <th class="text-center">
                        Aksi
                      </th>
                    </thead>
                    <tbody>
                      @foreach($datamenu as $key=>$menu)
                      <tr>
                        <td style="display: none">{{ $menu->id }}</td>
                        <td>
                            <img src="{{asset('imagemenu/'.$menu->foto)}}" alt="" style="width:100px";>

                        </td>
                        <td>{{ $menu->nama_menu }}</td>
                        <td>Rp {{ $menu->harga }}</td>
                        <td>{{ $menu->kategori->nama_kategori }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                                Edit
                              </a>
                          {{-- <form class="hapus-menu" dt-id="{{ $menu->id }}" dt-nama="{{ $menu->nama_menu }}">
                            @csrf
                            <button class="btn btn-sm btn-danger" type="submit">hapus</button>
                          </form> --}}
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
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="title-modal">Edit Kategori</h5>
                <button type="button" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <form action="{{route('menu.store')}}" method="POST" enctype="multipart/form-data">
                 @csrf
              <div class="modal-body">
                  <div class="form-group">
                      <label for="nama_menu">Nama Menu</label>
                      <input type="text" class="form-control" name="nama_menu" id="nama_menu" placeholder="masukkan nama menu.. ">
                    </div>
                    <div class="form-group">
                      <label for="harga">Harga</label>
                      <input type="number" class="form-control" name="harga" id="harga" placeholder="masukkan Harga menu.. ">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" name="kategori_id" id="kategori">
                          <option value="">Pilih kategori</option>
                          @foreach($datakategori as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                          @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                        <label for="foto ">Foto menu</label>
                        <input type="file" id="foto" name="foto">
                      </div>
                  </div>
               
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary tutup-modal" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
      @endsection
      @section('script')
        @include('admin.script')
        <script src="{{ asset('js/admin/menu.js') }}"></script>

      @endsection