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
                    Daftar Pekerjaan
                </h3>
            </div>
            
            <div class="card-body">
                <div class="row">
                    @include('widgets.dashboard_box', [
                        "name" => "Surat yang perlu diproses",
                        "total" => "<a href='/admin/proses-surat/' style='color:white'><h4>0</h4></a>",
                        "color" => "info",
                        "size" => "col"
                    ])
                    @include('widgets.dashboard_box', [
                        "name" => "Surat Masuk",
                        "total" => "<h4>0</h4>",
                        "color" => "warning",
                        "size" => "col"
                    ])

                     @include('widgets.dashboard_box', [
                        "name" => "Disposisi",
                        "total" => "<h4>0</h4>",
                        "color" => "success",
                        "size" => "col"
                    ])
                </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    List Surat
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @include('widgets.dashboard_box', [
                        "name" => "Draft",
                        "total" => "<h4></h4>",
                        "color" => "info",
                        "size" => "col"
                    ])
                    @include('widgets.dashboard_box', [
                        "name" => "On Approval",
                        "total" => "<h4></h4>",
                        "color" => "yellow",
                        "size" => "col"
                    ])

                     @include('widgets.dashboard_box', [
                        "name" => "Approved",
                        "total" => "<h4></h4>",
                        "color" => "success",
                        "size" => "col"
                    ])
                    @include('widgets.dashboard_box', [
                        "name" => "Rejected",
                        "total" => "<h4></h4>",
                        "color" => "danger",
                        "size" => "col"
                    ])
                    @include('widgets.dashboard_box', [
                        "name" => "Total Surat",
                        "total" => "<h4></h4>",
                        "color" => "grey",
                        "size" => "col"
                    ])
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
