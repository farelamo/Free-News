@extends('admin/master')

@section('isi')
    <div class="main-wrapper container mt-5">
        <div class="row stats-row">
            <div class="col-lg-4 col-md-12">
                <div class="card card-transparent stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                            <h5 class="card-title">{{ $dataNews }}</h5>
                            <p class="stats-text">Total Berita</p>
                        </div>
                        <div class="stats-icon change-success">
                            <i class="far fa-newspaper" style="font-size: 2rem"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card card-transparent stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                            <h5 class="card-title">{{ $dataCat }}</h5>
                            <p class="stats-text">Total Category Berita</p>
                        </div>
                        <div class="stats-icon change-success">
                            <i class="fas fa-layer-group" style="font-size: 2rem"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card card-transparent stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                            <h5 class="card-title">{{ $dataUser }}</h5>
                            <p class="stats-text">Total Admin</p>
                        </div>
                        <div class="stats-icon change-success">
                            <i class="fas fa-users" style="font-size: 2rem"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="main-wrapper container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush