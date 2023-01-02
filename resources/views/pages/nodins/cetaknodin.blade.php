<html>
  <head>
    <title>e-office</title>
  </head>

  <body>
          <div align="center">
            <span style="font-family: Arial; font-size: 12;"><b><u>NOTA DINAS</u></b></span>
          </div>
            <div align="center" style="padding-bottom: 10mm">
              <span style="font-family: Arial; font-size: 12;">No : {{ $nodins->nomor_surat }}</span>
            </div>
          <table border="0" cellpadding="1" style="width: 200px; padding-left: 50px"><tbody>
            </tr>
            <tr>  
              <td width="93px"><span style="font-family: Arial; font-size: 12;">Kepada</span></td> 
              <td width="8px"><span style="font-family: Arial; font-size: 12;">:</span></td> 
              <td width="600px"><span style="font-family: Arial; font-size: 12;">{{ $nodins->kepada->jabatan}}  </span></td> 
            </tr>
            <tr>
              <td><span style="font-family: Arial; font-size: 12;">Dari</span></td>   
              <td><span style="font-family: Arial; font-size: 12;">:</span></td>    
              <td><span style="font-family: Arial; font-size: 12;">{{ $nodins->dari->jabatan}}</span></td> 
            </tr>
            <tr>
              <td><span style="font-family: Arial; font-size: 12;">Tanggal</span></td>
              <td><span style="font-family: Arial; font-size: 12;">:</span></td>
              <td><span style="font-family: Arial; font-size: 12;">{{ date("d F Y", strtotime($nodins->tanggal)) }}</span></td> 
            </tr>
            <tr>
              <td><span style="font-family: Arial; font-size: 12;">Sifat</span></td>
              <td><span style="font-family: Arial; font-size: 12;">:</span></td>
              <td><span style="font-family: Arial; font-size: 12;">{{ $nodins->sifat }}</span></td> 
            </tr>
            <tr>
              <td><span style="font-family: Arial; font-size: 12;">Urgensi</span></td>
              <td><span style="font-family: Arial; font-size: 12;">:</span></td>
              <td><span style="font-family: Arial; font-size: 12;">{{ $nodins->urgensi }}</span></td> 
            </tr>
            <tr>
              <td><span style="font-family: Arial; font-size: 12;">Perihal</span></td>
              <td><span style="font-family: Arial; font-size: 12;">:</span></td>
              <td><span style="font-family: Arial; font-size: 12;">{{ $nodins->perihal }} </span></td> 
            </tr>
          </table>
          
          <table border="0" cellpadding="1" style="width: 700px; padding-left: 50px; padding-right: 50px; padding-bottom: 0.5px;"><tbody>
            <hr/>
          </table>
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="callout callout-info" style= "width: 600px; font-size:12;  font-family:Arial, Helvetica, sans-serif;padding-left:50px; padding-right: 60px;">
                    <div align="justify">
                      {!! $nodins->isi !!}
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="callout callout-info" style= "font-size:12; font-family:Arial, Helvetica, sans-serif;">
                    <div align="center" style="margin-top:10mm; padding-left:10cm;">
                      <p>{{ $nodins->dari->nama_organisasi}}</p>
                      <p align: center> <b><u>{{ $nodins->dari_user->name}}</u></b></p>
                      <p align: center> {{ $nodins->dari->jabatan}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
      </body>
</html>