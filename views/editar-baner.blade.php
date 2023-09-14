



@extends ('adminsite.layout')
<!-- Define el titulo de la Página -->    
 @section('titulo')
  Acualizar Contenido
 @stop

 @section('cabecera')
  @parent
 {{ Html::style('EstilosSD/dist/css/jquery.minicolors.css') }}
  @stop
 @section('ContenidoSite-01')


<!-- Componente de Textos para la administración de contenidos --> 


<div class="container">
  <div class="row">
                            <div class="col-md-12">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            
                                        </div>
                                        <h2><strong>Editar</strong> Baner</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizarbanner',$banners->id))) }}

                                        

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nombre</label>
                                            <div class="col-md-9">
                                                {{Form::text('nombre', $banners->nombre, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Empresa</label>
                                            <div class="col-md-9">
                                                 {{Form::text('empresa', $banners->empresa, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                            <div class="col-md-9">
                                                 <input type="text" name="FilePath" readonly="readonly" onclick="openKCFinder(this)" value="{{$banners->url_imagen}}" class="form-control" />
                                            </div>
                                        </div>


                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Posición</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('position', [$banners->position => $banners->position,
                                                  'posicionSD02' => 'posicionSD02',
                                                  'posicionSD03' => 'posicionSD03'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Url destino</label>
                                            <div class="col-md-9">
                                                {{Form::text('destino', $banners->destino, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Impresiones</label>
                                            <div class="col-md-9">
                                                {{Form::text('impresiones', $banners->impresiones, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>


                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Clics</label>
                                            <div class="col-md-9">
                                                {{Form::text('clics', $banners->clics, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Visitas</label>
                                            <div class="col-md-9">
                                                {{Form::text('visitas', $banners->visitas, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $banners->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                           
                                            {{Form::hidden('clics', $banners->clics, array('class' => 'form-control'))}}
                                            {{Form::hidden('page_id', $banners->page_id, array('class' => 'form-control'))}}
                                            {{Form::hidden('impresiones', $banners->impresiones, array('class' => 'form-control'))}} 
                                            {{Form::hidden('tipo', 'baner', array('class' => 'form-control'))}}
  
                                 <input type="hidden" name="peca" value="{{Request::segment(4)}}"></input>

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

<script type="text/javascript">
function openKCFinder(field) {
    window.KCFinder = {
        callBack: function(url) {
            field.value = url;
            window.KCFinder = null;
        }
    };
    window.open('/vendors/kcfinder/browse.php?type=images&dir=files/public', 'kcfinder_textbox',
        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
        'resizable=1, scrollbars=0, width=800, height=600'
    );
}
</script>


@stop