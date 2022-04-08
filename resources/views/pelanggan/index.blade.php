@extends('layouts.dasboard
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
<center>
    <h1 style="font-family: Lucida Handwriting">Cafe 2y1le</h1>
</center>

            <div class="container">
            <div class="card">
            <div class="card-header">
            <div class="card-body">
            <form action="{{route('order')}}" method="POST" enctype="multipart/form-data">
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
                    <div>
                        <select name="menu_id" id="" class="form-control">
                            <option>pilih menu</option>
                            @foreach ($dtmenu as $menu)


                            <option value="{{$menu->id}}">{{$menu->nama_menu}} =RP ..{{$menu->harga}}</option>
                            {{-- <input type="checkbox" name="menu_id[]" value="{{$menu->id}}">
                            <label for="menu_id"> {{$menu->nama_menu}}</label><br>
                            <input type="number" class="form-control" name="jumblah[]" placeholder="masukan jumlah menu"> --}}

                            @endforeach
                        </select>
                    </div>
                    @else
                    <input type="text" value="Sudah Penuh" disabled>
                    @endif
                    </select>
                    <br>
                    <label for="">jumblah</label>
                    <input type="number" class="form-control" name="jumblah" id="">
                </div>
            </div>
            </div>
            </div>
            </div>
                <div class="modal-footer">
                    <button type="submit" value="submit" class="btn btn-primary">Pesan </button>
                    <a class="btn btn-success" href="{{route('kasir.create')}}">balik ke pesanan</a>

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
