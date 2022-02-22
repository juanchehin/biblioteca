<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Biblioteca - CIIDEPT</title>
    <style type="text/css">
      
      @page teacher {
        size: A4 portrait;
        margin: 2cm;
      }

    .teacherPage {
      page: teacher;
      page-break-after: always;
    }
    </style>

  </head>
  <body>
 
    <main>
      <div id="details" class="clearfix">
        <div id="invoice">
{{--           <h1>Sistema Biblioteca - CIIDEPT</h1>
 --}}          <div class="date">Fecha de Impresión: {{ $date }}</div>
        </div>
      </div>
      <table width="100%" border="1" cellspacing="1" cellpadding="5">
        <thead>
          <tr>
            <th align="center" class="no">Libro Nº</th>
            <th align="center" class="desc">Titulo</th>
            <th align="center" class="unit">Ubicación</th>
            <th align="center" class="total">Codigo QR</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($array as $items)
            <tr>
                 <td align="center" class="no">{!! $items->id!!}</td>
                 <td align="center" class="desc">{!! $items->titulo!!}</td> 
                 <td align="center" class="unit">{!! $items->ubicacion!!}</td>
                 <td align="center" class="total"><img src="data:image/png;base64,{!!$items->qr_img!!}" alt="qrcode"></img></td>           
            </tr>
            @endforeach
        </tbody>
        <tfoot>
        </tfoot>
      </table>
  </body>
</html>