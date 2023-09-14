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
    <strong>País Registrado Con Éxito</strong> CMS...
   </div>
  @endif

  @if($status=='ok_delete')
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>País Eliminado Con Éxito</strong> CMS...
   </div>
  @endif

  @if($status=='ok_update')
   <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>País Actualizado Con Éxito</strong> CMS...
   </div>
  @endif

  
    @if($status=='ok_import')
   <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>País Importados Con Éxito</strong> CMS...
   </div>
  @endif


 </div>








<div class="container">
  


<a href="{{ URL::to('gestion/paises/downloadExcel/xls') }}"><button class="btn btn-success">Descargar paises xls</button></a>
<a href="{{ URL::to('gestion/paises/downloadExcel/xlsx') }}"><button class="btn btn-success">Descargar paises xlsx</button></a>
<a href="{{ URL::to('gestion/paises/downloadExcel/csv') }}"><button class="btn btn-success">Descargar paises CSV</button></a>
<a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Importar paises</a>

<a href="{{ URL::to('gestion/crear-pais') }}" class="btn btn-primary pull-right">Crear País</a>
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
                                <h2><strong>Países</strong> Registrados</h2>
                            </div>

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">País</th>
                                            <th class="text-center">País</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                          @foreach($pais as $pais)
                                       
                                        <tr>
                                            <td class="text-center">{{$pais->id}}</td>
                                            <td class="text-center">{{$pais->pais}}</td>
                                            <td class="text-center">{{$pais->pais}}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                  <a href="<?=URL::to('gestion/ubicacion/departamentos/');?>/{{ $pais->id }}"><span  id="tip" data-toggle="tooltip" data-placement="left" title="Ver Ciudades" class="btn btn-warning"><i class="fa fa-eye"></i></span></a>
                                                   <a href="<?=URL::to('gestion/pais-editar/');?>/{{ $pais->id }}"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar País" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
                                                  <a href="<?=URL::to('gestion/eliminarpais/');?>/{{$pais->id}}" onclick="return confirm('¿Está seguro que desea eliminar el registro?')"><button ="button" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Eliminar País"><i class="hi hi-trash sidebar-nav-icon"></i></button></a>
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