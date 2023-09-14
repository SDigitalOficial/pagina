 @if($contenido->level == 1)
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 desing">
 <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
  <h1>{{$contenido->title}}</h1>
   <p>{{$contenido->description}}</p>
 </div>
 <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
  <p>{!!$contenido->content!!}</p>
 </div>
</div>
@else
@endif