 @if($contenido->level == 1)
<div class="jumbotron desing">
 <div class="container">
 	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
 	 <h3>{{$contenido->title}}</h3>
 	</div>

 	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
 	 {!!$contenido->content!!}
 	</div>

 </div>
</div>
@else
@endif