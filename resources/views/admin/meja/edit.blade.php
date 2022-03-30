@extends('layouts.dasboard')

@section('content')
<div class="container ml-2 mt-4">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tambah Data</h2>
            </div>
            <div class="pull-right mt-4 mb-2">
                <a class="btn btn-primary" href="{{ route('meja.index') }}">Kembali</a>
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

    <form action="{{ route('meja.update', $meja->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <input type="hidden" name="id" value="{{ $meja->id }}">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>No meja :</strong>
                    <input type="text" name="no_meja" class="form-control" placeholder="cth.kopi" value="{{ $meja->no_meja}}" disabled>
                </div>
            </div>
                  
        </div>
        <p class="m-0">Status</p>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="status" id="status1" value="Tidak Tersedia">
          <label class="form-check-label p-0" for="status1">Tidak Tersedia</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="status" id="status2" value="Tersedia">
          <label class="form-check-label p-0" for="status2">Tersedia</label>
        </div> <br>
        <span class="text-danger" style="display: none">status harus dipilih</span>
    </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>

    </form>
</div>
@endsection
