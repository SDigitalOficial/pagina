
@extends ('adminsite.layout')

    @section('cabecera')
    @parent
     {{ Html::style('http://cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.css') }}
     {{ Html::style('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css') }}
    @stop

@section('ContenidoSite-01')


   <div class="content-header">
     <ul class="nav-horizontal text-center">
      <li class="active">
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
      <li>
       <a href="/gestion/redes-sociales"><i class="hi hi-bullhorn"></i> Redes Sociales</a>
      </li>
      <li>
       <a href="/consulta/formularios"><i class="fa fa-commenting-o"></i> Registros</a>
      </li>
      @if(Auth::user()->id == 1)
      <li>
       <a href="/gestion/venta"><i class="hi hi-bullhorn"></i> Ventas</a>
      </li>
      @else
      @endif
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



  @foreach($menu as $paga)
   @foreach($paga->subpaginas->take(50) as $subcategory)
   @endforeach
  @endforeach



<div class="container">

<div class="col-lg-12">
  <div class="panel panel-default">
   <div class="panel-heading"><h3>Páginas</h3></div>
    <div class="panel-body">

      <table class="table table-condensed" style="border-collapse:collapse;">
       <thead>
        <tr><th>&nbsp;</th>
            <th>Página</th>
            <th>Título</th>
            <th>Creación</th>
            <th>Actualización</th>
            <th>Recursos</th>
        </tr>
       </thead>

       <tbody>
        @foreach($menu as $paga)
         <tr data-toggle="collapse" data-target="#{{$paga->id}}" class="accordion-toggle">
          <td><button class="btn btn-default btn-xs"><i class="fa fa-eye"></i></button></td>
          <td>{{$paga->page}}</td>
          <td>{{$paga->titulo}}</td>
          <td>{{$paga->created_at}}</td>
          <td>{{$paga->updated_at}}</td>
          <td>
           <a href="/gestion/paginas/subpagina/{{ $paga->id }}" title="Crear Subpágina" class="open-Modal btn btn-primary"><i class="fa fa-files-o sidebar-nav-icon"></i></a>
           <a href="contenidos/digitales/{{$paga->id}}"><span id="tip" data-toggle="tooltip" data-placement="top" title="Ver Contenidos" class="btn btn-warning"><i class="fa fa-list-alt sidebar-nav-icon"></i></span>
           <a href="paginas/editar/{{ $paga->id }}"><span id="tup" data-toggle="tooltip" data-placement="bottom" title="Editar Página" class="btn btn-info"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
           @if($casta =='1')
           <a href="#"><span id="tup" data-toggle="tooltip" data-placement="bottom" title="$pagina->id" class="btn btn-danger nodelete"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
           @else
           <script language="JavaScript">
           function confirmar ( mensaje ) {
           return confirm( mensaje );}
           </script>
           
           <a href="/gestion/contenidos/diagrama/update/{{ $paga->id }}"><span id="tip" data-toggle="tooltip" data-placement="top" title="Ver Diagramación" class="btn btn-success"><i class="fa fa-columns sidebar-nav-icon"></i></span>
        
           <a href="<?=URL::to('gestion/paginas/eliminar/');?>/{{$paga->id}}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="right" title="Eliminar Página" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
           @endif
           </td>
          </tr>
        
          <tr>
           <td colspan="12" class="hiddenRow"><div class="accordian-body collapse" id="{{$paga->id}}">
            @foreach($paga->subpaginas->take(50) as $subcategory)
             <table class="table table-striped">
              <tbody>
               <tr>
                <td><button class="btn btn-default btn-xs"><i class="fa fa-check-square-o"></i></button></td>
                <td>{{$subcategory->page}}</td>
                <td>{{$subcategory->titulo}}</td>
                <td>{{$subcategory->created_at}}</td>
                <td>{{$subcategory->updated_at}}</td>
                <td>
                 <a href="contenidos/digitales/{{$subcategory->id}}"><span id="tip" data-toggle="tooltip" data-placement="top" title="Ver Contenidos" class="btn btn-warning"><i class="fa fa-list-alt sidebar-nav-icon"></i></span>
                 <a href="paginas/editar/{{ $subcategory->id }}"><span id="tup" data-toggle="tooltip" data-placement="bottom" title="Editar Página" class="btn btn-info"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
                 @if($casta =='1')
                 <a href="#"><span id="tup" data-toggle="tooltip" data-placement="bottom" title="$pagina->id" class="btn btn-danger nodelete"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
                 @else
                 <script language="JavaScript">
                 function confirmar ( mensaje ) {
                 return confirm( mensaje );}
                 </script>
                 <a href="/gestion/contenidos/diagrama/update/{{ $subcategory->id }}"><span id="tip" data-toggle="tooltip" data-placement="top" title="Ver Diagramación" class="btn btn-success"><i class="fa fa-columns sidebar-nav-icon"></i></span>
                 <a href="<?=URL::to('gestion/paginas/eliminar/');?>/{{$subcategory->id}}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="right" title="Eliminar Página" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
                 @endif
                 </td>
                </tr>
              </tbody>
             </table>
            @endforeach
           </td>
          </tr>
       
         @endforeach
  
       
    </tbody>
</table>
            </div>
        
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