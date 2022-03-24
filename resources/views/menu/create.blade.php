@extends('layouts.dasboard')
@section('content')
<div class="container">

    <div class="col col-lg-12 col-md-10">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Form Produk</h3>
          <div class="card-tools">
            <a href="{{ route('menu') }}" class="btn btn-sm btn-danger">
              Tutup
            </a>
          </div>
        </div>
        <div class="card-body">
          @if(count($errors) > 0)
          @foreach($errors->all() as $error)
              <div class="alert alert-warning">{{ $error }}</div>
          @endforeach
          @endif
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
          <form action="{{ route('store') }}" method="post"  enctype="multipart/form-data">

            @csrf
            <div class="form-group">
              <label for="kategori">Kategori Produk</label>
              <select name="kategori" id="kategori" class="form-control">
                <option value="makanan">Makanan</option>
                <option value="minuman">Minuman</option>
                {{-- @foreach($menukat as $kategori)
                <option value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}</option>
                @endforeach --}}
              </select>
            </div>
      
            <div class="form-group">
              <label for="nama">Nama menu</label>
              <input type="text" name="nama" id="nama" class="form-control">
            </div>
            {{-- <div class="form-group">
              <label for="deskripsi_produk">Deskripsi</label>
              <textarea name="deskripsi_produk" id="deskripsi_produk" cols="30" rows="5" class="form-control"></textarea>
            </div> --}}
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="text" name="harga" id="harga" class="form-control">
            </div>
            <div class="form-group">
              <label for="image">image</label>
              <input type="file" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="image" placeholder="no telepon">
            </div>
              {{-- <label for="">image</label>
            <div class="input-group mb-3">
                <input type="file" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="image" placeholder="no telepon">
            </div> --}}
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-warning">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
