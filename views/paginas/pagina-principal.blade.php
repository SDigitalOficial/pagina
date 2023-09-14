
@extends ('adminsite.layout')

    @section('cabecera')
    @parent
   
     {{ Html::script('jquery.js') }}
  {{ Html::script('jquery-ui-1.8.12.custom.min.js') }}
  {{ Html::style('faca.css') }}

  <script type="text/javascript">
    jQuery.noConflict();
    jQuery(document).ready(function($){
  $("ul#articulos").sortable({ placeholder: "ui-state-highlight",opacity: 0.6, cursor: 'move', update: function() {
  var order = $(this).sortable("serialize");
  $.post("/order.php", order, function(respuesta){
  $(".msg").html(respuesta).fadeIn("fast").fadeOut(2500);
  });}});});
  </script>

  <script type="text/javascript">
    jQuery.noConflict();
    jQuery(document).ready(function($){
  $("ul#articulosa").sortable({ placeholder: "ui-state-highlight",opacity: 0.6, cursor: 'move', update: function() {
  var order = $(this).sortable("serialize");
  $.post("/ordera.php", order, function(respuesta){
  $(".msga").html(respuesta).fadeIn("fast").fadeOut(2500);
  });}});});
  </script>

    @stop

@section('ContenidoSite-01')

 <div class="content-header">
        <ul class="nav-horizontal text-center">
      <li>
       <a href="/gestion/paginas"><i class="fa fa-file-text"></i> Ver páginas</a>
      </li>
      <li>
       <a href="/gestion/paginas/crear"><i class="fa fa-file-o"></i> Crear página</a>
      </li>
     
      
      <li>
       <a href="/consulta/formularios"><i class="fa fa-commenting-o"></i> Registros <span class="badge">{{$conteo}}</span></a>
      </li>
     
     </ul>
    </div>

 <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 topper">

  <?php $status=Session::get('status');?>
    @if($status=='ok_create')
      <div class="alert alert-success">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página registrada con exito</strong> US ...
      </div>
    @endif

    @if($status=='ok_delete')
      <div class="alert alert-danger">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página eliminada con exito</strong> US ...
      </div>
    @endif

    @if($status=='ok_update')
      <div class="alert alert-warning">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página actualizada con exito</strong> US ...
      </div>
    @endif
   
 </div>


<div class="container">
  <div class="row">
    <div class="col-md-12">
       <!-- Basic Form Elements Block -->
     <div class="block">
      <!-- Basic Form Elements Title -->
       <div class="block-title">
        
        <h2><strong>Página</strong> principal</h2>
       </div>
      
       <div class="content">
         <a href="">
           <ul id="articulos">
            @foreach($roles as $roles)
             <li id="articulo-{{$roles->id}}">{{$roles->page}}</li>
            @endforeach
           </ul>
          <div class="msg"></div>
         </a>
        </div>
      <br>                      

     </div>       
    </div>
  </div>
</div>




  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>


    

  



@stop