
 @if($pagination->level == 1)
<div class="thumbnail desing">
	  <div class="caption">
	  	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	  	
 <img src="{!!$pagination->image!!}" alt="{!!$pagination->description!!}" title="{!!$pagination->title!!}" title="{{$contenido->title}}" class="img-responsive center-block">
 <br>
 	  	</div>
</div>

  <div class="caption">

<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
<div class="fusion-date-box updated bg-encabezado text-encabezado">
	<span class="fusion-date">{{ $pagination->created_at->format('d') }}</span><br>
	<span class="fusion-month-year">{{ $pagination->created_at->format('m') }}, {{ $pagination->created_at->format('Y')}}</span>
</div>
<div class="icono bg-danger">
	<span class="glyphicon glyphicon-calendar" aria-hidden="true" style="font-size: 20px;vertical-align:middle"></span>
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
	<h3>{!!$pagination->title!!}</h3>
	<h6>Creado por <b>{!!$pagination->imageal!!}</b> | {{ $pagination->created_at->format('M') }} {{ $pagination->created_at->format('d') }}, {{ $pagination->created_at->format('Y') }}</h6>
	<p>{!!substr($pagination->content, 0, 300)!!}...</p>

</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <p  style="text-align: right"><a href="blog/{!!$pagination->slug!!}">Leer Más</a><hr></p> 
</div>
   </div>
</div>

 @else
 @endif