@extends ('adminsite.layout')

    @section('cabecera')
    @parent
   
    @stop

@section('ContenidoSite-01')

<div class="content-header">
 <ul class="nav-horizontal text-center">
    <li class="active">
       <a href="/gestion/comunidad"><i class="fa fa-list-ul"></i> Categorias</a>
      </li>
      <li>
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
    <strong>Documento Creado Con Éxito</strong> CMS...
   </div>
  @endif

  @if($status=='ok_delete')
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Documento Eliminado Con Éxito</strong> CMS...
   </div>
  @endif

  @if($status=='ok_update')
   <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Documento Actualizado Con Éxito</strong> CMS...
   </div>
  @endif

 </div>

<div class="container">

  <a href="/gestion/comunidad/crear-documento/{{Request::segment(4)}}" class="btn btn-primary pull-right">Crear Documento </a>
</div>


<div class="container">

<br>
 <div class="block full">
                            <div class="block-title">
                                <h2><strong>Documentos</strong> Registrados</h2>
                            </div>
                           

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Título</th>
                                            <th class="text-center">Descripción</th>
                                            <th>Color</th>
                                            <th>Creación</th>
                                         
                                            
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   @foreach($notas as $notas) 
                                        <tr>
                                            <td class="text-center">{{ $notas->titulo_des }}</td>
                                            <td class="text-center">{{ $notas->descripcion_des }}</td>
                                            <td>{{ $notas->created_at }}</td>
                                            
                                            <td>{{ $notas->updated_at }}</td>
                                            <td class="text-center">

                                   
      <a href="<?=URL::to('gestion/comunidad/editar-documento/');?>/{{ $notas->id }}"><span  id="tip" data-toggle="tooltip" data-placement="left" title="Editar Documento" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>

      <script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );}
</script>
    <a href="<?=URL::to('gestion/comunidad/eliminar-documento/');?>/{{ $notas->id }}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="right" title="Eliminar Documento" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
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