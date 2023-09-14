@extends ('adminsite.layout')
<!-- Define el titulo de la Página -->    


 @section('ContenidoSite-01')

 {{ Html::style('//cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.css') }}

<div class="container">
 <a href="/gestion/contenidos/imgshuffleweb/{{Request::segment(4)}}">
  <button type="button" class="btn btn-primary pull-right botonera">
   Crear Contenido
  </button>
 </a>
</div>

<br>
 
@if($categorias == '[]')
<div class="container">
  <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>No tiene categorias</strong> Registradas de Click en crear contenido...
  </div>
</div>
@else
<div class="container">
 <div class="block full">
  
  <div class="block-title">
   <h2><strong>Gestión</strong> Contenidos Shuffle</h2>
  </div>
                            
  <div class="table-responsive">
   <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
    <thead>
     <tr>
      <th class="text-center">Id</th>
      <th class="text-center">Título</th>
      <th class="text-center">Descripción</th>
      <th>Imagen</th>
      <th class="text-center">Tarea</th>
     </tr>
    </thead>
    
    <tbody>
     @foreach($categorias as $categorias)
     <tr>
      <td>{{$categorias->id}}</td>
      <td>{{$categorias->titlecl}}</td>
      <td>{{$categorias->descriptioncl}}</td>
      <td>{{$categorias->imagealcl}}</td>
      <td class="text-center">
      <a href="<?=URL::to('gestion/contenidos/editarcontshuffle');?>/{{$categorias->id}}"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar Contenido" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
      <script language="JavaScript">
       function confirmar ( mensaje ) {
       return confirm( mensaje );}
      </script>
      <a href="<?=URL::to('gestion/contenidos/eliminarcontshuffle/');?>/{{$categorias->id}}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="bottom" title="Eliminar Contenido" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
      </td>
     </tr>
     @endforeach
    </tbody>
   </table>
  
    </div>
   </div>
  </div>

@endif

<footer>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

    <script src="/adminsite/js/pages/tablesDatatables.js"></script>
        <script>$(function(){ TablesDatatables.init(); });</script>
</footer>
 @stop


