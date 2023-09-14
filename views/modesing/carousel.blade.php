@if($contenido->video == 1)

@if($contenido->level == 1)

<!doctype html>
<html>
  <head>
  
    <link rel="stylesheet" type="text/css" href="/glider/glider.css" />
    <script src="/glider/glider.js"></script>
<script>
  window.addEventListener('load',function(){
  new Glider(document.querySelector('.{{$contenido->slugcon}}'), {
  autoplay: 10,
  animationDuration: 10,
  animationTimingFunc: 'linear',
  slidesToShow: 3,
  draggable: true,
  perView: 1,
  peek: 300,
  dots: '#dots',
  arrows: {
    prev: '.prev-{{$contenido->slugcon}}',
    next: '.next-{{$contenido->slugcon}}'
  },
   responsive: [
    {
      // screens greater than >= 775px
      breakpoint: 375,
      settings: {
        // Set to `auto` and provide item width to adjust to viewport
        slidesToShow: 1,
        slidesToScroll: 1,
        itemWidth: 150,
        duration: 0.25
      }
    },
     {
      // screens greater than >= 775px
      breakpoint: 600,
      settings: {
        // Set to `auto` and provide item width to adjust to viewport
        slidesToShow: 2,
        slidesToScroll: 1,
        itemWidth: 150,
        duration: 0.25
      }
    },
     {
      // screens greater than >= 775px
      breakpoint: 992,
      settings: {
        // Set to `auto` and provide item width to adjust to viewport
        slidesToShow: 2,
        slidesToScroll: 1,
        itemWidth: 150,
        duration: 0.25
      }
    },
    {
      // screens greater than >= 1024px
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        itemWidth: 150,
        duration: 0.25
      }
    }
  ]
  });
  });
  </script>




  </head>
  <body>


<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 {{$contenido->contents}}">
 <h2>{{$contenido->title}}</h2>
{!!$contenido->content!!}
 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-left: 7px">
  <button class="prev-{{$contenido->slugcon}} bg-primary next-web" id="prev">&laquo;</button>
  <button class="next-{{$contenido->slugcon}} bg-primary next-web" id="next">&raquo;</button>
 </div>
</div>

    
 <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
  <div class="glider-contain">
   <div class="{{$contenido->slugcon}}">
        @foreach($carouselimg as $carouselimg)
        @if($contenido->id == $carouselimg->content_id)
    <div class="slada">
      @if($carouselimg->url_car == "")
      <a href="/gestiones/{{$carouselimg->slug_car}}">
      @else
      <a href="{{$carouselimg->titulo_car}}">
        @endif
     <img alt="Test" src="{{$carouselimg->imagen_car}}">
     <h4 class="text-justify"><b>{{$carouselimg->titulo_car}}</b></h4>
     <p class="">{!!substr($carouselimg->descripcionweb_car, 0, 300)!!} ...</p>
      </a>
    </div>
    @else
    @endif
 @endforeach
 
   </div>
  </div>
 </div>
  </body>
</html>


@else
@endif
@else

<style type="text/css">
    .carousel-wrap {
  margin: 30px auto;
  padding: 0 0%;
  width: 100%;
  position: relative;
}

/* fix blank or flashing items on carousel */
.owl-carousel .item {
  position: relative;
  z-index: 100; 
  -webkit-backface-visibility: hidden; 
}

/* end fix */
.owl-nav > div {
  margin-top: -26px;
  position: absolute;
  top: 50%;
  color: #cdcbcd;
}

.owl-nav i {
  font-size: 52px;
}

.owl-nav .owl-prev {
  left: -30px;
}

.owl-nav .owl-next {
  right: -30px;
}
</style>
<div class="carousel-wrap">
  <div class="owl-carousel">
    @foreach($carouselimg as $carouselimg)
        @if($contenido->id == $carouselimg->content_id)
    <div class="item"><img src="{{$carouselimg->imagen_car}}" class="img-responsive center-block" alt="Image"></div>
    @else
    @endif
  @endforeach
  </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script>


<script type="text/javascript">
    $('.owl-carousel').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  navText: [
    "<i class='fa fa-caret-left'></i>",
    "<i class='fa fa-caret-right'></i>"
  ],
  autoplay: true,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 3
    },
    1000: {
      items: 4
    }
  }
})
</script>

@endif