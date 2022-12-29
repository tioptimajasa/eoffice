@extends('layouts.main')

@section('content')
<!-- Header -->
@include('components.header', [
    'title' => 'Halo, selamat datang',
    'subtitle' => 'Dahsboard Overview'
])
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Menu Data
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @include('widgets.dashboard_box', [
                        "name" => "Draf",
                        "total" => "<h4>0</h4>",
                        "color" => "info",
                        "size" => "col"
                    ])
                    @include('widgets.dashboard_box', [
                        "name" => "Permintaan Disetujui",
                        "total" => "<h4>0</h4>",
                        "color" => "success",
                        "size" => "col"
                    ])
                    @include('widgets.dashboard_box', [
                        "name" => "Tidak Disetujui",
                        "total" => "<h4>0</h4>",
                        "color" => "warning",
                        "size" => "col"
                    ])
                   
                    @include('widgets.dashboard_box', [
                        "name" => "Surat Masuk",
                        "total" => "<h4>0</h4>",
                        "color" => "danger",
                        "size" => "col"
                    ])

                     @include('widgets.dashboard_box', [
                        "name" => "Disposisi",
                        "total" => "<h4>0</h4>",
                        "color" => "succes",
                        "size" => "col"
                    ])

                       @include('widgets.dashboard_box', [
                        "name" => "Total Permintaan",
                        "total" => "<h4>0</h4>",
                        "color" => "primary",
                        "size" => "col"
                    ])
                <!-- ./col -->
                </div>
        </div>
      </div>
    </section>
@endsection
