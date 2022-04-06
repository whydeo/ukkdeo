@extends('layouts.dasboard')

@section('content')
      <div class="panel-header panel-header-sm">
        </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Data pengguna</h4>
                <button class="btn btn-primary" id="btn-Tambah-pengguna" data-toggle="modal" data-target="#exampleModalCenter"> <i class="fas fa-plus"></i> Tambah pengguna</button>

              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead class=" text-primary">
                        <th>
                            NO
                        </th>
                      <th>
                       Nama
                      </th>
                      <th class="text-center">
                        level
                      </th>
                      <th class="text-center">
                        Status
                      </th>
                      <th class="text-center">
                        Email
                      </th>
                      <th class="text-center">
                        Password
                      </th>
                      <th class="text-center">
                        Aksi
                      </th>
                    </thead>
                    <tbody>
                      @foreach($peng as $i=>$pengguna)
                      <tr>
                          <td>{{ ++$i }}</td>
                      <td>{{$pengguna->name}}</td>
                      <td>{{$pengguna->level}}</td>
                      <td>{{$pengguna->status}}</td>
                      <td>{{$pengguna->email}}</td>
                      <td>{{$pengguna->password}}</td>
                        <td class="d-flex justify-content-center">
                          <a href="{{ route('pengguna.edit', $pengguna->id_penguna) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                            Edit
                          </a>
                          {{-- <form class="hapus-pengguna" data-nomor="{{ $pengguna->no_pengguna }}" data-id="{{ $pengguna->id }}">
                            @csrf
                            <button class="btn btn-sm btn-danger" type="submit">hapus</button>
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
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="title-modal"></h5>
              <button type="button" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div>
            <form action="{{route('pengguna.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="masukkan nama menu.. ">
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="masukkan email">
                          </div>
                          <div class="form-group">
                            <label for="password">password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="masukkan password">
                          </div>


                    <p class="m-0">level</p>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="level" id="level1" value="manager">
                      <label class="form-check-label p-0" for="level1">manager</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="level" id="level2" value="kasir">
                      <label class="form-check-label p-0" for="level2">kasir</label>
                    </div> <br>
                    <span class="text-danger" style="display: none">level harus dipilih</span>
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


                <div class="modal-footer">
              <button type="button" class="btn btn-secondary tutup-modal" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
             </div>
          </form>
          </div>
        </div>
      </div>

        </div>
      @endsection
      @section('script')
        @include('admin.script')
        <script src="{{ asset('js/admin/pengguna.js') }}"></script>

      @endsection
