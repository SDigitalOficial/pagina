
@extends ('adminsite.layout')

    @section('cabecera')
    @parent
     {{ Html::style('//cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.css') }}
     {{ Html::style('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css') }}
     {{ Html::style('EstilosSD/dist/css/jquery.minicolors.css') }}
    @stop

@section('ContenidoSite-01')

 <div class="content-header">
     <ul class="nav-horizontal text-center">
      <li>
       <a href="/gestion/paginas"><i class="fa fa-file-o"></i> Ver Páginas</a>
      </li>
      <li>
       <a href="/gestion/paginas/crear"><i class="fa fa-file-o"></i> Crear Página</a>
      </li>
      <li>
       <a href="/gestion/pagina-principal"><i class="fa fa-clipboard"></i> Página Entrada</a>
      </li>
      <li>
       <a href="/gestion/ordenar-paginas"><i class="fa fa-cubes"></i> Ordenar Páginas</a>
      </li>
      <li>
       <a href="/gestion/logo-head"><i class="fa fa-arrow-circle-up"></i> Logo Head</a>
      </li>
      <li>
       <a href="/gestion/logo-footer"><i class="fa fa-arrow-circle-down"></i> Logo Footer</a>
      </li>
      <li>
       <a href="/gestion/configurar-correo"><i class="fa fa-envelope"></i> Conf. Correo</a>
      </li>
         <li class="active"> 
       <a href="/gestion/redes-sociales"><i class="hi hi-bullhorn"></i> Redes Sociales</a>
      </li>
     </ul>
    </div>

 <div class="container topper">

  <?php $status=Session::get('status');?>
      @if($status=='ok_update')
      <div class="alert alert-warning">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Datos Informativos Actualizados Con Éxito</strong> CMS ...
      </div>
    @endif
   
   
 </div>

