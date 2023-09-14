 @if($contenido->level == 1)
<style type="text/css">

#example1 {
 
    padding: 20px;
    background: url({{$contenido->image}});
    background-repeat: no-repeat;
    background-size:cover;
    
}
</style>

<div id="example1">
 <div class="container" style="width:50%; padding-top:100px; padding-bottom:100px">
  <p class="text-center">{!!$contenido->content!!}<p>
 </div>
</div>
@else
@endif
