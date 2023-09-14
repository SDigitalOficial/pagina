     <script type="text/javascript" src="/validaciones/vendor/jquery/jquery.min.js"></script>
 @if($contenido->level == 1)

<style type="text/css">
 

.range-slider {
  width: 100%;
 
  text-align: center;
  position: relative;
  .rangeValues {
    display: block;
  }
}

input[type=range] {
 -webkit-appearance: none;
    border: 1px solid white;
    width: 96%;
    position: absolute;
    left: 2%;

}

input[type=range]::-webkit-slider-runnable-track {
  width: 96%;
  height: 5px;
  background: #ddd;
  border: none;
  border-radius: 3px;

}

input[type=range]::-webkit-slider-thumb {
  -webkit-appearance: none;
  border: none;
  height: 16px;
  width: 16px;
  border-radius: 50%;
  background: #21c1ff;
  margin-top: -4px;
    cursor: pointer;
      position: relative;
    z-index: 1;
}

input[type=range]:focus {
  outline: none;
}

input[type=range]:focus::-webkit-slider-runnable-track {
  background: #ccc;
}

input[type=range]::-moz-range-track {
  width: 96%;
    left: 4%;
  height: 5px;
  background: #ddd;
  border: none;
  border-radius: 3px;
}

input[type=range]::-moz-range-thumb {
  border: none;
  height: 16px;
  width: 16px;
  border-radius: 50%;
  background: #21c1ff;
  
}


/*hide the outline behind the border*/

input[type=range]:-moz-focusring {
  outline: 1px solid white;
  outline-offset: -1px;
}

input[type=range]::-ms-track {
  width: 300px;
  height: 5px;
  /*remove bg colour from the track, we'll use ms-fill-lower and ms-fill-upper instead */
  background: transparent;
  /*leave room for the larger thumb to overflow with a transparent border */
  border-color: transparent;
  border-width: 6px 0;
  /*remove default tick marks*/
  color: transparent;
    z-index: -4;

}

input[type=range]::-ms-fill-lower {
  background: #777;
  border-radius: 10px;
}

input[type=range]::-ms-fill-upper {
  background: #ddd;
  border-radius: 10px;
}

input[type=range]::-ms-thumb {
  border: none;
  height: 16px;
  width: 16px;
  border-radius: 50%;
  background: #21c1ff;
}

input[type=range]:focus::-ms-fill-lower {
  background: #888;
}

