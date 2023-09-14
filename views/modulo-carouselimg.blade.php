@extends ('adminsite.layout')

@section('ContenidoSite-01')

<div class="container">
  @if($conteo == 4)
 <a href="/gestion/contenidos/imagencarou/{{Request::segment(4)}}"><button type="button" class="btn btn-primary pull-right botonera" disabled>Agregar Imagen</button></a>
 @else
 <a href="/gestion/contenidos/imagencarou/{{Request::segment(4)}}"><button type="button" class="btn btn-primary pull-right botonera">Agregar Imagen</button></a>
 @endif
</div>
<br>


<div class="container">
 <div class="block full">
  
  <div class="block-title">
   <h2><strong>Gestión</strong> Slides</h2>
  </div>
  
  <div class="table-responsive">
   <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
    <thead>
     <tr>
      <th class="text-center">Id</th>
      <th class="text-center">Título</th>
      <th class="text-center">Descripción</th>
      <th>Contenido</th>
      <th>Estado</th>
      <th>Estado</th>
      <th class="text-center">Tarea</th>
     </tr>
    </thead>
    
    <tbody>
     @foreach($amour as $contenido)
      <tr>
       <td>{{$contenido->id}}</td>
       <td>{{$contenido->imagen_car}}</td>
       <td>{{$contenido->titulo_car}}</td>
       <td>{!!substr($contenido->descripcion_car, 0, 150)!!}</td>
       <td>{{$contenido->url_car}}</td>
       <td>{{$contenido->content_id}}</td>
       <td class="text-center">
       <a href="<?=URL::to('gestion/contenidos/editarcarouselimg');?>/{{ $contenido->id }}"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar Contenido" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
       <script language="JavaScript">
       function confirmar ( mensaje ) {
       return confirm( mensaje );}
       </script>
       <a href="<?=URL::to('gestion/contenidos/eliminarcarouselimg/');?>/{{$contenido->id}}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="bottom" title="Editar Página" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
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


<script>


  var button1 = document.getElementById( 'ckfinder-modal-1' );


  button1.onclick = function() {
    selectFileWithCKFinder( 'ckfinder-input-1' );
  };

  function selectFileWithCKFinder( elementId ) {
    CKFinder.modal( {
      chooseFiles: true,
      width: 1200,
      height: 600,
      onInit: function( finder ) {
        finder.on( 'files:choose', function( evt ) {
          var file = evt.data.files.first();
          var output = document.getElementById( elementId );
          output.value = file.getUrl();
        } );

        finder.on( 'file:choose:resizedImage', function( evt ) {
          var output = document.getElementById( elementId );
          output.value = evt.data.resizedUrl;
        } );
      }
    } );
  }
</script>
 <script src="/adminsite/js/pages/tablesDatatables.js"></script>
        <script>$(function(){ TablesDatatables.init(); });</script>
</footer>
 @stop