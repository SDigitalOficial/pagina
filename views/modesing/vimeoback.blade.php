 @if($contenido->level == 1)


  <div id="customElement" style="height: {{$contenido->url}}vh;">   
   <div class="botonesback">
    <div class="console">
     <button onclick="myPlayer.v_pause()"><i class="fas fa-pause"></i></button>
     <button onclick="myPlayer.v_play()"><i class="fas fa-play"></i></button>
     <button onclick="myPlayer.v_mute()"><i class="fas fa-volume-off"></i></button>
     <button onclick="myPlayer.v_set_volume(.8)"><i class="fas fa-volume-up"></i></button>
     <button onclick="myPlayer.v_fullscreen()"><i class="fas fa-arrows-alt"></i></button>       
    </div>
   </div>
   <div class="container" style="z-index:10; color:red">
   <div id="carousel-id" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner">
   @foreach($galeria as $contenidona)

    <div class="item {{$contenidona->state}}">
      <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="" src="" style="height:600px">
      <div class="container">
        <div class="carousel-caption">
          {!!$contenidona->contentsd!!}
           @if($contenidona->urlsd == '')
          @else
          <p>
            @if($contenidona->urlsd == '')
            @else
            <a class="btn btn-lg btn-primary" href="{{$contenidona->urlsd}}" role="button">{{$contenidona->boton}}</a>
            @endif 
            @if($contenidona->urlsduno == '')
            @else
            <a class="btn btn-lg btn-default" href="{{$contenidona->urlsduno}}" role="button">{{$contenidona->botonuno}}</a>
            @endif
          </p>
          @endif
        </div>
      </div>
    </div>
   @endforeach

  </div>

  @if($contenidona->count() == 0)
  @else
  <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
  <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
  @endif
</div>
   </div>
  </div>






<div id="video" class="player" data-property="{videoURL:'{{$contenido->image}}',containment:'#customElement',align:'bottom,center', showControls:false, autoPlay:true, loop:true, mute:true, setVolume:100, startAt:0, opacity:.{{$contenido->imageal}}, addRaster:true}">My video</div> <!--BsekcY04xvQ-->

@else
@endif