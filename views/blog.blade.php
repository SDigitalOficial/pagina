  @extends ('LayoutsSD.Layout')


@section('ContenidoSite-01')


   <div class="row">
      @foreach($contenidos as $contenido)
      <div class="container">
          
     <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
      <img src="{{$contenido->image}}" class="img-responsive" alt="Image">
      <h1>{{$contenido->title}}</h1>
      <p>{!!$contenido->content!!}</p>
     </div>
      </div>
      @endforeach
    </div>


 </body>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="Website/dist/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/1.7.0/less.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.4/waypoints.min.js"></script>
<script src='Website/dist/js/css3-animate-it.js'></script>
    <script type="text/javascript">//<![CDATA[ 
        $(function(){
            function onScrollInit( items, trigger ) {
                items.each( function() {
                var osElement = $(this),
                    osAnimationClass = osElement.attr('data-os-animation'),
                    osAnimationDelay = osElement.attr('data-os-animation-delay');
                  
                    osElement.css({
                        '-webkit-animation-delay':  osAnimationDelay,
                        '-moz-animation-delay':     osAnimationDelay,
                        'animation-delay':          osAnimationDelay
                    });

                    var osTrigger = ( trigger ) ? trigger : osElement;
                    
                    osTrigger.waypoint(function() {
                        osElement.addClass('animated').addClass(osAnimationClass);
                        },{
                            triggerOnce: true,
                            offset: '90%'
                    });
                });
            }

            onScrollInit( $('.os-animation') );
            onScrollInit( $('.staggered-animation'), $('.staggered-animation-container') );
});//]]>  

    </script>

</html>
@stop