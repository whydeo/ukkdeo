<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=100px, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ribeye+Marrow&display=swap" rel="stylesheet">
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        figure{
            text-align: center;
            margin: 0px;
            margin-top: 40px;
        }
        img{
            width: 120px;
        }
        .title{
            text-align: center;
            font-family: 'Ribeye Marrow';
            font-size: 40px;
            margin: 0;
        }
        .alamat{
            text-align: center;
            margin: 0;
            font-size: 22px;
        }
        .pos{
            margin:auto;

        }
        hr{
            margin: auto;
            width: 681px;
            border: 1px dashed #000000;
        }
        .Order{
            text-align: center;
            font-size: 25px;
        }
        .table-pesanan{
            margin: auto; 
            font-size: 22px;     
        }
        .table-total{
            margin: auto;
            
            font-size: 22px;     

        }
        .thanks{
            margin-top: 20px;
            font-size: 25px;
            text-align: center;
        }
    </style>
</head>
<body>
    
    <p class="title">2y1le</p>
    <p class="alamat">Jl.2yle <br> soe</p>
    <table class="pos">
        <tr>
            <td style="text-align:right; width:630px;">Pos Title:</td>
            <td align="right" style="width: 50px;">{{$email}}</td>
        </tr>
    </table>
    <hr>
    <p class="Order">Order By: {{ $print->nama_pemesan }} <br> No. Meja: {{ $print->meja }} <br> Order Date: {{ $date }}</p>
    <hr>
    <hr style="margin-top: 4px">
    <table class="table-pesanan">
        <tr class="tr-head">
            <th >Pesanan</th>
            <th>Harga</th>
            <th>QTY</th>
            <th >Total</th>
            <th >bayar</th>
        </tr>
        <tr>
            <td>{{ $print->nama_menu }}</td>
            <td align="center">Rp {{ $print->harga }}</td>
            <td align="center">{{ $print->jumblah }}</td>
            <td align="right">Rp {{ $print->harga*$print->jumblah}}</td>
            <td align="right">Rp {{ $print->total_bayar}}</td>
        </tr>
  
    </table>
    <hr>
    <table class="table-total">
        <tr>
            <th style="width: 530px; text-align: right;">Total :</th>
            <td style="width: 150px; text-align: right;">Rp {{ $print->harga*$print->jumblah}}</td>
        </tr>
    </table>
    <hr>
    <hr style="margin-top: 4px">
    <p class="thanks"> Terima Kasih - Silahkan Datang Lagi!</p>
</body>
<script>
    window.print();

</script>
</html>
