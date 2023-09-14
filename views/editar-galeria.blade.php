@extends ('adminsite.layout')

    @section('cabecera')
    @parent
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
    @stop


 @section('ContenidoSite-01')


 <div class="container">
  <div class="row">
                            <div class="col-md-12">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">No Borders</a>
                                        </div>
                                        <h2><strong>Crear</strong> Clientela</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                   {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/gestion/contenidos/actualizargaleria',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->titlesd, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->descriptionsd, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Contenido</label>
                                            <div class="col-md-9">
                                                  {{Form::textarea('contenido', $contenido->contentsd, array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                          <div class="col-md-9">
                                           <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="FilePath" placeholder="Seleccionar imagen" value="{{$contenido->imagesd}}" aria-label="Image" aria-describedby="button-image">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen</button></span>
                                           </div>
                                          </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Url principal</label>
                                            <div class="col-md-9">
                                                {{Form::text('url', $contenido->urlsd, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Texto boton secundario</label>
                                            <div class="col-md-9">
                                                {{Form::text('boton', $contenido->boton, array('class' => 'form-control','placeholder'=>'Ingrese texto boton'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Url secundaria</label>
                                            <div class="col-md-9">
                                                {{Form::text('urluno', $contenido->urlsduno, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Texto boton secundario</label>
                                            <div class="col-md-9">
                                                {{Form::text('botonuno', $contenido->botonuno, array('class' => 'form-control','placeholder'=>'Ingrese texto boton'))}}
                                            </div>
                                        </div>
                                                                        

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Estado</label>
                                            <div class="col-md-9">
                                                {{Form::text('estado', $contenido->state, array('class' => 'form-control','placeholder'=>'Ingrese estado'))}}
                                            </div>
                                        </div>

                                         
                                          <input type="hidden" name="id" value="{{Request::segment(4)}}"></input>

                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                            </div>
                                        </div>
                                    {{ Form::close() }}
                                
                                </div>
                                <!-- END Basic Form Elements Block -->
                            </div>
                          </div>
                          
</div>




<footer>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>


<script>
  document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('button-image').addEventListener('click', (event) => {
      event.preventDefault();
      window.open('/file-manager/fm-button', 'fm', 'width=900,height=500');
    });
  });
  // set file link
  function fmSetLink($url) {
    document.getElementById('image_label').value = $url;
  }
</script>

<script src="https://cdn.ckeditor.com/4.11.2/full/ckeditor.js"></script>

<script>
  CKEDITOR.replace( 'editor', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
</script>

</footer>
 @stop