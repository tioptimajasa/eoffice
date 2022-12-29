@extends('layouts.main')

@section('content')
<!-- Header -->
@include('components.header', ['title' => 'Users'])

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Create Users {{ $action }}</h3>
                    </div>
                    @if ($action === 'create')
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @php
                            $name ="";
                            $email = "";
                            $password ="";
                            $struktur_id="";
                            $upload_data="";
                        @endphp
                    @elseif ($action === 'edit')
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @php
                            $name = $user->name;
                            $email = $user->email;
                            $password = "";
                            $struktur_id= $user->struktur_id;
                        @endphp
                    @else
                    <form action="#" method="POST">
                    @endif
                        @csrf
                        <input name="action" type="hidden" value="{{ $action }}" />
                        <div class="card-body">
                            <label class="form-group">Name</label>
                                <input name="name" type="text" class="form-control" value="{{$name}}"></br>
                            <label class="form-group">Email</label>
                                <input name="email" type="text" class="form-control" value="{{$email}}"></br>
                            <label class="form-group">Password</label>
                                <input name="password" type="password" class="form-control" value=""></br>
                            
                            
                                    
                            <label class="form-group">Struktur</label>
                                <select name="struktur_id" class="form-control">
                                    <option></option>
                                    @php
                                        $selected = "";
                                    @endphp
                                @foreach ($strukturs as $list_strukturs)
                                    @if ($list_strukturs->id==$struktur_id)
                                        @php
                                            $selected = "selected";
                                        @endphp
                                    @else
                                        @php
                                            $selected = "";
                                        @endphp
                                    @endif
                                    <option value="{{$list_strukturs->id}}" {{$selected}}>{{$list_strukturs->jabatan}} {{$list_strukturs->nama_organisasi}}</option>
                                @endforeach
                                </select></br>

                                <label class="form-group">File Fhoto</label>
                                <input type="file" class="form-control" name="upload_data" required>
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

