@extends ('adminsite.layout')
 
 @section('cabecera')
  @parent
 @stop

@section('ContenidoSite-01')

<div class="content-header">
 <ul class="nav-horizontal text-center">
  <li class="active">
   <a href="/gestion/comercial"><i class="fa fa-list-ul"></i> Usuarios</a>
  </li>
  <li>
   <a href="/gestion/comercial/registro"><i class="fa fa-user-plus"></i> Registrar Datos Usuario</a>
  </li>
  <li>
   <a href="/gestion/comercial/productos"><i class="fa fa-file-o"></i>Productos & Servicios</a>
  </li>
  <li>
   <a href="/gestion/comercial/sectores"><i class="fa fa-file-o"></i>Sectores</a>
  </li>
  <li>
   <a href="/gestion/comercial/referidos"><i class="fa fa-file-o"></i>Referidos</a>
  </li>
   <li>
   <a href="/gestion/comercial/cantidades"><i class="fa fa-file-o"></i>Cantidades</a>
  </li>
   <li>
   <a href="/gestion/comercial/motivos"><i class="fa fa-file-o"></i>Motivo</a>
  </li>
  <li>
   <a href="/gestion/comercial/configuracion/1"><i class="fa fa-file-o"></i>Configuración</a>
  </li>
 </ul>
</div>

<div class="container">
 <?php $status=Session::get('status'); ?>
 @if($status=='ok_create')
  <div class="alert alert-success">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
   <strong>Usuario registrado con éxito</strong> CMS...
  </div>
 @endif

 @if($status=='ok_delete')
  <div class="alert alert-danger">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
   <strong>Usuario eliminado con éxito</strong> CMS...
  </div>
 @endif

 @if($status=='ok_update')
  <div class="alert alert-warning">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
   <strong>Usuario actualizado con éxito</strong> CMS...
  </div>
 @endif
</div>

<div class="container">


 
 <div class="block full">
  <div class="block-title">
   <h2><strong>Prospectos</strong> registrados</h2>
  </div>
            
  <div class="table-responsive">
   
<table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
 <thead>
  <tr>
   <th class="text-center">FQDN</th>
   <th class="text-center">Website Id</th>
   <th class="text-center">Template</th>
   <th class="text-center">Plan</th>
   <th class="text-center">Fecha</th>
 
   
 
   <th class="text-center">Usuario</th>
   <th class="text-center">Acciones</th>
  </tr>
 </thead>
    
 <tbody>
  @foreach($tenants as $tenants)
  @foreach($sites as $sitesa)
  @if($tenants->website_id == $sitesa->id)
   <tr>
    <td class="text-center">{{$tenants->fqdn}}</td>
   <td class="text-center"> <b>{{$sitesa->uuid}}</b> </td>
   <td>{{str_replace(['"','[',']'], ' ', DB::table($sitesa->uuid.'.'.'grape_select')->pluck('template'))}} --
    {{ str_replace(['"','[',']'], ' ',DB::table('multitenant.grape_template')->where('id', '=', DB::table($sitesa->uuid.'.'.'grape_select')->pluck('template'))->pluck('plantilla'))}}</td>
   <td><span class="badge">{{$tenants->plan_id}}</span></td>
   <td>{{$tenants->presentacion}}</td>



   @foreach($users as $user)
   @if($user->saas_id == $tenants->website_id)
   <td><a href="/gestion/usuario/editar/{{$user->id}}">{{$user->name}}</a></td>
   @else
   @endif
   @endforeach
 
       <td class="text-center">



        <a href="<?=URL::to('gestion/editar-tenants');?>/{{$tenants->id}}"><span  id="tip" data-toggle="tooltip" data-placement="left" title="Editar registro" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>



       <script language="JavaScript">
		    function confirmar ( mensaje ) {
		    return confirm( mensaje );}
	      </script>

       <a href="<?=URL::to('gestion/comercial/eliminar');?>/" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="top" title="Eliminar usuario" class="btn btn-danger" disabled="true"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
      

      
<!--
<a href="<?=URL::to('/portafolio/');?>/"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Ver Portafolio" class="btn btn-info"><i class="fa fa-book sidebar-nav-icon"></i></span></a>
-->
       </td>
      </tr>
       @else
       @endif
      @endforeach
      @endforeach
    </tbody>
   </table>
  </div>
 </div>
</div>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

  <script src="/adminsite/js/pages/tablesDatatables.js"></script>
  <script>$(function(){ TablesDatatables.init(); });</script>

@stop