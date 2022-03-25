@extends('layouts.dasboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          create
          <form action="{{ route("pesan.store") }}" method="POST">
            @csrf

            {{-- ... customer name and email fields --}}

            <div class="card">
                <div class="card-header">
                    menu
                </div>

                <div class="card-body">
                    <table class="table" id="products_table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>jumbklah</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr id="product0">
                                <td>
                                    <select name="menu[]" class="form-control">
                                        <option value="">-- pilih menu --</option>
                                        @foreach ($pesan as  $pe)
                                            <option value="{{ $pe->id_menu }}">
                                                {{ $pe->nama }}{{ $pe->nama }} (${{ number_format($pe->harga, 2) }})
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="jumblah" class="form-control" value="1" />
                                </td>
                            </tr>
                            <tr id="product1"></tr>
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-md-12">
                            <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                            <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" >
                {{-- value="{{ trans('global.save') }}" --}}
            </div>
        </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
    let row_number = 1;
    $("#add_row").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
      $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
      row_number++;
    });

    $("#delete_row").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#product" + (row_number - 1)).html('');
        row_number--;
      }
    });
  });
</script>
@endsection
