@extends('layouts.dasboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Laporan</h4>
                    </div>
                </div>
             <form action="{{ route('totall') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <button class="btn btn-outline-danger" type="submit">cari</button>
                    <input type="text"id="term" name="search" placeholder="masukan kode kelas">
                   {{-- <a href="{{ route('nilai.index') }}" class=" mt-1"> --}}
                    <span class="input-group-btn">
                   <button class="btn btn-danger" type="button" title="Refresh page">
                    <span class="fas fa-sync-alt"></span>
                    </button>
                  </a>
                  </div>
             </form>
</div>
    </div>
</div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
@endsection
