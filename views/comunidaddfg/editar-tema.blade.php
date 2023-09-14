 @extends ('adminsite.layout')
 

   @section('cabecera')
    @parent
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  

    <script type="text/javascript" src="/validaciones/vendor/jquery/jquery.min.js"></script>
    {{ Html::style('EstilosSD/dist/css/jquery.minicolors.css') }}
    @stop


  @section('ContenidoSite-01')

   <div class="content-header">
     <ul class="nav-horizontal text-center">
      <li class="active">
       <a href="/gestion/comunidad"><i class="fa fa-list-ul"></i> Categorias</a>
      </li>
      <li>
       <a href="/gestion/comunidad/temas"><i class="fa fa-file-o"></i> Campos conceptuales</a>
      </li>
      <li>
       <a href="/gestion/comunidad/areas"><i class="fa fa-clipboard"></i> Áreas</a>
      </li>
      <li>
       <a href="/gestion/comunidad/interes"><i class="fa fa-clipboard"></i> Temas de interés</a>
      </li>
      
       <li>
       <a href="/gestion/comunidad/roles"><i class="fa fa-user"></i> Roles comunidad</a>
      </li>
    
     </ul>
    </div>

@foreach($temas as $temas)
@endforeach
<div class="container">
  <div class="row">
                            <div class="col-md-12">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            
                                        </div>
                                        <h2><strong>Editar</strong> Campo Conceptual</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'PUT','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/comunidad/editartema',Request::segment(4)))) }}
                             
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Campo conceptual</label>
                                            <div class="col-md-9">
                                                {{Form::text('tema', $temas->tema, array('class' => 'form-control','placeholder'=>'Ingrese Nombre','required' => 'required'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Descripción</label>
                                            <div class="col-md-9">
                                                {{Form::text('descripcion', $temas->descripciontema, array('class' => 'form-control','placeholder'=>'Ingrese Descripción','required' => 'required'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Área</label>
                                            <div class="col-md-9">
                                              <select class="form-control"  name="area" id="area">
                                              @foreach($areaweb as $areaweb)
                                                 <option value="{{$areaweb->id}}" selected>{{$areaweb->area}}</option>
                                                @endforeach
                                                @foreach($area as $area)
                                                 <option value="{{$area->id}}">{{$area->area}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Grado</label>
                                            <div class="col-md-9">
                                             <select class="form-control selector" name="grado" id="grado">
                                             @foreach($grado as $grado)
                                              <option value="{{$grado->id}}" selected>{{$grado->grado_comunidad}}</option>
                                             @endforeach
                                             <option value="1"></option>
                                            </select> 
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Color</label>
                                            <div class="col-md-9">
                                                {{Form::text('color', $temas->color_tema, array('id' => 'hue-demo', 'class' => 'form-control demo','data-control'=>'hue'))}}
                                            </div>
                                        </div>


                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Editar</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Cancelar</button>
                                            </div>
                                        </div>
                                    {{ Form::close() }}
                                
                                </div>
                                <!-- END Basic Form Elements Block -->
                            </div>
                          </div>
                          
</div>







    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

   {{ Html::script('EstilosSD/dist/js/jquery.minicolors.min.js') }}

  <script type="text/javascript">
     
      $('#area').on('change',function(e){
        console.log(e);

        var cat_id = e.target.value;

        $.get('/memagrado/ajax-subcatweb?cat_id=' + cat_id, function(data){
            $('#grado').empty();
            $.each(data, function(index, subcatObj){
              $('#grado').append('<option value="" style="display:none">Seleccione Subcategoria</option>','<option value="'+subcatObj.id+'">'+subcatObj.grado_comunidad+'</option>' );
              $("#grado option[value='1']").attr("selected",true);
            });
        });
      });
   </script> 



<script type="text/javascript">
$(function(){
  var colpick = $('.demo').each( function() {
    $(this).minicolors({
      control: $(this).attr('data-control') || 'hue',
      inline: $(this).attr('data-inline') === 'true',
      letterCase: 'lowercase',
      opacity: false,
      change: function(hex, opacity) {
        if(!hex) return;
        if(opacity) hex += ', ' + opacity;
        try {
          console.log(hex);
        } catch(e) {}
        $(this).select();
      },
      theme: 'bootstrap'
    });
  });
  
  var $inlinehex = $('#inlinecolorhex h3 small');
  $('#inlinecolors').minicolors({
    inline: true,
    theme: 'bootstrap',
    change: function(hex) {
      if(!hex) return;
      $inlinehex.html(hex);
    }
  });
});
</script>


  

  @stop