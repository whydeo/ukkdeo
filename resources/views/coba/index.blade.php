@extends('layouts.dasboard')

@section('content')
<div class="container ml-2 mt-4">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Coba</h2>
            </div>
            <div class="pull-right mt-4 mb-4">
                <a href="{{ route('coba.create') }}" class="btn btn-success">Tambah Data</a>
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
            <th>No</th>
            <th>ID</th>
            <th>Nama</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        @foreach ($coba as $i => $cobaa)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $cobaa->id }}</td>
                <td>{{ $cobaa->nama }}</td>
                <td>{{ $cobaa->keterangan }}</td>
                <td>
                    <form action="{{ route('coba.destroy', $cobaa->id) }}" method="POST">
                        <a href="{{ route('coba.edit',$cobaa->id) }}" class="btn btn-primary">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Hapus</button>

                    </form>
                </td>
            </tr>
            @endforeach
    </table>

    {!! $coba->links() !!}
</div>
@endsection