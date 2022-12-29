@extends('layouts.main')

@section('content')
    <section>
      <div class="card-header">
        <div class="row no-print">
          <div class="col-12">
            <a href="{{url('/admin/cetakmemo')}}" target="_blank" rel="noopener" target="_blank" class="btn btn-primary float-right" style="margin-right:160px"><i class="fas fa-print"></i> Print</a>
            <a href="{{ route('memo.index') }}" class="btn btn-success float-right" style="margin-right:10px"><i class="fas fa-success"></i> Back</a>
          </div>
          <table>
            <td colspan="2">
              <div align="center">
                <span style="font-family: Arial; font-size: 14px;"><b><u>MEMO</u></b></span>
              </div>
              <div align="center" style="padding-bottom: 10mm">
                <span style="font-family: Arial; font-size: 14px;">No :{{ $memos->nomor_surat }}</span>
              </div>
              

              <div class="form-group row" style="margin-bottom: 0.1rem">
                <p style="width: 230px; padding-left:64mm; font-family:Arial, Helvetica, sans-serif; font-size: 14px;">Kepada</p>
                <p style="width: 320px; padding-left: 100px; font-family:Arial, Helvetica, sans-serif; font-size: 14px; margin-bottom:-3px;">: {{ $memos->kepada_id}}</p>
            </div>
            <div class="form-group row" style="margin-bottom: 0.1rem">
                <p style="width: 230px; padding-left:64mm; font-family:Arial, Helvetica, sans-serif; font-size: 14px;">Dari</p>
                <p style="width: 350px; padding-left:100px; font-family:Arial, Helvetica, sans-serif; font-size: 14px; margin-bottom:-3px;">: {{ $memos->dari_id }}</p>

            </div>
            <div class="form-group row" style="margin-bottom: 0.1rem">
                <p style="width: 230px; padding-left:64mm; font-family:Arial, Helvetica, sans-serif; font-size: 14px;">Tanggal</p>
                <p style="width: 350px; padding-left:100px; font-family:Arial, Helvetica, sans-serif; font-size: 14px;">: {{ date("d F Y", strtotime($memos->tanggal)) }}</p>

            </div>
            <div class="form-group row" style="margin-bottom: 0.1rem">
                <p style="width: 230px; padding-left:64mm; font-family:Arial, Helvetica, sans-serif; font-size: 14px;">Sifat</p>
                <p style="width: 350px; padding-left:100px; font-family:Arial, Helvetica, sans-serif; font-size: 14px;">: {{ $memos->sifat}}</p>

            </div>
            <div class="form-group row" style="margin-bottom: 0.1rem">
                <p style="width: 230px; padding-left:64mm; font-family:Arial, Helvetica, sans-serif; font-size: 14px;">Urgensi</p>
                <p style="width: 350px; padding-left:100px; font-family:Arial, Helvetica, sans-serif; font-size: 14px;">: {{ $memos->urgensi}}</p>
            </div>
            <div class="form-group row" style="margin-bottom: 0.1rem">
                <p style="width: 230px; padding-left:64mm; font-family:Arial, Helvetica, sans-serif; font-size: 14px;">Perihal</p>
                <p style="padding-left: 100px; font-family:Arial, Helvetica, sans-serif; font-size: 14px;">: {{ $memos->perihal}}</p>
            </div>

           
            <hr style="margin-left:61mm; margin-right:55mm; height:2px; color:gray;background-color:gray;">
           
              <div class="row" style="width:1024px; padding-left: 240px; padding-bottom:100px">
                <p style="margin-top: 10px;">
                {!! $memos->isi !!}
                </p>
              </div>
              <div class="row" style="width:1024px; padding-left: 800px; padding-bottom:10px">
                <p style="padding-bottom: 20mm"><b><u>{{ $memos->dari_id }}</u><b></p>
              </div>
              <div class="row" style="width:1024px; padding-left: 800px; padding-bottom:100px">
                <p style="padding-bottom: 20mm"><b>{{ $memos->dari_id }}<b></p>
              </div>
            </td>
          </table>
        </div>
      </div>
    </section>
@endsection
