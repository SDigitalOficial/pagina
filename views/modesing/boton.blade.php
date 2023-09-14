 @if($contenido->level == 1)
 @if($contenido->slugcon == Request::segment(1))
@if($contenido->content == 1)
<div class="{{$contenido->imageal}}">
<a href="{{$contenido->url}}" class="btn {{$contenido->contents}} btn-block desing {{$contenido->image}} active" style="margin-top:4px" target="{{$contenido->video}}">{{$contenido->title}}</a>
</div>
@else
<div class="{{$contenido->imageal}}">
<a href="{{$contenido->url}}" class="btn {{$contenido->contents}} desing {{$contenido->image}} active" target="{{$contenido->video}}" style="margin-top:4px">{{$contenido->title}}</a></div>
@endif
@else
@if($contenido->content == 1)
<div class="{{$contenido->imageal}}">
<a href="{{$contenido->url}}" class="btn {{$contenido->contents}} btn-block desing {{$contenido->image}}" target="{{$contenido->video}}" style="margin-top:4px">{{$contenido->title}}</a></div>
@else
<div class="{{$contenido->imageal}}">
<a href="{{$contenido->url}}" class="btn {{$contenido->contents}} desing {{$contenido->image}}" target="{{$contenido->video}}" style="margin-top:4px">{{$contenido->title}}</a>
</div>
@endif
@endif

@else
@endif    

