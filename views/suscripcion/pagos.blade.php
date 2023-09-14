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
      <li>
        <a href="/suscripcion/ver-suscripciones"><i class="fa fa-pencil-square"></i>Suscripciones</a>
      </li>
      <li class="actice">
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
                                <h2><strong>Facturación</strong> host</h2>
                            </div>
                            

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Referencia</th>
                                            <th class="text-center">Fecha</th>
                                            <th  class="text-center">Valor</th>
                                              <th  class="text-center">Autorización</th>
                                               <th class="text-center">Franquicia</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Estado</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($facturas as $facturas)
                                        <tr>
                                            <td class="text-center">{{$facturas->ref_payco}}</td>
                                            <td class="text-center">{{$facturas->fecha_trans}}</td>
                                            <td class="text-center"><b>$ {{number_format($facturas->valor,0,",",".")}}</b></td>
                                            <td class="text-center">{{$facturas->autorizacion}}</a></td>
                                            <td class="text-center">{{$facturas->franquicia}}</a></td>
                                            <td class="text-center">{{$facturas->email}}</td>
                                            <td class="text-center"><span class="label label-success">{{$facturas->respuesta}}</span></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                                                    <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                                </div>
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
