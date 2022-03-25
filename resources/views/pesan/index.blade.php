@extends('layouts.dasboard')
@section('content')
<div class="container ml-2 mt-4">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Pegawai</h2>
            </div>
            <div class="pull-right mt-4 mb-4">
                <a href="{{ route('pesan.create') }}" class="btn btn-success">Tambah Data</a>
            </div>
        </div>
    </div>
    {{-- @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
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
                {{-- <a href="{{ route('pengguna.edit',$p->id_penguna) }}" class="btn btn-primary">Edit</a>

                @csrf


                </form>
            </td>

        </tr>
        @endforeach
    </table> --}} 

{{-- contoh --}}
<table id="example1" class="table table-bordered table-striped">
    <thead>
            <tr>
                    <th >menuuu</th>
                    <th >jumblah</th>
                  
                   
                </tr>

    </thead>
    <tbody>
            <tr class="4b">
            <td class="berbudi1 berbudi">
                    <input type="text" value="3" size="1" value="3" name="kualitas1" class="4binput">
                </td>
                <td class="berbudi2 berbudi">
                    <input type="text" value="3" size="1" value="3" name="kualitas 1" class="4binput">
                </td>
            
                <td class="berbudi5 berbudi">
                    <input type="text" value="" size="1" name="berkualitas[]" class="4binput" readonly>
                </td>
              
                <td  class="hasil7 hasil">
                    <textarea name="folowup" class="4binput" ></textarea>
                </td>
                
    </tbody>


    <button type="button" id="submit" name="submit" class="btn btn-warning">Submit</button>




</div>

{{-- js --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      console.log('ready');
      $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        
        
         $('#submit').click(function () {
                $.ajax({
                    url: "{{route('pesan.store')}}",
                    method: "POST",
                    data: $('#add_item').serialize(),
                    type: 'json',
                  
                });
                responsive: true
            });  
     });
     
   $(document).ready(function(){
				function nilai(b4){
					var b4t = b4;
					$(".4binput").click(function(){
						var b1 = $(this).val();
						var b2 = $(this).parent().parent().children("."+b4t+"2").children("input").val();
						var ave1 = b1*1 + +b2*1 ;
						var n1 = ave1/4;
						var n1
                    }
					
            });
                
            const tx = document.getElementsByTagName("textarea");
for (let i = 0; i < tx.length; i++) {
  tx[i].setAttribute("style", "height:" + (tx[i].scrollHeight) + "px;overflow-y:hidden;");
  tx[i].addEventListener("input", OnInput, false);
}
function OnInput() {
  this.style.height = "auto";
  this.style.height = (this.scrollHeight) + "px";
}     
		</script>
     
  
</script>
@endsection
