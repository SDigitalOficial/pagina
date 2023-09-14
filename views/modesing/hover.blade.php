 @if($contenido->level == 1)
 <div class="grid">
          <figure class="effect-{{$contenido->contents}}">
            <a href="{{$contenido->url}}"><img src="{{$contenido->image}}" class="img-responsive" alt="{{$contenido->title}}" title="{{$contenido->title}}"/>
            <figcaption>
              <h2>{{$contenido->title}}</h2>
              <p>{{$contenido->description}}</p>
            </figcaption></a> 
          </figure>
        </div>
@else
@endif

