  @if($contenido->level == 1)
 <div class="mediamini desing">
 <div class="{{$contenido->imageal}}">
 	 @if($contenido->url == NULL) 
   @if($contenido->contents == NULL)
   <img class="media-object img-responsive" src="{{$contenido->image}}" alt="{{$contenido->title}}" title="{{$contenido->title}}" style="padding:10px">
    @else
  <i class="{{$contenido->contents}}" aria-hidden="true"></i>
  @endif
  @else
  <a href="{{$contenido->url}}">
     @if($contenido->contents == NULL)
   <img class="media-object img-responsive" src="{{$contenido->image}}" alt="{{$contenido->title}}" title="{{$contenido->title}}" style="padding:10px">
   @else
  <i class="{{$contenido->contents}}" aria-hidden="true"></i>
  @endif
  </a>
  @endif
 </div>
 <div class="media-body">
  {!!$contenido->content!!}
 </div>
 @if($contenido->url == NULL)
 @else
 @if($contenido->imageal == 'pull-left')
 <a href="" class="btn btn-primary btn-md pull-right" style="margin-right:50px; margin-top:15px">Leer Más</a>
  @else
   <a href="" class="btn btn-primary btn-md pull-left" style="margin-top:15px">Leer Más</a>
  @endif
 @endif


</div>

@endif