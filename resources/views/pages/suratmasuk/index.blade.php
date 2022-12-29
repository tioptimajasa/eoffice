@extends('layouts.main')

@section('content')
<!-- Header -->
@include('components.header', ['title' => ''])

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
    <div class="card">
    <div class="card-header">
        <h3 class="card-title">Surat Masuk</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table id="suratmasuksIndex" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Nomor Surat</th>
            <th>Kepada</th>
            <th>Dari</th>
            <th>Perihal</th>
            <th>Lampiran</th>
            <th>Status</th>
            <th>Tanggal Surat</th>
            <th>Sifat</th>
            <th>Urgensi</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
           
        </tbody>
    </table>
    </div>
    <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
</section>
@endsection

@section('default_scripts')
@include('components.index_script')
@endsection

@section('scripts')
<script>
  $(function () {
    $("#suratmasuk").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });
  });
</script>
@endsection
