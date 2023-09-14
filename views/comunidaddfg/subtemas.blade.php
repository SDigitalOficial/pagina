@extends ('adminsite.layout')

    @section('cabecera')
    @parent
   
    @stop

@section('ContenidoSite-01')

<div class="content-header">
 <ul class="nav-horizontal text-center">
     <li>
       <a href="/gestion/comunidad"><i class="fa fa-list-ul"></i> Categorias</a>
      </li>
      <li class="active">
       <a href="/gestion/comunidad/temas"><i class="fa fa-file-o"></i> Campos conceptuales</a>
      </li>
      <li>
       <a href="/gestion/comunidad/areas"><i class="fa fa-clipboard"></i> Áreas</a>
      </li>
      <li>
       <a href="/gestion/comunidad/interes"><i class="fa fa-clipboard"></i> Temas de interés</a>
      </li>
       
       <li>
       <a href="/gestion/comunidad/roles"><i class="fa fa-user"></i> Roles comunidad</a>
      </li>
    
  </ul>
</div>


 <div class="container">
  <?php $status=Session::get('status'); ?>
  @if($status=='ok_create')
   <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Variable Didáctica Registrada Con Éxito</strong> CMS...
   </div>
  @endif

  @if($status=='ok_delete')
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Variable Didáctica Eliminada Con Éxito</strong> CMS...
   </div>
  @endif

  @if($status=='ok_update')
   <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Variable Actualizada Registrada Con Éxito</strong> CMS...
   </div>
  @endif

 </div>

<div class="container">
  <a href="/gestion/comunidad/crear-subtema/{{Request::segment(4)}}" class="btn btn-primary pull-right">Crear Variable Didáctica</a>
</div>
<br>
<div class="container">

 <div class="block full">
                            <div class="block-title">
                                <h2><strong>Variables Didácticas</strong> Registradas</h2>
                            </div>
                            

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Título</th>
                                            <th class="text-center">Descripción</th>
                                            <th>Creación</th>
                                            <th>Actualización</th>
                                         
                                            
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   @foreach($temas as $temas) 
                                        <tr>
                                            <td class="text-center">{{ $temas->subtema }}</td>
                                            <td class="text-center">{{ $temas->subdescripcion }}</td>
                                            <td>{{ $temas->created_at }}</td>
                                            
                                            <td>{{ $temas->updated_at }}</td>
                                            <td class="text-center">

      <a href="<?=URL::to('gestion/comunidad/editar-subtema/');?>/{{ $temas->id }}"><span  id="tip" data-toggle="tooltip" data-placement="left" title="Editar Variable" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
      <script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );}
</script>
    <a href="<?=URL::to('gestion/comunidad/eliminar-subtema/');?>/{{ $temas->id }}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="right" title="Eliminar Variable" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
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

@stop