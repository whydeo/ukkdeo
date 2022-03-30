@extends('layouts.dasboard')

@section('content')
<div class="container ml-2 mt-4">
    <div class="row">
        <div class="col-lg-2 margin-tb">
            <div class="pull-left">
                <h2>bayarr yuk</h2>
            </div>
            <div class="pull-right mt-4 mb-2">
                <a class="btn btn-primary" href="{{ route('kasir.index') }}">batalkan pesanan</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Maaf</strong> Data yang anda inputkan bermasalah.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('kasir.store', $datapesan->id)}}" method="POST" enctype="multipart/form-data">
@csrf
    
        <div class="row">
                <input type="hidden" name="id" value="{{$datapesan->id}}">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Nama pemesan :</strong>
                    <input type="text" name="nama_pemesan" class="form-control" value="{{$datapesan->nama_pemesan}}" disabled>
                    <input type="hidden" name="nama_pemesan" class="form-control" value="{{$datapesan->nama_pemesan}}" >
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
              <div class="form-group">
                  <strong>harga :</strong>
                  <input type="number" name="harga" class="form-control" id="harga" value="{{ $menu[0]->harga}}" disabled>
                  <input type="hidden" name="harga" class="form-control" id="harga" value="{{ $menu[0]->harga}}" >
                  <input type="hidden" name="nama_menu" class="form-control"  value="{{ $menu[0]->nama_menu}}" >
              </div>
          </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>jumlah pesanan :</strong>
                    <input type="number" name="jumblah" class="form-control" id="jumlah" value="{{ $datapesan->jumblah}}" >
                    <input type="hidden" name="jumblah" class="form-control" id="jumlah" value="{{ $datapesan->jumblah}}" >
                </div>
            </div>
  
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>meja :</strong>
                    <input type="number" name="meja" class="form-control"  value="{{ $meja[0]->no_meja}}" disabled>
                    <input type="hidden" name="meja" class="form-control"  value="{{ $meja[0]->no_meja}}" >
                    <input type="hidden" name="meja_id" class="form-control"  value="{{ $meja[0]->id}}" >
                </div>
            </div>
                  
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Total </strong>
                    <input type="number" id="total" name="total_beli"  class="form-control" >
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Total bayar</strong>
                    <input type="number" name="total_bayar" id="total_bayar" class="form-control"  >
                </div>
            </div>
                  
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Kembalian</strong>
                    <input type="number" id="kembalian" name="kembalian" class="form-control"  >
                </div>
            </div>
                  
            <br>
            <br>
            <br>
            <br>
           
            <center>
                <button type="submit" class="btn btn-primary">bayar</button>
            <a href="{{route('cetak',$datapesan->id)}}" class="btn btn-sm btn-success mb4">cetakk</a>            </center>
           
        </div>

    </form>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#jumlah, #harga").hover(function() {
            var harga  = $("#harga").val();
            var jumlah = $("#jumlah").val();
            var total = parseInt(harga) * parseInt(jumlah);
            $("#total").val(total);
        });
        $("#total, #total_bayar").change('input',function() {
          var total_bayar = $("#total_bayar").val();
            var total  = $("#total").val();
            var kembalian = parseInt(total_bayar) - parseInt(total);
            if(kembalian < 0){
              alert('uang anda kurang');
            }
            
            $("#kembalian").val(kembalian);
        });
    }); 
</script>
@endsection
