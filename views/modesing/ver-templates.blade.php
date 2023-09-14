@extends ('adminsite.layout')
 
 @section('ContenidoSite-01')

 <div class="content-header">
  <ul class="nav-horizontal text-center">
   <li class="active">
    <a href="/gestion/usuario"><i class="gi gi-parents"></i> Usuarios</a>
   </li>
   <li>
    <a href="/gestion/crear-usuario"><i class="fa fa-user-plus"></i> Crear Usuario</a>
   </li>
  </ul>
 </div>


 <div class="container">
  <?php $status=Session::get('status'); ?>
  @if($status=='ok_create')
   <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Usuario Registrado Con Éxito</strong> CMS...
   </div>
  @endif

  @if($status=='ok_delete')
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Usuario Eliminado Con Éxito</strong> CMS...
   </div>
  @endif

  @if($status=='ok_update')
   <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Usuario Actualizado Con Éxito</strong> CMS...
   </div>
  @endif

 </div>








<div class="container">
  


 <div class="block full">
                            <div class="block-title">
                                <h2><strong>Templates</strong> Registrados</h2>
                            </div>

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                    <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Template</th>
                                    <th>E-mail</th>
                                    <th>Dirección</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                              
                                         @foreach($templates as $templates)
                                        <tr>
                                            <td class="text-center">{{$templates->id}}</td>
                                            <td class="text-center">{{$templates->nombre}}</td>
                                            <td>{{$templates->slug}}</td>
                                            <td>{{$templates->address}}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                  <a href="<?=URL::to('');?>"><span  id="tip" data-toggle="tooltip" data-placement="left" title="Enviar Mensaje" class="btn btn-warning"><i class="gi gi-envelope sidebar-nav-icon"></i></span></a>
                                                   <a href="<?=URL::to('gestion/usuario/editar/');?>/{{ $templates->id }}"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar Usuario" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
                                                  <a href="<?=URL::to('gestion/usuario/eliminar/');?>/{{$user->id}}" onclick="return confirm('¿Está seguro que desea eliminar el registro?')"><button ="button" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Eliminar Usuario"><i class="hi hi-trash sidebar-nav-icon"></i></button></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END Datatables Content -->




</div>


<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>


<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

    <script src="/adminsite/js/pages/tablesDatatables.js"></script>
        <script>$(function(){ TablesDatatables.init(); });</script>
  

  @stop

  
     