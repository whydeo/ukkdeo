@extends('layouts.dasboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>ini halaman user</h1>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                form input pegawai
            </button>

            <form method="POST" action="{{route('index.store')}}" enctype="multipart/form-data">

                @csrf

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">input user</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <label for="">Nama</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="name" placeholder="nama">
                                </div>
                                <label for="">nomor telepon</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="no_tlp" placeholder="no telepon">
                                </div>

                                <label for="">level pegawai</label>
                                <div class="input-group mb-3">
                                    <select class="form-control" name="level" id="level">
                                        <option value="---">level</option>
                                        <option value="manager">manager</option>
                                        <option value="kasir">kasir</option>
                                    </select>
                                </div>
                                <label for="">status pegawai</label>
                                <div class="input-group mb-3">
                                    <select class="form-control" name="status" id="status">
                                       
                                        <option value="aktif">aktif</option>
                                       
                                    </select>
                                </div>

                                <label for="">email</label>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="email" placeholder="email">
                                </div>
                                <label for="">password</label>
                                <div class="input-group mb-3">
                                    <input id="password" type="password" class="form-control " name="password" placeholder="password">
                                </div>
                                <label for="">image</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="image" placeholder="no telepon">
                                </div>
                        
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save </button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
            <br><br>
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No Tlp</th>
                        <th scope="col">level</th>
                        <th scope="col">status</th>
                        <th scope="col">email</th>
                        <th scope="col">image</th>
                        <th scope="col">aksi</th>
                    
                    </tr>
                </thead>
                <tbody>
                @foreach ($peng as $data)
                    <tr>
                     
                           <td>{{$data->id}}</td>
                           <td>{{$data->name}}</td>
                           <td>{{$data->no_tlp}}</td>
                           <td>{{$data->level}}</td>
                           <td>{{$data->email}}</td>
                           <td>{{$data->status}}</td>
                           <td>{{$data->image}}</td>
                          <td> <a href="{{ route('edit',$data->id)}}" class="btn btn-primary">Edit</a></td>
                      

                    </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
</div>
@endsection
