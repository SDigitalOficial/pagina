
@extends ('adminsite.layout')

    @section('cabecera')
    @parent
     {{ Html::style('http://cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.css') }}
     {{ Html::style('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css') }}
    @stop

@section('ContenidoSite-01')

 <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 topper">

  <?php $status=Session::get('status');?>
    @if($status=='ok_create')
      <div class="alert alert-success">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página registrada con exito</strong> US ...
      </div>
    @endif

    @if($status=='ok_delete')
      <div class="alert alert-danger">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página eliminada con exito</strong> US ...
      </div>
    @endif

    @if($status=='ok_update')
      <div class="alert alert-warning">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página actualizada con exito</strong> US ...
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
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">No Borders</a>
                                        </div>
                                        <h2><strong>Crear</strong> Sub Página</h2>
                                    </div>
                                    <!-- END Form Elements Title -->

                                    <!-- Basic Form Elements Content -->
                                    {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm1', 'url' => array('gestion/paginas/crearpagina'))) }}
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nombre Página</label>
                                            <div class="col-md-9">
                                                {{Form::text('pagina', '', array('class' => 'form-control','placeholder'=>'Ingrese página','maxlength' => '50' ))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Título</label>
                                            <div class="col-md-9">
                                                 {{Form::text('titulo', '', array('class' => 'form-control','placeholder'=>'Ingrese título', 'maxlength' => '55'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Palabras Clave</label>
                                            <div class="col-md-9">
                                                {{Form::text('palabras', '', array('class' => 'form-control','placeholder'=>'Ingrese palabras clave','maxlength' => '150'))}}
                                            </div>
                                        </div>

                                        {{Form::hidden('posti', '2', array('class' => 'form-control','placeholder'=>'Ingrese la descripción de la página'))}}
                                        {{Form::hidden('categoria', '0', array('class' => 'form-control','placeholder'=>'Ingrese la descripción de la página'))}}        

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-textarea-input">Descripción</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('descripcion', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción', 'maxlength' => '159'))}}
                                            </div>
                                        </div>

                                        <input type="hidden" name="DNI" id="DNI" value="{{Request::segment(4)}}"/>
                                        
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                            </div>
                                        </div>
                                     {{ Form::close() }}
                                    <!-- END Basic Form Elements Content -->
                                </div>
                                <!-- END Basic Form Elements Block -->
                            </div>
                          </div>

</div>






  
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

  {{ Html::script('Usuario/js/valida.js') }}
  {{ Html::script('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js') }} 
 
  {{ Html::script('https://cdn.datatables.net/1.10.1/js/jquery.dataTables.min.js') }}
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