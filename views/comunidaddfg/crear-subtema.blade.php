 @extends ('adminsite.layout')
 

   @section('cabecera')
    @parent
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
    <script src="/vendors/ckeditor/ckeditor.js"></script>  
    @stop


  @section('ContenidoSite-01')

   <div class="content-header">
     <ul class="nav-horizontal text-center">
     <li class="active">
       <a href="/gestion/comunidad"><i class="fa fa-list-ul"></i> Categorias</a>
      </li>
      <li>
       <a href="/gestion/comunidad/temas"><i class="fa fa-file-o"></i> Campos conceptuales</a>
      </li>
      <li>
       <a href="/gestion/comunidad/areas"><i class="fa fa-clipboard"></i> Áreas</a>
      </li>
      <li>
       <a href="/gestion/comunidad/interes"><i class="fa fa-clipboard"></i> Temas de interés</a>
      </li>
      
       <li>
       <a href="/gestion/comunidad/roles"><i class="fa fa-user"></i> Roles comunidad</a>
      </li>
    
     </ul>
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
                                        <h2><strong>Crear</strong> variable didáctica</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/comunidad/subcreartema'))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Variable didáctica</label>
                                            <div class="col-md-9">
                                                {{Form::text('tema', '', array('class' => 'form-control','placeholder'=>'Ingrese Nombre','required' => 'required'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Descripción</label>
                                            <div class="col-md-9">
                                                {{Form::text('descripcion', '', array('class' => 'form-control','placeholder'=>'Ingrese Descripción','required' => 'required'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Descripción Orientación Didáctica</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('descorientacion', '', array('class' => 'form-control','placeholder'=>'Ingrese Descripción de Orientación Didáctica','required' => 'required'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Orientación Didáctica</label>
                                            <div class="col-md-9">
                                                <input type="text" name="FilePath" readonly="readonly" onclick="openKCFinder(this)" value="" placeholder="Click para seleccionar imagen" class="form-control" />
                                            </div>
                                        </div>

                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Descripción Evaluación</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('descevaluacion', '', array('class' => 'form-control','placeholder'=>'Ingrese Descripción Evaluación','required' => 'required'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Evaluación</label>
                                            <div class="col-md-9">
                                                <input type="text" name="FilePatha" readonly="readonly" onclick="openKCFinder(this)" value="" placeholder="Click para seleccionar imagen" class="form-control" />
                                            </div>
                                        </div>

                                        {{Form::hidden('tema_id', Request::segment(4), array('class' => 'form-control','placeholder'=>'Ingrese Descripción'))}}

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

  <script src="//harvesthq.github.io/chosen/chosen.jquery.js"></script>

  
    <script type="text/javascript">
document.getElementById('output').innerHTML = location.search;
$(".chosen-select").chosen();
</script>


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
    window.open('/vendors/kcfinder/browse.php?type=files&dir=files/public', 'kcfinder_textbox',
        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
        'resizable=1, scrollbars=0, width=800, height=600'
    );
}
</script>


  

  @stop