
@extends ('adminsite.layout')

@section('ContenidoSite-01')

<div class="content-header">
     <ul class="nav-horizontal text-center">
      <li class="active"> 
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
     </ul>
    </div>

<div class="container">
  <?php $status=Session::get('status'); ?>
  @if($status=='ok_create')
   <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>>Template Registrado Con Éxito</strong> CMS...
   </div>
  @endif

  @if($status=='ok_delete')
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Template Eliminado Con Éxito</strong> CMS...
   </div>
  @endif

  @if($status=='ok_update')
   <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Usuario Actualizado Con Éxito</strong> CMS...
   </div>
  @endif
</div>



<div class="container">
  <div class="row">
                            
   <div class="col-md-12">
    <div class="block">
     <div class="block-title">
      <h2><strong>Subir</strong> template</h2>
     </div>
                        
     {{ Form::open(array('files' => 'true', 'method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestor/zip'))) }}
                                       
     <div class="form-group">
      <label class="col-md-3 control-label" for="example-email-input">Seleccionar template</label>
      <div class="col-md-9">
      <input  type="file" class="form-control" name="file" required />
      </div>
     </div>
                                        
     <div class="form-group form-actions">
      <div class="col-md-9 col-md-offset-3">
       <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Cargar</button>
       <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Cancelar</button>
      </div>
     </div>
                                          
     {{ Form::close() }}
                                
        </div>
       </div>
      </div>
     </div>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

 @stop

