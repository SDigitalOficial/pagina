
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
       
        <h2><strong>Ordenar</strong> páginas</h2>
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



<div class="container">
    <div class="row">
                            <div class="col-md-12">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            
                                        </div>
                                        <h2><strong>Crear</strong> Sub Página</h2>
                                    </div>
                                    <!-- END Form Elements Title -->

                                    <!-- Basic Form Elements Content -->
                                    {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm1', 'url' => array('gestion/paginas/crearpagina'))) }}
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nombre Página</label>
                                            <div class="col-md-9">
                                                {{Form::text('pagina', '', array('class' => 'form-control','placeholder'=>'Ingrese página','maxlength' => '50' ))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Título</label>
                                            <div class="col-md-9">
                                                 {{Form::text('titulo', '', array('class' => 'form-control','placeholder'=>'Ingrese título', 'maxlength' => '55'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Palabras Clave</label>
                                            <div class="col-md-9">
                                                {{Form::text('palabras', '', array('class' => 'form-control','placeholder'=>'Ingrese palabras clave','maxlength' => '150'))}}
                                            </div>
                                        </div>

                                        {{Form::hidden('posti', '2', array('class' => 'form-control','placeholder'=>'Ingrese la descripción de la página'))}}
                                        {{Form::hidden('categoria', '0', array('class' => 'form-control','placeholder'=>'Ingrese la descripción de la página'))}}        

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-textarea-input">Descripción</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('descripcion', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción', 'maxlength' => '159'))}}
                                            </div>
                                        </div>

                                        <input type="hidden" name="DNI" id="DNI" value="{{Request::segment(4)}}"/>
                                        
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Crear</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Cancelar</button>
                                            </div>
                                        </div>
                                     {{ Form::close() }}
                                    <!-- END Basic Form Elements Content -->
                                </div>
                                <!-- END Basic Form Elements Block -->
                            </div>
                          </div>

</div>



  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>




  



@stop