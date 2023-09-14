
@extends ('adminsite.layout')

    @section('cabecera')
    @parent
    {{ Html::style('EstilosSD/dist/css/jquery.minicolors.css') }}
    @stop

@section('ContenidoSite-01')

   <div class="content-header">
     <ul class="nav-horizontal text-center">
      <li>
       <a href="/gestion/comunidad"><i class="fa fa-list-ul"></i> Categorias</a>
      </li>
      <li>
       <a href="/gestion/comunidad/temas"><i class="fa fa-file-o"></i> Campos conceptuales</a>
      </li>
      <li>
       <a href="/gestion/comunidad/areas"><i class="fa fa-clipboard"></i> Áreas</a>
      </li>
      <li class="active">
       <a href="/gestion/comunidad/interes"><i class="fa fa-clipboard"></i> Temas de interés</a>
      </li>
       
       <li>
       <a href="/gestion/comunidad/roles"><i class="fa fa-user"></i> Roles comunidad</a>
      </li>
    
     </ul>
    </div> 

@foreach($area as $area)
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
                                        <h2><strong>Editar</strong> Tema De Interés</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                      {{ Form::open(array('method' => 'PUT','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/comunidad/editarinteres',Request::segment(4)))) }}
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Área</label>
                                            <div class="col-md-9">
                                               {{Form::text('area', $area->interes, array('class' => 'form-control','placeholder'=>'Ingrese titulo','required' => 'required'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Color</label>
                                            <div class="col-md-9">
                                                {{Form::text('color', $area->color, array('id' => 'hue-demo', 'class' => 'form-control demo','data-control'=>'hue'))}}
                                            </div>
                                        </div>

                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Editar</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Cancelart</button>
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