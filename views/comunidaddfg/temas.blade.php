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
    <strong>Campo Conceptual Registrado Con Éxito</strong> CMS...
   </div>
  @endif

  @if($status=='ok_delete')
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Campo Conceptual Eliminado Con Éxito</strong> CMS...
   </div>
  @endif

  @if($status=='ok_update')
   <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Campo Conceptual Actualziado Con Éxito</strong> CMS...
   </div>
  @endif

 </div>

<div class="container">
  <a href="/gestion/comunidad/crear-tema" class="btn btn-primary pull-right">Crear Campo Conceptual</a>
</div>
<br>

<div class="container">

 <div class="block full">
                            <div class="block-title">
                                <h2><strong>Filtrar</strong> Campos conceptuales</h2>
                            </div>
                       <form action="/web/session/filtrotema" role="form" method="post">
                           <div class="form-group">
                                            
                                            <div class="col-md-6">
                                              <select class="form-control"  name="area" id="area">
                                              <option value="" selected disabled hidden>Seleccione Área</option>
                                              @foreach($area as $area)
                                              <option value="{{$area->id}}">{{$area->area}}</option>
                                              @endforeach
                                            </select>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                         
                                            <div class="col-md-6">
                                             <select class="form-control selector" name="grado" id="grado">
                                             <option value="1"></option>
                                            </select> 
                                            </div>
                                        </div>
                               
  <div class="form-group form-actions">
                                            <div class="col-md-12">
                                              <br>
                                
                                                <button type="submit" class="btn btn-sm btn-primary col-md-6"> Filtrar</button>
                                                <a href="/web/limpiezawebtema" class="btn btn-sm btn-default col-md-6">Limpiar</a>
                                            </div>
                                        </div>                      

<br><br><br><br><br>
                           </form>
                        </div>
                        <!-- END Datatables Content -->




</div>



<div class="container">

 <div class="block full">
                            <div class="block-title">
                                <h2><strong>Campos Conceptuales</strong> Registrados</h2>
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
                                   @foreach($temas as $temas) 
                                        <tr>
                                            <td class="text-center">{{ $temas->tema }}</td>
                                            <td class="text-center">{!!substr($temas->descripciontema, 0, 60) !!} ...</td>

                                            <td>{{ $temas->created_at }}</td>
                                            
                                            <td>{{ $temas->updated_at }}</td>
                                            <td class="text-center">

      <a href="<?=URL::to('gestion/comunidad/subtemas');?>/{{ $temas->id }}"><span  id="tip" data-toggle="tooltip" data-placement="left" title="Ver Variables" class="btn btn-warning"><i class="fa fa-list-alt sidebar-nav-icon"></i></span></a>
      <a href="<?=URL::to('gestion/comunidad/editar-tema/');?>/{{ $temas->id }}"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar Campo" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
      <script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );}
</script>
    <a href="<?=URL::to('gestion/comunidad/eliminar-tema/');?>/{{ $temas->id }}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="right" title="Eliminar Campo" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
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

  <script type="text/javascript">
     
      $('#area').on('change',function(e){
        console.log(e);

        var cat_id = e.target.value;

        $.get('/memagrado/ajax-subcatweb?cat_id=' + cat_id, function(data){
            $('#grado').empty();
            $.each(data, function(index, subcatObj){
              $('#grado').append('<option value="" style="display:none">Seleccione Grado</option>','<option value="'+subcatObj.id+'">'+subcatObj.grado_comunidad+'</option>' );
              $("#grado option[value='1']").attr("selected",true);
            });
        });
      });
   </script> 
@stop