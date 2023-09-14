 @if($contenido->level == 1)
<div class="media desing">
  <a class="col-xs-12 col-sm-12 col-md-5 col-lg-5 {{$contenido->imageal}}" href="{{$contenido->url}}">
      @if($contenido->video == NULL)
    <img class="media-object img-responsive center-block" src="{{$contenido->image}}" alt="{{$contenido->description}}" title="{{$contenido->title}}">
      @else
  <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item" src="{{$contenido->video}}" allowfullscreen></iframe>
   </div>
  @endif
  </a>
  <div class="media-body">
    
@if($contenido->imageal == 'pull-left')
	<div style="padding:0px 0px 0px 70px">    	
     {!!$contenido->content!!}
    </div>
@else
	<div style="padding:0px 70px 0px 0px"> 
	 {!!$contenido->content!!}
	</div>
@endif
  
  </div>
</div>

@else
@endif

