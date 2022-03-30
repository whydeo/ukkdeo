{{-- @extends('layouts.app')


@section('style')
    @include('layouts.style')
@endsection


@section('content')
<div class="black"></div>
<div class="top-bar mx-4">
  <h1 class="text-white text-center overflow-hidden">Menu Caffe</h1>
</div> 
<div class="row ms-0" style="height: 84vh;">
    <div class="col-3 form-pemesan p-4">
        <div class="position-fixed text-center">
            <div class="mb-3">  
              <label for="exampleInputEmail1" class="text-white form-label">Nama Pemesan</label>
              <input type="text" nama="nama" id="nama" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="meja" class="form-label text-white">Meja</label>
              @if($dtmeja)
              <select name="meja" class="form-select" id="meja">
                <option value="">Pilih meja</option>
                @foreach($dtmeja as $meja)
                <option value="{{ $meja->id }}">{{ $meja->no_meja }}</option>
                @endforeach
              @else  
                <input type="text" value="Sudah Penuh" disabled>
              @endif
              </select>
            </div>
        </div>
    </div>
    <div class="col-9 menu-makan example">
      @foreach($dtkat as $kat)
        @if ($kat->jumlah > 0)
        <h3 class="text-center text-white">{{ $kat->nama_kategori }}</h3>

        <div class="container menu_makanan">
            @foreach($dtmenu as $menu)
              @if($menu->kategori_id == $kat->id)
              <div class="card">
                  <img src="{{ asset('storage/'.$menu->foto) }}" class="card-img-top" style="width: 200px; height: 150px" alt="{{ $menu->nama_menu }}">
                  <div class="card-body makan" data-id="{{ $menu->id }}">
                    <h5 class="card-title" data-foto="{{ $menu->foto }}" >{{ $menu->nama_menu }}</h5>
                    <p class="card-text">Rp {{ $menu->harga }}</p>
                    <button class="btn btn-primary me-auto">+ Pesan</button>
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
<div class="bar-order">
  <button id="back" class="btn btn-warning text-white">Back</button>
    <button class="btn btn-success" id="next">Next</button>
</div>

@endsection
@section('script')
    <!-- Optional JavaScript; choose one of the two! -->
    @include('layouts.script')
    <script src="{{ asset('js/menu.js') }}"></script>
@endsection --}}