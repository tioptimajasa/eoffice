@extends('layouts.main')

@section('content')
<!-- Header -->
@include('components.header', ['title' => ''])

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
    <div class="card">
    <div class="card-header">
        <h3 class="card-title">Memo</h3>
        <div class="card-tools">
            <a
                href="{{ route('memo.create') }}"
                class="btn btn-success">
                Create Memo
            </a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table id="memosIndex" class="table table-bordered table-striped">
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
      
            @foreach($memos as $memo)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$memo->nomor_surat}}</td>
                <td>{{ $memo->kepada_id }}</td>
                <td>{{ $memo->dari_id }}</td>
                <td>{{ $memo->perihal }}</td>
                <td>
                    <div class="download">
                        <a href="/{{ $memo->lampiran_memo }}" class="btn" style="width:100%" target="_blank"><i class="fa fa-download"></i>Download</a>
                    </div>
                </td>
                <td>{{date("d F Y", strtotime($memo['tanggal'])) }}</td>
                <td>
                    {{ $array_sifat[$memo->sifat] }}
                </td>  
                <td>
                    {{ $array_urgensi[$memo->urgensi] }}
                </td>  
                <td>
                    <div class="btn-group">
                        <a type="button" class="btn btn-success" href="{{route('memo.memoreport', $memo->id) }}"><i class="fas fa-folder">
                        </i></a>
                        <a type="button" class="btn btn-warning" href="{{ route('memo.edit', $memo->id) }}"><i class="fas fa-pencil-alt">
                        </i></a>
                        <a type="button" class="btn btn-danger" href="{{ route('memo.destroy', $memo->id) }}"><i class="fas fa-trash">
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
    $("#memosIndex").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });
  });
</script>
@endsection
