@extends ('adminsite.layout')

    @section('cabecera')
    @parent
     {{ Html::style('http://cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.css') }}
     {{ Html::style('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css') }}
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
      <li class="active">
       <a href="/gestion/configurar-correo"><i class="fa fa-envelope"></i> Conf. Correo</a>
      </li>
         <li>
       <a href="/gestion/redes-sociales"><i class="hi hi-bullhorn"></i> Redes Sociales</a>
      </li>
     </ul>
    </div>

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
                                        <h2><strong>Configurar</strong> Correo</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                            
                                    <!-- Basic Form Elements Content -->
                                   
                                      {{ Form::open(array('files' => true,'method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizarventa'))) }}
                                         @foreach($venta as $venta)
                               
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Módulo página</label>
                                            <div class="col-md-9">
                                                {{ Form::select('pagina', [$venta->pagina => $venta->pagina,
                                                  '1' => 'Comprado',
                                                  '0' => 'No Comprado'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>	

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Módulo estadistica</label>
                                            <div class="col-md-9">
                                                {{ Form::select('estadistica', [$venta->estadistica => $venta->estadistica,
                                                  '1' => 'Comprado',
                                                  '0' => 'No Comprado'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>	

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Módulo calendario</label>
                                            <div class="col-md-9">
                                                {{ Form::select('calendario', [$venta->calendario => $venta->calendario,
                                                  '1' => 'Comprado',
                                                  '0' => 'No Comprado'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>					
                                       				
                                       <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Módulo facturación</label>
                                            <div class="col-md-9">
                                                {{ Form::select('facturacion', [$venta->facturacion => $venta->facturacion,
                                                  '1' => 'Comprado',
                                                  '0' => 'No Comprado'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>			

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Módulo carrito</label>
                                            <div class="col-md-9">
                                                {{ Form::select('carrito', [$venta->carrito => $venta->carrito,
                                                  '1' => 'Comprado',
                                                  '0' => 'No Comprado'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>		

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Módulo siteavnza</label>
                                            <div class="col-md-9">
                                                {{ Form::select('siteavanza', [$venta->siteavanza => $venta->siteavanza,
                                                  '1' => 'Comprado',
                                                  '0' => 'No Comprado'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Módulo usuarios</label>
                                            <div class="col-md-9">
                                                {{ Form::select('usuarios', [$venta->usuarios => $venta->usuarios,
                                                  '1' => 'Comprado',
                                                  '0' => 'No Comprado'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>			
                                       		
                                       

                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                            </div>
                                        </div>
                                        @endforeach
                                      {{ Form::close() }} 
                                   

                                 
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