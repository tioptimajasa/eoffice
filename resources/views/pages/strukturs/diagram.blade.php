@extends('layouts.main')

@section('content')
<!-- Header -->
@include('components.header', ['title' => 'Struktur'])
<link rel="stylesheet" href="{{ asset('assets/dist/css/Treant.css') }}">
<link rel="stylesheet" href="{{ asset('assets/dist/css/basic-example.css') }}">
<style>
img {
  vertical-align: middle;
  border-style: none; 
  width: 60px;
  height: 60px;
}
.node-desc{
    color: red;
}
</style>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary" style="width: 1928px">
                    {{-- {{$data_diagram}} --}}
                    {{-- {{$config_id}} --}}
                    <div class="chart" id="basic-example" style="width: 1928px"></div>

                    
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{ asset('assets/dist/js/raphael.js') }}"></script>
<script src="{{ asset('assets/dist/js/Treant.js') }}"></script>
<script>
    <?php echo $data_diagram; ?>

</script>

<script>
    new Treant( chart_config );
</script>
@endsection

