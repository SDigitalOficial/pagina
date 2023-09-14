@if($formulario->requerido == 1)

<div class="{{$formulario->respon}}">
 <div class="form-group">
  <div class="col-md-12">
    @if($contenido->imageal == 1)
   <label class="control-label" for="example-email-input"></label>
   @else
   @endif
    <input type="{{$formulario->tipo}}" name="{{$formulario->nombreinput}}" id="{{$formulario->nombreinput}}" value="{{$formulario->nombre}}" placeholder="{{$formulario->nombre}}">
    {{$formulario->nombre}}
  </div>
 </div>
</div>

@else

<div class="{{$formulario->respon}}">
 <div class="form-group">
  <div class="col-md-12">
    @if($contenido->imageal == 1)
   <label class="control-label" for="example-email-input"> <span style="color:red">*</span></label>
   @else
   @endif
    <input type="{{$formulario->tipo}}" name="{{$formulario->nombreinput}}" id="{{$formulario->nombreinput}}" value="{{$formulario->nombre}}" required="required" placeholder="{{$formulario->nombre}}">
  {{$formulario->nombre}}
  </div>
 </div>
</div>

@endif