@extends ('adminsite.layoutsaas')
 
 @section('ContenidoSite-01')
 
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  


<div class="container">
   <?php $status=Session::get('status');?>
    @if($status=='ok_create')
      <div class="alert alert-success">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página registrada con exito</strong> US ...
      </div>
    @endif

    @if($status=='ok_delete')
      <div class="alert alert-danger">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página eliminada con exito</strong> US ...
      </div>
    @endif

    @if($status=='ok_update')
      <div class="alert alert-warning">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Se ha actualizado el nombre de hostname</strong> US ...
      </div>
    @endif
</div>

		  <div class="container">
   <div class="col-md-12">
    <div class="block">
     
     <div class="block-title">
      <div class="block-options pull-right">
      </div>
      <h2><strong>Actualizar</strong> hostname</h2>
     </div>
@foreach($plan as $plan)
     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('suscripcion/actualizarhost',$plan->id))) }}


 <div class="form-group">
       <label class="col-md-3 control-label" for="example-text-input">Hostname</label>
        <div class="col-md-9">
         {{Form::text('hostname', $plan->fqdn, array('class' => 'form-control','placeholder'=>'Ingrese nombre hostname'))}}
        </div>
      </div>




      <div class="form-group form-actions">
       <div class="col-md-9 col-md-offset-3">
        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-angle-right"></i> Editar host</button>
       </div>
      </div>
     
     {{ Form::close() }}
     
  @endforeach

    
    </div>
   </div>
  </div>                         



<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<script src="https://cdn.ckeditor.com/4.11.2/full/ckeditor.js"></script>

<script>
  CKEDITOR.replace( 'editor', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
</script>

 @stop
