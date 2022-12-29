@extends('layouts.main')

@section('content')
<!-- Header -->
    @include('components.header', ['title' => ''])




<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Struktur</h3>
                <div class="card-tools">
                    <a
                        href="{{ route('struktur.create') }}"
                        class="btn btn-success">
                        Create Struktur
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="strukturIndex" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Organisasi</th>
                            <th>Jabatan</th>
                            <th>Parent</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>                
                    </thead>
                    <tbody>
                        @if (count($strukturs)>0)
                            @php
                                $array_kategori = array(1=>'Struktural',2=>'Fungsional')
                            @endphp
                            @foreach ($strukturs as $list_struktur)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$list_struktur->nama_organisasi}}</td>
                                    <td>{{$list_struktur->jabatan}}</td>
                                    <td>{{isset($list_struktur->parent['jabatan'])?$list_struktur->parent['jabatan']:''}} {{isset($list_struktur->parent['nama_organisasi'])?$list_struktur->parent['nama_organisasi']:''}}</td>
                                    <td>{{$array_kategori[$list_struktur->kategori]}}</td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <div class="btn-group">
                                            <a type="button" class="btn btn-warning" href="{{ route('struktur.edit', $list_struktur->id) }}"><i class="fas fa-pencil-alt">
                                            </i> Edit</a>
                                        
                                            <a type="button" class="btn btn-danger" href="{{ route('struktur.destroy', $list_struktur->id) }}"><i class="fas fa-trash">
                                            </i> Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" align="center">Tidak Ada Data</td>
                            </tr>
                        @endif
                    </tbody>
                </tabel>
            </div>
        </div>
    </div>
</section>
@endsection

@section('default_scripts')
@include('components.index_script')
@endsection

@section('scripts')
<script>
  $(function () {
    $("#strukturIndex").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });
  });
</script>

@endsection