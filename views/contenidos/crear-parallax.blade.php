
@extends ('adminsite.layout')

    @section('cabecera')
    @parent
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
  
    @stop

@section('ContenidoSite-01')
 


<link rel="stylesheet" type="text/css" href="ckfinder/estilos.css">

 <div class="container">
  <div class="row">
                            <div class="col-md-12">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                           
                                        </div>
                                        <h2><strong>Crear</strong> parallax</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                      {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/creargrafico'))) }}
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', '', array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Contenido A</label>
                                            <div class="col-md-9">
                                                 {{Form::text('contenido', '', array('class' => 'form-control','placeholder'=>'Ingrese contenido A'))}}
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Contenido B</label>
                                            <div class="col-md-9">
                                                 {{Form::text('contenidos', '', array('class' => 'form-control','placeholder'=>'Ingrese contenido B'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Url</label>
                                            <div class="col-md-9">
                                                 {{Form::text('enlace', '', array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>
                                                                  
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{Form::select('posicion', $posicion,null, array('class' => 'form-control'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', '1', array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                          <div class="col-md-9">
                                           <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="FilePath" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen</button></span>
                                           </div>
                                          </div>
                                        </div>

                                      

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', 'col-xs-12 col-sm-12 col-md-12 col-lg-12', array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', ['' => '-- Seleccione animación --',
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
                                                  'fadeInUpBig' => 'fadeUpBig'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>
                                          {{Form::hidden('tipo', 'parallax', array('class' => 'form-control'))}}
                                          {{Form::hidden('num', '1', array('class' => 'form-control'))}}
                                          <input type="hidden" name="peca" value="{{Request::segment(4)}}"></input>
                                          <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Crear</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Cancelar</button>
                                            </div>
                                        </div>
                                          
                                    {{ Form::close() }}
                                
                                </div>
                                <!-- END Basic Form Elements Block -->
                            </div>
                          </div>
                          
</div>

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



@stop