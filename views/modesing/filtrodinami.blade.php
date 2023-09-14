
  <script type="text/javascript" src="/validaciones/vendor/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-2.2.4.min.js"></script>
<!--
  <script>
   function enviar(){
   var area= document.getElementById('area').value;
   var grado= document.getElementById('grado').value;
   var campo= document.getElementById('campo').value;
   var variable= document.getElementById('variable').value;

   var dataen = 'area='+area +'&grado='+grado +'&campo='+campo +'&variable='+variable;
 
  $.ajax({
    type:'post',
    url:'/programa/sanjose',
    data:dataen,
    success:function(resp){
      $("#respa").html(resp);
    }
  });
  return false;
}
</script>

-->
 @if($contenido->level == 1)

 <div class="row" style="padding-top: 6px; margin-bottom: 25px; padding-bottom: 15px">
  

<div class="container">
<h4 class="text-center" style="padding: 10px">Filtrar Dinamizadores de Clase</h4>
 <a name="Ancla"></a>
  <div class="filtradodina">
                        
                                <div class="block">
                            


                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                 <form action="/web/session/filtrodina" method="post" onsubmit="return enviar();">
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                @if(session()->get('casa') == '')
                                 <input type="text" name="q" id="input" class="form-control" value="" placeholder="Ingrese Palabra Clave">
                                @else
                                <input type="text" name="q" id="input" class="form-control" value="{{session()->get('casa')}}">
                                @endif 
                              </div>
                                <br><br>
                                          <div class="col-xs-12 col-sm-12 col-md-2 col-lg-3">
                                             <select class="selectpicker col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control input-small" data-show-subtext="true" data-live-search="true" name="area" id="area" >
                                              @if(session()->get('areadina') == '')
                                              <option value="" selected disabled hidden>Seleccione Área</option>
                                              @else
                                              @foreach($areadina as $areadinasd)
                                              @if($areadinasd->id == session()->get('areadina'))
                                              <option value="{{$areadinasd->id}}">{{$areadinasd->area}}</option>
                                              @endif
                                              @endforeach
                                              @endif   
                                              @foreach($areadina as $areadinav)
                                              @if($areadinav->id <> session()->get('areadina'))
                                              <option value="{{$areadinav->id}}">{{$areadinav->area}} </option>
                                              @endif
                                              @endforeach                         
                                             </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                             <select class="selectpicker col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control input-small" data-show-subtext="true" data-live-search="true" name="grado" id="grado">
                                              @if(session()->get('gradodina') == '')
                                              <option value="" selected disabled hidden>Seleccione Grado </option>
                                              @else
                                              @foreach($parametrodina as $parametrodinasd)
                                              @if($parametrodinasd->id == session()->get('gradodina'))
                                              <option value="{{$parametrodinasd->id}}">{{$parametrodinasd->grado_comunidad}}</option> 
                                              @endif
                                              @endforeach
                                              @endif
                                              @foreach($parametrodina as $parametrodinasdweb)
                                              @if($parametrodinasdweb->area_id == session()->get('areadina'))
                                              @if($parametrodinasdweb->id <> session()->get('gradodina'))
                                              <option value="{{$parametrodinasdweb->id}}">{{$parametrodinasdweb->grado_comunidad}} </option>
                                              @endif
                                              @else
                                              @endif
                                              @endforeach     
                                              <!--
                                              @foreach($parametrodina as $parametrodinav)
                                              <option value="{{$parametrodinav->id}}">{{$parametrodinav->grado_comunidad}} </option>
                                              @endforeach 
                                              -->
                                                               
                                             </select>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                             <select class="selectpicker col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control input-small" data-show-subtext="true" data-live-search="true" name="campo" id="campo">
                                              @if(session()->get('campodina') == '')
                                              <option value="" selected disabled hidden>Seleccione Campo Conceptual</option>
                                              @else
                                              @foreach($temasdina as $temasdinasd)
                                              @if($temasdinasd->id == session()->get('campodina'))
                                              <option value="{{$temasdinasd->id}}">{{$temasdinasd->tema}}</option> 
                                              @endif
                                              @endforeach
                                              @endif
                                          
                                              @foreach($temasdina as $temasdinav)
                                              @if(session()->get('gradodina') == $temasdinav->grado_id)
                                              @if($temasdinav->id <> session()->get('campodina'))
                                              <option value="{{$temasdinav->id}}">{{$temasdinav->tema}} </option>
                                              @endif
                                              @else
                                              @endif
                                              @endforeach
                                            
                                                                       
                                             </select>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                             <select class="selectpicker col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control input-small" data-show-subtext="true" data-live-search="true" name="variable" id="variable">
                                              @if(session()->get('variabledina') == '')
                                              <option value="" selected disabled hidden>Seleccione Variable Didáctica</option> 
                                              @else
                                              @foreach($subtemasdina as $subtemasdinasd)
                                              @if($subtemasdinasd->id == session()->get('variabledina'))
                                              <option value="{{$subtemasdinasd->id}}">{{$subtemasdinasd->subtema}}</option> 
                                              @endif
                                              @endforeach
                                              @endif
                                              @foreach($subtemasdina as $subtemasdinav)
                                              @if($subtemasdinav->subtemaid == session()->get('campodina'))
                                              @if($subtemasdinav->id <> session()->get('variabledina'))
                                              <option value="{{$subtemasdinav->id}}">{{$subtemasdinav->subtema}} </option>
                                              @endif
                                              @else
                                              @endif
                                              @endforeach  
                                             </select>
                                            </div>
                                      
                                            <input type="hidden" name="redireccion" value="{{Request::segment(1)}}#Ancla">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                              
                                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right">
                                            
                                            <button   type="submit" class="btn btn-primary btnfiltrar pull-right">Filtrar</button>
                                            </div>
                                         </form>

                                                </div>
                                     

                                
                                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                             
                                   
                                             
                                           
                                        <form action="/web/limpiezawebdina" role="form" method="post">
                                        <input type="hidden" name="redireccion" value="{{Request::segment(1)}}#Ancla">
      
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                         
                                        <button  type="submit" class="btn btn-default btnlimpiar pull-right">Limpiar</button>
                                         </form>
                                          
                                          </div>
                                    </div>
                                </div>
                                <!-- END Basic Form Elements Block -->
                            </div>
                          </div>
                          
