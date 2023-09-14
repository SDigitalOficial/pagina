 @if($contenido->level == 1)
 @if(Session::get('miSesionTextoaaac') == '')
 @if($contenido->roles_id == NULL)
<div class="descargas">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="background-image: url('azul.jpg');padding:20px">
	
	<div class="col-xs-12 col-sm-6 col-md-2 col-lg-1 text-center">
		<i class="{{$contenido->imageal}}" aria-hidden="true"></i>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
	  <div class="borde">
		<h3>{{$contenido->description}}</h3>
	  </div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
		<p>{!!$contenido->content!!}</p>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 center-block">
		<p class="center-block">
		<a href="{{$contenido->image}}" class="btn btn-primary bton" style="width:100%" download="Reporte2Mayo2010">Descargar</a>
		<p>
	</div>
	
</div>

</div>
@else
<div class="descargas">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="background-image: url('azul.jpg');padding:20px">
	
	<div class="col-xs-12 col-sm-6 col-md-2 col-lg-1 text-center">
		<span class="/acceso/exclusivo" aria-hidden="true"></span>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
	  <div class="borde">
		<h3>{{$contenido->description}}</h3>
	  </div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
		<p>{!!$contenido->content!!}</p>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 center-block">
		<p class="center-block">
		 <a href="/acceso/exclusivo" class="btn btn-primary bton" style="width:100%" ><i class="fas fa-lock"></i> Descargar</a>
		<p>
	</div>
	
</div>

</div>
@endif
@else


  @if(in_array(Session::get('miSesionTextoaaac'), explode(',', $contenido->roles_id)) OR $contenido->roles_id == NULL)
<div class="descargas">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="background-image: url('azul.jpg');padding:20px">
	
	<div class="col-xs-12 col-sm-6 col-md-2 col-lg-1 text-center">
		<span class="{{$contenido->imageal}}" aria-hidden="true"></span>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
	  <div class="borde">
		<h3>{{$contenido->description}}</h3>
	  </div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
		<p>{!!$contenido->content!!}</p>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 center-block">
		<p class="center-block">
		<a href="{{$contenido->image}}" class="btn btn-primary bton" style="width:100%" download="Reporte2Mayo2010">Descargar</a>
		<p>
	</div>
	
</div>

</div>
@else
<div class="descargas">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="background-image: url('azul.jpg');padding:20px">
	
	<div class="col-xs-12 col-sm-6 col-md-2 col-lg-1 text-center">
		<span class="/acceso/exclusivo" aria-hidden="true"></span>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
	  <div class="borde">
		<h3>{{$contenido->description}}</h3>
	  </div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
		<p>{!!$contenido->content!!}</p>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 center-block">
		<p class="center-block">
		 <a href="/acceso/exclusivo" class="btn btn-primary bton" style="width:100%" ><i class="fas fa-address-card"></i> Descargar</a>
		<p>
	</div>
	
</div>

</div>
@endif

@endif
@else
@endif

