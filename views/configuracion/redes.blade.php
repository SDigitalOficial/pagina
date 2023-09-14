
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
       <a href="/gestor/ver-templates"><i class="fa fa-desktop"></i> Ver templates</a>
      </li>
      <li>
       <a href="/gestion/logo-head"><i class="fa fa-arrow-circle-up"></i> Logo encabezado</a>
      </li>
      <li>
       <a href="/gestion/logo-footer"><i class="fa fa-arrow-circle-down"></i> Logo pie página</a>
      </li>
      <li>
       <a href="/gestion/configurar-correo"><i class="fa fa-envelope"></i> Configurar correo</a>
      </li>
         <li class="active">
       <a href="/gestion/redes-sociales"><i class="hi hi-bullhorn"></i> Redes sociales</a>
      </li>
      @if(Auth::user()->id == 1)
      <li>
       <a href="/gestion/venta"><i class="gi gi-usd"></i> Ventas</a>
      </li>
      @else
      @endif
     </ul>
    </div>

 <div class="container topper">

  <?php $status=Session::get('status');?>
      @if($status=='ok_update')
      <div class="alert alert-warning">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Datos informativos actualizados con éxito</strong> CMS ...
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
                                       
                                        <h2><strong>Datos informativos</strong> del sitio web</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                            
                                    <!-- Basic Form Elements Content -->
                                     @foreach($plantilla as $plantilla)
                                      {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/redes-sociales'))) }}
                                        <h4 class="text-primary"><b>Redes Sociales</b></h4>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Facebook</label>
                                            <div class="col-md-9">
                                                 {{Form::text('facebook', $plantilla->facebook, array('class' => 'form-control','placeholder'=>'Ingrese url'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Twitter</label>
                                            <div class="col-md-9">
                                                 {{Form::text('twitter', $plantilla->twitter, array('class' => 'form-control','placeholder'=>'Ingrese url'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Youtube</label>
                                            <div class="col-md-9">
                                                {{Form::text('youtube', $plantilla->youtube, array('class' => 'form-control','placeholder'=>'Ingrese url'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Linkedin</label>
                                            <div class="col-md-9">
                                                 {{Form::text('linkedin', $plantilla->linkedin, array('class' => 'form-control','placeholder'=>'Ingrese url'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Instagram</label>
                                            <div class="col-md-9">
                                                 {{Form::text('instagram', $plantilla->instagram, array('class' => 'form-control','placeholder'=>'Ingrese url'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Vimeo</label>
                                            <div class="col-md-9">
                                                 {{Form::text('vimeo', $plantilla->vimeo, array('class' => 'form-control','placeholder'=>'Ingrese url'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Google</label>
                                            <div class="col-md-9">
                                                 {{Form::text('google', $plantilla->google, array('class' => 'form-control','placeholder'=>'Ingrese url'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Pinterest</label>
                                            <div class="col-md-9">
                                                 {{Form::text('pinterest', $plantilla->pinterest, array('class' => 'form-control','placeholder'=>'Ingrese url'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Whatsapp</label>
                                            <div class="col-md-9">
                                                 {{Form::text('whatsapp', $plantilla->whatsapp, array('class' => 'form-control','placeholder'=>'Ingrese url'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Google</label>
                                            <div class="col-md-9">
                                                 {{Form::text('google', $plantilla->google, array('class' => 'form-control','placeholder'=>'Ingrese url'))}}
                                            </div>
                                        </div>
                                                {{Form::hidden('template', $plantilla->template, array('class' => 'form-control','placeholder'=>'Ingrese url'))}}

                                        <h4 class="text-primary"><b>Datos Template</b></h4>
                                        <hr>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Template</label>
                                            <div class="col-md-9">
                                              <select class="form-control" name="template">
                                               <option value="{{$plantilla->template}}">{{$plantilla->template}}</option>
                                               @foreach($template as $template)
                                               <option value="{{$template->slug}}">{{$template->nombre}}</option>
                                               @endforeach
                                            </select>
                                            </div>
                                        </div>

                                        <h4 class="text-primary"><b>Datos empresa</b></h4>
                                        <hr>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Dirección</label>
                                            <div class="col-md-9">
                                                 {{Form::text('direccion', $plantilla->direccion, array('class' => 'form-control','placeholder'=>'Ingrese url'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Teléfono</label>
                                            <div class="col-md-9">
                                                 {{Form::text('telefono', $plantilla->telefono, array('class' => 'form-control','placeholder'=>'Ingrese teléfono'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Horario atención</label>
                                            <div class="col-md-9">
                                                 {{Form::text('horario', $plantilla->horario, array('class' => 'form-control','placeholder'=>'Ingrese horario'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Correo electrónico</label>
                                            <div class="col-md-9">
                                                 {{Form::text('correo', $plantilla->correo, array('class' => 'form-control','placeholder'=>'Ingrese correo'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::textarea('descripcion', $plantilla->descripcion, array('class' => 'form-control','placeholder'=>'Ingrese texto descripción'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Suscribete</label>
                                            <div class="col-md-9">
                                                 {{Form::textarea('suscribete', $plantilla->suscribete, array('class' => 'form-control','placeholder'=>'Ingrese texto suscripción'))}}
                                            </div>
                                        </div>

                                         <h4 class="text-primary"><b>Configuración email</b></h4>
                                        <hr>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Color Head</label>
                                            <div class="col-md-9">
                                                 {{Form::color('head', $plantilla->head, array('class' => 'form-control','placeholder'=>'Ingrese url'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Color Footer</label>
                                            <div class="col-md-9">
                                                 {{Form::color('footer', $plantilla->footer, array('class' => 'form-control','placeholder'=>'Ingrese url'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nombre Empresa</label>
                                            <div class="col-md-9">
                                                 {{Form::text('empresa', $plantilla->empresa, array('class' => 'form-control','placeholder'=>'Nombre Empresa'))}}
                                            </div>
                                        </div>

                                        <h4 class="text-primary"><b>Configuración Cookies</b></h4>
                                        <hr>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Título</label>
                                            <div class="col-md-9">
                                                 {{Form::text('cook_titulo', $plantilla->cook_titulo, array('class' => 'form-control','placeholder'=>'Ingrese título'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Texto</label>
                                            <div class="col-md-9">
                                                 {{Form::text('cook_texto', $plantilla->cook_texto, array('class' => 'form-control','placeholder'=>'Ingrese texto'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Enlace</label>
                                            <div class="col-md-9">
                                                 {{Form::text('cook_enlace', $plantilla->cook_enlace, array('class' => 'form-control','placeholder'=>'Ingrese Enlace'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Estado</label>
                                            <div class="col-md-9">
                                                {{ Form::select('cook_estado', [
                                                 $plantilla->cook_estado =>  $plantilla->cook_estado,
                                                 '1' => 'Visible',
                                                 '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                            {{Form::hidden('terminos', $plantilla->terminos, array('class' => 'form-control','placeholder'=>'Ingrese horario'))}}
                                            
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Editar</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Cancelar</button>
                                            </div>
                                        </div>

                                      {{ Form::close() }} 
                                      @endforeach

                                 
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