@extends('layouts.main')

@section('content')
<!-- Header -->
@include('components.header', ['title' => 'Users'])

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
    <div class="card">
    <div class="card-header">
        <h3 class="card-title">Users</h3>
        <div class="card-tools">
            <a
                href="{{ route('user.create') }}"
                class="btn btn-success">
                Create User
            </a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table id="usersIndex" class="table table-bordered table-striped">
        <thead>
        <tr>
            <!-- <th>ID</th> -->
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Foto</th>
            <th>Struktur</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($users as $user)
            
            <tr>
                {{-- <!-- <td>{{ $user->id }}</td> --> --}}
                <td>{{ $no++}}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                        <img
                        src="/{{ $user->upload_data }}"
                        style="width: 100px; height: 100px; object-fit: contain;"
                    />
                </td>
                <td>{{ $user->struktur_id }}</td>
                <td style="text-align: center; vertical-align: middle;">
                    <div class="btn-group">
                        {{-- <a type="button"  class="btn btn-success" href="{{ route('user.show', $user->id) }}">view</a> --}}
                        <a type="button"  class="btn btn-warning" href="{{ route('user.edit', $user->id) }}"><i class="fas fa-pencil-alt">
                        </i> Edit</a>
                        <a type="button"  class="btn btn-danger" href="{{ route('user.destroy', $user->id) }}"> <i class="fas fa-trash">
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
    $("#usersIndex").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });
  });
</script>
@endsection
