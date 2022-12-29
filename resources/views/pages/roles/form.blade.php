@extends('layouts.main')

@section('content')
<!-- Header -->
@include('components.header', ['title' => 'Roles'])

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-prima   ry">
                    <div class="card-header">
                        <h3 class="card-title">Create Roles</h3>
                    </div>
                    @if ($action === 'create')
                    <form action="{{ route('role.store') }}" method="POST">
                        @php
                            $struktur_id ="";
                            $roles = "";
                        @endphp
                    @elseif ($action === 'edit')
                    <form action="{{ route('role.update', $listrole->id) }}" method="POST">
                        @php
                            $struktur_id = $listrole->struktur_id;
                            $roles = $listrole->role;
                        @endphp
                    @else
                    <form action="#" method="POST">
                    @endif
                    
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Struktur</label>
                                <select id="struktur_id" name="struktur_id" required="required" class="form-control">
                                    <option></option>
                                    @php
                                        $selected = "";
                                    @endphp
                                  @foreach($strukturs as $list_strukturs)
                                  @if (!empty($struktur_id))
                                    @if ($list_strukturs->id==$struktur_id)
                                        @php
                                            $selected = "selected";
                                        @endphp
                                    @else
                                        @php
                                            $selected = "";
                                        @endphp
                                    @endif
                                  @endif
                                   
                                    <option value="{{$list_strukturs->id}}" {{$selected}}>{{$list_strukturs->jabatan}} {{$list_strukturs->nama_organisasi}}</option>
                                  @endforeach
                                  </select>
                                <label for="exampleInputEmail1">Role Name</label>
                                <select id="role" name="role" required="required" class="form-control">
                                    <option></option>
                                   
                                  @foreach($array_role as $key=>$val)
                                    @if ($key==$roles)
                                        @php
                                            $selected = "selected";
                                        @endphp
                                    @else
                                        @php
                                            $selected = "";
                                        @endphp
                                    @endif
                                
                                    <option value="{{$key}}" {{$selected}}>{{$val}}</option>
                                  @endforeach
                                  </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
