@extends ('LayoutsSD.TemaSD')

@section('ContenidoSite-01')

<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-lg-offset-2">
  
  <?php $status=Session::get('status');?>
    @if($status=='ok_create')
      <div class="alert alert-success">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Template agredado con exito</strong> SD ...
      </div>
    @endif
</div>
{{ Form::open(array('files' => 'true', 'method' => 'POST','class' => 'form-horizontal','id' => 'tinyMCEForm', 'url' => array('gestor/zip'))) }}



<div class="container">
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
<div class="form-group">
 <label class="control-label">Insertar template</label>
  <div class="col-lg-12">
   <input  type="file" class="form-control" name="file" />
  </div>
</div>
</div>
</div>

<div class="container">
   <div class="modal-footer">
    {{ Form::reset('Cancelar', array('class' => 'btn btn-default')) }}
    {{Form::submit('Crear', array('class' => 'btn btn-primary')  )}}
   </div>
 </div>
 {{ Form::close() }}
 @stop