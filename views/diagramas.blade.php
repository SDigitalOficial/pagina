@extends ('adminsite.layout')


@section('ContenidoSite-01')

@foreach($diagramacion as $diagramacion)
{{$diagramacion->id}}
@endforeach



<div class="container">
  <div class="row">
                            <div class="col-md-12">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            
                                        </div>
                                        <h2><strong>Configurar</strong> Diagramación</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                            
                                    <!-- Basic Form Elements Content -->
                                   
                                      {{ Form::open(array('files' => true,'method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/creardiagrama'))) }}
                                     
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">PosicionSD1</label>
                                            <div class="col-md-9">
                                                 {{Form::text('posicionsd1', '', array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">PosicionSD2</label>
                                            <div class="col-md-9">
                                                 {{Form::text('posicionsd2', '', array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">PosicionSD3</label>
                                            <div class="col-md-9">
                                                 {{Form::text('posicionsd3', '', array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">PosicionSD4</label>
                                            <div class="col-md-9">
                                                 {{Form::text('posicionsd4', '', array('class' => 'form-control', 'placeholder'=>'Ingrese correo'))}}
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">PosicionSD5</label>
                                            <div class="col-md-9">
                                                 {{Form::text('posicionsd5', '', array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">PosicionSD6</label>
                                            <div class="col-md-9">
                                                 {{Form::text('posicionsd6', '', array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">PosicionSD7</label>
                                            <div class="col-md-9">
                                                 {{Form::text('posicionsd7', '', array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">PosicionSD8</label>
                                            <div class="col-md-9">
                                                 {{Form::text('posicionsd8', '', array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">PosicionSD9</label>
                                            <div class="col-md-9">
                                                 {{Form::text('posicionsd9', '', array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">PosicionSD01</label>
                                            <div class="col-md-9">
                                                 {{Form::text('posicionsd01', '', array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">PosicionSD02</label>
                                            <div class="col-md-9">
                                                 {{Form::text('posicionsd02', '', array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                        </div>
                                          
                                   

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

  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>


@stop

