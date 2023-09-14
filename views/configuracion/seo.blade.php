@extends ('adminsite.layout')

    @section('cabecera')
    @parent
     {{ Html::style('//cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.css') }}
     {{ Html::style('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css') }}
    @stop

@section('ContenidoSite-01')

 <div class="content-header">
      <ul class="nav-horizontal text-center">
      <li>
       <a href="/gestor/ver-templates"><i class="fa fa-desktop"></i> Ver templates</a>
      </li>
      <li>
       <a href="/gestion/logo-head"><i class="fa fa-arrow-circle-up"></i> Logo encabezado</a>
      </li>
      <li>
       <a href="/gestion/logo-footer"><i class="fa fa-arrow-circle-down"></i> Logo pie página</a>
      </li>
      <li>
       <a href="/gestion/configurar-correo"><i class="fa fa-envelope"></i> Configurar correo</a>
      </li>
         <li>
       <a href="/gestion/redes-sociales"><i class="hi hi-bullhorn"></i> Redes sociales</a>
      </li>
      @if(Auth::user()->id == 1)
      <li class="active">
       <a href="/gestion/venta"><i class="gi gi-usd"></i> Ventas</a>
      </li>
      @else
      @endif
     </ul>
    </div>

 <div class="container topper">

  <?php $status=Session::get('status');?>
    @if($status=='ok_create')
      <div class="alert alert-success">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Opciones de compra registrada con exito</strong> US ...
      </div>
    @endif

    @if($status=='ok_delete')
      <div class="alert alert-danger">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Opciones de compra eliminada con exito</strong> US ...
      </div>
    @endif

    @if($status=='ok_update')
      <div class="alert alert-warning">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Opciones de compra actualizada con exito</strong> US ...
      </div>
    @endif
   
 </div>

