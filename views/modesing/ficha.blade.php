  @if($contenido->level == 1)
 @foreach($fichones as $fichone)
  @if($fichone->type =='ficha')
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 wow {{$fichone->animacion}}">
     @if($fichone->level == 1)
	<div class="thumbnail">
		<img src="fichaimg/clientes/{{$fichone->usuario_id}}/{!!$fichone->image!!}" title="{{$contenido->title}}" alt="{{$contenido->title}}">
		<div class="caption">
			<h3>{!!$fichone->title!!}</h3>
			<p class="text-justify">
				{!!substr($fichone->position, 0, 200)!!}...
			</p>
			<p>
				<a href="empresa/{!!$fichone->slug!!}" class="btn btn-primary btn-md" role="button">Ver Empresa</a>
		
			</p>
		</div>
	</div>
@else
@endif
   </div>
  @endif 
 @endforeach     
 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
  {{$fichones->links()}}
 </div>
@else
@endif
