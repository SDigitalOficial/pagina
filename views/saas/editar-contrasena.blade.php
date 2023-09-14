@extends ('adminsite.layoutsaas')

 @section('ContenidoSite-01')
 <div class="content-header">
  <ul class="nav-horizontal text-center">
   <li>
    <a href="/editar/usuariosaas"><i class="gi gi-edit sidebar-nav-icon"></i> Editar datos</a>
   </li>
   <li class="active">
    <a href="/editar/contrasena"><i class="fa fa-unlock-alt sidebar-nav-icon"></i> Cambiar Contraseña</a>
   </li>
  </ul>
 </div>

 <div class="container">

 <?php $status=Session::get('status');?>
  

    @if($status=='ok_update')
      <div class="alert alert-warning">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Usuario actualizado con exito</strong> US ...
      </div>
    @endif

  <div class="row">
   <div class="col-md-12">
    <div class="block">
     
     <div class="block-title">
      <div class="block-options pull-right">
      </div>
      <h2><strong>Editar</strong> contraseña</h2>
     </div>
     @foreach($usuario as $usuario)
     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('usuario/actualizarpass',Auth::user()->id))) }}
      <div class="form-group hidden-lg hidden-md hidden-sm hidden-xs">
       <label class="col-md-3 control-label" for="example-text-input">Nombre</label>
        <div class="col-md-9">
         {{Form::text('nombre', $usuario->name, array('class' => 'form-control','placeholder'=>'Ingrese nombre'))}}
        </div>
      </div>
      
      <div class="form-group hidden-lg hidden-md hidden-sm hidden-xs">
       <label class="col-md-3 control-label" for="example-email-input">Apellido</label>
        <div class="col-md-9">
         {{Form::text('apellido', $usuario->last_name, array('class' => 'form-control','placeholder'=>'Ingrese apellido'))}}
        </div>
      </div>

      <div class="form-group hidden-lg hidden-md hidden-sm hidden-xs">
       <label class="col-md-3 control-label" for="example-email-input">Email</label>
        <div class="col-md-9">
         {{Form::text('email', $usuario->email, array('class' => 'form-control', 'readonly' => 'readonly', 'placeholder'=>'Ingrese email'))}}
        </div>
      </div>
      <div class="form-group hidden-lg hidden-md hidden-sm hidden-xs">
       <label class="col-md-3 control-label" for="example-email-input">Tipo documento</label>
        <div class="col-md-9">
         {{ Form::select('tipo', [$usuario->tipo_documento => $usuario->tipo_documento,
         '1' => 'Cédula ciudadania',
         '2' => 'Cédula extranjeria',
         '3' => 'RUT',
         '4' => 'Tarjeta de identidad',
         '5' => 'Pasaporte',
         '6' => 'NIT',], null, array('class' => 'form-control')) }}
        </div>
      </div>

       <div class="form-group hidden-lg hidden-md hidden-sm hidden-xs">
       <label class="col-md-3 control-label" for="example-email-input">Documento</label>
        <div class="col-md-9">
         {{Form::text('documento', $usuario->documento, array('class' => 'form-control','placeholder'=>'Ingrese documento'))}}
        </div>
      </div>

       <div class="form-group hidden-lg hidden-md hidden-sm hidden-xs">
       <label class="col-md-3 control-label" for="example-password-input">País</label>
        <div class="col-md-9">
           <select name="pais" class="form-control">
           <option value="{{$usuario->pais_id}}" selected="selected">{{$usuario->pais}}</option>
           @foreach($paises as $paisesx)
            <option name="pais" value="{{$paisesx->id}}">{{$paisesx->pais}}</option>
           @endforeach
          </select>
        </div>
      </div>



      <div class="form-group hidden-lg hidden-md hidden-sm hidden-xs">
       <label class="col-md-3 control-label" for="example-password-input">Dirección de residencia</label>
        <div class="col-md-9">
         {{Form::text('direccion', $usuario->address, array('class' => 'form-control','placeholder'=>'Ingrese dirección'))}}
        </div>
      </div>

      <div class="form-group hidden-lg hidden-md hidden-sm hidden-xs">
       <label class="col-md-3 control-label" for="example-password-input">Teléfono Fijo o Célular</label>
        <div class="col-md-9">
         {{Form::text('telefono', $usuario->phone, array('class' => 'form-control','placeholder'=>'Ingrese teléfono fijo o célular'))}}
        </div>
      </div>


    <div class="form-group">
     <label class="col-md-3 control-label" for="example-password-input">Contraseña</label>
      <div class="col-md-9">
       {{Form::password('password', array('class' => 'form-control','placeholder'=>'Registre password'))}}
      </div>
    </div>

    <div class="form-group">
     <label class="col-md-3 control-label" for="example-password-input">Confirmar Contraseña</label>
      <div class="col-md-9">
       {{Form::password('confirmPassword', array('class' => 'form-control','placeholder'=>'Confirme password'))}}
      </div>
    </div>

      <div class="form-group form-actions">
       <div class="col-md-9 col-md-offset-3">
        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-angle-right"></i> Cambiar contraseña</button>
       </div>
      </div>
     
     {{ Form::close() }}
     

     @endforeach
    
    </div>
   </div>
  </div>                         
 </div>


 <footer>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   {{ Html::script('modulo-saas/editar-usuario.js') }}
  {{ Html::script('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js') }} 
 </footer>
 
@stop