input[type=range]:focus::-ms-fill-upper {
  background: #ccc;
}

 </style>
{{session()->get('autor')}}
  <div class="row filtrado">
                            <div class="col-md-12">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <h3 class="text-center">{{$contenido->description}}</h3>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
  
                                 <form action="/web/session/filtro" role="form" method="post">
                                 
                                      
                                   <!--
                                          <div class="form-group">
                                            <label class="col-md-12 control-label" for="example-password-input">Busqueda por palabra {{Session::get('bustext')}} </label>
                                            <div class="col-md-12">
                                              @if(session::get('bustext') == '')
                                                {{Form::text('q', '', array('class' => 'form-control','placeholder'=>'Ingresar palabra','maxlength' => '50' ))}}
                                                @else
                                                   {{Form::text('q', session::get('bustext'), array('class' => 'form-control','placeholder'=>'Ingresar palabra','maxlength' => '50' ))}}
                                                @endif
                                            </div>
                                        </div>
                                       

                                        <div class="form-group">
                                            <label class="col-md-12 control-label" for="example-password-input">Precio Desde {{session::get('min_price')}} </label>
                                            <div class="col-md-12">
                                                {{Form::text('min_price', '', array('class' => 'form-control','placeholder'=>'Ingrese min','maxlength' => '50' ))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-12 control-label" for="example-password-input">Precio Hasta {{session::get('max_pricet')}} </label>
                                            <div class="col-md-12">
                                                   {{Form::text('max_price', '', array('class' => 'form-control','placeholder'=>'Ingrese max','maxlength' => '50' ))}}
                                            </div>
                                        </div>

                                        -->
                                
                                          
                                        <?php 
                                        $subcategoriawe = Input::has('subcategoria') ?  Input::get('subcategoria'):[];
                                        $clientewe = Input::has('clientes') ?  Input::get('clientes'):[];
                                        $autorwe = Input::has('autor') ?  Input::get('autor'):[];
                                        $parametrowe = Input::has('parametro') ?  Input::get('parametro'):[];
                                        $areawe = Input::has('area') ?  Input::get('area'):[];

                                        ?>

                                     
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" for="example-text-input">Categoria</label>
                                            <div class="col-md-12">
                                             <select  class="selectpicker col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control input-small" data-show-subtext="true" data-live-search="true" name="subcategoria" id="subcategoria">
                                              @if(session()->get('subcategoria') == '')
                                              <option value="" selected disabled hidden>Seleccione Categoria</option>
                                              @else
                                              @foreach($subcategoria as $subcategoriasd)
                                              @if($subcategoriasd->id == session()->get('subcategoria'))
                                              <option value="{{$subcategoriasd->id}}">{{$subcategoriasd->nombre}}</option>
                                              @endif
                                              @endforeach
                                              @endif
                                              @foreach($subcategoria as $subcategoria)
                                              @if($subcategoria->id <> session()->get('subcategoria'))
                                              <option value="{{$subcategoria->id}}">{{$subcategoria->nombre}} </option>
                                              @endif
                                              @endforeach                                            
                                              </select>
                                            </div>
                                        </div>
                                  
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" for="example-text-input">Subcategoria</label>
                                            <div class="col-md-12">
                                             <select class="selectpicker col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control input-small" data-show-subtext="true" data-live-search="true" name="clientes" id="clientes">
                                              @if(session()->get('clientes') == '')
                                              <option value="" selected disabled hidden>Seleccione Subcategoria</option>
                                              @else
                                              @foreach($filtros as $filtrossd)
                                              @if($filtrossd->id == session()->get('clientes'))
                                               <option value="{{$filtrossd->id}}" >{{$filtrossd->name}}</option>
                                               @endif
                                              @endforeach
                                              @endif
                                              @foreach($filtros as $filtros)
                                            
                                              <option value="{{$filtros->id}}">{{$filtros->name}} </option>
                                        
                                              @endforeach                                            
                                              </select>
                                            </div>
                                          </div>
                                        
                                    

                                      <!-- 
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" for="example-text-input">Autor</label>
                                            <div class="col-md-12">
                                             <select class="selectpicker col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control input-small" data-show-subtext="true" data-live-search="true" name="autor">
                                              @if(session()->get('autor') == '')
                                              <option value="" selected disabled hidden>Seleccione Autor</option>
                                              @else
                                              @foreach($autor as $autorsd)
                                              @if($autorsd->id == session()->get('autor'))
                                               <option value="{{$autorsd->id}}">{{$autorsd->nombre}}</option>
                                               @endif
                                              @endforeach
                                              @endif
                                              @foreach($autor as $autor) 
                                              @if($autor->id <> session()->get('autor'))
                                              <option value="{{$autor->id}}">{{$autor->nombre}}</option>
                                              @endif
                                              @endforeach                                            
                                              </select>
                                            </div>
                                        </div>
                                        -->

                                         <div class="form-group">
                                            <label class="col-md-12 control-label" for="example-text-input">Tamaño</label>
                                            <div class="col-md-12">
                                             <select class="selectpicker col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control input-small" data-show-subtext="true" data-live-search="true" name="parametro">
                                              @if(session()->get('parametro') == '')
                                              <option value="" selected disabled hidden>Seleccione Tamaño</option>
                                              @else
                                              @foreach($parametro as $parametrosd)
                                              @if($parametrosd->id == session()->get('parametro'))
                                               <option value="{{$parametrosd->id}}">{{$parametrosd->parametro}}</option>
                                               @endif
                                              @endforeach
                                              @endif
                                              @foreach($parametro as $parametro)
                                              @if($parametro->id <> session()->get('parametro'))
                                              <option value="{{$parametro->id}}">{{$parametro->parametro}}</option>
                                              @endif
                                              @endforeach                                            
                                              </select>
                                            </div>
                                        </div>
                                      <!--
                                          <div class="form-group">
                                            <label class="col-md-12 control-label" for="example-text-input">Área</label>
                                            <div class="col-md-12">
                                             <select class="selectpicker col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control input-small" data-show-subtext="true" data-live-search="true" name="area">
                                              @if(session()->get('area') == '')
                                              <option value="" selected disabled hidden>Seleccione Area</option>
                                              @else
                                              @foreach($area as $areasd)
                                              @if($areasd->id == session()->get('area'))
                                               <option value="{{$areasd->id}}" >{{$areasd->areaweb}}</option>
                                               @endif
                                              @endforeach
                                              @endif
                                              @foreach($area as $area)
                                              @if($area->id <> session()->get('area'))
                                              <option value="{{$area->id}}">{{$area->areaweb}}</option>
                                              @endif
                                              @endforeach                                            
                                              </select>
                                            </div>
                                        </div>
                                        -->
 <span style="color:white">></span> 
                                        <div class="form-group">
                                         
                                            <label class="col-md-12 control-label" for="example-text-input">Precio</label>
                         

                                   
                                          <div class="range-slider" style="margin-top: 0px">
                                         <span style="margin-left: 18px;" class="rangeValues"></span>
  <input name="min_price" value="{{session::get('min_price')}}" min="1000" max="150000" step="500" type="range">
                                         
  <input name="max_price" min="1000" max="150000" step="500" type="range" value="{{session::get('max_price')}}">
                                    
                                      </div>
                                    </div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="form-group form-actions">
                                            <div class="col-md-12">
                                              <br>
                                                <button type="submit" class="btn btn-sm btn-primary col-md-12"> Filtrar</button><br><br>
                                                <a href="/web/limpiezaweb" class="btn btn-sm btn-default col-md-12">Limpiar</a>
                                            </div>
                                        </div>
                                         </form>
                                
                                </div>
                                <!-- END Basic Form Elements Block -->
                            </div>
                          </div>



                                            
@else
@endif

<script type="text/javascript">
     
      $('#subcategoria').on('change',function(e){
        console.log(e);

        var cat_id = e.target.value;

        $.get('/memaproducts/ajax-subcatweb?cat_id=' + cat_id, function(data){
            $('#clientes').empty();
            $.each(data, function(index, subcatObj){
              $('#clientes').append('<option value="" style="display:none">Seleccione Subcategoria</option>','<option value="'+subcatObj.id+'">'+subcatObj.name+'</option>' );
              $("#clientes option[value='1']").attr("selected",true);
            });
        });
      });
   </script>  

   <script type="text/javascript">
     function getVals(){
  // Get slider values
  let parent = this.parentNode;
  let slides = parent.getElementsByTagName("input");
    let slide1 = parseFloat( slides[0].value );
    let slide2 = parseFloat( slides[1].value );
  // Neither slider will clip the other, so make sure we determine which is larger
  if( slide1 > slide2 ){ let tmp = slide2; slide2 = slide1; slide1 = tmp; }
  
  let displayElement = parent.getElementsByClassName("rangeValues")[0];
      displayElement.innerHTML = "$" + slide1 + " - $" + slide2;
}

window.onload = function(){
  // Initialize Sliders
  let sliderSections = document.getElementsByClassName("range-slider");
      for( let x = 0; x < sliderSections.length; x++ ){
        let sliders = sliderSections[x].getElementsByTagName("input");
        for( let y = 0; y < sliders.length; y++ ){
          if( sliders[y].type ==="range" ){
            sliders[y].oninput = getVals;
            // Manually trigger event first time to display values
            sliders[y].oninput();
          }
        }
      }
}
   </script> 










