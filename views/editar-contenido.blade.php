@extends ('adminsite.layout')
<!-- Define el titulo de la Página -->    
 @section('titulo')
  Acualizar Contenido
 @stop

 @section('cabecera')
  @parent
  {{ Html::style('EstilosSD/dist/css/jquery.minicolors.css') }}
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  

  @stop
 @section('ContenidoSite-01')


@if($contenido->type == 'texto')

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
                                        <h2><strong>Editar</strong> texto</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Contenido</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('contenido', $contenido->content, array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese contenido'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Enlace</label>
                                            <div class="col-md-9">
                                                 {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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

                                         {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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

@endif


@if($contenido->type == 'boton')

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
                                        <h2><strong>Editar</strong> botón</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Ancho Botón</label>
                                            <div class="col-md-9">
                                                {{ Form::select('contenido', [$contenido->content => $contenido->content,
                                                '0' => 'Normal',
                                                '1' => '100%'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Enlace</label>
                                            <div class="col-md-9">
                                                 {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Tipo botón</label>
                                            <div class="col-md-9">
                                                {{ Form::select('contenidos', [$contenido->contents => $contenido->contents,
                                                   'btn-primary' => 'Btn primary',
                                                   'btn-success' => 'Btn success',
                                                   'btn-info' => 'Btn info',
                                                   'btn-warning' => 'Btn warning',
                                                   'btn-danger' => 'Btn danger'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Tamaño botón</label>
                                            <div class="col-md-9">
                                                {{ Form::select('FilePath', [$contenido->image => $contenido->image,
                                                   'btn-xs' => 'Btn XS',
                                                   'btn-sm' => 'Btn SM',
                                                   'btn-md' => 'Btn MD',
                                                   'btn-lg' => 'Btn LG'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Alineación botón</label>
                                            <div class="col-md-9">
                                                {{ Form::select('imageal', [$contenido->imageal => $contenido->imageal,
                                                   'text-center' => 'Centrado',
                                                   'text-right' => 'Derecha',
                                                   'text-left' => 'Izquierda'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Atributos botón</label>
                                            <div class="col-md-9">
                                                {{ Form::select('video', [$contenido->video => $contenido->video,
                                                   '_self' => 'Self',
                                                   '_blank' => 'Blank',
                                                   '_parent' => 'Parent',
                                                   '_top' => 'Top'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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

                                         {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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

@endif

@if($contenido->type == 'empleo')

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
                                        <h2><strong>Editar</strong> Empleo</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>
                                       

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Enlace</label>
                                            <div class="col-md-9">
                                                 {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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

                                         {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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

@endif

@if($contenido->type == 'planes')

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
                                        <h2><strong>Editar</strong> Empleo</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>
                                       

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Enlace</label>
                                            <div class="col-md-9">
                                                 {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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

                                         {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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

@endif

@if($contenido->type == 'busqueda')

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
                                        <h2><strong>Editar</strong> Busqueda</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Contenido</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('contenido', $contenido->content, array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese contenido'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Color Background</label>
                                            <div class="col-md-9">
                                                {{Form::text('url', $contenido->url, array('id' => 'hue-demo', 'class' => 'form-control demo','data-control'=>'hue'))}}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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

                                         {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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

@endif

@if($contenido->type == 'formulario')


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
                                        <h2><strong>Editar</strong> Formulario</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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

                                         {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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

@endif

@if($contenido->type == 'filtros')


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
                                        <h2><strong>Editar</strong> Filtros</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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

                                         {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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

@endif

@if($contenido->type == 'filtroevento')


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
                                        <h2><strong>Editar</strong> Filtros</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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

                                         {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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

@endif

@if($contenido->type == 'filtrodinami')


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
                                        <h2><strong>Editar</strong> Filtro Dinamizador</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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

                                         {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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

@endif

@if ($contenido->type == 'subservicios')


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
                                        <h2><strong>Editar</strong> Subservicios</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Color</label>
                                            <div class="col-md-9">
                                               {{Form::text('contenido', $contenido->content, array('id' => 'hue-demo', 'class' => 'form-control demo','data-control'=>'hue'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Número Contador</label>
                                            <div class="col-md-9">
                                                 {{Form::text('imageal', $contenido->imageal, array('class' => 'form-control','placeholder'=>'Ingrese número contador'))}}<br>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Icono</label>
                                            <div class="col-md-9">
                                                <input type="text" name="FilePath" value="{{$contenido->image}}" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">URL</label>
                                            <div class="col-md-9">
                                                {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                           {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}
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

 
@endif



@if($contenido->type == 'collapse')


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
                                        <h2><strong>Editar</strong> Collapse</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Contenido</label>
                                            <div class="col-md-9">
                                               {{Form::textarea('contenido', $contenido->content, array('class' => 'form-control','placeholder'=>'Ingrese contenido'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Contenido II</label>
                                            <div class="col-md-9">
                                               {{Form::textarea('contenidos', $contenido->contents, array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese contenido II'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Número Contador</label>
                                            <div class="col-md-9">
                                                 {{Form::text('imageal', $contenido->imageal, array('class' => 'form-control','placeholder'=>'Ingrese número contador'))}}<br>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                            <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                         <div class="col-md-9">
                                          <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="FilePath" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image" value="{{$contenido->image}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen</button></span>
                                          </div>
                                         </div>
                                        </div>


                                         @if($contenido->imageal == 'pull-right')
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">Alinear Imagen</label>
                                            <div class="col-md-9">
                                               {{Form::radio('imageal', 'pull-left')}}Alinear izquierda<br>
                                             {{Form::radio('imageal', 'pull-right', true)}}Alinear derecha
                                            </div>
                                        </div> 
                                         @elseif($contenido->imageal == 'pull-left')
                                           <div class="form-group">
                                            <label class="col-md-3 control-label">Alinear Imagen</label>
                                            <div class="col-md-9">
                                               {{Form::radio('imageal', 'pull-left', true)}}Alinear izquierda<br>
                                             {{Form::radio('imageal', 'pull-right')}}Alinear derecha
                                            </div>
                                        </div> 
                                         @endif

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">URL</label>
                                            <div class="col-md-9">
                                                {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                          {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}
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

 
@endif



@if($contenido->type == 'collap')


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
                                        <h2><strong>Editar</strong> Collap</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Contenido</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('contenido', $contenido->content, array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese contenido'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                          {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}
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


@endif




@if($contenido->type == 'shuffle')


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
                                        <h2><strong>Editar</strong> Shuffle</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                          {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}
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



@endif



@if($contenido->type == 'tab')


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
                                        <h2><strong>Editar</strong> Tab</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Tipo Menú</label>
                                            <div class="col-md-9">
                                                {{ Form::select('contenido', [$contenido->content => $contenido->content,
                                                '1' => 'Vertical',
                                                '0' => 'Horizontal'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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


@endif


<!-- Componente de Jumbotron para la administración de contenidos -->

@if($contenido->type == 'jumbotron')



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
                                        <h2><strong>Editar</strong> Jumbotron</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Contenido</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('contenido', $contenido->content, array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese contenido'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                         <div class="col-md-9">
                                          <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="FilePath" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image" value="{{$contenido->image}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen</button></span>
                                          </div>
                                         </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Enlace</label>
                                            <div class="col-md-9">
                                                 {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>



                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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

                                        <div class="form-group">
                                          <label class="col-md-3 control-label" for="example-select">ID Formulario 
                                        </label>
                                          <div class="col-md-9">
                                            <select name="contenidos" id="contenidos" class="form-control">

                                             @foreach($formularios as $formularios)
                                             @if($contenido->contents == $formularios->id)
                                             <option value="{{$formularios->id}}" selected>{{$formularios->title}}</option>
                                             @else
                                              <option value="{{$formularios->id}}">{{$formularios->title}}</option>
                                              @endif
                                             @endforeach
                                            </select>
                                          </div>
                                        </div>

                                                      <div class="form-group">
                                          <label class="col-md-3 control-label" for="example-select">Producto CRM 
                                        </label>
                                          <div class="col-md-9">
                                            <select name="video" id="contenidos" class="form-control">

                                             @foreach($producto as $producto)
                                             @if($contenido->video == $producto->id)
                                             <option value="{{$producto->id}}" selected>{{$producto->producto}} {{$contenido->video}}</option>
                                             @else
                                              <option value="{{$producto->id}}">{{$producto->producto}}</option>
                                              @endif
                                             @endforeach
                                            </select>
                                          </div>
                                        </div>

                                           {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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

@endif

@if($contenido->type == 'video')


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
                                        <h2><strong>Editar</strong> Video</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Contenido</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('contenido', $contenido->content, array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese contenido'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                         <div class="col-md-9">
                                          <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="FilePath" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image" value="{{$contenido->image}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen</button></span>
                                          </div>
                                         </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">URL</label>
                                            <div class="col-md-9">
                                                {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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

                                         
                                            {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}
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

@endif


<!-- Componente de Thumbail para la administración de contenidos -->

@if($contenido->type == 'baner')

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
                                        <h2><strong>Editar</strong> Publicidad</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nombre</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Empresa</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                         <div class="col-md-9">
                                          <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="FilePath" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image" value="{{$contenido->image}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen</button></span>
                                          </div>
                                         </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">URL</label>
                                            <div class="col-md-9">
                                                {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Visitas</label>
                                            <div class="col-md-9">
                                                {{Form::text('contenidos', $contenido->contents, array('class' => 'form-control','placeholder'=>'Ingrese icono'))}}
                                            </div>
                                        </div>

                                    

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                            {{Form::hidden('contenido', $contenido->content, array('class' => 'form-control'))}}
                                            {{Form::hidden('imageal', $contenido->imageal, array('class' => 'form-control'))}}
                                            {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}
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


@endif


@if($contenido->type == 'thumbail')

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
                                        <h2><strong>Editar</strong> Thumbnail</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Contenido</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('contenido', $contenido->content, array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese contenido'))}}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Icono</label>
                                            <div class="col-md-9">
                                                {{Form::text('imageal', $contenido->imageal, array('class' => 'form-control','placeholder'=>'Ingrese icono'))}}
                                            </div>
                                        </div>


                                        <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                         <div class="col-md-9">
                                          <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="FilePath" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image" value="{{$contenido->image}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen</button></span>
                                          </div>
                                         </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">URL</label>
                                            <div class="col-md-9">
                                                {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Efecto</label>
                                            <div class="col-md-9">
                                                {{ Form::select('contenidos', [$contenido->contents => $contenido->contents,
                                                 'apollo' => 'apollo',
                                                 'ming' => 'ming',
                                                 'lily' => 'lily',
                                                 'sadie' => 'sadie',
                                                 'honey' => 'honey',
                                                 'layla' => 'layla',
                                                 'oscar' => 'oscar',
                                                 'zoe' => 'zoe',
                                                 'marley' => 'marley',
                                                 'dexter' => 'dexter',
                                                 'sarah' => 'sarah',
                                                 'bubba' => 'bubba',
                                                 'julia' => 'julia',
                                                 'goliath' => 'goliath',
                                                 'winston' => 'winston',
                                                 'selena' => 'selena',
                                                 'terry' => 'terry',
                                                 'phoebe' => 'phoebe',
                                                 'steve' => 'steve',
                                                 'moses' => 'moses',
                                                 'jazz' => 'jazz',
                                                 'duke' => 'duke',
                                                 'hera' => 'hera',
                                                 'ruby' => 'ruby',
                                                 'romeo' => 'romero',
                                                 'chico' => 'chico',
                                                 'milo' => 'milo',
                                                 'roxy' => 'roxy',
                                                 'jazz' => 'jazz',
                                                 'lexi' => 'lexi'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                            {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}
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


@endif

@if($contenido->type == 'documento')

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
                                        <h2><strong>Editar</strong> Documento</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Contenido</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('contenido', $contenido->content, array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese contenido'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Icono</label>
                                            <div class="col-md-9">
                                                {{Form::text('imageal', $contenido->imageal, array('class' => 'form-control','placeholder'=>'Ingrese icono'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Documento</label>
                                            <div class="col-md-9">
                                                <input type="text" name="FilePath" readonly="readonly" onclick="openKCFindera(this)" value="{{$contenido->image}}" class="form-control" />
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Rol acceso</label>
                                            <div class="col-md-9">
                                                <div id="output"></div>
                                                <select multiple="multiple" data-placeholder="Seleccione roles..." name="tagsa[]" multiple class="chosen-select form-control" id="tags">
                                                @foreach($rols as $rols)
                                                 @if($rols->rol_comunidad == 1)
                                                 <option value="{{$rols->rol_comunidad}}" selected>{{$rols->nombre}}</option>
                                                 @elseif($rols->id == 2)
                                                 <option value="{{$rols->rol_comunidad}}" selected>{{$rols->nombre}}</option>
                                                 @elseif($rols->id == 3)
                                                 <option value="{{$rols->rol_comunidad}}" selected>{{$rols->nombre}}</option>
                                                 @elseif($rols->id == 4)
                                                 <option value="{{$rols->rol_comunidad}}" selected>{{$rols->nombre}}</option>
                                                 @endif
                                                @endforeach
                                                @foreach($roles as $roles)
                                                 <option value="{{$roles->rol_comunidad}}">{{$roles->nombre}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                            {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}
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


@endif
@if($contenido->type == 'video-modal')

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
                                        <h2><strong>Editar</strong> Video Clip</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>
                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Consumo video</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('contenido', [$contenido->content => $contenido->content,
                                                '1' => 'Youtube',
                                                '2' => 'Vimeo',
                                                '3' => 'Facebook',
                                                '4' => 'Url'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Id Video o Url</label>
                                            <div class="col-md-9">
                                                 {{Form::text('contenidos', $contenido->contents, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                       

                                        <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                         <div class="col-md-9">
                                          <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="FilePath" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image" value="{{$contenido->image}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen</button></span>
                                          </div>
                                         </div>
                                        </div>

                            

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                            {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}
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


@endif

@if($contenido->type == 'parallax')

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
                                        <h2><strong>Editar</strong> Parallax</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Contenido A</label>
                                            <div class="col-md-9">
                                                 {{Form::text('contenido', $contenido->content, array('class' => 'form-control','placeholder'=>'Ingrese contenido A'))}}
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Contenido B</label>
                                            <div class="col-md-9">
                                                 {{Form::text('contenidos', $contenido->contents, array('class' => 'form-control','placeholder'=>'Ingrese contenido B'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Url</label>
                                            <div class="col-md-9">
                                                 {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                         <div class="col-md-9">
                                          <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="FilePath" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image" value="{{$contenido->image}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen</button></span>
                                          </div>
                                         </div>
                                        </div>

                                        

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                            {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}
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


@endif

@if($contenido->type == 'images')


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
                                        <h2><strong>Editar</strong> Imagenes</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                         <div class="col-md-9">
                                          <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="FilePath" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image" value="{{$contenido->image}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen</button></span>
                                          </div>
                                         </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Tipo</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('contenidos', [$contenido->contents => $contenido->contents,
                                                '0' => 'Indivudual',
                                                '1'  => 'Tres Columnas'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                                {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}
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


@endif

@if($contenido->type == 'menu')


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
                                        <h2><strong>Editar</strong> Menú</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>
                                      

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                            {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}
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


@endif

@if($contenido->type == 'blog')

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
                                        <h2><strong>Editar</strong> Blog</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Contenido</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('contenido', $contenido->content, array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese contenido'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                         <div class="col-md-9">
                                          <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="FilePath" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image" value="{{$contenido->image}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen</button></span>
                                          </div>
                                         </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">URL</label>
                                            <div class="col-md-9">
                                                {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                           {{Form::hidden('imageal', Auth::user()->name, array('class' => 'form-control'))}}
                                            {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}
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


@endif

@if($contenido->type == 'titulo')



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
                                        <h2><strong>Editar</strong> Título</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                         <div class="col-md-9">
                                          <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="FilePath" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image" value="{{$contenido->image}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen</button></span>
                                          </div>
                                         </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">URL</label>
                                            <div class="col-md-9">
                                                {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                          {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                          {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}
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


@endif



@if($contenido->type == 'cuenta')



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
                                        <h2><strong>Editar</strong> Cuenta</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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

                                          {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                          {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}
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


@endif

@if($contenido->type == 'ficha')



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
                                        <h2><strong>Editar</strong> Cuenta</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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

                                          {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                          {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}
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


@endif


@if($contenido->type == 'fichan')



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
                                        <h2><strong>Editar</strong> Cuenta</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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

                                          {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                          {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}
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


@endif

@if($contenido->type == 'empresas')



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
                                        <h2><strong>Editar </strong> Empresas</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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

                                          {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                          {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}
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


@endif



@if($contenido->type == 'listas')


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
                                        <h2><strong>Editar</strong> Listas</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Contenido</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('contenido', $contenido->content, array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese contenido'))}}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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

                                         {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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




@endif



@if($contenido->type == 'clientes')


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
                                        <h2><strong>Editar</strong> Clientes</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>
                                    

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                         <div class="col-md-9">
                                          <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="FilePath" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image" value="{{$contenido->image}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen</button></span>
                                          </div>
                                         </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">URL</label>
                                            <div class="col-md-9">
                                                {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                           {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}
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


@endif

@if($contenido->type == 'clientela')



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
                                        <h2><strong>Editar</strong> Clientes</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                              <div class="form-group">
                                         <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                         <div class="col-md-9">
                                          <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="FilePath" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image" value="{{$contenido->image}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen</button></span>
                                          </div>
                                         </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Clase</label>
                                            <div class="col-md-9">
                                               <input type="text" name="FilePath" readonly="readonly" onclick="openKCFinder(this)" value="{{$contenido->image}}" class="form-control" />
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">URL</label>
                                            <div class="col-md-9">
                                                {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>


                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         
                                            {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}
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





@endif


@if($contenido->type == 'hover')



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
                                        <h2><strong>Editar</strong> Hover</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                            <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                         <div class="col-md-9">
                                          <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="FilePath" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image" value="{{$contenido->image}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen</button></span>
                                          </div>
                                         </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">URL</label>
                                            <div class="col-md-9">
                                                {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Tipo</label>
                                            <div class="col-md-9">
                                                {{Form::text('contenido', $contenido->content, array('class' => 'form-control','placeholder'=>'Ingrese Tipo'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Efecto</label>
                                            <div class="col-md-9">
                                                {{ Form::select('contenidos', [$contenido->contents => $contenido->contents,
                                                 'apollo' => 'apollo',
                                                 'ming' => 'ming',
                                                 'lily' => 'lily',
                                                 'sadie' => 'sadie',
                                                 'honey' => 'honey',
                                                 'layla' => 'layla',
                                                 'oscar' => 'oscar',
                                                 'zoe' => 'zoe',
                                                 'marley' => 'marley',
                                                 'dexter' => 'dexter',
                                                 'sarah' => 'sarah',
                                                 'bubba' => 'bubba',
                                                 'julia' => 'julia',
                                                 'goliath' => 'goliath',
                                                 'winston' => 'winston',
                                                 'selena' => 'selena',
                                                 'terry' => 'terry',
                                                 'phoebe' => 'phoebe',
                                                 'steve' => 'steve',
                                                 'moses' => 'moses',
                                                 'jazz' => 'jazz',
                                                 'duke' => 'duke',
                                                 'hera' => 'hera',
                                                 'ruby' => 'ruby',
                                                 'romeo' => 'romero',
                                                 'chico' => 'chico',
                                                 'milo' => 'milo',
                                                 'roxy' => 'roxy',
                                                 'jazz' => 'jazz',
                                                 'lexi' => 'lexi'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         
                                            {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}
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

@endif


<!-- Componente de Modal para la administración de contenidos -->

@if($contenido->type == 'modal')


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
                                        <h2><strong>Editar</strong> Modal</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Contenido</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('contenido', $contenido->content, array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese contenido'))}}
                                            </div>
                                        </div>


                                        <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                         <div class="col-md-9">
                                          <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="FilePath" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image" value="{{$contenido->image}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen</button></span>
                                          </div>
                                         </div>
                                        </div>


                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Tamaño imagen</label>
                                            <div class="col-md-9">
                                                 {{Form::text('contenidos', $contenido->contents, array('class' => 'form-control','placeholder'=>'Ingrese tamaño imagen'))}}
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Alineación del contenido</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('imageal', [$contenido->imageal => $contenido->imageal,
                                                    'center-block' => 'center-block',
                                                    'pull-right' => 'pull-right',
                                                    'pull-left' => 'pull-left'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">URL</label>
                                            <div class="col-md-9">
                                                 {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>


                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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

                                          {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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

@endif


<!-- Componente de Mapa para la administración de contenidos -->

@if($contenido->type == 'mapa')


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
                                        <h2><strong>Editar</strong> Mapa</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Coordenadas</label>
                                            <div class="col-md-9">
                                                 {{Form::text('contenidos', $contenido->contents, array('class' => 'form-control','placeholder'=>'Ingrese coordenadas'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Alto mapa</label>
                                            <div class="col-md-9">
                                                {{Form::text('imageal', $contenido->imageal, array('class' => 'form-control','placeholder'=>'Ingrese alto del mapa'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
  
                                         {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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

 

@endif


@if($contenido->type == 'mailing')

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
                                        <h2><strong>Editar</strong> Mailing</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Contenido</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('contenido', $contenido->content, array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese contenido'))}}
                                            </div>
                                        </div>

                                          <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                         <div class="col-md-9">
                                          <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="FilePath" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image" value="{{$contenido->image}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen</button></span>
                                          </div>
                                         </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Id Formulario</label>
                                            <div class="col-md-9">
                                                 {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">No Formulario</label>
                                            <div class="col-md-9">
                                                 {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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

                                         {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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


 

@endif


@if($contenido->type == 'backimage')

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
                                        <h2><strong>Editar</strong> Imagen Background</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Contenido</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('contenido', $contenido->content, array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese contenido'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                         <div class="col-md-9">
                                          <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="FilePath" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image" value="{{$contenido->image}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen</button></span>
                                          </div>
                                         </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Enlace</label>
                                            <div class="col-md-9">
                                                 {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Tamaño</label>
                                            <div class="col-md-9">
                                                 {{Form::text('imageal', $contenido->imageal, array('class' => 'form-control','placeholder'=>'Ingrese Tamaño'))}}
                                            </div>
                                        </div>
                
                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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

                                         {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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


 

@endif
<!-- Componente de Media-Objects para la administración de contenidos -->

@if($contenido->type == 'media')


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
                                        <h2><strong>Editar</strong> Media</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Contenido</label>
                                            <div class="col-md-9">
                                               {{Form::textarea('contenido', $contenido->content, array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese contenido'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                             <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Icono</label>
                                            <div class="col-md-9">
                                                {{Form::text('contenidos', $contenido->contents, array('class' => 'form-control','placeholder'=>'Ingrese icono'))}}
                                            </div>
                                        </div>

                                          <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                         <div class="col-md-9">
                                          <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="FilePath" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image" value="{{$contenido->image}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen</button></span>
                                          </div>
                                         </div>
                                        </div>

                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Url video</label>
                                            <div class="col-md-9">
                                                 {{Form::text('video', $contenido->video, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                         @if($contenido->imageal == 'pull-right')

                                             <div class="form-group">
                                            <label class="col-md-3 control-label">Alinear Imagen</label>
                                            <div class="col-md-9">
                                               {{Form::radio('imageal', 'pull-left')}}Alinear izquierda<br>
                                             {{Form::radio('imageal', 'pull-right', true)}}Alinear derecha
                                            </div>
                                        </div> 
                                         @elseif($contenido->imageal == 'pull-left')
                                           <div class="form-group">
                                            <label class="col-md-3 control-label">Alinear Imagen</label>
                                            <div class="col-md-9">
                                               {{Form::radio('imageal', 'pull-left', true)}}Alinear izquierda<br>
                                             {{Form::radio('imageal', 'pull-right')}}Alinear derecha
                                            </div>
                                        </div> 
                                         @endif

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">URL</label>
                                            <div class="col-md-9">
                                                {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                          {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}
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



@endif


@if($contenido->type == 'mediamini')


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
                                        <h2><strong>Editar</strong> Mediamini</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Contenido</label>
                                            <div class="col-md-9">
                                               {{Form::textarea('contenido', $contenido->content, array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese contenido'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                               <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Icono</label>
                                            <div class="col-md-9">
                                                {{Form::text('contenidos', $contenido->contents, array('class' => 'form-control','placeholder'=>'Ingrese icono'))}}
                                            </div>
                                        </div>

                                          <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                         <div class="col-md-9">
                                          <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="FilePath" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image" value="{{$contenido->image}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen</button></span>
                                          </div>
                                         </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Columna</label>
                                            <div class="col-md-9">
                                                {{ Form::select('video', [$contenido->video => $contenido->video,
                                                '0' => 'Sin Columna',
                                                '1' => 'Columna A',
                                                '2' => 'Columna B'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>


                                         @if($contenido->imageal == 'pull-right')

                                             <div class="form-group">
                                            <label class="col-md-3 control-label">Alinear Imagen</label>
                                            <div class="col-md-9">
                                               {{Form::radio('imageal', 'pull-left')}}Alinear izquierda<br>
                                             {{Form::radio('imageal', 'pull-right', true)}}Alinear derecha
                                            </div>
                                        </div> 
                                         @elseif($contenido->imageal == 'pull-left')
                                           <div class="form-group">
                                            <label class="col-md-3 control-label">Alinear Imagen</label>
                                            <div class="col-md-9">
                                               {{Form::radio('imageal', 'pull-left', true)}}Alinear izquierda<br>
                                             {{Form::radio('imageal', 'pull-right')}}Alinear derecha
                                            </div>
                                        </div> 
                                         @endif

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">URL</label>
                                            <div class="col-md-9">
                                                {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                           {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}
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

@endif


<!-- Componente de Responsive para la administración de contenidos -->

@if($contenido->type == 'responsive')


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
                                        <h2><strong>Editar</strong> Responsive</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>
                                      

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">URL video</label>
                                            <div class="col-md-9">
                                              {{Form::text('enlace', $contenido->url , array('class' => 'form-control','placeholder'=>'Ingrese su Contraseña','placeholder'=>'Ingrese URL video'))}}
                                            </div>
                                        </div>


                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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

                                        {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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


@endif


@if($contenido->type == 'videograp')


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
                                        <h2><strong>Editar</strong> Video</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'GET','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div> 

                                           <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                         <div class="col-md-9">
                                          <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="FilePath" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image" value="{{$contenido->image}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen</button></span>
                                          </div>
                                         </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                    <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Height Video</label>
                                            <div class="col-md-9">
                                                 {{Form::text('enlace', $contenido->url , array('class' => 'form-control','placeholder'=>'Ingrese height video '))}}<br>
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                            
                                       {{Form::hidden('imageal', 'videograp', array('class' => 'form-control'))}}
                                        {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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


@endif


@if($contenido->type == 'vimeoback')


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
                                        <h2><strong>Editar</strong> Video</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'GET','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div> 

                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Url Video</label>
                                            <div class="col-md-9">
                                                 {{Form::text('FilePath', $contenido->image, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div> 

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Opacidad Video</label>
                                            <div class="col-md-9">
                                                 {{Form::text('imageal', $contenido->imageal, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div> 

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                    <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Height Video</label>
                                            <div class="col-md-9">
                                                 {{Form::text('enlace', $contenido->url , array('class' => 'form-control','placeholder'=>'Ingrese height video '))}}<br>
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                            
                         
                                        {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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


@endif


@if($contenido->type == 'galeriaimg')


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
                                        <h2><strong>Editar</strong> Galeria</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div> 

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                     <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Tamaño</label>
                                            <div class="col-md-9">
                                                 {{Form::text('contenido', $contenido->content, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                            
                                        {{Form::hidden('imageal', 'galeriaimg', array('class' => 'form-control'))}}
                                         {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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


@endif

@if($contenido->type== 'rondaproductos')


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
                                        <h2><strong>Editar</strong> Ronda Productos</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Cataegria</label>
                                            <div class="col-md-9">
                                                 <select name="contenidos" id="inputContenidos" class="form-control" required="required">
                                                  
                                                 

                                                  @if($contenido->contents == '')
                                                  <option value="" selected>Sin Categoria</option>
                                                  @elseif($contenido->contents == 'all')
                                                  <option value="all" selected>Todos los Productos</option>
                                                  @else
                                                  @foreach($contenidoweb as $contenidoweb)
                                                 <option value="{{$contenidoweb->contents}}" selected>{{$contenidoweb->
                                                nombre}}</option>         
                                                @endforeach                                         
                                                @endif
                                                 
                                                  @foreach($categoria as $categoria)
                                                   <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                                  @endforeach
                                                  <option value="">Sin Categoria</option>
                                                  <option value="all">Todos los Productos</option>
                                                 </select>
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Cataegria</label>
                                            <div class="col-md-9">
                                                 <select name="imageal" id="inputContenidos" class="form-control" required="required">
                                                 @if($contenido->imageal == '')
                                                 <option value="" selected>Sin sub Categoria</option>
                                                 @else
                                                 @foreach($contenidowebs as $contenidowebs)
                                                  <option value="{{$contenidowebs->imageal}}" selected>{{$contenidowebs->name}}</option>
                                                 @endforeach
                                                 @endif
                                                 
                                                  @foreach($category as $category)
                                                   <option value="{{$category->id}}">{{$category->name}}</option>
                                                  @endforeach
                                                <option value="" >Sin sub Categoria</option>
                                                 </select>
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                     <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Tamaño</label>
                                            <div class="col-md-9">
                                                 {{Form::text('contenido', $contenido->content, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                            
                                        <!-- {{Form::hidden('imageal', 'rondaproductos', array('class' => 'form-control'))}} -->
                                         {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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


@endif


@if($contenido->type == 'carousel')


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
                                        <h2><strong>Editar</strong> Carousel</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Contenido</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('contenido', $contenido->content, array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese contenido'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('contenidos', [$contenido->contents => $contenido->contents,
                                                'pull-right' => 'pull-right',
                                                'pull-left' => 'pull-left'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Estilo carousel</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('video', [$contenido->video => $contenido->video,
                                                '1' => 'Glider',
                                                '2' => 'Owl carousel'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>


                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                            
                                        {{Form::hidden('imageal', 'carousel', array('class' => 'form-control'))}}
                                         {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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


@endif

@if($contenido->imageal == 'calendario')


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
                                        <h2><strong>Editar</strong> Calendario</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Url</label>
                                            <div class="col-md-9">
                                                 {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese Url'))}}
                                            </div>
                                        </div> 

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                              

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        
                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                            
                                        {{Form::hidden('imageal', 'calendario', array('class' => 'form-control'))}}
                                         {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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


@endif


@if($contenido->imageal == 'eventos')


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
                                        <h2><strong>Editar</strong> Eventos</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Url</label>
                                            <div class="col-md-9">
                                                 {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese Url'))}}
                                            </div>
                                        </div> 

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                              

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                            
                                        {{Form::hidden('imageal', 'eventos', array('class' => 'form-control'))}}
                                         {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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


@endif

@if($contenido->imageal == 'totaleventos')


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
                                        <h2><strong>Editar</strong> Total eventos</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div> 

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                            
                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                            
                                        {{Form::hidden('imageal', 'totaleventos', array('class' => 'form-control'))}}
                                         {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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


@endif

@if($contenido->imageal == 'rondacomunidad')


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
                                        <h2><strong>Editar</strong> Ronda Comunidad</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div> 

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                       <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Categoria</label>
                                            <div class="col-md-9">
                                                <select name="contenidos" class="form-control" required>
                                                  @foreach($notas as $notas)
                                                   <option value="{{$notas->contents}}" selected="selected">{{$notas->com_nombre}}</option>
                                                  @endforeach
                                                  @foreach($categoria as $categoria)
                                                 <option value="{{$categoria->id}}">{{$categoria->com_nombre}}</option>
                                                  @endforeach
                                                </select>
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                            
                                        {{Form::hidden('imageal', 'rondacomunidad', array('class' => 'form-control'))}}
                                         {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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


@endif

@if($contenido->imageal == 'rondacomunidadina')


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
                                        <h2><strong>Editar</strong> Ronda Dinamizadores</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div> 

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                       <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Categoria</label>
                                            <div class="col-md-9">
                                                <select name="contenidos" class="form-control" required>
                                                  @foreach($notas as $notas)
                                                   <option value="{{$notas->contents}}" selected="selected">{{$notas->com_nombre}}</option>
                                                  @endforeach
                                                  @foreach($categoriadina as $categoriadina)
                                                 <option value="{{$categoriadina->id}}">{{$categoriadina->com_nombre}}</option>
                                                  @endforeach
                                                </select>
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                            
                                        {{Form::hidden('imageal', 'rondacomunidadina', array('class' => 'form-control'))}}
                                         {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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


@endif

@if($contenido->type == 'formulas')


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
                                        <h2><strong>Editar</strong> Formulas</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Email notificación</label>
                                            <div class="col-md-9">
                                                 {{Form::text('video', $contenido->video, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div> 

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Contenido</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('contenido', $contenido->content, array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese contenido'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Label</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('imageal', [$contenido->imageal => $contenido->imageal,
                                                '1' => 'Con Label',
                                                '0' => 'Sin Label'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Tipo notificación</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('enlace', [$contenido->url => $contenido->url,
                                                '1' => 'Alerta',
                                                '0' => 'Alerta Modal'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Asunto</label>
                                            <div class="col-md-9">
                                                 {{Form::text('template', $contenido->template, array('class' => 'form-control','placeholder'=>'Ingrese Asunto del mensaje'))}}
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Url</label>
                                            <div class="col-md-9">
                                                 {{Form::text('FilePath', $contenido->image, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Contenido del Mensaje</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('contenidos', $contenido->contents, array('class' => 'ckeditor','id' => 'editor1','placeholder'=>'Ingrese contenido'))}}
                                            </div>
                                        </div> 
                          
                                         {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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


@endif


@if($contenido->type == 'productos')

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
                                        <h2><strong>Editar</strong> Productos</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizar',$contenido->id))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Cataegria</label>
                                            <div class="col-md-9">
                                                 <select name="contenidos" id="inputContenidos" class="form-control" required="required">
                                                    @foreach($contenidoweb as $contenidoweb)
                                                  <option value="{{$contenidoweb->contents}}" selected>{{$contenidoweb->nombre}}</option>
                                                  @endforeach
                                                 
                                                  @foreach($categoria as $categoria)
                                                   <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                                  @endforeach
                                                  <option value="">Sin categoria</option>
                                                 </select>
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Cataegria</label>
                                            <div class="col-md-9">
                                                 <select name="imageal" id="inputContenidos" class="form-control" required="required">
                                                    @foreach($contenidowebs as $contenidowebs)
                                                  <option value="{{$contenidowebs->imageal}}" selected>{{$contenidowebs->name}}</option>
                                                  @endforeach
                                                 
                                                  @foreach($category as $category)
                                                   <option value="{{$category->id}}">{{$category->name}}</option>
                                                  @endforeach
                                                  <option value="">Sin sub categoria</option>
                                                 </select>
                                            </div>
                                        </div>


                                         
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Tipo visualización</label>
                                            <div class="col-md-9">
                                        
                                                   {{ Form::select('FilePath', [$contenido->image => $contenido->image,
                                                   '1' => 'Productos Slide',
                                                   '2' => 'Productos Grid'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>
                                       
        
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('posicion', [$contenido->position => $contenido->position,
                                                 'posicionSD1' => 'posicionSD1',
                                                 'posicionSD2' => 'posicionSD2',
                                                 'posicionSD3' => 'posicionSD3',
                                                 'posicionSD4' => 'posicionSD4',
                                                 'posicionSD5' => 'posicionSD5',
                                                 'posicionSD6' => 'posicionSD6',
                                                 'posicionSD7' => 'posicionSD7',
                                                 'posicionSD8' => 'posicionSD8',
                                                 'posicionSD9' => 'posicionSD9',
      
                                                  ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Idioma</label>
                                            <div class="col-md-9">
                                                {{ Form::select('idioma', [$contenido->idioma => $contenido->idioma,
                                                 'es' => 'Español',
                                                 'en' => 'Ingles',
                                                 'fr' => 'Frances'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Nivel de ubicación</label>
                                            <div class="col-md-9">
                                                 {{Form::number('nivelpos', $contenido->nivel, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>
                              
                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
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

                                         {{Form::hidden('tipo', $contenido->type, array('class' => 'form-control'))}}
                                         {{Form::hidden('peca', $contenido->id, array('class' => 'form-control'))}}

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

@endif

 @foreach($contenido as $contenido)
 @endforeach


<footer>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

  <script src="//harvesthq.github.io/chosen/chosen.jquery.js"></script>

  
    <script type="text/javascript">
document.getElementById('output').innerHTML = location.search;
$(".chosen-select").chosen();
</script>


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


<script>
  CKEDITOR.replace( 'editor1', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
</script>




   {{ Html::script('EstilosSD/dist/js/jquery-1.10.2.min.js') }}
   {{ Html::script('EstilosSD/dist/js/jquery.minicolors.min.js') }}

  <script type="text/javascript">
$(function(){
  var colpick = $('.demo').each( function() {
    $(this).minicolors({
      control: $(this).attr('data-control') || 'hue',
      inline: $(this).attr('data-inline') === 'true',
      letterCase: 'lowercase',
      opacity: false,
      change: function(hex, opacity) {
        if(!hex) return;
        if(opacity) hex += ', ' + opacity;
        try {
          console.log(hex);
        } catch(e) {}
        $(this).select();
      },
      theme: 'bootstrap'
    });
  });
  
  var $inlinehex = $('#inlinecolorhex h3 small');
  $('#inlinecolors').minicolors({
    inline: true,
    theme: 'bootstrap',
    change: function(hex) {
      if(!hex) return;
      $inlinehex.html(hex);
    }
  });
});
</script>
</footer>
 @stop
