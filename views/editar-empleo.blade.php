

  @extends ('adminsite.layout')

    @section('cabecera')
    @parent
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
    <script src="/vendors/ckeditor/ckeditor.js"></script>  
    @stop


 @section('ContenidoSite-01')
@foreach($contenido as $contenidos)

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
                                        <h2><strong>Editar</strong> Empleo</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                   {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizarempleo',$contenidos->id))) }}
                   
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenidos->titulo_emp, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Requsitos</label>
                                            <div class="col-md-9">
                                                 {{Form::text('requisito', $contenidos->requisitos_emp, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                  {{Form::textarea('descripcion', $contenidos->descripcion_emp, array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese contenido'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Área</label>
                                            <div class="col-md-9">
                                                 {{Form::text('area', $contenidos->area_emp, array('class' => 'form-control','placeholder'=>'Ingrese área'))}}
                                            </div>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Nivel</label>
                                            <div class="col-md-9">
                                                 {{Form::text('nivel', $contenidos->nivel_emp, array('class' => 'form-control','placeholder'=>'Ingrese nivel'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Ciudades</label>
                                            <div class="col-md-9">
                                                 {{Form::text('ciudad', $contenidos->ciudad_emp, array('class' => 'form-control','placeholder'=>'Ingrese ciudades'))}}
                                            </div>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Salario</label>
                                            <div class="col-md-9">
                                                 {{Form::text('salario', $contenidos->salario_emp, array('class' => 'form-control','placeholder'=>'Ingrese salario'))}}
                                            </div>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Fecha</label>
                                            <div class="col-md-9">
                                                 {{Form::text('fecha', $contenidos->fecha_emp, array('class' => 'form-control','placeholder'=>'Ingrese fecha'))}}
                                            </div>
                                        </div>

                                           <input type="text" name="id" value="{{$contenidos->content_id}}"></input>
                                     
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




<footer>

<script type="text/javascript">  
       CKEDITOR.replace( 'editor' );  
    </script>  

<script src="/vendors/ckeditor/config.js?t=HBDD" type="text/javascript"></script>

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

</footer>

 @stop