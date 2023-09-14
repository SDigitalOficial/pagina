<div class="galeria">
<div id="carousel-id" class="carousel slide" data-ride="carousel">
@if($contenido->imageal == 'videograp')

  <ol class="carousel-indicators">
   @foreach($galeria as $contenido)
    <li data-target="#carousel-id" data-slide-to="{{$contenido->descriptionsd}}" class="{{$contenido->state}}"></li>
    @endforeach
  </ol>
  <div id="block" style="width: 100%; height:{{$contenido->url}}px;" data-vide-bg="{{$contenido->image}}" data-vide-options="position: 0% 50%">
  <div class="casa"></div>
  <div class="carousel-inner">
    @foreach($galeria as $contenido)
    <div class="item {{$contenido->state}} animated {{$contenido->animacionsd}} ">
      <img title="{{$contenido->titlesd}}" class="img-responsive" style="visibility:hidden" alt="{{$contenido->titlesd}}" src="http://dummyimage.com/900x{{$contenido->imagesd}}/000/fff">
      <div class="container">
        <div class="carousel-caption">
          <p>{!!$contenido->contentsd!!}</p>
          @if($contenido->urlsd == '')
          @else
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a> <a class="btn btn-lg btn-default" href="#" role="button">Sign up today</a></p>
          @endif
        </div>
      </div>
    </div>
    @endforeach
  </div>
  </div>
  <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
  <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
  @else
<ol class="carousel-indicators">
   @foreach($galeria as $contenido)
    <li data-target="#carousel-id" data-slide-to="{{$contenido->descriptionsd}}" class="{{$contenido->state}}"></li>
    @endforeach
  </ol>
  <div class="carousel-inner">
    @foreach($galeria as $contenido)


 <div class="item {{$contenido->state}}">
        <div class="slide-1 " style="background-image:url('{{$contenido->imagesd}}');height:{!!$contenido->content!!}px"></div>
      <div class="container">
        <div class="carousel-caption wow {{$contenido->animacion}}">
          {!!$contenido->contentsd!!}
          @if($contenido->urlsd == '')
          @else
          <p>
            @if($contenido->urlsd == '')
            @else
            <a class="btn btn-lg btn-primary" href="{{$contenido->urlsd}}" role="button">{{$contenido->boton}}</a>
            @endif 
            @if($contenido->urlsduno == '')
            @else
            <a class="btn btn-lg btn-default" href="{{$contenido->urlsduno}}" role="button">{{$contenido->botonuno}}</a>
            @endif
          </p>
          @endif
        </div>
      </div>
    </div>
@endforeach
  </div>
  <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
  <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
  
  @endif
  </div>

</div>
