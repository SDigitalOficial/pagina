@extends ('adminsite.layoutsaas')

@section('ContenidoSite-01')




@if(!Auth::user()->saas_id)

<div class="container-fluid">
    
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  
<h3>Para el siguiete paso usted debe registrar la tarjeta de crédito y luego proceder a la suscripción del plan seleccionado</h3>
</div>
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <?php $status=Session::get('status'); ?>
  @if($status=='ko_datos')
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Los datos de tarjeta ingresados no son validos verifique e intente de nuevo</strong>
   </div>
  @endif

  @if($status=='ok_datos')
   <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Los datos de tarjeta ingresados no son validos verifique e intente de nuevo</strong>
   </div>
  @endif


<div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">No Borders</a>
                    </div>
                    <h2><i class="fa fa-credit-card-alt"></i> <strong>Tarjeta de</strong> crédito</h2>
                </div>
                <!-- END Horizontal Form Title -->

                <!-- Horizontal Form Content -->
                 {{ Form::open(array('method' => 'POST','class' => 'form-horizontal form-bordered','id' => 'defaultForm', 'url' => array('suscripcion/tarjeta'))) }}
               
                    <div class="form-group">
                        <div class="col-md-12">
                        <label class="col-md-12" for="example-hf-email">Número de tarjeta</label>
                            <input type="text" name="card_number" class="form-control" value="{{ old('card_number') }}" placeholder="00000000000000000">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                        <label class="col-md-12" for="example-hf-password">Año expiración</label>
                            <input type="text" name="exp_year" class="form-control" value="{{ old('exp_year') }}" placeholder="0000">
                        </div>
                        <div class="col-md-4">
                        <label class="col-md-12" for="example-hf-password">Mes expiración</label>
                            <input type="text" name="exp_month" class="form-control" value="{{ old('exp_month') }}" placeholder="00">
                        </div>
                        <div class="col-md-4">
                        <label class="col-md-4" for="example-hf-password">CVC</label>
                            <input type="text" name="cvc" class="form-control" value="{{ old('cvc') }}" placeholder="000">
                        </div>
                    </div>

                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-credit-card-alt"></i> Vincular tarjeta</button>
                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Limpiar</button>
                        </div>
                    </div>
                 {{ Form::close() }}
                <!-- END Horizontal Form Content -->
            </div>
@if($tarjetascont == 0)

@else
@if($suscripcioncont == 1)
@else
<a class="btn btn-primary btn-block" href="/suscripcion/planweb">Crear suscripción</a>
@endif
@endif


        @foreach($suscripcion as $suscripcion)
        <li>{{$suscripcion->desde}}</li>
            <li>{{$suscripcion->hasta}}</li>
        {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('suscripcion/crearhost'))) }}


           <input type="text" name="host" class="form-control" value="" placeholder="hostname">
           <input type="text" name="hasta" class="form-control" value="{{ \Carbon\Carbon::parse($suscripcion->hasta)->format('Y-m-d')}}" placeholder="0000">
           <input type="text" name="plan" class="form-control" value="{{$suscripcion->plan_id}}" placeholder="0000">
           <input type="password" name="password" class="form-control" value="" placeholder="Ingrese contraseña">
           <button type="submit" class="btn btn-primary btn-md btn-block">Crear hostname</button>
        {{ Form::close() }}    
        @endforeach
</div>


 <div class="col-md-4">
                                <!-- Horizontal Form Block -->
                                <div class="block">
                                    <!-- Horizontal Form Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">No Borders</a>
                                        </div>
                                        <h2><strong>Tarjeta</strong> registrada</h2>
                                    </div>
                                    <!-- END Horizontal Form Title -->

                                    <!-- Horizontal Form Content -->
                                    <form action="page_forms_general.html" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
                                        <div class="form-group text-center">
                                             <i class="fa fa-credit-card-alt text-primary" style="font-size: 70px"></i>
                                             @foreach($tarjetas as $tarjetas)
                                             <h4><b>Nombre tarjeta</b><br>{{$tarjetas->name_card}}</h4>
                                             <h4><b>Número</b><br>{{$tarjetas->mask}}</h4>
                                             @endforeach
                                        </div>
                                        
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Eliminar tarjeta</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END Horizontal Form Content -->
                                </div>
                              </div>



