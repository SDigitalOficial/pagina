
@extends ('adminsite.layout')

    @section('cabecera')
    @parent
     {{ Html::style('//cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.css') }}
     {{ Html::style('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css') }}
    @stop

@section('ContenidoSite-01')


   <div class="content-header">
     <ul class="nav-horizontal text-center">
      <li class="active">
       <a href="/gestion/paginas"><i class="fa fa-file-text"></i> Ver páginas</a>
      </li>
      <li>
       <a href="/gestion/paginas/crear"><i class="fa fa-file-o"></i> Crear página</a>
      </li>
   
      <li>
       <a href="/consulta/formularios"><i class="fa fa-commenting-o"></i> Registros <span class="badge">{{$conteo}}</span></a>
      </li>
     
     </ul>
    </div>

 <div class="container topper">
<div class="col-md-12">
  <?php $status=Session::get('status');?>
    @if($status=='ok_create')
      <div class="alert alert-success">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página Creada Con Éexito</strong> CMS ...
      </div>
    @endif

    @if($status=='ok_delete')
      <div class="alert alert-danger">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página Eliminada Con Éxito</strong> CMS ...
      </div>
    @endif

    @if($status=='ok_update')
      <div class="alert alert-warning">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página Editada Con Éxito</strong> CMS ...
      </div>
    @endif

     @if($status=='ok_nodelete')
      <div class="alert alert-info">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Usted No Puede Eliminar Esta Página Porque Aún Tiene Subpaginas Asociadas</strong> CMS ...
      </div>
    @endif
   </div>
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
            <th>Acciones</th>
        </tr>
       </thead>

       <tbody>
        @foreach($menu as $paga)
        @if($paga->robot == 0)
        @else 
         <tr data-toggle="collapse" data-target="#{{$paga->id}}" class="accordion-toggle">
          <td> @if(count($paga->subpaginas) == 0)
            <button class="btn btn-default btn-xs"><i class="fa fa-eye"></i></button>
            @else
            <button class="btn btn-success btn-xs"><i class="fa fa-eye"></i></button>
            @endif
          </td>
   
          <td>{{$paga->page}}</td>
          <td>{{$paga->titulo}}</td>
          <td>{{$paga->created_at}}</td>
          <td>{{$paga->updated_at}}</td>
          <td>
           <a href="/gestion/paginas/subpagina/{{ $paga->id }}" id="tip" data-toggle="tooltip" data-placement="left" title="Crear subpágina" class="open-Modal btn btn-primary"><i class="fa fa-files-o sidebar-nav-icon"></i></a>

           <a href="contenidos/digitales/{{$paga->id}}"><span id="tip" data-toggle="tooltip" data-placement="top" title="Ver contenidos" class="btn btn-warning"><i class="gi gi-eye_open"></i></span></a>

           <a href="paginas/editar/{{ $paga->id }}"><span id="tup" data-toggle="tooltip" data-placement="bottom" title="Editar página" class="btn btn-info"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
           @if($casta =='1')
           <a href="#"><span id="tup" data-toggle="tooltip" data-placement="bottom" title="$pagina->id" class="btn btn-danger nodelete"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
           @else
           <script language="JavaScript">
           function confirmar ( mensaje ) {
           return confirm( mensaje );}
           </script>
           
           <a href="/gestion/contenidos/diagrama/update/{{ $paga->id }}"><span id="tip" data-toggle="tooltip" data-placement="top" title="Ver diagramación" class="btn btn-success"><i class="fa fa-columns sidebar-nav-icon"></i></span>
        
           <a href="<?=URL::to('gestion/paginas/eliminar/');?>/{{$paga->id}}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="right" title="Eliminar página" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
           @endif
           <a href="paginas/editarre/{{ $paga->id }}"><span id="tup" data-toggle="tooltip" data-placement="right" title="Replicar página" class="btn btn-info"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
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
                 <a href="contenidos/digitales/{{$subcategory->id}}"><span id="tip" data-toggle="tooltip" data-placement="top" title="Ver contenidos" class="btn btn-warning"><i class="gi gi-eye_open"></i></span></a>
                 <a href="paginas/editar/{{ $subcategory->id }}"><span id="tup" data-toggle="tooltip" data-placement="bottom" title="Editar página" class="btn btn-info"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
                 @if($casta =='1')
                 <a href="#"><span id="tup" data-toggle="tooltip" data-placement="bottom" title="$pagina->id" class="btn btn-danger nodelete"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
                 @else
                 <script language="JavaScript">
                 function confirmar ( mensaje ) {
                 return confirm( mensaje );}
                 </script>
                 <a href="/gestion/contenidos/diagrama/update/{{ $subcategory->id }}"><span id="tip" data-toggle="tooltip" data-placement="top" title="Ver diagramación" class="btn btn-success"><i class="fa fa-columns sidebar-nav-icon"></i></span></a>
                 <a href="<?=URL::to('gestion/paginas/eliminar/');?>/{{$subcategory->id}}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="bottom" title="Eliminar página" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
                 @endif

                 </td>
                </tr>
              </tbody>
             </table>
            @endforeach
           </td>
          </tr>
        @endif
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