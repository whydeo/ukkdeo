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
                <div class="row">
                    <div class="col-lg-6">
                      <div class="card card-chart">
                        <div class="card-header">
                          <h5 class="card-category">Data total pemasukan</h5>
                          <h4 class="card-title">total pemasukan</h4>
                          <div class="dropdown">
                            <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                              <i class="now-ui-icons loader_gear"></i>
                            </button>

                          </div>
                        </div>
                        <div class="card-body">
                          <p class="text-center" style="font-size: 70px">{{ $data }}</p>
                        </div>
                        <div class="card-footer">
                          <div class="stats">
                            <i class="now-ui-icons arrows-1_refresh-69"></i> baru apdet
                          </div>
                        </div>
                      </div>
                    </div>
                <div class="row">
                    <div class="col-lg-6">
                      <div class="card card-chart">
                        <div class="card-header">
                          <h5 class="card-category">Data total pemasukan</h5>
                          <h4 class="card-title">total pemasukan</h4>
                          <div class="dropdown">
                            <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                              <i class="now-ui-icons loader_gear"></i>
                            </button>

                          </div>
                        </div>
                        <div class="card-body">
                          <p class="text-center" style="font-size: 70px">{{ $months }}</p>
                        </div>
                        <div class="card-footer">
                          <div class="stats">
                            <i class="now-ui-icons arrows-1_refresh-69"></i> baru apdet
                          </div>
                        </div>
                      </div>
                    </div>



                </div>

</div>
    </div>
</div>
@endsection