<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
      @foreach($planes as $planes)
    @if($planes->id_plan == Session::get('suscripcion'))    
     <div class="panel panel-primary">
      <div class="panel-heading text-center"><h3 class="text-center">{{$planes->name}}</h3></div>
       <div class="panel-body center-block">
       <h3 class="text-center"> ${{number_format($planes->amount,0,",",".")}}/Mensual</h3>
       <h3 class="text-center text-primary"></h3>
      <form action="/suscripcioneli/session" method="post">
       <button type="submit" class="btn btn-danger btn-md center-block">Cancelar suscripción</button>
      </form>
      </div>
    </div>
@else

            @endif  
             @endforeach
</div>
@else
@foreach($infosaas as $infosaas)
@foreach($website as $website)
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

  <?php $status=Session::get('status');?>
    @if($status=='ok_create')
      <div class="alert alert-success">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Se ha cancelado la suscripción correctamente</strong> US ...
      </div>
    @endif

    @if($status=='ok_delete')
      <div class="alert alert-danger">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>No se ha cancelado la suscripción verifique e intente de nuevo</strong> US ...
      </div>
    @endif

 <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <!-- Customer Info Block -->
                                <div class="block">
                                    <!-- Customer Info Title -->
                                    <div class="block-title">
                                        <h2><i class="fa fa-file-o"></i> <strong>Información</strong> cuenta</h2>
                                    </div>
                                    <!-- END Customer Info Title -->

                                    <!-- Customer Info -->
                                    <div class="block-section text-center">
                                        <a href="javascript:void(0)">
                                            <img src="/modulo-saas/img/avatar4@2x.jpg" alt="avatar" class="img-circle">
                                        </a>
                                        <h3>
                                            <strong>{{Auth::user()->name}} {{Auth::user()->last_name}}</strong><br><small></small>
                                        </h3>
                                    </div>
                                    <table class="table table-borderless table-striped table-vcenter" >
                                        <tbody>
                                             <tr>
                                                <td class="text-right"><strong>Estado</strong></td>
                                                @if($resp == 'true')
                                    <td><span class="label label-success"><i class="fa fa-check"></i> Activo </span></td>
                                                @else
                                    <td><span class="label label-danger"><i class="fa fa-check"></i> Inactivo </span></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="text-right" style="width: 50%;"><strong>Hostname</strong></td>
                                                <td><a href="//{{$infosaas->fqdn}}" target="_blank">{{$infosaas->fqdn}}</a></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><strong>ingresao administación</strong></td>
                                                <td><a href="//{{$infosaas->fqdn}}/login" target="_blank">{{$infosaas->fqdn}}/sd/login</a></td>
                                            </tr>
                                             <tr>
                                                <td class="text-right"><strong>Email</strong></td>
                                                <td>{{$website->email}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><strong>Base de datos</strong></td>
                                                <td>{{$infosaas->uuid}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><strong>Fecha registro</strong></td>
                                                <td>{{$infosaas->created_at}}</td>
                                            </tr>

                                            <tr>
                                                <td class="text-right"><strong>Suscripción</strong></td>
                                            <td>
                                            {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/usuario/cancelarplan'))) }}
                                            <input type="hidden" class="form-control" name="idsuscripcion" id="" placeholder="Input field" value="{{$idsuscripcion}}">
                                             <script language="JavaScript">
                                             function confirmar ( mensaje ) {
                                             return confirm( mensaje );}
                                            </script>
                                            <button onclick="return confirmar('¿Está seguro que desea cancelar la suscripción?')" type="submit" class="btn btn-primary">Cancelar suscripción</button>
                                            {{ Form::close() }}
                                            </td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                    <!-- END Customer Info -->
                                </div>
                              </div>
                            </div>
  
</div>
                 

@endforeach
@endforeach
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  

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
</div>


        @endif
</div>



<script src="/adminsite/js/vendor/jquery.min.js"></script>
 <script src="/adminsite/js/pages/formsWizard.js"></script>
        <script>$(function(){ FormsWizard.init(); });</script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
   <script src="/adminsite/js/pages/tablesDatatables.js"></script>
        <script>$(function(){ TablesDatatables.init(); });</script>

@stop