@if($formulario->requerido == 1)

<div class="{{$formulario->respon}}">
 <div class="form-group">
  <div class="col-md-12">
    @if($contenido->imageal == 1)
   <label class="control-label" for="example-email-input">{{$formulario->nombre}}</label>
   @else
   @endif
   <select name="{{$formulario->nombreinput}}" id="{{$formulario->nombreinput}}" class="form-control" placeholder="{{$formulario->nombre}}">
       <option value="" disabled selected>Seleccionar {{$formulario->nombre}}</option> 
   	@foreach($selectores as $selectores)
   	@if($formulario->id == $selectores->input_id)
	<option value="{{$selectores->nombre}}">{{$selectores->nombre}}</option>
	@else
	@endif
	@endforeach
   </select>
  </div>
 </div>
</div>

@else

<div class="{{$formulario->respon}}">
 <div class="form-group">
  <div class="col-md-12">
    @if($contenido->imageal == 1)
   <label class="control-label" for="example-email-input">{{$formulario->nombre}}</label>
   @else
   @endif
   <select name="{{$formulario->nombreinput}}" id="{{$formulario->nombreinput}}" class="form-control" required="required" placeholder="{{$formulario->nombre}}">
     <option value="" disabled selected>Seleccionar {{$formulario->nombre}}</option>
	@foreach($selectores as $selectores)
	@if($formulario->id == $selectores->input_id)
	<option value="{{$selectores->nombre}}">{{$selectores->nombre}}</option>
	@else
	@endif
	@endforeach
   </select>
  </div>
 </div>
</div>

@endif

