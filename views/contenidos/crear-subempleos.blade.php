  @extends ('adminsite.layout')

  @section('cabecera')
    @parent
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
    <script src="/vendors/ckeditor/ckeditor.js"></script>  
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
                                            
                                        </div>
                                        <h2><strong>Crear</strong> empleos</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                   {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/crearempleo'))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', '', array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Requsitos</label>
                                            <div class="col-md-9">
                                                 {{Form::text('requisito', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                  {{Form::textarea('descripcion', '', array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese contenido'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Área</label>
                                            <div class="col-md-9">
                                                 {{Form::text('area', '', array('class' => 'form-control','placeholder'=>'Ingrese área'))}}
                                            </div>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Nivel</label>
                                            <div class="col-md-9">
                                                 {{Form::text('nivel', '', array('class' => 'form-control','placeholder'=>'Ingrese nivel'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Ciudades</label>
                                            <div class="col-md-9">
                                                 {{Form::text('ciudad', '', array('class' => 'form-control','placeholder'=>'Ingrese ciudades'))}}
                                            </div>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Salario</label>
                                            <div class="col-md-9">
                                                 {{Form::text('salario', '', array('class' => 'form-control','placeholder'=>'Ingrese salario'))}}
                                            </div>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Fecha</label>
                                            <div class="col-md-9">
                                                 {{Form::text('fecha', '', array('class' => 'form-control','placeholder'=>'Ingrese fecha'))}}
                                            </div>
                                        </div>

                                           <input type="hidden" name="id" value="{{Request::segment(4)}}"></input>
                                     
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
 @stop