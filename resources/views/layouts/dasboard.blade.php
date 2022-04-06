<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '2y1le') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/dash.js') }}" defer></script>
    {{-- livewire --}}
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  {{-- bootstrap icon --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

      <!-- chart js-->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dash.css') }}" rel="stylesheet">
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-dark" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-dark text-light" ><i class='fab fa-draft2digital' style='font-size:36px'></i>y1l<i class="fa fa-gbp" style="font-size:24px"></i>
            </div>
            <hr>
            <div class="list-group list-group-flush">
                @if(auth()->user()->level=="admin")
                <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="{{ route('home') }}"><i class="bi bi-house-fill fs-5"></i> Dashboard</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="{{ route('pengguna.index') }}"><i class="bi bi-person-plus-fill fs-5"></i> User</a>
            <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="{{route('indexlog')}}"><i class="bi bi-door-open-fill fs-5"></i>log aktifitas pegawai</a>
                @elseif(auth()->user()->level=="manager")
                <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="{{ route('index')}}"><i class="bi bi-house-fill fs-5"></i> Dashboard</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="{{ route('menu.index')}}"><i class="bi bi-egg-fried fs-5"></i> Menu</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="{{ route('meja.index')}}"><i class="bi bi-tablet-landscape-fill fs-5"></i> Meja</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="{{ route('kategori.index') }}"> <i class="bi bi-bookmarks-fill fs-5"></i> Kategori</a>
            <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="{{ route('laporantrans')}}"><i class="bi bi-newspaper fs-5"></i> Laporan transaksi</a>
            <!-- <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="{{ route('laporandapat')}}"> laporan transaksi pendapatan </a> -->
            <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="{{ route('log')}}"><i class="bi bi-door-open-fill fs-5"></i> Log aktivitas  </a>
            {{-- <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="{{ route('totall')}}"> total  </a> --}}
                @elseif(auth()->user()->level=="kasir")
                <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="{{ route('home') }}"><i class="bi bi-house-fill fs-5"></i> Dashboard</a>
                 <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="{{route('datatrans')}}"> <i class="bi bi-piggy-bank-fill fs-5"></i> Data transaksi</a>
                 <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="{{route('kasir.index')}}"><i class="bi bi-bag-plus-fill fs-5"></i> Pesanan</a>
                @endif
                {{-- <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="">Dashboard</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="{{ route('coba.index') }}">Coba</a> --}}
            </div>
        </div>
        {{-- buat card --}}
        <style>
                 .container {
                padding: 2rem 0rem;
                }

                h4 {
                margin: 2rem 0rem 1rem;
                }

                .table-image {
                td, th {
                    vertical-align: middle;
                }
                }
        </style>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            {{-- @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif --}}
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    <i class="bi bi-person"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        <i class="bi bi-door-closed-fill fs-5"></i>
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
</html>
