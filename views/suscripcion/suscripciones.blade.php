@extends ('adminsite.layout')
 
 @section('ContenidoSite-01')


  <div class="content-header">
     <ul class="nav-horizontal text-center">
      <li>
       <a href="/gestor/planes-saas"><i class="fa fa-list-alt"></i>Planes</a>
      </li>
      <li>
       <a href="/suscripcion/ver-clientes"><i class="fa fa-users"></i>Clientes</a>
      </li> 
      <li class="active">
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


 <div class="container">
 

    <div class="block full">
                            <div class="block-title">
                                <h2><strong>Clientes</strong> registrados</h2>
                            </div>
                           

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID Cliente</th>
                                            <th class="text-center">Plan</th>
                                            <th>Fecha inicio</th>
                                            <th>Fecha finalización</th>
                                            <th class="text-center">Estado</th>
                                            <th class="text-center">Tarea</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($xmls['data'] as $data)
                                        <tr>
                                          <td class="text-center">{{$data['idCustomer']}}</td>
                                         <td class="text-center">{{$data['idPlan']}}</td>
                                         <td class="text-center">{{$data['periodStart']}}</td>
                                         <td class="text-center">{{$data['periodEnd']}}</td>
                                         @if($data['status'] == "active")
                                         <td class="text-center"><span class="label label-success"> Activo </span></td>
                                         @elseif($data['status'] == "inactive")
                                         <td class="text-center"><span class="label label-warning"> Inactivo </span></td>
                                         @elseif($data['status'] == "canceled")
                                         <td class="text-center"><span class="label label-danger"> Cancelado </span></td>
                                         @endif
                                         <td class="text-center">
                                     
                                          <script language="JavaScript">
                                            function confirmar ( mensaje ) {
                                            return confirm( mensaje );}
                                          </script>
                                          <a href="<?=URL::to('/suscripcion/eliminar-plan/');?>/" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="bottom" title="Eliminar contenido" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
                                         </td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
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
