@extends ('adminsite.layout')
 
 @section('ContenidoSite-01')

<div class="content-header">
      <ul class="nav-horizontal text-center">
      <li class="active"> 
       <a href="/gestor/ver-templates"><i class="fa fa-desktop"></i> Ver templates</a>
      </li>
      <li>
       <a href="/gestion/logo-head"><i class="fa fa-arrow-circle-up"></i> Logo encabezado</a>
      </li>
      <li>
       <a href="/gestion/logo-footer"><i class="fa fa-arrow-circle-down"></i> Logo pie página</a>
      </li>
      <li>
       <a href="/gestion/whatsapp"><i class="fa fa-envelope"></i> Whatsapp</a>
      </li>
         <li>
       <a href="/gestion/redes-sociales"><i class="hi hi-bullhorn"></i> Redes sociales</a>
      </li>
          <li>
       <a href="/gestion/recaptcha"><i class="hi hi-bullhorn"></i> Recaptcha</a>
      </li>
      </li>
         <li>
       <a href="/gestion/ubicacion"><i class="gi gi-google_maps"></i></i> Ubicación</a>
      </li>
      </li>
      @if(!$tenantName)
         <li>
       <a href="/gestion/registrosaas"><i class="gi gi-google_maps"></i></i> Hotsnames</a>
      </li>
      
      @endif
      @if(Auth::user()->id == 1)
      <li>
       <a href="/gestion/venta"><i class="gi gi-usd"></i> Ventas</a>
      </li>
      @else
      @endif
         <li>
       <a href="/gestion/seo"><i class="gi gi-google_maps"></i></i>Seo</a>
      </li>
     </ul>
    </div>


 <div class="container">
  <?php $status=Session::get('status'); ?>
  @if($status=='ok_create')
   <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>>Template Registrado Con Éxito</strong> CMS...
   </div>
  @endif

  @if($status=='ok_delete')
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Template Eliminado Con Éxito</strong> CMS...
   </div>
  @endif

  @if($status=='ok_update')
   <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Template actualizado con éxito</strong> CMS...
   </div>
  @endif

 </div>




 <div class="container">
   <a href="<?=URL::to('/gestor/subir-template');?>"><button type="button" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-star"></span> Subir template</button></a>
   <a href="<?=URL::to('/gestor/ver-config/publico');?>"><button type="button" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-star"></span> Público</button></a>
   <a href="<?=URL::to('/gestor/ver-config/privado');?>"><button type="button" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-star"></span> Privado</button></a>
  </div>

<br>

<div class="container">
  


 <div class="block full">
                            <div class="block-title">
                                <h2><strong>Templates</strong> registrados</h2>
                            </div>

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                    <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Template</th>
                                    <th>Template slug</th>
                                    <th>Autor</th>
                                    <th>Creación</th>
                                    <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                              
                                         @foreach($templates as $templates)
                                        <tr>
                                            <td class="text-center">{{$templates->id}}</td>
                                            <td class="text-center">{{$templates->nombre}}</td>
                                            <td>{{$templates->slug}}</td>
                                            <td>SiteDigital</td>
                                            <td> {{ date('d M, Y', strtotime($templates->created_at)) }}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                           @if(DB::table('colors')->where('template', $templates->slug)->exists())
                                           <a href="<?=URL::to('gestion/editar-template');?>/{{$templates->slug}}"><span  id="tip" data-toggle="tooltip" data-placement="left" title="Editar template" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
                                           @else
                                            <a href="<?=URL::to('gestion/crear-template');?>/{{$templates->slug}}"><span  id="tip" data-toggle="tooltip" data-placement="left" title="Editar template" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
                                            @endif    
          <a href="<?=URL::to('gestor/templates/eliminartemplate/');?>/{{$templates->nombre}}" onclick="return confirm('¿Está seguro que desea eliminar el registro?')"><button ="button" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Eliminar template"><i class="hi hi-trash sidebar-nav-icon"></i></button></a>


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