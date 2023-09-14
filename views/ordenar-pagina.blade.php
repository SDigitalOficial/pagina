
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
       <a href="/gestion/paginas"><i class="fa fa-file-o"></i> Ver Páginas</a>
      </li>
      <li>
       <a href="/gestion/paginas/crear"><i class="fa fa-file-o"></i> Crear Página</a>
      </li>
      <li>
       <a href="/gestion/pagina-principal"><i class="fa fa-clipboard"></i> Página Entrada</a>
      </li>
      <li class="active">
       <a href="/gestion/ordenar-paginas"><i class="fa fa-cubes"></i> Ordenar Páginas</a>
      </li>
      <li>
       <a href="/gestion/logo-head"><i class="fa fa-arrow-circle-up"></i> Logo Head</a>
      </li>
      <li>
       <a href="/gestion/logo-footer"><i class="fa fa-arrow-circle-down"></i> Logo Footer</a>
      </li>
      <li>
       <a href="/gestion/configurar-correo"><i class="fa fa-envelope"></i> Conf. Correo</a>
      </li>
         <li>
       <a href="/gestion/redes-sociales"><i class="hi hi-bullhorn"></i> Redes Sociales</a>
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
         <div class="block-options pull-right">
          <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">No Borders</a>
         </div>
        <h2><strong>Ordenar</strong> Páginas</h2>
       </div>
      
      <div class="content">
         <a href="">
          <ul id="articulosa">
           @foreach($rolesa as $rolesa)
            <li id="articuloa-{{$rolesa->id}}">{{$rolesa->page}}</li>
           @endforeach
          </ul>
          <div class="msga"></div>
         </a>
      </div>
      <br>                      

     </div>       
    </div>
  </div>
</div>


  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>




  



@stop