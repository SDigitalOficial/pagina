 
 @if($contenido->level == 1)
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
      <img title="{{$contenido->descriptionsd}}" class="img-responsive" style="visibility:hidden" alt="{{$contenido->descriptionsd}}" src="http://dummyimage.com/{{$contenido->url}}x{{$contenido->imagesd}}/000/fff">
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
        <img src="{{$contenido->imagesd}}" alt="{{$contenido->descriptionsd}}" title="{{$contenido->descriptionsd}}" class="img-responsive">
      <div class="container">
        <div class="carousel-caption">
                <hgroup class="zoomInDown animated center-block">
                     <h1 class="fadeInLeft animated">{!!$contenido->titlesd!!}</h1>
          <h4 class="slideInRight animated">{!!$contenido->contentsd!!}</h4>
          </hgroup>
          @if($contenido->urlsd == '')
          @else
         
            @if($contenido->urlsd == '')
            @else
            <a class="btn btn-primary slideInLeft animated" href="{{$contenido->urlsd}}" role="button">{{$contenido->boton}}</a>
            @endif 
            @if($contenido->urlsduno == '')
            @else
            <a class="btn btn-default slideInRight animated" href="{{$contenido->urlsduno}}" role="button">{{$contenido->botonuno}}</a>
            @endif

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
@else
@endif



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../libs/jquery/dist/jquery.min.js"><\/script>')</script>
<script src="../src/jquery.vide.js"></script>
