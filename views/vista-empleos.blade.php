@extends ('LayoutsSD.Layout')

 @section('cabecera')
   

@foreach($ofertas as $ofertasa)
    <title>{{$ofertasa->titulo_emp}}</title>
    @endforeach



 
  @stop

 @section('ContenidoSite-01')


<div class="container">

<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	<h4><strong>TRABAJA CON NOSOTROS</strong></h4>



</div>


<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 empleador">
	<img src="http://167.99.11.224/Website/images/images/trabaja-con-nosotros.jpg" class="img-responsive" alt="Image">

	<h1>Detalle de la Oferta</h1>
	<br>
	<hr>
@foreach($ofertas as $ofertas)
	<h5><b>Título:</b></h5> <p>{{$ofertas->titulo_emp}}</p>
	<hr>
	<h5><b>Descripción:</b></h5> <p>{!!$ofertas->descripcion_emp!!}</p>
	<hr>
	<h5><b>Requisitos:</b> </h5> <p>{{$ofertas->requisitos_emp}}</p>
	<hr>
	<h5><b>Área de trabajo:</b></h5> <p>{{$ofertas->area_emp}}</p>
	<h5><b>Nivel:</b></h5> <p>{{$ofertas->nivel_emp}}</p>
	<h5><b>Ciudades:</b></h5> <p>{{$ofertas->ciudad_emp}}</p>
	<h5><b>Salario:</b></h5> <p>{{$ofertas->salario_emp}}</p>
	<h5><b>Fecha publicación:</b></h5><p> {{$ofertas->fecha_emp}}</p>

	<a href="https://forms.gle/bmKFj1ZtJrPqQ9Kc6" target="_blank" style="width: 100%" type="button" class="btn btn-primary btn-lg">REGISTRAR HOJA DE VIDA</a>
	<br><br>

	@endforeach
</div>
</div>
@stop
