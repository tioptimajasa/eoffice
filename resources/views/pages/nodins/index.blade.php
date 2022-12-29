@extends('layouts.main')

@section('content')
<!-- Header -->
@include('components.header', ['title' => ''])

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
    <div class="card">
    <div class="card-header">
        <h3 class="card-title">Nota Dinas</h3>
        <div class="card-tools">
            <a
                href="{{ route('nodin.create') }}"
                class="btn btn-success">
                Create Nota Dinas
            </a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table id="nodinsIndex" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Nomor Surat</th>
            <th>Kepada</th>
            <th>Dari</th>
            <th>Perihal</th>
            <th>Lampiran</th>
            <th>Tanggal Surat</th>
            <th>Sifat</th>
            <th>Urgensi</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @php
                $array_sifat = array(1=>'Biasa',2=>'Rahasia',3=>'Sangat Rahasia');
                $array_urgensi = array(1=>'Segera',2=>'Rutin',3=>'Sangat Segera');
            @endphp
      
            @foreach($nodins as $nodin)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$nodin->nomor_surat}}</td>
                <td>{{ $nodin->kepada_id }}</td>
                <td>{{ $nodin->dari_id }}</td>
                <td>{{ $nodin->perihal }}</td>
                 <td>
                    <div class="download">
                        <a href="/{{ $nodin->lampiran_nodin }}" class="btn" style="width:100%" target="_blank"><i class="fa fa-download"></i>Download</a>
                    </div>
                </td>
                <td>
                 {{ date("d F Y", strtotime($nodin['tanggal'])) }}
                </td>
                <td>
                    {{ $array_sifat[$nodin->sifat] }}
                </td>  
                <td>
                    {{ $array_urgensi[$nodin->urgensi] }}
                </td>  
                <td>
                    <div class="btn-group">
                        <a type="button" class="btn btn-success" href="{{route('nodin.report', $nodin->id)}}"><i class="fas fa-folder">
                        </i></a>
                        <a type="button" class="btn btn-warning" href="{{ route('nodin.edit', $nodin->id) }}"><i class="fas fa-pencil-alt">
                        </i></a>
                        <a type="button" class="btn btn-danger" href="{{ route('nodin.destroy', $nodin->id) }}"> <i class="fas fa-trash">
                        </i></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection

@section('default_scripts')
@include('components.index_script')
@endsection

@section('scripts')
<script>
  $(function () {
    $("#nodinsIndex").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });
  });
</script>
@endsection
