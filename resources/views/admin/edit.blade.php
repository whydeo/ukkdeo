@extends('layouts.dasboard')

@section('content')
<div class="container ml-2 mt-4">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tambah Data</h2>
            </div>
            <div class="pull-right mt-4 mb-2">
                <a class="btn btn-primary" href="{{ route('pengguna.index') }}">Kembali</a>
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

    <form action="{{ route('pengguna.update', $peng[0]->model_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id_penguna" value="{{ $peng[0]->model_id }}">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                          <strong>Nama :</strong>
                    <input type="text" name="name" class="form-control" placeholder="cth.deoo" value="{{ $peng[0]->name}}">
                </div>
            </div>
                    {{--  <strong>Nama :</strong>
                    <input type="text" name="name" class="form-control" placeholder="cth.deoo" value="{{ $peng[0]->name}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>nomor telepon :</strong>
                    <input type="text" name="no_tlp" class="form-control" placeholder="cth. Televisi 4inch"value="{{ $peng[0]->no_tlp}}" >
                </div>
            </div>  --}}
              <strong for="">level</strong>
            <div class="input-group mb-3">
                <select class="form-control" name="level" id="level">
                    <option value="{{ $peng[0]->level}}">{{ $peng[0]->level}}</option>

                </select>
            </div>
        </div>
        <strong for="">status</strong>
      <div class="input-group mb-3">
          <select class="form-control" name="status" id="status">
              <option value="{{ $peng[0]->status}}">{{ $peng[0]->status}}</option>
              <option value="aktif">aktif</option>
              <option value="nonaktif">nonaktif</option>
          </select>
      </div>
            {{--  <strong for="">level</strong>
            <div class="input-group mb-3">
                <input type="level" class="form-control" value="{{ $peng[0]evel}}" name="level" placeholder="level">
            </div>
            <strong for="">status</strong>
            <div class="input-group mb-3">
                <input type="status" class="form-control" value="{{ $peng[0]tatus}}" name="status" placeholder="status">
            </div>  --}}
            {{--  <strong for="">email</strong>
            <div class="input-group mb-3">
                <input type="email" class="form-control" value="{{ $peng[0]->email}}" name="email" placeholder="email">
            </div>
            <strong for="">password </strong>
            <div class="input-group mb-3">
                <input id="password" type="text" class="form-control " name="password" placeholder="password" value="{{ $peng[0]->password}}">
            </div>
            <div class="row mb-3">
                <strong>comfirm password</strong>
                <div class="input-group mb-3">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>  --}}

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>

    </form>
</div>
@endsection