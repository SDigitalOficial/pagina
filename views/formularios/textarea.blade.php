@if($formulario->requerido == 1)

<div class="{{$formulario->respon}}">
 <div class="form-group">
  <div class="col-md-12">
  	@if($contenido->imageal == 1)
   <label class="control-label" for="example-email-input">{{$formulario->nombre}}</label>
   @else
   @endif
   <textarea name="{{$formulario->nombreinput}}" id="{{$formulario->nombreinput}}" class="form-control" rows="7" required="required" placeholder="{{$formulario->nombre}}"></textarea>
  </div>
 </div>
</div>

@else

<div class="{{$formulario->respon}}">
 <div class="form-group">
  <div class="col-md-12">
  	@if($contenido->imageal == 1)
   <label class="control-label" for="example-email-input">{{$formulario->nombre}} <span style="color:red">*</span></label>
   @else
   @endif
   <textarea name="{{$formulario->nombreinput}}" id="{{$formulario->nombreinput}}" class="form-control" rows="7" required="required" placeholder="{{$formulario->nombre}}"></textarea>
  </div>
 </div>
</div>

@endif