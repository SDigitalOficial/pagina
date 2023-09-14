 @extends ('adminsite.layout')
 
 @section('ContenidoSite-01')
 
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  




		  <div class="container">
   <div class="col-md-12">
    <div class="block">
     
     <div class="block-title">
      <div class="block-options pull-right">
      </div>
      <h2><strong>Crear</strong> plan</h2>
     </div>

     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('suscripcion/crear-plan'))) }}
      <div class="form-group">
       <label class="col-md-3 control-label" for="example-text-input">Identificado del plan</label>
        <div class="col-md-9">
         {{Form::text('id_plan', '', array('class' => 'form-control','placeholder'=>'Ingrese el identificador del plan'))}}
        </div>
      </div>
      
      <div class="form-group">
       <label class="col-md-3 control-label" for="example-email-input">Nombre del plan</label>
        <div class="col-md-9">
         {{Form::text('name', '', array('class' => 'form-control','placeholder'=>'Ingrese el nombre del plan'))}}
        </div>
      </div>

      <div class="form-group">
       <label class="col-md-3 control-label" for="example-email-input">Descripción del plan</label>
        <div class="col-md-9">
         {{Form::text('description', '', array('class' => 'form-control', 'placeholder'=>'Ingrese la descripción del plan'))}}
        </div>
      </div>


       <div class="form-group">
       <label class="col-md-3 control-label" for="example-email-input">Valor del plan</label>
        <div class="col-md-9">
         {{Form::text('amount', '', array('class' => 'form-control','placeholder'=>'Ingrese el valor del plan'))}}
        </div>
      </div>


      <div class="form-group">
       <label class="col-md-3 control-label" for="example-password-input">Tipo de moneda</label>
        <div class="col-md-9">
         {{Form::text('moneda', '', array('class' => 'form-control','placeholder'=>'Ingrese el tipo de moneda'))}}
        </div>
      </div>

      <div class="form-group">
       <label class="col-md-3 control-label" for="example-password-input">Intervalo</label>
        <div class="col-md-9">
         {{Form::text('intervalo', '', array('class' => 'form-control','placeholder'=>'Ingrese el intervalo'))}}
        </div>
      </div>

       <div class="form-group">
       <label class="col-md-3 control-label" for="example-password-input">Intervalo conteo</label>
        <div class="col-md-9">
         {{Form::text('int_conteo', '', array('class' => 'form-control','placeholder'=>'Ingrese el intervalo de conteo'))}}
        </div>
      </div>

      <div class="form-group">
       <label class="col-md-3 control-label" for="example-password-input">Dias prueba</label>
        <div class="col-md-9">
         {{Form::text('trial', '', array('class' => 'form-control','placeholder'=>'Ingrese los días prueba'))}}
        </div>
      </div>

       <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Datos</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('datos', '', array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese contenido'))}}
                                            </div>
                                        </div>


              <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Estado plan</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('estado', [
                                                '1' => 'Activo',
                                                '0' => 'Inactivo'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>


      <div class="form-group form-actions">
       <div class="col-md-9 col-md-offset-3">
        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-angle-right"></i> Crear plan</button>
       </div>
      </div>
     
     {{ Form::close() }}
     


    
    </div>
   </div>
  </div>                         



<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<script src="https://cdn.ckeditor.com/4.11.2/full/ckeditor.js"></script>

<script>
  CKEDITOR.replace( 'editor', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
</script>
	
 @stop

			
		