<div class="container">
  <div class="row">
                            <div class="col-md-12">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                           
                                        </div>
                                        <h2><strong>Posicionamiento</strong> SEO</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                           
                                    <!-- Basic Form Elements Content -->
                                   
                                      {{ Form::open(array('files' => true,'method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/seoupdate'))) }}
                                         
                                      @foreach($seo as $seo)

                                      <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Idioma</label>
                                            <div class="col-md-9">
                                                 {{Form::text('idioma', $seo->idioma, array('class' => 'form-control', 'placeholder'=>'Ingrese idioma del sitio web'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Canonical</label>
                                            <div class="col-md-9">
                                                 {{Form::text('canonical', $seo->canonical, array('class' => 'form-control', 'placeholder'=>'Ingrese URL canonical'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Robots</label>
                                            <div class="col-md-9">
                                                 {{Form::textarea('robot', $seo->robots, array('class' => 'form-control','placeholder'=>'Ingrese estrcturación robot'))}}
                                            </div>
                                        </div>
                           
                                       
                                      Etiquetas Open Graph
                                      <hr>
                                      <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Og:name</label>
                                            <div class="col-md-9">
                                                 {{Form::text('og_name', $seo->og_name, array('class' => 'form-control', 'placeholder'=>'Ingrese nombre del sitio o empresa'))}}
                                            </div>
                                        </div>  
                                       <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Og:type</label>
                                            <div class="col-md-9">
                                                 {{Form::text('og_type', $seo->og_type, array('class' => 'form-control', 'placeholder'=>'Ingrese el tipo de sitio'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Og:url</label>
                                            <div class="col-md-9">
                                                 {{Form::text('og_url', $seo->og_url, array('class' => 'form-control', 'placeholder'=>'Ingrese la url de su sitio'))}}
                                            </div>
                                        </div>  
                                        <!--
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Og:title</label>
                                            <div class="col-md-9">
                                                 {{Form::text('og_title', $seo->og_title, array('class' => 'form-control', 'placeholder'=>'Ingrese título de su página'))}}
                                            </div>
                                        </div>  
                                       
                                       <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Og:description</label>
                                            <div class="col-md-9">
                                                 {{Form::text('og_description', $seo->og_description, array('class' => 'form-control', 'placeholder'=>'Ingrese desc'))}}
                                            </div>
                                        </div>
                                        -->  
                                       
                                        <div class="form-group">
                                          <label class="col-md-3 control-label" for="example-password-input">Og:image</label>
                                          <div class="col-md-9">
                                           <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="FilePath" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image" value="{{$seo->og_image}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen </button></span>
                                           </div>
                                          </div>
                                         </div>
                                        Etiquetas Twitter Card
                                        <hr>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Twitter:card</label>
                                            <div class="col-md-9">
                                                 {{Form::text('twitter_card', $seo->twitter_card, array('class' => 'form-control', 'placeholder'=>'Ingrese twitter card'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Twitter:site</label>
                                            <div class="col-md-9">
                                                 {{Form::text('twitter_site', $seo->twitter_site, array('class' => 'form-control', 'placeholder'=>'Ingrese su sitio de twitter'))}}
                                            </div>
                                        </div>

                                      <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Twitter:creator</label>
                                            <div class="col-md-9">
                                                 {{Form::text('twitter_creator', $seo->twitter_creator, array('class' => 'form-control', 'placeholder'=>'Ingrese el creador del sitio en twitter'))}}
                                            </div>
                                        </div>

                                   
                                        <div class="form-group">
                                          <label class="col-md-3 control-label" for="example-password-input">Twitter:image</label>
                                          <div class="col-md-9">
                                           <div class="input-group">
                                            <input type="text" id="image_labela" class="form-control" name="FilePatha" placeholder="Ingresar imagen twitter" aria-label="Imagea" aria-describedby="button-imagea" value="{{$seo->twitter_image}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-imagea">Seleccionar imagen</button></span>
                                           </div>
                                          </div>
                                         </div>
                                         Imagenes ICO
                                         <hr>
                                         <div class="form-group">
                                          <label class="col-md-3 control-label" for="example-password-input">Ico</label>
                                          <div class="col-md-9">
                                           <div class="input-group">
                                            <input type="text" id="image_labelb" class="form-control" name="FilePathb" placeholder="Ingresar imagen ico" aria-label="Image" aria-describedby="button-image" value="{{$seo->ico}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-imageb">Seleccionar imagen</button></span>
                                           </div>
                                          </div>
                                         </div>

                                         <div class="form-group">
                                          <label class="col-md-3 control-label" for="example-password-input">Ico apple</label>
                                          <div class="col-md-9">
                                           <div class="input-group">
                                            <input type="text" id="image_labelc" class="form-control" name="FilePathc" placeholder="Ingresar imagen ico apple" aria-label="Image" aria-describedby="button-image" value="{{$seo->icoapple}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-imagec">Seleccionar imagen</button></span>
                                           </div>
                                          </div>
                                         </div>

                                         Google Analytics
                                         <hr>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Código seguimiento</label>
                                            <div class="col-md-9">
                                                 {{Form::textarea('analitica', $seo->analitica, array('class' => 'form-control','placeholder'=>'Ingrese código de seguimiento de Google Analytics'))}}
                                            </div>
                                        </div>

                                 
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Editar</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                            </div>
                                        </div>

                                         Google Ads
                                         <hr>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Etiquerta seguimiento</label>
                                            <div class="col-md-9">
                                                 {{Form::textarea('ads', $seo->ads, array('class' => 'form-control','placeholder'=>'Ingrese Etiqueta Global'))}}
                                            </div>
                                        </div>

                                 
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Editar</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                            </div>
                                        </div>

                                     

                                       
                                     @endforeach
                                      {{ Form::close() }}
                                   

                                 
                                </div>
                                <!-- END Basic Form Elements Block -->
                            </div>
                          </div>
                         
                      </div>




  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

  {{ Html::script('Usuario/js/valida.js') }}
  {{ Html::script('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js') }}
 
  {{ Html::script('//cdn.datatables.net/1.10.1/js/jquery.dataTables.min.js') }}
  {{ Html::script('//cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.js') }}
 





<script>
    document.addEventListener("DOMContentLoaded", function() {

    document.getElementById('button-image').addEventListener('click', (event) => {
      event.preventDefault();

      inputId = 'image_label';

      window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
    });

    document.getElementById('button-imagea').addEventListener('click', (event) => {
      event.preventDefault();

      inputId = 'image_labela';

      window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
    });

    // second button
    document.getElementById('button-imageb').addEventListener('click', (event) => {
      event.preventDefault();

      inputId = 'image_labelb';

      window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
    });

    document.getElementById('button-imagec').addEventListener('click', (event) => {
      event.preventDefault();

      inputId = 'image_labelc';

      window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
    });

  });

  // input
  let inputId = '';

  // set file link
  function fmSetLink($url) {
    document.getElementById(inputId).value = $url;
  }
</script>






@stop