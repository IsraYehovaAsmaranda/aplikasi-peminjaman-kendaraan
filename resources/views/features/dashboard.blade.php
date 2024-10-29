@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card shadow-lg">
        <div class="card-header">
            Dashboard
        </div>
        <div class="card-body">
            <div class="row">
                
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title">Pemesanan Berdasarkan Jenis Kepemilikan Kendaraan</h5>
                        </div>
                        <div class="card-body">
                            {!! $chartKepemilikan->container() !!}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title">Pemesanan Berdasarkan Jenis Kendaraan</h5>
                        </div>
                        <div class="card-body">
                            {!! $chartJenisKendaraan->container() !!}
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title">Statistik Kendaraan</h5>
                        </div>
                        <div class="card-body">
                            {!! $chart->container() !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
    {{ $chartKepemilikan->script() }}
    {{ $chartJenisKendaraan->script() }}
@endsection
