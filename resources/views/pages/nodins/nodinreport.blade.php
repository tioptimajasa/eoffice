@extends('layouts.main')

@section('content')
    <section>
      <div class="card-header" style="padding-left: 4cm">
        <div class="row print">
          <div class="col-12" style="padding-bottom: 10px">
            <a href="{{ route('nodin.cetaknodin',$nodins->id)}}" target="_blank" rel="noopener" target="_blank" class="btn btn-primary float-right" style="margin-right:49px"><i class="fas fa-print"></i> Print</a>
            <a href="{{ route('nodin.index') }}" class="btn btn-success float-right" style="margin-right:10px"><i class="fas fa-success"></i> Back</a>
          </div>
          <div class="card">
            
            <div class="card-body" style="width: 21cm; height:33cm; margin-top:1cm; margin-right:4cm; margin-left:3cm; margin-bottom: 10cm;">
                <td colspan="2">
                  <div align="center" style=" padding-top: 2mm; width: 20cm">
                    <span style="font-family: Arial; font-size: 14px;"><b><u>NOTA DINAS</u></b></span>
                  </div>
                  <div align="center" style="padding-bottom: 10mm; width:20cm;">
                    <span style="font-family: Arial; font-size: 14px;">No :{{ $nodins->nomor_surat }}</span>
                  </div>
                  

                  <div class="form-group row" style="margin-bottom: 0.01rem">
                    <p style="width: 130px; padding-left:2mm; font-family:Arial, Helvetica, sans-serif; font-size: 14px;">Kepada</p>
                    <p style="width: 150px; padding-left: 2px; font-family:Arial, Helvetica, sans-serif; font-size: 14px; margin-bottom:-3px;">: {{ $nodins->kepada->jabatan}}</p>
                </div>
                <div class="form-group row" style="margin-bottom: 0.01rem">
                    <p style="width: 130px; padding-left:2mm; font-family:Arial, Helvetica, sans-serif; font-size: 14px;">Dari</p>
                    <p style="width: 150px; padding-left:2px; font-family:Arial, Helvetica, sans-serif; font-size: 14px; margin-bottom:-3px;">: {{ $nodins->dari->jabatan}}</p>

                </div>
                <div class="form-group row" style="margin-bottom: 0.01rem">
                    <p style="width: 130px; padding-left:2mm; font-family:Arial, Helvetica, sans-serif; font-size: 14px;">Tanggal</p>
                    <p style="width: 150px; padding-left:2px; font-family:Arial, Helvetica, sans-serif; font-size: 14px;">: {{ date("d F Y", strtotime($nodins->tanggal)) }}</p>

                </div>
                <div class="form-group row" style="margin-bottom: 0.01rem">
                    <p style="width: 130px; padding-left:2mm; font-family:Arial, Helvetica, sans-serif; font-size: 14px;">Sifat</p>
                    <p style="width: 50px; padding-left:2px; font-family:Arial, Helvetica, sans-serif; font-size: 14px;">: 
                     
                      {{ $nodins->sifat}}
                    </p>

                </div>
                <div class="form-group row" style="margin-bottom: 0.01rem">
                    <p style="width: 130px; padding-left:2mm; font-family:Arial, Helvetica, sans-serif; font-size: 14px;">Urgensi</p>
                    <p style="width: 150px; padding-left: 2px; font-family:Arial, Helvetica, sans-serif; font-size: 14px;">:
                     {{ $nodins->urgensi}}
                    </p>
                </div>
                <div class="form-group row" style="margin-bottom: 0.01rem">
                    <p style="width: 130px; padding-left:2mm; font-family:Arial, Helvetica, sans-serif; font-size: 14px;">Perihal</p>
                    <p style="padding-left: 2px; font-family:Arial, Helvetica, sans-serif; font-size: 14px;">: {{ $nodins->perihal}}</p>
                </div>

              
                <hr style="margin-left:0.2mm; margin-right:1mm; height:2px; width:21cm; color:gray;background-color:gray;">
              
                  <div class="row" style="width:800px; padding-left: 2mm; padding-bottom:180px">
                    <p style="margin-top: 10px;">
                    {!! $nodins->isi !!}
                    </p>
                  </div>
                  <div class="row" style="width:1024px; padding-left: 600px; padding-bottom:10px">
                    <p style="padding-bottom: 20mm">{{ $nodins->dari->nama_organisasi }}</p>
                  </div>
                  <div  align="center" style="width:900px; padding-left:450px; ;">
                    <span style="font-family: Arial; font-size: 14px;"><b><u>{{ $nodins->dari_user->name }}</u></b></span>
                  </div>
                  <div align="right" style="padding-right:19mm;">
                    <p>{{ $nodins->dari->jabatan }}</p>
                  </div>
                </td>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
