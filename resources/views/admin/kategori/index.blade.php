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
              <div class="card-header d-flex justify-content-between">
                <h4 class="card-title ">Data Kategori</h4>
                <button class="btn btn-primary" id="btn-Tambah-kategori" data-toggle="modal" data-target="#exampleModalCenter"> <i class="fas fa-plus"></i> Tambah Kategori</button>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Nama
                      </th>
                      <th class="text-center">
                        Jumlah Menu
                      </th>
                      <th class="text-center">
                        Aksi
                      </th>
                    </thead>
                    <tbody>
                      @foreach($datakategori as $kategori)
                      <tr>
                        <td style="display: none">{{ $kategori->id }}</td>
                        <td>
                          {{ $kategori->nama_kategori }}
                        </td>
                        <td align="center">
                          {{ $kategori->jumlah }}
                        </td>
                        <td align="center" class="d-flex justify-content-center ">
                            <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                                Edit
                              </a>
                          {{-- <form class="hapus-kategori" action="{{ route('destroy', $kategori->id) }}"method="DELETE" >
                            @csrf
                            {{ method_field('delete') }}
                            <button class="btn btn-sm btn-danger" type="submit">hapus</button>
                          </form> --}}
                          {{-- <form action="{{ route('destroy', $produk->id_menu) }}" method="DELETE" style="display:inline;">
                              @csrf
                              {{ method_field('delete') }}
                              <button type="submit" class="btn btn-sm btn-danger mb-2">
                                Hapus
                              </button>                    
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
            <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="title-modal">Edit Kategori</h5>
              <button type="button" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <form action="{{route('kategori.store')}}" method="POST">
                       @csrf
            <div class="modal-body">
              <input type="hidden" id="idkategori">
                <div class="form-group">
                  <label for="nama_kategori">Nama Kategori</label>
                  <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="masukkan nama kategori.. ">
                  <span class="text-danger errornama" style="display: none">Nama Kategori harus diisi</span>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary tutup-modal" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>

          </div>
        </div>
      </div>


      
      @endsection
      @section('script')
        @include('admin.script')
        <script src="{{ asset('js/admin/kategori.js') }}"></script>

      @endsection