<div class="container">
  <div class="row">
                            <div class="col-md-12">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                       
                                        <h2><strong>Configuración</strong> Plantilla</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                            
                                    <!-- Basic Form Elements Content -->
                                
                                      {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/crear-configuracion'))) }}
                                       <div class="container">
                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-lg-offset-2">
                                          <br>
                                          <hr>
                                          <h4 class="text-primary"><strong>Encabezado</strong></h4>
                                          <hr>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Color Fondo Encabezado</label>
                                            <div class="col-md-9">
                                                {{Form::text('bg-encabezado', '', array('id' => 'hue-demo', 'class' => 'form-control demo','data-control'=>'hue'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Color Texto Encabezado</label>
                                            <div class="col-md-9">
                                                {{Form::text('text-encabezado', '', array('id' => 'hue-demo', 'class' => 'form-control demo','data-control'=>'hue'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Color Icono Encabezado</label>
                                            <div class="col-md-9">
                                                {{Form::text('icono-encabezado', '', array('id' => 'hue-demo', 'class' => 'form-control demo','data-control'=>'hue'))}}
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                        <h4 class="text-primary"><strong>Menú</strong></h4>
                                        <hr>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Color Fondo Menú</label>
                                            <div class="col-md-9">
                                                {{Form::text('bg-menu', '', array('id' => 'hue-demo', 'class' => 'form-control demo','data-control'=>'hue'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Color Texto Menú</label>
                                            <div class="col-md-9">
                                                {{Form::text('text-menu', '', array('id' => 'hue-demo', 'class' => 'form-control demo','data-control'=>'hue'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Color Texto Hover</label>
                                            <div class="col-md-9">
                                                {{Form::text('text-menuh', '', array('id' => 'hue-demo', 'class' => 'form-control demo','data-control'=>'hue'))}}
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                        <h4 class="text-primary"><strong>Base</strong></h4>
                                        <hr>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Color Texto Base</label>
                                            <div class="col-md-9">
                                                {{Form::text('text-base', '', array('id' => 'hue-demo', 'class' => 'form-control demo','data-control'=>'hue'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Color Botones</label>
                                            <div class="col-md-9">
                                                {{Form::text('bg-boton', '', array('id' => 'hue-demo', 'class' => 'form-control demo','data-control'=>'hue'))}}
                                            </div>
                                        </div>
                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Botones Redondeados</label>
                                            <div class="col-md-9">
                                             <select class="form-control" name="btn-redondo">
                                              <option value="0">Cuadrados</option>
                                              <option value="30">Semi Redondo</option>
                                              <option value="100">Redondos</option>
                                             </select>
                                            </div>
                                           </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Alto de Botones</label>
                                            <div class="col-md-9">
                                             <select class="form-control" name="inp-alto">
                                              <option value="10">Bajo</option>
                                              <option value="20">Medio</option>
                                              <option value="30">Alto</option>
                                             </select>
                                            </div>
                                           </div>
                                        <br>
                                        <hr>
                                        <h4 class="text-primary"><strong>Pie de Página</strong></h4>
                                        <hr>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Color Fondo Pie de Página</label>
                                            <div class="col-md-9">
                                                {{Form::text('bg-pie', '', array('id' => 'hue-demo', 'class' => 'form-control demo','data-control'=>'hue'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Color Texto Pie de Página</label>
                                            <div class="col-md-9">
                                                {{Form::text('text-pie', '', array('id' => 'hue-demo', 'class' => 'form-control demo','data-control'=>'hue'))}}
                                            </div>
                                        </div>

                                         <hr>
                                        <h4 class="text-primary"><strong>Bajo de Página</strong></h4>
                                        <hr>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Color Bajo de Página</label>
                                            <div class="col-md-9">
                                                {{Form::text('bg-bajo', '', array('id' => 'hue-demo', 'class' => 'form-control demo','data-control'=>'hue'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Color Bajo Pie de Página</label>
                                            <div class="col-md-9">
                                                {{Form::text('text-bajo', '', array('id' => 'hue-demo', 'class' => 'form-control demo','data-control'=>'hue'))}}
                                            </div>
                                        </div>


                                        <input type="hidden" name="template" id="input" class="form-control" value="{{Request::segment(3)}}" >

                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Editar</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Cancelar</button>
                                            </div>
                                        </div>


                                      {{ Form::close() }} 
                             
                                 
                                </div>
                                <!-- END Basic Form Elements Block -->
                            </div>
                          </div>
                          
                      </div>







  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

{{ Html::script('EstilosSD/dist/js/jquery.minicolors.min.js') }}

<script type="text/javascript">
$(function(){
  var colpick = $('.demo').each( function() {
    $(this).minicolors({
      control: $(this).attr('data-control') || 'hue',
      inline: $(this).attr('data-inline') === 'true',
      letterCase: 'lowercase',
      opacity: false,
      change: function(hex, opacity) {
        if(!hex) return;
        if(opacity) hex += ', ' + opacity;
        try {
          console.log(hex);
        } catch(e) {}
        $(this).select();
      },
      theme: 'bootstrap'
    });
  });
  
  var $inlinehex = $('#inlinecolorhex h3 small');
  $('#inlinecolors').minicolors({
    inline: true,
    theme: 'bootstrap',
    change: function(hex) {
      if(!hex) return;
      $inlinehex.html(hex);
    }
  });
});
</script>

  {{ Html::script('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js') }} 
 
  {{ Html::script('//cdn.datatables.net/1.10.1/js/jquery.dataTables.min.js') }}
  {{ Html::script('//cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.js') }}
    

  <script>
     $(document).ready (function () {
   $('.nodelete').click (function () {
     alert("No puede eliminar todas las paginas del site si desea eliminar esta pagina debe crear una nueva");
   });});
</script>

  
  <script type="text/javascript" language="javascript" class="init">
   $(document).ready(function() {
   $('#example').dataTable();} );
  </script>

  <script>
   $(document).ready (function () {
   $('.delete').click (function () {
   if (confirm("¿ Está seguro de que desea eliminar ?")) {
   var id = $(this).attr ("title");
   document.location.href='paginas/delete/'+id;}});});
  </script> 

  <script type="text/javascript">
$(document).on("click", ".open-Modal", function () {
var myDNI = $(this).data('id');
$(".modal-body #DNI").val( myDNI );
});
</script>

<SCRIPT language="JavaScript" type="text/javascript"> 

function contador (campo, cuentacampo, limite) { 
if (campo.value.length > limite) campo.value = campo.value.substring(0, limite); 
else cuentacampo.value = limite - campo.value.length; 
} 

</script>


@stop