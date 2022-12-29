@extends('layouts.main')

@section('content')
<!-- Header -->
@include('components.header', ['title' => 'Roles'])

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
    <div class="card">
    <div class="card-header">
        <h3 class="card-title">Roles</h3>
        <div class="card-tools">
            <a
                href="{{ route('role.create') }}"
                class="btn btn-success">
                Create Role
            </a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table id="rolesIndex" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Struktur</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
             @php $no = 1; @endphp
            @foreach($data_roles as $datarole)
            <tr>
                <td>{{ $no++}}</td>
                <td>{{ $datarole->struktur_id }}</td>
                <td>{{ $datarole->role }}</td>
                <td style="text-align: center; vertical-align: middle;">
                    <div class="btn-group">
                        <a type="button" class="btn btn-warning" href="{{ route('role.edit', $datarole->id) }}"><i class="fas fa-pencil-alt">
                        </i> Edit</a>
                        <a type="button" class="btn btn-danger" href="{{ route('role.destroy', $datarole->id) }}"><i class="fas fa-trash">
                        </i> Delete</a>
                    </div>
                </td>
            </tr>
            @endforeach
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
    $("#rolesIndex").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });
  });
</script>
@endsection
