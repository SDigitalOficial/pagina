 @extends ('adminsite.layout')
<!-- Define el titulo de la Página -->    


 @section('ContenidoSite-01')
 @if($plan == '0' OR  $plan == 'plan-mensual-intermedio' OR $plan == 'plan-semestral-intermedio' OR $plan == 'plan-anual-intermedio' OR $plan == 'plan-mensual-avanzado' OR $plan == 'plan-semestral-intermedio' OR $plan == 'plan-anual-avanzado')

<div class="container">
  <div class="row">
                            <div class="col-md-12">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                         
                                        </div>
                                        <h2><strong>Crear</strong> baner</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/creargrafico'))) }}

                                        

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nombre</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', '', array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Empresa</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
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
                                            <label class="col-md-3 control-label" for="example-password-input">Url destino</label>
                                            <div class="col-md-9">
                                                {{Form::text('enlace', '', array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                        
                                                {{Form::hidden('imageal', '0', array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                         


                                        
                                                {{Form::hidden('contenido', '0', array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                         

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Visitas</label>
                                            <div class="col-md-9">
                                                {{Form::text('contenidos', '', array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
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

                                           
                                            
                                            {{Form::hidden('tipo', 'baner', array('class' => 'form-control'))}}
                                            {{Form::hidden('num', '30', array('class' => 'form-control'))}}
  
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



</footer>

@else
 <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
@endif
 @stop