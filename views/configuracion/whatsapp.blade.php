 @extends ('adminsite.layout')
 
 

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
         <li>
       <a href="/gestion/redes-sociales"><i class="hi hi-bullhorn"></i> Redes sociales</a>
      </li>
      </li>
         <li class="active">
       <a href="/gestion/ubicacion"><i class="gi gi-google_maps"></i> Ubicación</a>
      </li>
      @if(Auth::user()->id == 1)
      <li>
       <a href="/gestion/venta"><i class="gi gi-usd"></i> Ventas</a>
      </li>
      @else
      @endif
     </ul>
    </div>

 <div class="container">
  <?php $status=Session::get('status'); ?>
  @if($status=='ok_create')
   <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Whatsapp Registrado Con Éxito</strong> CMS...
   </div>
  @endif

  @if($status=='ok_delete')
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Whatsapp Eliminado Con Éxito</strong> CMS...
   </div>
  @endif

  @if($status=='ok_update')
   <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Whatsapp Actualizado Con Éxito</strong> CMS...
   </div>
  @endif

  
    @if($status=='ok_import')
   <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Whatsapp Importados Con Éxito</strong> CMS...
   </div>
  @endif


 </div>








<div class="container">
  
<a href="{{ URL::to('gestion/crear-whatsapp') }}" class="btn btn-primary pull-right">Crear número whatsapp</a>
<br>
<br>
<br>

<div class="modal fade" id="modal-id">
  <div class="modal-dialog">
    <div class="modal-content">
      <form style="margin-top: 15px;padding: 10px;" action="{{ URL::to('gestion/paises/importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <input type="file" name="import_file" />
        <br>
        
       
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary">Importar usuarios</button>
      </div>
      </form>
    </div>
  </div>
</div>


 <div class="block full">
                            <div class="block-title">
                                <h2><strong>Whatsapp</strong> Registrados</h2>
                            </div>

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Número</th>
                                            <th class="text-center">Área</th>
                                            <th class="text-center">Estado</th>
                                            <th class="text-center">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                         @foreach($whatsapp as $whatsapp)
                                       
                                        <tr>
                                            <td class="text-center">{{$whatsapp->id}}</td>
                                            <td class="text-center">{{$whatsapp->numero}}</td>
                                            <td class="text-center">{{$whatsapp->principal}}</td>
                                            <td class="text-center">
                                              @if($whatsapp->estado == 1)
                                             <h6><span class="label label-success">Activo</span></h6>
                                             @else
                                             <h6><span class="label label-danger">Inactivo</span></h6>
                                             @endif
                                           </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                
                                                   <a href="<?=URL::to('gestion/whatsapp-editar/');?>/{{$whatsapp->id}}"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar Whatsapp" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
                                                   @if($whatsapp->id == 1)
                                                   @else
                                                  <a href="<?=URL::to('gestion/eliminarwhatsapp/');?>/{{$whatsapp->id}}" onclick="return confirm('¿Está seguro que desea eliminar el registro?')"><button ="button" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Eliminar Whatsapp"><i class="hi hi-trash sidebar-nav-icon"></i></button></a>
                                                    @endif
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



<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

    <script src="/adminsite/js/pages/tablesDatatables.js"></script>
        <script>$(function(){ TablesDatatables.init(); });</script>
  

  @stop