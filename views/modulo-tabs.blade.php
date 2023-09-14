



 @extends ('adminsite.layout')
<!-- Define el titulo de la Página -->    


 @section('ContenidoSite-01')

<div class="container">
 <a href="/gestion/contenidos/subtabs/{{Request::segment(4)}}"><button type="button" class="btn btn-primary pull-right botonera">
  Agregar Contenido
 </button></a>
</div>
<br>

<div class="container">
 <?php $status=Session::get('status');?>

   @if($status=='ok_create')
    <div class="alert alert-success">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     <strong>Tab registrado con éxito</strong> SD ...
    </div>
   @endif

   @if($status=='ok_delete')
    <div class="alert alert-danger">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     <strong>Tab eliminado con éxito</strong> SD ...
    </div>
   @endif

   @if($status=='ok_update')
    <div class="alert alert-warning">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     <strong>Tab actualizado con éxito</strong> SD ...
    </div>
   @endif

</div> 

<div class="container">

  <div class="block full">
                            <div class="block-title">
                                <h2><strong>Gestión</strong> contenidos</h2>
                            </div>
                            

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Titulo</th>
                                            <th>Descripción</th>
                                            <th>Estado</th>
                                            <th>Tareas</th>
                                            <th>Tareas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($amour as $contenido)
                                        <tr>
                                          <td>{{$contenido->id}}</td>
                                         <td>{{$contenido->titlecl}}</td>
                                         <td>{{$contenido->descriptioncl}}</td>
                                         <td>{{$contenido->state}}</td>
                                         <td>{{$contenido->state}}</td>
                                         


                                         <td class="text-center">
                                         <a href="<?=URL::to('gestion/contenidos/editartab');?>/{{ $contenido->id }}"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar Contenido" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
      <script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );}
</script>
    <a href="<?=URL::to('gestion/contenidos/eliminartab');?>/{{$contenido->id}}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="bottom" title="Editar Página" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
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
<script src="//cdn.ckeditor.com/4.6.0/full/ckeditor.js"></script>
   {{ Html::script('ckfinder/ckfinder.js') }}   

   <script language="javascript" type="text/javascript">
   CKEDITOR.replace('editor',{
      filebrowserBrowseUrl: '/browser/browse.php',
      filebrowserImageBrowseUrl: '/browser/browse.php?type=Images',
      filebrowserUploadUrl: '/uploader/upload.php',
      filebrowserImageUploadUrl: '/uploader/upload.php?type=Images',
      filebrowserWindowWidth: '900',
      filebrowserWindowHeight: '400',
      filebrowserBrowseUrl: '../../../ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: '../../../ckfinder/ckfinder.html?Type=Images',
      filebrowserFlashBrowseUrl: '../../../ckfinder/ckfinder.html?Type=Flash',
      filebrowserUploadUrl: '../../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: '../../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl: '../../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
    </script>


 <script src="/adminsite/js/pages/tablesDatatables.js"></script>
        <script>$(function(){ TablesDatatables.init(); });</script>
</footer>
 @stop