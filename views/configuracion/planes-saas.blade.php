 @extends ('adminsite.layout')
 
 @section('ContenidoSite-01')


 <div class="content-header">
    <ul class="nav-horizontal text-center">
      <li class="active">
       <a href="/gestor/planes-saas"><i class="fa fa-list-alt"></i>Planes</a>
      </li>
      <li>
       <a href="/suscripcion/ver-clientes"><i class="fa fa-users"></i>Clientes</a>
      </li> 
      <li>
      	<a href="/suscripcion/ver-suscripciones"><i class="fa fa-pencil-square"></i>Suscripciones</a>
      </li>
      <li>
        <a href="/suscripcion/pagos"><i class="fa fa-credit-card"></i>Pagos</a>
      </li>
      <li>
        <a href="/suscripcion/credenciales"><i class="fa fa-unlock-alt"></i>Credenciales</a>
      </li>
     </ul>
    </div>

<div role="tabpanel" class="tab-pane active" id="contenido">
 <div class="container">
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


<a class="btn btn-primary pull-right" href="/gestor/crear-plansaas">Crear plan de suscripción</a>
<br><br>
<br>
    <div class="block full">
                            <div class="block-title">
                                <h2><strong>Planes</strong> registrados</h2>
                            </div>
                           

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Título</th>
                                            <th class="text-center">Texto</th>
                                            <th>Posición</th>
                                            <th>Tipo</th>
                                            <th>Nivel</th>

                                          
                                              <th class="text-center">Tarea</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($xmls['data'] as $data)
                                        <tr>
                                         <td>{{$data['id_plan']}}</td>
                                         <td>{{$data['name']}}</td>
                                         <td>{{$data['description']}}</td>
                                         <td>${{number_format($data['amount'],0,",",".")}}</td>
                                         <td>{{$data['created']}}</td>
                                 
                                         <td class="text-center">
                                        <a href="/gestor/editar-plan/{{$data['id_plan']}}"><span id="tup" data-toggle="tooltip" data-placement="left" title="Editar Plan" class="btn btn-success"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
                                          <script language="JavaScript">
                                            function confirmar ( mensaje ) {
                                            return confirm( mensaje );}
                                          </script>
                                          <a href="<?=URL::to('/suscripcion/eliminar-plan/');?>/{{$data['id_plan']}}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="bottom" title="Eliminar plan" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
                                         </td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
 </div>
    </div>







 <script type="text/javascript">
$(document).ready(function(){
    $('#example-datatable').DataTable();
});
</script>


<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

    <script src="/adminsite/js/pages/tablesDatatables.js"></script>
        <script>$(function(){ TablesDatatables.init(); });</script>
 @stop

