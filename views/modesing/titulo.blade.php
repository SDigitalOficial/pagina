 @if($contenido->level == 1)
<div class="titulo desing">
 <div class="container">
  <h2> <img class="alineadoTextoImagenArriba titu" alt="{{$contenido->title}}" title="{{$contenido->title}}" src="{{$contenido->image}}"/><span>{{$contenido->description}}</span></h2>
 </div>
</div>
  @else
  @endif    
      