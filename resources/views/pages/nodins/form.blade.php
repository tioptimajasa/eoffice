@extends('layouts.main')

@section('content')
<!-- Header -->
@include('components.header', ['title' => ''])

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Nota Dinas {{ $action }}</h3>
                    </div>
                    {{-- {{$nodin_kepada}} --}}
                    @if ($action === 'create')
                    <form action="{{ route('nodin.store') }}" method="POST" enctype="multipart/form-data" id="form_nodin">
                        @php
                            $kepada = "";
                            $dari = "";
                            $isi = "";

                        @endphp
                    @elseif ($action === 'edit')
                    <form action="{{ route('nodin.update', $data_nodin->id) }}" method="POST" enctype="multipart/form-data" id="form_nodin">
                        @php
                            $kepada = $data_nodin->kepada_id;
                            $dari = $data_nodin->dari_id;
                            $isi = $data_nodin->isi;
                        @endphp
                    @else
                    <form action="#" method="POST"  enctype="multipart/form-data" id="form_nodin">
                    @endif
                        
                        @csrf
                        <input name="action" type="hidden" value="{{ $action }}" />
                        <div class="card-body">
                            <label for="exampleInputEmail1">Kepada</label>
                                <select id="kepada_id"  name="kepada_id" required="required" class="form-control">
                                    <option></option>
                                    @foreach ($nodin_kepada as $data_struktur)
                                    <option value="{{$data_struktur->id}}">{{$data_struktur->jabatan}} {{$data_struktur->nama_organisasi}}</option>
                                    @endforeach
                                </select>

                            <label for="exampleInputEmail1">Dari</label>
                                <select id="dari_id" name="dari_id" required="required" class="form-control">
                                    <option></option>
                                    @foreach ($nodin_dari as $data_struktur_dari)
                                        <option value="{{$data_struktur_dari->id}}">{{$data_struktur_dari->jabatan}} {{$data_struktur_dari->nama_organisasi}}</option>
                                    @endforeach
                                </select>


                                <label for="exampleInputEmail1">Pemeriksa</label>
                                <select id="pemeriksa" name="pemeriksa[]" multiple required="required" class="form-control">
                                    <option></option>
                                    @foreach ($nodin_pemeriksa as $data_struktur_pemeriksa)
                                        <option value="{{$data_struktur_pemeriksa->id}}">{{$data_struktur_pemeriksa->jabatan}} {{$data_struktur_pemeriksa->nama_organisasi}}</option>
                                    @endforeach
                                </select>

                                

                            <label for="exampleInputEmail1">Tembusan</label>
                                <select id="tembusan" name="tembusan[]" multiple class="form-control">
                                    <option></option>
                                    @foreach ($strukturs as $data_struktur)
                                        <option value="{{$data_struktur->id}}">{{$data_struktur->jabatan}} {{$data_struktur->nama_organisasi}}</option>
                                    @endforeach
                                </select>


                            <label class="form-group">Lampiran</label>
                            <input type="file" class="form-control" name="lampiran_nodin" required>

                            <label for="exampleInputEmail1">Sifat</label>
                                <select id="sifat" name="sifat" required="required" class="form-control">
                                    <option value="Biasa">Biasa</option>
                                    <option value="Rahasia">Rahasia</option>
                                    <option value="Sangat Rahasia">Sangat Rahasia</option>
                                </select>

                            <label for="exampleInputEmail1">Urgensi</label>
                                <select id="urgensi" name="urgensi" required="required" class="form-control">
                                    <option value="Segera">Segera</option>
                                    <option value="Rutin">Rutin</option>
                                    <option value="Sangat Segera">Sangat Segera</option>
                                </select>

                            <label for="exampleInputEmail1">Perihal</label>
                            <input name="perihal" id="perihal" type="text" class="form-control">
                           
                            <label for="exampleInputEmail1">Isi Surat</label>
                            <textarea name="isi" id="isi">{{$isi}}</textarea>
                        </div>
                        <input type="hidden" name="status" id="status" value="">
                        <div class="card-footer">
                            <button type="button" class="btn btn-warning" onclick="validasi('0');">Draft</button>&nbsp
                            <button type="button" class="btn btn-primary" onclick="validasi('1');">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
       
        $('#kepada').select2();
        $('#dari').select2();
        $('#pemeriksa').select2();
        $('#tembusan').select2();
     
        $('#isi').summernote({
          height: 842,
          toolbar:[
                ['paperSize',['paperSize']], // The Button
                ['style',['style']],
                ['font',['bold','italic','underline','clear']],
                ['fontname',['fontname']],
                ['color',['color']],
                ['para',['ul','ol','paragraph']],
                ['height',['height']],
                ['table',['table']],
                ['insert',['media','link','hr']],
                ['view',['fullscreen','codeview']],
                ['help',['help']]
            ],
        });
        $('.note-frame').addClass('note-document');
        $('.note-editing-area').addClass('a4');
        $('.note-editable').css({'width':'800px'});
        function validasi(status){
            document.getElementById('status').value=status;
            document.getElementById('form_nodin').submit();
        }
      </script>
</section>
@endsection

@section('default_scripts')
@include('components.form_script')
@endsection

