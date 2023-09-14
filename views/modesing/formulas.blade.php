 @if($contenido->level == 1)


 <script src="//www.google.com/recaptcha/api.js" async defer></script>
<style type="text/css">
.msg-error {
  color: #a94442;
    margin-top: 10px;
  margin-bottom: 100px
}


</style>

<div class="formularios">
	<div class="container-fluid">
		{!!$contenido->content!!}
	</div>

	 <div class="container-fluid">

  <?php $status=Session::get('status');?>
    @if($status=='ok_create')
    @if($contenido->url == 1)
      <div class="alert alert-warning">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       Su mensaje se ha enviado satisfactoriamente
      </div>
     @else
        <button id="id01" type="button" class="btn btn-info btn-lg hidden" data-toggle="modal" data-target="#myModal">Open Modal</button>
 <div id="myModal" class="modal fade" role="dialog">
  <div  class="modal-dialog">

    <!-- Modal content-->
    <div  class="modal-content">
      <div class="modal-header alert-warning">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Su mensaje de ha enviado correctamente</h4>
      </div>
 
    </div>

  </div>
</div>
     @endif
    @endif

  </div>
{{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('mensajes/crearmensajeinput'))) }}
    
@foreach($formulario as $formulario)
 @include('pagina::formularios.'.$formulario->tipo)
  @endforeach
   <input type="hidden" name="form_id" id="input" class="form-control" value="{{$contenido->id}}">
   <input type="hidden" name="redireccion" id="input" class="form-control" value="{{Request::url()}}">
	 <input type="hidden" name="_token" value="{{ csrf_token() }}">


  
 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {!! NoCaptcha::display() !!}
 @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
    
<br>
    {{Form::submit('Enviar', array('class' => 'btn btn-primary btn-block', 'id' => 'sbt')  )}}
      </div>

{{ Form::close() }}
</div>

@else
@endif