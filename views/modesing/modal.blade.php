 @if($contenido->level == 1)

 @if($contenido->image == NULL)
<button type="button" class="btn btn-primary btn-lg {{$contenido->contents}}" style="display:inline" data-toggle="modal" data-target="#{{$contenido->slugcon}}">
 {{$contenido->title}}
</button>
@else

<img src="{{$contenido->image}}" data-toggle="modal" data-target="#{{$contenido->slugcon}}" class="img-responsive {{$contenido->imageal}}" alt="{{$contenido->title}}" title="{{$contenido->title}}" style="width:{{$contenido->contents}}px;height:{{$contenido->contents}}px;">



@endif

<div class="modal fade" id="{{$contenido->slugcon}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close </span></button>
        <h4 class="modal-title" id="myModalLabel">{!!$contenido->title!!}</h4>
      </div>
      <div class="modal-body">
       <p>{!!$contenido->content!!}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<br>
@else
@endif
