      @if($contenido->level == 1)
      <a class="example-image-link" href="{{$contenido->image}}" data-lightbox="example-set" data-title="{{$contenido->description}}">
      	<img class="example-image img-responsive" src="{{$contenido->image}}" alt="{{$contenido->title}}" title="{{$contenido->title}}" />
      </a>

      @else
      @endif
