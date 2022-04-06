@extends('layouts.dasboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-header">Log Aktivitas Pegawai</div>
            <hr>
            <div class="block-content col-md-12">
                <table class="table table-bordered table-striped table-vcenter font-size-sm">
                    <tbody>
                        <th>nama pegawai</th>
                        <th>level user</th>
                        <th>aksi yang dilakukan</th>
                        <th>waktu</th>
                        @foreach ($activity_log as $item)
                        <tr>
                            <td>
                                {{$item->user->name}}
                            </td>
                            <td>
                                {{$item->user->level}}
                            </td>
                            <td>
                                {{$item->description}}
                            </td>
                            <td>
                                <span class="badge badge-danger">{{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>
@endsection
