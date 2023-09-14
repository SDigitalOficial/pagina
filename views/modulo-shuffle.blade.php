
 @extends ('adminsite.layout')
<!-- Define el titulo de la Página -->    


 @section('ContenidoSite-01')

 <div class="container">
  <?php $status=Session::get('status'); ?>
  @if($status=='ok_create')
   <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Categoría Shuffle Registrada Con Éxito</strong> CMS...
   </div>
  @endif

  @if($status=='ok_delete')
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Categoría Shuffle Eliminada Con Éxito</strong> CMS...
   </div>
  @endif

  @if($status=='ok_update')
   <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Categoría Shuffle Actualizada Con Éxito</strong> CMS...
   </div>
  @endif

 </div>


<div class="container">
  
<div class="block">
                                    <!-- Normal Form Title -->
                                    <div class="block-title">
                                       
                                        <h2><strong>Crear</strong> Categoria Shuffle</h2>
                                    </div>
                                    <!-- END Normal Form Title -->

                                    <!-- Normal Form Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/crear/categoria/shuffle'))) }}
                
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                          <div class="col-md-12">
                                             <label class="control-label" for="example-email-input">Categoría</label>
                                           {{Form::text('categoria', '', array('class' => 'form-control','placeholder'=>'Ingrese nombre categoria' ))}}
                                          </div>
                                        </div>
                                       </div>

                                       <input type="hidden" name="identificador" value="{{Request::segment(4)}}">

                                <div class="container">
                                        <div class="form-group form-actions">
                                           <div class="col-lg-12">
                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Crear</button>
                                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Cancelar</button>
                                        </div>
                                      </div>
                                    </div>
                                    {{Form::close()}}
                                    <!-- END Normal Form Content -->
                                    <br>
                                    <br>
                                       <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Id</th>
                                            <th class="text-center">Título</th>
                                            <th class="text-center">Descripción</th>
                                        
                                        
                                            <th>Acciones</th>
                                            
                                            
                                              <th class="text-center">Tarea</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categorias as $categorias)
                                        <tr>
                                          <td>{{$categorias->id}}</td>
                                          <td>{{$categorias->categoria}}</td>
                                          <td>{{$categorias->created_at}}</td>
                                          <td>{{$categorias->updated_at}}</td>

                                         <td class="text-center">
                                           <a href="<?=URL::to('gestion/contenidos/shuffle-crear');?>/{{ $categorias->categoria_slug }}"><span  id="tip" data-toggle="tooltip" data-placement="left" title="Ver Contenidos" class="btn btn-warning"><i class="fa fa-list-alt sidebar-nav-icon"></i></span></a>
                                         <a href="<?=URL::to('gestion/contenidos/editar-categoriashu');?>/{{ $categorias->id }}"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar Categoría" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
      <script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );}
</script>
    <a href="<?=URL::to('gestion/contenidos/eliminarshufflemen/');?>/{{$categorias->id}}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="right" title="Eliminar Categoría" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
                                         </td>
                                        </tr>
                                       @endforeach 
                               
                                    </tbody>
                                </table>
                            </div>
                                </div>



</div>














<footer>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</footer>
 @stop