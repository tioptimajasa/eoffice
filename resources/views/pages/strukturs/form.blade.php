@extends('layouts.main')

@section('content')
<!-- Header -->
@include('components.header', ['title' => 'Struktur'])

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Create Struktur {{ $action }}</h3>
                    </div>
                    @if ($action === 'create')
                    <form action="{{ route('struktur.store') }}" method="POST">
                        @php
                            $jabatan = "";
                            $nama_organisasi = "";
                            $parent_id = "";
                            $kategori = "";
                            $patern_memo ="";
                            $patern_nota ="";
                            $patern_surat = "";
                        @endphp
                    @elseif ($action === 'edit')
                    <form action="{{ route('struktur.update', $data_struktur->id) }}" method="POST">
                        @php
                            $jabatan = $data_struktur->jabatan;
                            $nama_organisasi = $data_struktur->nama_organisasi;
                            $parent_id = $data_struktur->parent_id;
                            $kategori = $data_struktur->kategori;
                            $patern_memo = $data_struktur->patern_memo;
                            $patern_nota = $data_struktur->patern_nota;
                            $patern_surat = $data_struktur->patern_surat;
                        @endphp
                    @else
                        <form action="#" method="POST">
                    @endif
                            @csrf
                           
                               <input name="action" type="hidden" value="{{ $action }}" />
                                    <div class="card-body">
                                        <label class="form-group">Jabatan</label>
                                        <input name="jabatan" type="text" class="form-control" value="{{$jabatan}}">
                                        <label class="form-group">Nama Organisasi</label>
                                        <input name="nama_organisasi" type="text" class="form-control" value="{{$nama_organisasi}}">
                                        <label class="form-group">Parent</label>
                                        <select name="parent_id" class="form-control">
                                            <option></option>
                                            @php
                                                $selected = "";
                                            @endphp
                                            
                                            @foreach ($strukturs as $list_struktur)
                                                @if ($list_struktur->id==$parent_id)
                                                    @php
                                                        $selected = "selected";
                                                    @endphp
                                                @else
                                                    @php
                                                        $selected = "";
                                                    @endphp
                                                @endif
                                                <option value="{{$list_struktur->id}}" {{$selected}} >{{$list_struktur->jabatan." - ".$list_struktur->nama_organisasi}}</option>   
                                            @endforeach
                                        </select>
                                        <label for="kategori" class="form-group">Kategori</label>
                                        <select name="kategori" id="kategori" class="form-control">
                                            @php
                                                if($kategori==1){
                                                    $selected_st = "selected";
                                                    $selected_fg = "";
                                                }elseif($kategori==2){
                                                    $selected_fg = "selected";
                                                    $selected_st = "";
                                                }else{
                                                    $selected_fg = "";
                                                    $selected_st = "";
                                                }
                                            @endphp
                                            <option value="1"  {{$selected_st}}>Struktural</option>
                                            <option value="2" {{$selected_fg}}>Fungsional</option>
                                        </select>
                                        <label for="patern_memo">Patern Memorandum</label>
                                        <input name="patern_memo" id="patern_memo" type="text" value="{{$patern_memo}}" class="form-control">
                                        <label for="patern_nota">Patern Nota Dinas</label>
                                        <input name="patern_nota" id="patern_nota" type="text" value="{{$patern_nota}}" class="form-control">
                                        <label for="patern_surat">Patern Surat Keluar</label>
                                        <input name="patern_surat" id="patern_surat" type="text" value="{{$patern_surat}}" class="form-control">
                                        <br>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>

                            </div>
                            <!-- /.card-body -->

                        <div class="card-footer">
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
