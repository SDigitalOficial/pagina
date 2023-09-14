@extends ('LayoutsSD.Layout')
  
 @section('ContenidoSite-01')


<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-lg-offset-3" id="content">
<i class="far fa-check-circle text-center text-primary center-block" style="font-size: 100px; color: green"></i>
<br>
<p class="text-center" style="font-size: 22px">¡Tu pago se ha regstrado satisfactoriamente!</p>

<br>
  @foreach($informacion as $informacion)
   <table class="table table-striped" >
      <thead class="bg-primary">
        <tr>
          <th>Información transacción</th>
          <th></th>
        </tr>
      </thead>
      <tbody >
        <tr>
       
          <td>Referencia pago</td>
          <td>{{$informacion->referencia}}</td>
        </tr>
        <tr>
          <td>Valor transacción</td>
          <td>${{number_format($informacion->valor,0,",",".")}}</td>
        </tr>
        <tr>
          <td>Estado</td>
          <td>{{$informacion->estado}}</td>
        </tr>
        <tr>
          <td>Código autorización</td>
          <td>{{$informacion->request_id}}</td>
        </tr>
        <tr>
          <td>Tipo documento</td>
          <td>{{$informacion->tipo}}</td>
        </tr>
        <tr>
          <td>Documento</td>
          <td>{{$informacion->documento}}</td>
        </tr>

      </tbody>
    </table>
@endforeach
<div id="editor"></div>
<button id="cmd">generate PDF</button>
</div>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
{{ Html::script('modulo-saas/valida.js') }}
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js') }}

  {{ Html::script('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js') }} 
<script type="text/javascript">
	var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#cmd').click(function () {
    doc.fromHTML($('#content').html(), 15, 15, {
        'width': 100,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
});

</script>
@stop

