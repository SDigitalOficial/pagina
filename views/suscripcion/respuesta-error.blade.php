@extends ('LayoutsSD.Layout')
  
 @section('ContenidoSite-01')


<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-lg-offset-3" id="content">
<i class="far fa-times-circle text-center text-primary center-block" style="font-size: 100px; color: red"></i>
<br>
<p class="text-center" style="font-size: 22px">¡Tu pago no se ha realizado verifica la información suministrada!</p>
<br>
<a href="{{Request::server('HTTP_REFERER')}}" type="button" class="btn btn-primary center-block">Regresar</a>

<br>

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
