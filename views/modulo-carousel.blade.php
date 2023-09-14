
 @extends ('adminsite.layout')
<!-- Define el titulo de la Página -->    


 @section('ContenidoSite-01')

<div class="container">
 <a href="/gestion/contenidos/imagencarouslide/{{Request::segment(4)}}"><button type="button" class="btn btn-primary pull-right botonera">Agregar Imagen</button></a>
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
                                            <th>URL</th>
                                            <th>Estado</th>
                                            
                                            
                                            
                                              <th class="text-center">Tarea</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($amour as $contenido)
                                        <tr>
                                          <td width="5">{{$contenido->id}}</td>
                                          <td width="15"> {{$contenido->titulo_car}}</td>
                                          <td width="45">{{$contenido->descripcionweb_car}}</td>
                                          <td width="15">{!!$contenido->url_car!!}</td>
                                          <td width="5">{{$contenido->estado}}</td>
                                          


                                         <td width="15" class="text-center">
                                
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


{{ Form::open(array('files' => true,'method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/imagenes/crear'))) }}
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ancho">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Galeria</h4>
      </div>
      <div class="modal-body">
    
       <div class="form-group">
        {{Form::label('titulo', 'Titulo' )}}
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          {{Form::text('titulo', '', array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
         </div>
       </div>

        <div class="form-group">
        {{Form::label('descripcion', 'Descripcion' )}}
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          {{Form::text('descripcion', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
         </div>
       </div>

         <div class="form-group">
        {{Form::label('contenido', 'Contenido' )}}
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          {{Form::textarea('contenido', '', array('class' => 'ckeditor','id' => 'editor1','placeholder'=>'Ingrese descripción'))}}
         </div>
       </div>

         <div class="form-group">
            <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
            <div class="col-md-9">
            {{Form::text('FilePath', '', array('class' => 'form-control','id' => 'ckfinder-input-1', 'placeholder'=>'Ingrese imagen'))}}<br>
           <input class="btn btn-primary" id="ckfinder-modal-1" type="button" value="Browse Server"/>
           </div>
          </div>
       
       <div class="form-group">
        {{Form::label('url', 'URL' )}}
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         {{Form::text('url', '', array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
         </div>
       </div>

          <div class="form-group">
        {{Form::label('animacion', 'Animación' )}}
         <div class="col-lg-12">
          {{ Form::select('animacion', ['' => '-- Selecciones animación --',
          'bounce' => 'bounce',
          'bounceIn' => 'bounceIn',
          'bounceInDown' => 'bounceDown',
          'bounceInLeft' => 'bounceLeft',
          'bounceInRight' => 'bounceRight',
          'bounceInUp' => 'bounceUp',
          'fadeIn' => 'fadeIn',
          'fadeInDown' => 'fadeDown',
          'fadeInDownBig' => 'fadeDownBig',
          'fadeInLeft' => 'fadeLeft',
          'fadeInLeftBig' => 'fadeLeftBig',
          'fadeInRight' => 'fadeRight',
          'fadeInRightBig' => 'fadeRightBig',
          'fadeInUp' => 'fadeUp',
          'fadeInUpBig' => 'fadeUpBig'], null, array('class' => 'form-control','placeholder'=>'Seleccione animación')) }}
         </div>
       </div>

           <div class="form-group">
        {{Form::label('estado', 'Estado' )}}
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          {{Form::text('estado', '', array('class' => 'form-control','placeholder'=>'Ingrese estado'))}}
         </div>
       </div>

         {{Form::hidden('id', $conteni->id, array('class' => 'form-control'))}}

      </div>

      <div class="modal-footer">
       {{ Form::reset('Cancelar', array('class' => 'btn btn-default')) }}
       {{Form::submit('Crear', array('class' => 'btn btn-primary')  )}}
      </div>
    </div>
  </div>
</div>
{{ Form::close() }}


{{ Form::open(array('files' => true,'method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/imagenes/crear'))) }}
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ancho">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Galeria</h4>
      </div>
      <div class="modal-body">
    
       <div class="form-group">
        {{Form::label('titulo', 'Titulo' )}}
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          {{Form::text('titulo', '', array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
         </div>
       </div>

        <div class="form-group">
        {{Form::label('descripcion', 'Descripcion' )}}
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          {{Form::text('descripcion', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
         </div>
       </div>
       
         <div class="form-group">
        {{Form::label('contenido', 'Contenido' )}}
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          {{Form::textarea('contenido', '', array('class' => 'ckeditor','id' => 'editor2','placeholder'=>'Ingrese descripción'))}}
         </div>
       </div>

         <div class="form-group">
        {{Form::label('Imagen', 'Posición texto' )}}
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        {{Form::text('FilePath', '', array('class' => 'form-control','placeholder'=>'Ingrese posición imagen'))}}
      </div>
    </div>
       
       <div class="form-group">
        {{Form::label('url', 'URL' )}}
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         {{Form::text('url', '', array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
         </div>
       </div>

          <div class="form-group">
        {{Form::label('animacion', 'Animación' )}}
         <div class="col-lg-12">
          {{ Form::select('animacion', ['' => '-- Selecciones animación --',
          'bounce' => 'bounce',
          'bounceIn' => 'bounceIn',
          'bounceInDown' => 'bounceDown',
          'bounceInLeft' => 'bounceLeft',
          'bounceInRight' => 'bounceRight',
          'bounceInUp' => 'bounceUp',
          'fadeIn' => 'fadeIn',
          'fadeInDown' => 'fadeDown',
          'fadeInDownBig' => 'fadeDownBig',
          'fadeInLeft' => 'fadeLeft',
          'fadeInLeftBig' => 'fadeLeftBig',
          'fadeInRight' => 'fadeRight',
          'fadeInRightBig' => 'fadeRightBig',
          'fadeInUp' => 'fadeUp',
          'fadeInUpBig' => 'fadeUpBig'], null, array('class' => 'form-control','placeholder'=>'Seleccione animación')) }}
         </div>
       </div>


           <div class="form-group">
        {{Form::label('estado', 'Estado' )}}
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          {{Form::text('estado', '', array('class' => 'form-control','placeholder'=>'Ingrese estado'))}}
         </div>
       </div>

         {{Form::hidden('id', $conteni->id, array('class' => 'form-control'))}}

      </div>

      <div class="modal-footer">
       {{ Form::reset('Cancelar', array('class' => 'btn btn-default')) }}
       {{Form::submit('Crear', array('class' => 'btn btn-primary')  )}}
      </div>
    </div>
  </div>
</div>
{{ Form::close() }}



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