@else
@endif 



<script type="text/javascript">

 $("#MyButton").click(function() {

    $("#div").load(" #div> *");
  }); 
</script>

 <script type="text/javascript">
     
      $('#area').on('change',function(e){
        console.log(e);

        var cat_id = e.target.value;

        $.get('/memagrado/ajax-subcatweb?cat_id=' + cat_id, function(data){
            $('#grado').empty();
            $.each(data, function(index, subcatObj){
              $('#grado').append('<option value="" style="display:none">Seleccione Grado</option>','<option value="'+subcatObj.id+'">'+subcatObj.grado_comunidad+'</option>' );
              $("#grado option[value='1']").attr("selected",false);
            });
        });
      });
   </script>   


   <script type="text/javascript">
     
      $('#grado').on('change',function(e){
        console.log(e);

        var cat_id = e.target.value;

        $.get('/memacampo/ajax-subcatweb?cat_id=' + cat_id, function(data){
            $('#campo').empty();
            $.each(data, function(index, subcatObj){
              $('#campo').append('<option value="" style="display:none">Seleccione Campo Conceptual</option>','<option value="'+subcatObj.id+'">'+subcatObj.tema+'</option>' );
              $("#campo option[value='1']").attr("selected",true);
            });
        });
      });
   </script>   




<script type="text/javascript">
     
      $('#campo').on('change',function(e){
        console.log(e);

        var cat_id = e.target.value;

        $.get('/memora/ajax-subcatweb?cat_id=' + cat_id, function(data){
            $('#variable').empty();
            $.each(data, function(index, subcatObj){
              $('#variable').append('<option value="" style="display:none">Seleccione Variable Didáctica</option>','<option value="'+subcatObj.id+'">'+subcatObj.subtema+'</option>' );
              $("#variable option[value='1']").attr("selected",true);
            });
        });
      });
   </script>  



