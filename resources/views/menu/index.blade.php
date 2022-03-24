@extends('layouts.dasboard')
@section('content')
<div class="container-fluid">
  <!-- table produk -->
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Produk</h4>
          <div class="card-tools">
            <a href="{{ route('create') }}" class="btn btn-sm btn-primary">
              Baru
            </a>
          </div>
        </div>
        <div class="card-body">
          <form action="#">
            <div class="row">
              <div class="col">
                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="ketik keyword disini">
              </div>
              <div class="col-auto">
                <button class="btn btn-primary">
                  Cari
                </button>
              </div>
            </div>
          </form>
        </div>
        <div class="card-body">
          @if ($message = Session::get('error'))
              <div class="alert alert-warning">
                  <p>{{ $message }}</p>
              </div>
          @endif
          @if ($message = Session::get('success'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
          @endif
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                 
                  <th>Gambar</th>
                  <th>Nama</th>
                  <th>kategori</th>
                  <th>Harga</th>
                  <th>aksi</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($menu as $produk)
                <tr>
             
                  <td>
                    <img src="{{ asset('imagemenu') }}/{{$produk->image}}" width="auto" alt="{{ $produk->image }}">
                    </div>
                  </div>
                  </td>
               
                  <td>
                  {{ $produk->nama}}
                  </td>
  
                  <td>
                    {{ $produk->kategori}}
                    </td>
  
                  <td>
                  {{ number_format($produk->harga, 2) }}
                  </td>
                 
                  <td>
                     <a href="{{ route('show', $produk->id_menu) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                      Detail
                    </a>
                    <a href="{{ route('edit', $produk->id_menu) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                      Edit
                    </a>
                    <form action="{{ route('destroy', $produk->id_menu) }}" method="DELETE" style="display:inline;">
                      @csrf
                      {{ method_field('delete') }}
                      <button type="submit" class="btn btn-sm btn-danger mb-2">
                        Hapus
                      </button>                    
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $menu->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection