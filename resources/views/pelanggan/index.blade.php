@extends('layouts.apps
')
@section('style')
    @include('layouts.style')
@endsection


@section('content')
<div class="black"></div>
<div class="top-bar mx-4">
</div> 
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<center><h1>CAFEEE ASEEEK ASEEKK</h1></center>
<div class="row ms-0" style="height: 84vh;">
    <div class="col-3 form-pemesan p-4">
        <div class="position-fixed text-center">
           
               
              <div class="mb-3">
              
            </div>
        </div>
    </div>
    <div class="col-9 menu-makan example">
      @foreach($dtkat as $kat)
        @if ($kat->jumlah > 0)
        <h3 class="text-center text-black">{{ $kat->nama_kategori }}</h3>
        <div class="container menu_makanan">
            @foreach($dtmenu as $menu)
              @if($menu->kategori_id == $kat->id)
              <div class="card">
                  <img src="{{ asset('imagemenu/'.$menu->foto) }}" class="card-img-top" style="width: 200px; height: 150px" alt="{{ $menu->nama_menu }}">
                  <div class="card-body makan" data-id="{{ $menu->id }}">
                    <h5 class="card-title" data-foto="{{ $menu->foto }}" >{{ $menu->nama_menu }}</h5>
                    <p class="card-text">Rp {{ $menu->harga }}</p>
                    {{-- <button class="btn btn-primary me-auto">+ Pesan</button> --}}
                    <div class="tambah_pesan">
                      <button class="btn btn-primary kurang "> - </button>
                      <input type="text" value="1" class="qty-pesan" readonly>
                      <button class="btn btn-primary tambah"> + </button>
                    </div>
                  </div>
                </div>
              @endif
            @endforeach
        </div>
        @endif
        @endforeach
    </div>
</div>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
   pesan sekarang
  </button>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">form pemesan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <form action="{{route('tampung')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <label for="">nama Pemesan</label>
          <input type="text" class="form-control" name="nama_pemesan" id="">
          <label for="meja" class="form-label text-black">Meja</label>
              @if($dtmeja)
              <select name="meja_id" class="form-select" id="meja">
                <option value="">Pilih meja</option>
                @foreach($dtmeja as $meja)
                <option value="{{ $meja->id }}">{{ $meja->no_meja }}</option>
                @endforeach
              @else  
                <input type="text" value="Sudah Penuh" disabled>
              @endif
              </select>
          <label for="menu" class="form-label text-black">menu</label>
              @if($dtmenu)
              <select name="menu_id" class="form-select" id="menu">
                <option value="">Pilih menu</option>
                @foreach($dtmenu as $menu)
                <option value="{{ $menu->id }}">{{ $menu->nama_menu }}.....RP..{{ $menu->harga }}</option>
                @endforeach
              @else  
                <input type="text" value="Sudah Penuh" disabled>
              @endif
              </select>
              <br>
              <label for="">jumblah</label>
            <input type="number" class="form-control" name="jumblah" id="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">bayar </button>
          </div>
        </div>
      </div>
    </div>
    </form>
@endsection
@section('script')
    @include('layouts.script')
    <script src="{{ asset('js/menu.js') }}"></script>
@endsection