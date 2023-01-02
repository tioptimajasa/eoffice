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
            <th>Tanggal Surat</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @php
                $array_status = array(0=>'Draft',1=>'On Approval',2=>'Approved',3=>'Reject');
            @endphp
      
            @foreach($nodins as $nodin)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$nodin->nomor_surat}}</td>
                <td>{{ $nodin->kepada->jabatan }} {{ $nodin->kepada->nama_organisasi }}</td>
                <td>{{ $nodin->dari->jabatan }} {{ $nodin->dari->nama_organisasi }}</td>
                <td>{{ $nodin->perihal }}</td>
                <td>
                 {{ date("d F Y", strtotime($nodin['tanggal'])) }}
                </td>
                <td>
                    {{ $array_status[$nodin->status] }}
                </td>  
                <td>
                    <div class="btn-group">
                        <a type="button" class="btn btn-success" href="{{route('nodin.report', $nodin->id)}}"><i class="fas fa-folder">
                        </i> View</a>
                        @if ($nodin->status ==0)
                            <a type="button" class="btn btn-warning" href="{{ route('nodin.edit', $nodin->id) }}"><i class="fas fa-pencil-alt">
                            </i>Edit</a>
                            <a type="button" class="btn btn-danger" href="{{ route('nodin.destroy', $nodin->id) }}"> <i class="fas fa-trash">
                            </i> Delete</a>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    

<script src="{{ asset('vendor/sweetalert/sweetalert.all.js')  }}"></script>
<script type="text/javascript">
$('.show_confirmation').on('click',function(){
    var getLink = $(this).attr('href');
    Swal.fire({
        title: "Yakin hapus data?",            
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonColor: '#3085d6',
        cancelButtonText: "Batal"
    
    }).then(result => {
        //jika klik ya maka arahkan ke proses.php
        if(result.isConfirmed){
            window.location.href = getLink
        }
    })
    return false;
});
</script>
</section>
@endsection





@section('default_scripts')
@include('components.index_script')
@endsection

@section('scripts')
<script>
  $(function () {
    $("#nodinsIndex").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });
  });
</script>
@if (\Session::has('delete'))
    <script>
        Swal.fire({
            title: "DELETED!",
            text: "{!! \Session::get('delete') !!}",
            icon: "delete",
            button: "OK!",
        });
    </script>
@endif
@if (\Session::has('success'))
    <script>
        Swal.fire({
            title: "SUCCESS!",
            text: "{!! \Session::get('success') !!}",
            icon: "delete",
            button: "OK!",
        });
    </script>
@endif
@endsection
