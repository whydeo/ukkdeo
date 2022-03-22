@extends('layouts.dasboard')
@section('content')
<div class="container ml-2 mt-4">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Pegawai</h2>
            </div>
            <div class="pull-right mt-4 mb-4">
                <a href="{{ route('create') }}" class="btn btn-success">Tambah Data</a>
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
            <th>Nama menu</th>
            <th>kategori</th>
            <th>harga</th>
            <th>image</th>
            <th>Aksi</th>
        </tr>

        @foreach($menu as $menus)
        <tr>
            <td>{{ $menus->nama }}</td>
            <td>{{ $menus->kategori }}</td>
            <td>{{ $menus->harga}}</td>
            <td>{{ $menus->image }}</td>
            <td>
                {{-- <form action="{{ route('penguna.destroy', $p->id_penguna) }}" method="POST"> --}}
                <a href="{{ route('edit',$menus->id_menu) }}" class="btn btn-primary">Edit</a>
                @csrf
                </form>
            </td>

        </tr>
        @endforeach
    </table>

</div>
@endsection
