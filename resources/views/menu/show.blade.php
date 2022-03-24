@extends('layouts.dasboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-12 col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Detail menu</h3>
          <div class="card-tools">
            <a href="{{ route('menu') }}" class="btn btn-sm btn-danger">
              Tutup
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
        
                
              <tr>
                    <td>image</td>
                    <td>
                            <img src="{{ asset('imagemenu') }}/{{$menu->image}}" width="auto" alt="{{ $menu->image }}">

                    </td>
                  </tr>
              <tr>
                <td>Nama menu</td>
                <td>
                {{ $menu->nama }}
                </td>
              </tr>
              <tr>
                <td>kategori</td>
                <td>
                 {{ $menu->kategori }}
                </td>
              </tr>
              <tr>
                <td>Harga</td>
                <td>
                  Rp. {{ number_format($menu->harga, 2) }}
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
   
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection