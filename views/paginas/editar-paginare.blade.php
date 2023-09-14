@extends ('adminsite.layout')
 @section('cabecera')
  @parent
     {{ Html::style('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css') }}
 @stop

 @section('ContenidoSite-01')
 
 

<div class="container">
  <div class="row">
                            <div class="col-md-12">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                     
                                        <h2><strong>Replicar</strong> Página</h2>
                                    </div>
                           
                                    <!-- Basic Form Elements Content -->
                                    {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm1', 'url' => array('gestion/paginas/crearpagina'))) }}
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nombre Página</label>
                                            <div class="col-md-9">
                                                {{Form::text('pagina', $paginas->page, array('class' => 'form-control','placeholder'=>'Ingrese página','maxlength' => '50'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Título</label>
                                            <div class="col-md-9">
                                                 {{Form::text('titulo', $paginas->titulo, array('class' => 'form-control','placeholder'=>'Ingrese titulo','maxlength' => '55'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Palabras Clave</label>
                                            <div class="col-md-9">
                                                 {{Form::text('palabras', $paginas->palabras, array('class' => 'form-control','placeholder'=>'Ingrese palabras clave','maxlength' => '159'))}}
                                            </div>
                                        </div>

                                        @if($paginas->nivel == 1)
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tipo Menú</label>
                                            <div class="col-md-9">
                                                {{Form::radio('nivel', '1', true)}}Menu<br> 
                                                {{Form::radio('nivel', '2')}}SubMenu   
                                            </div>
                                        </div> 
                                        @elseif($paginas->nivel == 2)
                                              <div class="form-group">
                                            <label class="col-md-3 control-label">Tipo Menú</label>
                                            <div class="col-md-9">
                                                {{Form::radio('nivel', '1')}}Menu<br> 
                                                {{Form::radio('nivel', '2',true)}}SubMenu   
                                            </div>
                                        </div> 
                                        @endif
                                        @if($number == 1)
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización categorias</label>
                                            <div class="col-md-9">
                                                {{ Form::select('categoria', [$paginas->categoria => $paginas->categoria,
                                                  '1' => 'Visible',
                                                  '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización en footer</label>
                                            <div class="col-md-9">
                                                {{ Form::select('visualizafoot', [$paginas->visualizafoot => $paginas->visualizafoot,
                                                  '1' => 'Visible',
                                                  '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                {{Form::number('posicion', $paginas->posta, array('class' => 'form-control','placeholder'=>'Ingrese palabras clave','maxlength' => '150', 'min' => '0'))}}
                                            </div>
                                        </div>
                                        @else
                                        @endif

                                        @if($paginas->nivel == NULL)
                                        @else
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                               {{ Form::select('sitio', [$paginas->sitio => $paginas->sitio,
                                                '1' => 'Horizontal',
                                                '2' => 'Vertical',
                                                '3' => 'Vertical y Horizontal',
                                                '4' => 'No visible'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                    
                                        @endif

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$paginas->idioma => $paginas->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        {{Form::hidden('posti', '2', array('class' => 'form-control','placeholder'=>'Ingrese la descripción de la página'))}}


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-textarea-input">Descripción</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('descripcion', $paginas->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción', 'maxlength' => '159'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-textarea-input">Código Seguimiento Google Analytics</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('seguimiento', $paginas->seguimiento, array('class' => 'form-control','placeholder'=>'Ingrese código Seguimiento google analytics'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-textarea-input">Pixel Facebook</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('pixel', $paginas->pixel, array('class' => 'form-control','placeholder'=>'Ingrese pixel facebook'))}}
                                            </div>
                                        </div>
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Editar</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Cancelar</button>
                                            </div>
                                        </div>
                                    {{ Form::close() }}
                                
                                </div>
                                <!-- END Basic Form Elements Block -->
                            </div>
                          </div>
                          
</div>






  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    {{ HTML::script('Usuario/js/valida.js') }}
  {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js') }} 
 
  {{ HTML::script('//cdn.datatables.net/1.10.1/js/jquery.dataTables.min.js') }}
  {{ HTML::script('//cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.js')}}

 @stop
 	
