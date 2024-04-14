@extends ('adminsite.layout')
 

   @section('cabecera')
    @parent
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
    <script src="/vendors/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="/validaciones/dist/css/bootstrapValidator.css"/>
    <script type="text/javascript" src="/validaciones/dist/js/bootstrapValidator.js"></script>
    @stop


  @section('ContenidoSite-01')

  <div class="content-header">
       <ul class="nav-horizontal text-center">
      <li> 
       <a href="/gestor/ver-templates"><i class="fa fa-desktop"></i> Ver templates</a>
      </li>
      <li>
       <a href="/gestion/logo-head"><i class="fa fa-arrow-circle-up"></i> Logo encabezado</a>
      </li>
      <li>
       <a href="/gestion/logo-footer"><i class="fa fa-arrow-circle-down"></i> Logo pie página</a>
      </li>
      <li>
       <a href="/gestion/configurar-correo"><i class="fa fa-envelope"></i> Configurar correo</a>
      </li>
         <li>
       <a href="/gestion/redes-sociales"><i class="hi hi-bullhorn"></i> Redes sociales</a>
      </li>
      </li>
         <li class="active">
       <a href="/gestion/ubicacion"><i class="gi gi-google_maps"></i> Ubicación</a>
      </li>
      @if(Auth::user()->id == 1)
      <li>
       <a href="/gestion/venta"><i class="gi gi-usd"></i> Ventas</a>
      </li>
      @else
      @endif
     </ul>
    </div>

 <div class="container">
  <?php $status=Session::get('status'); ?>
  @if($status=='ok_create')
   <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Usuario registrado con éxito</strong>
   </div>
  @endif

  @if($status=='ok_delete')
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Usuario eliminado con éxito</strong>
   </div>
  @endif

  @if($status=='ok_update')
   <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Usuario actualizado con éxito</strong>
   </div>
  @endif

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
                                        <h2><strong>Editar</strong> Whatsapp</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                
                                   

                                    <!-- Basic Form Elements Content -->
                                     
               @foreach($whatsapp as $whatsapp)                     
            {{ Form::open(array('files' => true,'method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/gestion/editwhats',$whatsapp->id))) }}
                      
                                      
                                      @if($whatsapp->id == 1)
                                      <h6><b>Datos Generales</b></h6>
                                       <hr>
                                       <!--
                                       <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Mensaje Head</label>
                                            <div class="col-md-9">
                                                {{Form::text('bienvenida', $whatsapp->bienvenida, array('class' => 'form-control','placeholder'=>'Ingrese Mensaje head','required' => 'required'))}}
                                            </div>
                                        </div>
                                     
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización whatsapp</label>
                                            <div class="col-md-9">
                                                {{ Form::select('visualizacion', [
                                                 $whatsapp->visualizacion =>  $whatsapp->visualizacion,
                                                 '1' => 'Visible',
                                                 '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>
                                    -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Mensaje Etiqueta</label>
                                            <div class="col-md-9">
                                                {{Form::text('accion', $whatsapp->accion, array('class' => 'form-control','placeholder'=>'Ingrese etiqueta','required' => 'required'))}}
                                            </div>
                                        </div>
                                        <!--
                                        <div class="form-group">
                                          <label class="col-md-3 control-label" for="example-password-input">Imagen Empresa</label>
                                          <div class="col-md-9">
                                           <div class="input-group">
                                        <input type="text" id="image_labela" class="form-control" name="empresa" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image" value="{{$whatsapp->empresa}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-imagea">Seleccionar imagen</button></span>
                                           </div>
                                          </div>
                                         </div>
                                        -->
                                        <hr>
                                       
                                      @else
                                      @endif

                                      
                                

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Número Whatsapp</label>
                                            <div class="col-md-9">
                                                {{Form::text('numero', $whatsapp->numero, array('class' => 'form-control','placeholder'=>'Ingrese número whatsapp','required' => 'required'))}}
                                            </div>
                                        </div>
                                        <!--
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Cargo o Área</label>
                                            <div class="col-md-9">
                                                {{Form::text('principal', $whatsapp->principal, array('class' => 'form-control','placeholder'=>'Ingrese cargo o área','required' => 'required'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nombre Asesor</label>
                                            <div class="col-md-9">
                                                {{Form::text('secundario', $whatsapp->secundario, array('class' => 'form-control','placeholder'=>'Ingrese nombre asesor','required' => 'required'))}}
                                            </div>
                                        </div>
                                        -->
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Mensaje Precarga</label>
                                            <div class="col-md-9">
                                                {{Form::text('llamado', $whatsapp->llamado, array('class' => 'form-control','placeholder'=>'Ingrese mensaje precarga','required' => 'required'))}}
                                            </div>
                                        </div>
    
                                        

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización Canal</label>
                                            <div class="col-md-9">
                                                {{ Form::select('estado', [
                                                 $whatsapp->estado =>  $whatsapp->estado,
                                                 '1' => 'Visible',
                                                 '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>
                                         <!--               
                                        <div class="form-group">
                                          <label class="col-md-3 control-label" for="example-password-input">Imagen Asesor</label>
                                          <div class="col-md-9">
                                           <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="imagen" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image" value="{{$whatsapp->imagen}}">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen </button></span>
                                           </div>
                                          </div>
                                         </div>
                                       -->
                                       

                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Editar</button>
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

  {{ Html::script('Usuario/js/valida.js') }}
  {{ Html::script('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js') }}
 
  {{ Html::script('//cdn.datatables.net/1.10.1/js/jquery.dataTables.min.js') }}
  {{ Html::script('//cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.js') }}


<script>
    document.addEventListener("DOMContentLoaded", function() {

    document.getElementById('button-image').addEventListener('click', (event) => {
      event.preventDefault();

      inputId = 'image_label';

      window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
    });

    document.getElementById('button-imagea').addEventListener('click', (event) => {
      event.preventDefault();

      inputId = 'image_labela';

      window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
    });

    // second button
    document.getElementById('button-imageb').addEventListener('click', (event) => {
      event.preventDefault();

      inputId = 'image_labelb';

      window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
    });

    document.getElementById('button-imagec').addEventListener('click', (event) => {
      event.preventDefault();

      inputId = 'image_labelc';

      window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
    });

  });

  // input
  let inputId = '';

  // set file link
  function fmSetLink($url) {
    document.getElementById(inputId).value = $url;
  }
</script>

  @stop
