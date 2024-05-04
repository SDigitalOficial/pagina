 @extends ('adminsite.layout')
 

  @section('ContenidoSite-01')


  <div class="content-header">
   <ul class="nav-horizontal text-center">
    <li class="active">
     <a href="/gestion/factura"><i class="fa fa-users"></i> Clientes</a>
    </li>
    <li>
     <a href="/gestion/factura/factura-cliente"><i class="fa fa-user-plus"></i> Crear cliente</a>
    </li>
    <li>
     <a href="/gestion/factura/crear-producto"><i class="fa fa-shopping-basket"></i> Crear producto</a>
    </li>
    <li>
     <a href="/gestion/factura/editar-empresa"><i class="fa fa-building"></i> Configurar empresa</a>
    </li>
    <li>
     <a href="/gestion/factura/control-gastos"><i class="gi gi-money"></i> Gastos</a>
    </li>
    <li>
     <a href="/informe/generar-informe"><i class="fa fa-file-text"></i> Informes</a>
    </li>
   </ul>
  </div>

 <div class="container">
  <?php $status=Session::get('status'); ?>
  @if($status=='ok_create')
   <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Cliente registrado con éxito</strong>
   </div>
  @endif

  @if($status=='ok_delete')
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Ciente eliminado con éxito</strong>
   </div>
  @endif

  @if($status=='ok_update')
   <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Cliente actualizado con éxito</strong>
   </div>
  @endif

 </div>



<div class="container">
  


 <div class="block full">
                            <div class="block-title">
                                <h2><strong>Notas</strong> Blog</h2>
                            </div>

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Imagen</th>
                                            <th class="text-center">Título</th>
                                            <th class="text-center">Autor</th>
                                            <th class="text-center">Slug</th>
                                            <th class="text-center">Fecha Creación</th>
                                    
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                         @foreach($blogs as $blogs)
                                        <tr>
                                            <td class="text-center" width="20%">
                                                <img src="/{{$blogs->image}}" class="img-responsive">
                                
                                            </td>
                                            <td class="text-center">
                                                {{$blogs->title}}
                                            </td>
                                            <td class="text-center">
                                            {{$blogs->imageal}}
                                            </td>
                                            <td class="text-center">{{$blogs->slug}}</td>
                                            <td class="text-center">{{$blogs->created_at}}</td>
                                            
                                            <td class="text-center">
                                            
                                              <a href="<?=URL::to('gestion/contenidos/editarblog');?>/{{$blogs->id}}"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar cliente" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
                                        
                                              <script language="JavaScript">
                                              function confirmar ( mensaje ) {
                                              return confirm( mensaje );}
                                              </script>
                                              <a href="<?=URL::to('gestion/contenidos/eliminarblog');?>/{{$blogs->id}}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="right" title="Eliminar cliente" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END Datatables Content -->




</div>




<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

    <script src="/adminsite/js/pages/tablesDatatables.js"></script>
        <script>$(function(){ TablesDatatables.init(); });</script>
  

  @stop
