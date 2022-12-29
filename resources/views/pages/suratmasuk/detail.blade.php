@extends('layouts.main')
  @section('content')

  <section class="content">
    <div class="col-md-9" style=" padding-top: 20px; margin-left:200px;">
      <div class="card">
        <div class="card-header p-2">
          <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Surat Nota Dinas</a></li>
            <li class="nav-item"><a class="nav-link" href="#disposisi" data-toggle="tab">Disposisi</a></li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <div class="grid-container">
                <div class="grid-item">
                  <div class="col-12 product-image-thumbs" style="margin-bottom: 10px; margin-left: 65px; " >
                    <a href="{{url('/admin/nodins-report')}}">
                    {{-- <a href="{{url('/admin/cetak_pdf')}}" target="_blank"> --}}
                    <div class="product-image-thumb active"><img src="{{ asset('assets/dist/img/dokumen.png') }}" ></div>
                    <p style="font-size: 14px"></p>
                  </a>
                  </div>
                </div>

                <div class="form-group row">
                  <hr size="10px" width="100%">
                  <table width="10%" style="width:500px" align="center" cellspacing="1" cellpadding="5">
                    @foreach($nodins as $detail)
                    <tr>
                      <th>Nomor Surat
                        <td style="width: 10em">: {{$detail->nomor_surat}}</td>
                      </th>
                    </tr>
                  <tr>
                      <td style="width: 200px">Tanggal & Jam</td>
                      <td style="width: 20em">: {{$detail->tanggal}} </td>
                    </tr>
                    <tr>
                    </tr>

                    <tr>
                      <td style="width: 200px">Kepada</td>
                      <td style="width: 20em">:{{$detail->kepada}} </td>
                    </tr>
                    <tr>
                      <td style="width: 200px">Dari</td>
                      <td style="width: 20em">: {{$detail->dari}}</td>

                    </tr>
                    <tr>
                      <td style="width: 200px">Perihal</td>
                      <td style="width: 20em">:{{$detail->perihal}} </td>
                    </tr>
                    
                    <tr>
                      <td style="width: 200px">Status</td>
                      <td style="width: 20em">: {{$detail->status}}</td>
                    </tr>
                    <tr>
                      <td style="width: 200px">Sifat</td>
                      <td style="width: 20em">: {{$detail->sifat}}</td>

                    </tr>
                    <tr>
                      <td style="width: 200px">Urgensi</td>
                      <td style="width: 20em">: {{$detail->urgensi}}</td>
                    </tr>
                  </table>
                  <hr size="10px" width="100%">

                  <div class="download">
                    <p style="width:500px" align="center">File Lampiran</p>
                    <p><a href="/{{$detail->lampiran_nodin}}" class="btn btn-app bg-info" style= width:100%;  target="_blank"><i class="fa fa-download"></i>Download</a><p>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            <div class="tab-pane" id="disposisi">
              <div class="form-group row">
                <div class="row">
                  <div class="col-12">
                    <h4>
                      <a class="btn btn-app bg-warning">
                      <i class="fas fa-envelope"></i> 
                      </a> No Surat Nota Dinas : {{$detail->nomor_surat}}
                    </h4>
                  </div>
                </div>
              </div>
              <div class="row">
                <table>
                  @foreach($nodins as $detail)
                  <tr>
                    <th>Tanggal Surat Nota Dinas</th>
                    <th>Asal Surat Nota Dinas</th>
                    <th>Disposisi Saat ini</th>
                  </tr>
                  <tr>
                    <td style="padding-bottom: 20px"> : {{$detail->tanggal}}</td>
                    <td style="padding-bottom : 20px">: {{ $detail->dari}}</td>
                    <td style="padding-bottom : 20px">: {{ $detail->kepada}}</td>
                  </tr>
                  @endforeach
                  {{-- <tr>
                    <th>Sifat Surat</th>
                    <th>Perihal</th>
                  </tr> --}}
                  {{-- <tr>
                    <td style="padding-bottom: 20px"> : {{$detail->sifat}}</td>
                    <td style="padding-bottom : 20px">: {{$detail->perihal}}</td>
                  </tr> --}}
                </table>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

