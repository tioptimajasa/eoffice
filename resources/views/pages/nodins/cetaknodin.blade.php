<html>
  <head>
    <title>e-office</title>
  </head>

  <body>
    <table>
      <td colspan="2">
        @foreach($nodins as $cetaknodin)
          <div align="center">
            <span style="font-family: Arial; font-size: x-small;"><b><u>NOTA DINAS</u></b></span>
          </div>
            @foreach($nodins as $cetaknodin)
            <div align="center" style="padding-bottom: 10mm">
              <span style="font-family: Arial; font-size: x-small;">No : {{ $cetaknodin['nomor_surat']}}</span>
            </div>
          @endforeach
          <table border="0" cellpadding="1" style="width: 200px; padding-left: 50px"><tbody>
            </tr>
            <tr>  
              <td width="93px"><span style="font-family: Arial; font-size: x-small;">Kepada</span></td> 
              <td width="8px"><span style="font-family: Arial; font-size: x-small;">:</span></td> 
              <td width="600px"><span style="font-family: Arial; font-size: x-small;">{{ $cetaknodin['kepada_id']}}  </span></td> 
            </tr>
            <tr>
              <td><span style="font-family: Arial; font-size: x-small;">Dari</span></td>   
              <td><span style="font-family: Arial; font-size: x-small;">:</span></td>    
              <td><span style="font-family: Arial; font-size: x-small;">{{ $cetaknodin['dari_id']}}</span></td> 
            </tr>
            <tr>
              <td><span style="font-family: Arial; font-size: x-small;">Tanggal</span></td>
              <td><span style="font-family: Arial; font-size: x-small;">:</span></td>
              <td><span style="font-family: Arial; font-size: x-small;">{{ date("d F Y", strtotime($cetaknodin['tanggal'])) }}</span></td> 
            </tr>
            <tr>
              <td><span style="font-family: Arial; font-size: x-small;">Sifat</span></td>
              <td><span style="font-family: Arial; font-size: x-small;">:</span></td>
              <td><span style="font-family: Arial; font-size: x-small;">{{ $cetaknodin['sifat']}}</span></td> 
            </tr>
            <tr>
              <td><span style="font-family: Arial; font-size: x-small;">Urgensi</span></td>
              <td><span style="font-family: Arial; font-size: x-small;">:</span></td>
              <td><span style="font-family: Arial; font-size: x-small;">{{ $cetaknodin['urgensi']}}</span></td> 
            </tr>
            <tr>
              <td><span style="font-family: Arial; font-size: x-small;">Perihal</span></td>
              <td><span style="font-family: Arial; font-size: x-small;">:</span></td>
              <td><span style="font-family: Arial; font-size: x-small;">{{ $cetaknodin['perihal']}} </span></td> 
            </tr>
          </table>
          @endforeach
          <table border="0" cellpadding="1" style="width: 700px; padding-left: 50px; padding-right: 50px; padding-bottom: 0.5px;"><tbody>
            <hr/>
          </table>
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="callout callout-info" style= "width: 600px; font-size:12px;  font-family:Arial, Helvetica, sans-serif;padding-left:50px; padding-right: 60px;">
                    <div align="justify">
                      {!! $cetaknodin['isi'] !!}
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="callout callout-info" style= "font-size:12px; font-family:Arial, Helvetica, sans-serif;">
                    <div align="center" style="margin-top:10mm; padding-left:10cm;">
                      <p style="padding-bottom: 20mm"><b><u>{{ $cetaknodin['dari_id']}}</u><b></p>
                      <p align: center> {{ $cetaknodin['dari_id']}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
      </body>
</html>