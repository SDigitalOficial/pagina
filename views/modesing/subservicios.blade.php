 @if($contenido->level == 1)
 
<div id="counter" class="counter" style="text-align: center;">

	<div class="thumbnail">
		@if($contenido->image == '')
		<img src="{{$contenido->image}}" class="img-responsive center-block" alt="{{$contenido->title}}" title="{{$contenido->title}}">
		@else
		 <i class="{{$contenido->image}}" aria-hidden="true"></i>
		@endif
		<div class="counter">
			   <span class="count percent" style="text-align: center" data-count="{{$contenido->imageal}}">0</span>

			  <h2>{{$contenido->title}}</h2>
		</div>
	</div>

</div>
@else
@endif




