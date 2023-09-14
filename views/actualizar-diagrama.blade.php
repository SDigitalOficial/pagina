@extends ('adminsite.layout')


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
                                        <h2><strong>Configurar</strong> Diagramación</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                            
                                    <!-- Basic Form Elements Content -->
                                    @foreach($diagramas as $diagramas)
                                    {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/gestion/contenidos/actualizardiagrama',$diagramas->id))) }}
                                      
                                      
                                        <div class="form-group">
                                              <label class="col-md-1 control-label" for="example-text-input">SectionSD1</label>
                                            <div class="col-md-3">
                                                 {{Form::text('sectionsd1',  $diagramas->sectionSD1, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                             <label class="col-md-1 control-label" for="example-text-input">BloqueSD1</label>
                                            <div class="col-md-3">
                                                 {{Form::text('bloquesd1',  $diagramas->bloqueSD1, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                            <label class="col-md-1 control-label" for="example-text-input">PosicionSD1</label>
                                            <div class="col-md-3">
                                                 {{Form::text('posicionsd1',  $diagramas->posicionSD1, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                        </div>
                                         <div class="form-group">
                                             <label class="col-md-1 control-label" for="example-text-input">SectionSD2</label>
                                            <div class="col-md-3">
                                                 {{Form::text('sectionsd2',  $diagramas->sectionSD2, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                            <label class="col-md-1 control-label" for="example-text-input">BloqueSD2</label>
                                            <div class="col-md-3">
                                                 {{Form::text('bloquesd2',  $diagramas->bloqueSD2, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                            <label class="col-md-1 control-label" for="example-text-input">PosicionSD2</label>
                                            <div class="col-md-3">
                                                 {{Form::text('posicionsd2',  $diagramas->posicionSD2, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                            
                                        </div>
                                        
                                         <div class="form-group">
                                             <label class="col-md-1 control-label" for="example-text-input">SectionSD3</label>
                                            <div class="col-md-3">
                                                 {{Form::text('sectionsd3',  $diagramas->sectionSD3, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                            <label class="col-md-1 control-label" for="example-text-input">BloqueSD3</label>
                                            <div class="col-md-3">
                                                 {{Form::text('bloquesd3',  $diagramas->bloqueSD3, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                            <label class="col-md-1 control-label" for="example-text-input">PosicionSD3</label>
                                            <div class="col-md-3">
                                                 {{Form::text('posicionsd3',  $diagramas->posicionSD3, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                            
                                        </div>

                                         
                                         <div class="form-group">
                                             <label class="col-md-1 control-label" for="example-text-input">SectionSD4</label>
                                            <div class="col-md-3">
                                                 {{Form::text('sectionsd4',  $diagramas->sectionSD4, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                            <label class="col-md-1 control-label" for="example-text-input">BloqueSD4</label>
                                            <div class="col-md-3">
                                                 {{Form::text('bloquesd4',  $diagramas->bloqueSD4, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                            <label class="col-md-1 control-label" for="example-text-input">PosicionSD4</label>
                                            <div class="col-md-3">
                                                 {{Form::text('posicionsd4',  $diagramas->posicionSD4, array('class' => 'form-control', 'placeholder'=>'Ingrese correo'))}}
                                            </div>
                                            
                                        </div>
                                         <div class="form-group">
                                             <label class="col-md-1 control-label" for="example-text-input">SectionSD5</label>
                                            <div class="col-md-3">
                                                 {{Form::text('sectionsd5',  $diagramas->sectionSD5, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                            <label class="col-md-1 control-label" for="example-text-input">BloqueSD5</label>
                                            <div class="col-md-3">
                                                 {{Form::text('bloquesd5',  $diagramas->bloqueSD5, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                            <label class="col-md-1 control-label" for="example-text-input">PosicionSD5</label>
                                            <div class="col-md-3">
                                                 {{Form::text('posicionsd5',  $diagramas->posicionSD5, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                            
                                        </div>
                                         <div class="form-group">
                                               <label class="col-md-1 control-label" for="example-text-input">SectionSD6</label>
                                            <div class="col-md-3">
                                                 {{Form::text('sectionsd6',  $diagramas->sectionSD6, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                            <label class="col-md-1 control-label" for="example-text-input">BloqueSD6</label>
                                            <div class="col-md-3">
                                                 {{Form::text('bloquesd6',  $diagramas->bloqueSD6, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                            <label class="col-md-1 control-label" for="example-text-input">PosicionSD6</label>
                                            <div class="col-md-3">
                                                 {{Form::text('posicionsd6',  $diagramas->posicionSD6, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                            
                                        </div>
                                         <div class="form-group">
                                               <label class="col-md-1 control-label" for="example-text-input">SectionSD7</label>
                                            <div class="col-md-3">
                                                 {{Form::text('sectionsd7',  $diagramas->sectionSD7, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                            <label class="col-md-1 control-label" for="example-text-input">BloqueSD7</label>
                                            <div class="col-md-3">
                                                 {{Form::text('bloquesd7',  $diagramas->bloqueSD7, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                            <label class="col-md-1 control-label" for="example-text-input">PosicionSD7</label>
                                            <div class="col-md-3">
                                                 {{Form::text('posicionsd7',  $diagramas->posicionSD7, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                            
                                        </div>
                                         <div class="form-group">
                                               <label class="col-md-1 control-label" for="example-text-input">SectionSD8</label>
                                            <div class="col-md-3">
                                                 {{Form::text('sectionsd8',  $diagramas->sectionSD8, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                             <label class="col-md-1 control-label" for="example-text-input">BloqueSD8</label>
                                            <div class="col-md-3">
                                                 {{Form::text('bloquesd8',  $diagramas->bloqueSD8, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                            <label class="col-md-1 control-label" for="example-text-input">PosicionSD8</label>
                                            <div class="col-md-3">
                                                 {{Form::text('posicionsd8',  $diagramas->posicionSD8, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                           
                                        </div>
                                         <div class="form-group">
                                               <label class="col-md-1 control-label" for="example-text-input">SectionSD9</label>
                                            <div class="col-md-3">
                                                 {{Form::text('sectionsd9',  $diagramas->sectionSD9, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                            <label class="col-md-1 control-label" for="example-text-input">BloqueSD9</label>
                                            <div class="col-md-3">
                                                 {{Form::text('bloquesd9',  $diagramas->bloqueSD9, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                            <label class="col-md-1 control-label" for="example-text-input">PosicionSD9</label>
                                            <div class="col-md-3">
                                                 {{Form::text('posicionsd9',  $diagramas->posicionSD9, array('class' => 'form-control', 'placeholder'=>'Ingrese diagrama'))}}
                                            </div>
                                            
                                        </div>
                                    
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Actialziar</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Cancelar</button>
                                            </div>
                                        </div>
                              
                                      {{ Form::close() }} 
                                  @endforeach

                                 
                                </div>
                                <!-- END Basic Form Elements Block -->
                            </div>
                          </div>
                          
                      </div>

  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>


@stop

