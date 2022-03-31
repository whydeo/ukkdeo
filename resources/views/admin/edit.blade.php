@extends('layouts.dasboard')
@section('content')
<div class="container ml-2 mt-4">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>edit user</h2>
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

    <form action="{{ route('pengguna.update', $peng[0]->id_penguna) }}" method="POST" enctype="multipart/form-data">
        @csrf
         <input type="hidden" name="id_penguna" value="{{ $peng[0]->id_penguna }}">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                            <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $peng[0]->name}}" disabled>
                            <div class="form-group">
                                <label for="email">email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ $peng[0]->email}}" disabled>
                              </div>
                              <div class="form-group">
                                <label for="password">password</label>
                                <input type="text" class="form-control" name="password" id="password" value="{{ $peng[0]->password}}" disabled>
                              </div>
                            <label for="">level</label>
                              <div class="input-group mb-3">
                                  <select class="form-control" name="level" id="level" >
                                      <option value="{{ $peng[0]->level}}">{{ $peng[0]->level}}</option>

                                  </select>
                              </div>
                          </div>
                            
                                <p class="m-0">Status</p>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status1" value="aktif">
                                <label class="form-check-label p-0" for="status1">aktif</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status2" value="nonaktif">
                                <label class="form-check-label p-0" for="status2">nonaktif</label>
                                </div> <br>
                                <span class="text-danger" style="display: none">status harus dipilih</span>
                            </div>
                            
                {{-- <div class="form-group">
                          <strong>Nama :</strong>
                    <input type="text" name="name" class="form-control" placeholder="cth.deoo" value="{{ $peng[0]->name}}">
                </div>
            </div>
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
      --}}

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>

    </form>
</div>
@endsection
