<html>
  <head>
    <title>e-office</title>
  </head>

  <body>
    <table>
      <td colspan="2">
          <div align="center">
            <span style="font-family: Arial; font-size: x-small;"><b><u>NOTA DINAS</u></b></span>
          </div>
            <div align="center" style="padding-bottom: 10mm">
              <span style="font-family: Arial; font-size: x-small;">No : {{ $nodins->nomor_surat }}</span>
            </div>
          <table border="0" cellpadding="1" style="width: 200px; padding-left: 50px"><tbody>
            </tr>
            <tr>  
              <td width="93px"><span style="font-family: Arial; font-size: x-small;">Kepada</span></td> 
              <td width="8px"><span style="font-family: Arial; font-size: x-small;">:</span></td> 
              <td width="600px"><span style="font-family: Arial; font-size: x-small;">{{ $nodins->kepada->jabatan}}  </span></td> 
            </tr>
            <tr>
              <td><span style="font-family: Arial; font-size: x-small;">Dari</span></td>   
              <td><span style="font-family: Arial; font-size: x-small;">:</span></td>    
              <td><span style="font-family: Arial; font-size: x-small;">{{ $nodins->dari->jabatan}}</span></td> 
            </tr>
            <tr>
              <td><span style="font-family: Arial; font-size: x-small;">Tanggal</span></td>
              <td><span style="font-family: Arial; font-size: x-small;">:</span></td>
              <td><span style="font-family: Arial; font-size: x-small;">{{ date("d F Y", strtotime($nodins->tanggal)) }}</span></td> 
            </tr>
            <tr>
              <td><span style="font-family: Arial; font-size: x-small;">Sifat</span></td>
              <td><span style="font-family: Arial; font-size: x-small;">:</span></td>
              <td><span style="font-family: Arial; font-size: x-small;">{{ $nodins->sifat }}</span></td> 
            </tr>
            <tr>
              <td><span style="font-family: Arial; font-size: x-small;">Urgensi</span></td>
              <td><span style="font-family: Arial; font-size: x-small;">:</span></td>
              <td><span style="font-family: Arial; font-size: x-small;">{{ $nodins->urgensi }}</span></td> 
            </tr>
            <tr>
              <td><span style="font-family: Arial; font-size: x-small;">Perihal</span></td>
              <td><span style="font-family: Arial; font-size: x-small;">:</span></td>
              <td><span style="font-family: Arial; font-size: x-small;">{{ $nodins->perihal }} </span></td> 
            </tr>
          </table>
          
          <table border="0" cellpadding="1" style="width: 700px; padding-left: 50px; padding-right: 50px; padding-bottom: 0.5px;"><tbody>
            <hr/>
          </table>
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="callout callout-info" style= "width: 600px; font-size:12px;  font-family:Arial, Helvetica, sans-serif;padding-left:50px; padding-right: 60px; padding-bottom: 100px">
                    <div align="justify">
                      {!! $nodins->isi !!}
                    </div>
                  </div>
                </div>
                <div class="row" style="width:1024px; padding-left: 420px; font-family: Arial; font-size: 12px;">
                  <p style="padding-bottom: 0mm">{{ $nodins->dari->nama_organisasi }}</p>
                </div>
               
                <div  align="center" style="width:900px; padding-left:35px;">
                  <span style="font-family: Arial; font-size: 12px;"><b><u>{{ $nodins->dari_user->name }}</u></b></span>
                </div>
                <div align="left" style="width:200px; padding-left:460px; font-family: Arial; font-size: 12px;">
                  <p>{{ $nodins->dari->jabatan }}</p>
                </div>
              </div>
            </div>
          </section>
      </body>
</html>