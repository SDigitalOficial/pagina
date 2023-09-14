
@if($contenido->content == '0')

<div class="col-xs-4 col-sm-4 col-md-4 col-lg-3">   
  @else
  @endif
<ul class="nav nav-tabs desing" role="tablist">
 @foreach($contenidonu as $contenidonu)
 @if($contenido->id == $contenidonu->content_id)
@if($contenido->content == '0')
  <li role="presentation" style="width:100%" class="{{$contenidonu->state}} col-xs-12 col-sm-12 col-md-2 col-lg-2"><a href="#{{$contenidonu->slug}}" aria-controls="home" role="tab" data-toggle="tab"> {{$contenidonu->titlecl}}
    @else
    <li role="presentation" class="{{$contenidonu->state}} col-xs-12 col-sm-12 col-md-2 col-lg-2"><a href="#{{$contenidonu->slug}}" aria-controls="home" role="tab" data-toggle="tab"> {{$contenidonu->titlecl}}
@endif
  </a>
    
  </li>
@endif
 @endforeach
</ul>
</div>

<div class="tab-content">

 @foreach($contenidonus as $contenidonu)
  @if($contenido->id == $contenidonu->content_id)
  <div role="tabpanel" class="tab-pane {{$contenidonu->state}} animated fadeIn" id="{{$contenidonu->slug}}">
     @if($contenidonu->imagecl == '')
     @if($contenido->content == '0')

     <div class="col-xs-12 col-sm-12 col-md-7 col-lg-9">
      @else
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  @endif
    {!!$contenidonu->contentcl!!}
</div>
 
@else
 @if($contenido->content == '0')
  <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
  @else
  <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 {{$contenidonu->posicion}}">
  @endif
      <img src="{!!$contenidonu->imagecl!!}" class="img-responsive center-block" alt="{{$contenido->title}}" title="{{$contenido->title}}">
    </div>
     @if($contenido->content == '0')
<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-lg-offset-3">
  @else
  <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
  @endif
    {!!$contenidonu->contentcl!!}
</div>
@endif

  </div>
  @endif
 @endforeach
  </div>
</div>