 @if($contenido->level == 1)
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 {{$contenido->imageal}} desing">
 <a href="#{{$contenido->id}}" data-toggle="collapse" aria-expanded="false" > <img src="{{$contenido->image}}" alt="{{$contenido->title}}" title="{{$contenido->title}}" class="img-responsive"/></a>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
 <h3><span>{{$contenido->title}}</span></h3>
  <p style="text-align:justify"> {{$contenido->content}}</p> 
   <a href="#{{$contenido->id}}" data-toggle="collapse" aria-expanded="false"><b>Leer más</b></a>
 
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
 <div class="collapse" id="{{$contenido->id}}">
  <div class="well">
   {!!$contenido->contents!!}
  </div>
 </div>
 </div>
 
</div>

@else
@endif