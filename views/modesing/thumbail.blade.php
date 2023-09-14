
@if($contenido->level == 1)

 @if($contenido->contents == '')

 
  <div class="thumbnail desing">
   @if($contenido->imageal == '')
    <img src="{{$contenido->image}}" alt="{{$contenido->description}}" alt="{{$contenido->title}}" title="{{$contenido->title}}">
   @else
 	  <i class="{{$contenido->imageal}}" aria-hidden="true"></i>
   @endif
   
   {!!$contenido->content!!}
   @if($contenido->url == '')
   @else
    <div class="centro"> 
     <a href="{{$contenido->url}}" class="btn btn-primary" role="button">Leer más >></a>
    </div>
   @endif
  </div>



@else

@if($contenido->level == 1)

 <div class="grid">
  @if($contenido->imageal == '')
  <figure class="effect-{{$contenido->contents}}">
   <a href="{{$contenido->url}}"><img src="{{$contenido->image}}" class="img-responsive" alt="{{$contenido->title}}" title="{{$contenido->title}}">
    <figcaption>
     <h2>{{$contenido->title}}</h2>
     <p>{{$contenido->description}}</p>
     </figcaption>
   </a> 
  </figure>
  @else
    <i class="{{$contenido->imageal}}" aria-hidden="true"></i>
   @endif

  <div class="caption">
   {!!$contenido->content!!}
    <p><a href="{{$contenido->url}}" class="btn btn-primary">Leer más</a></p>
  </div>
 </div>

@else
@endif


@endif

@else
@endif