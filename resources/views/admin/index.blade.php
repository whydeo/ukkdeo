{{-- @dd($peng); --}}

@extends('layouts.dasboard')

@section('content')
<div class="container ml-2 mt-4">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Coba</h2>
            </div>
            <div class="pull-right mt-4 mb-4">
                <a href="{{ route('pengguna.create') }}" class="btn btn-success">Tambah Data</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>No Telepon</th>
            <th>Status</th>
            <th>Level</th>
            <th>Email</th>
            <th>Password</th>
            <th>Aksi</th>
        </tr>

        @foreach($peng as $p)
        <tr>
            <td>{{ $p->name }}</td>
            <td>{{ $p->no_tlp }}</td>
            <td>{{ $p->status}}</td>
            <td>{{ $p->level }}</td>
            <td>{{ $p->email }}</td>
            <td>{{ $p->password }}</td>
            <td>
                {{-- <form action="{{ route('penguna.destroy', $p->id_penguna) }}" method="POST"> --}}
                <a href="{{ route('pengguna.edit',$p->id_penguna) }}" class="btn btn-primary">Edit</a>

                @csrf


                </form>
            </td>

        </tr>
        @endforeach
    </table>

</div>
@endsection
