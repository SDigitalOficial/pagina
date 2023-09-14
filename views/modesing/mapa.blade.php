 @if($contenido->level == 1)
<div class="media desing">
<iframe src="{{$contenido->contents}}" width="100%" height="{{$contenido->imageal}}" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
@else
@endif