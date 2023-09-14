 <link href="/vendors/time/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

              
<form action="/web/session/filtroevento" role="form" method="post">
 <div class="block-title">
  <h3 class="text-center">Filtro eventos</h3>
 </div>
 
 <div class="form-group">
  <label class="col-md-12 control-label" for="example-email-input">Fecha Inicio</label>
   <div class="col-md-12 date" id="datetimepicker7">
    @if(session()->get('start') == '')
   <input name="start" size="1" type="text" value="" placeholder="Ingrese Fecha Inicio" readonly class="form_datetime form-control">
    @else
    <input name="start" size="1" type="text" value="{{session()->get('start')}}" readonly class="form_datetime form-control">
    @endif
   </div>
 </div>
    
 <br><br><br>
 
 <div class="form-group">
  <label class="col-md-12 control-label" for="example-email-input">Fecha Finalización</label>
   <div class="col-md-12 date" id="datetimepicker9">
    @if(session()->get('end') == '')
   <input name="end" size="1" type="text" value="" placeholder="Ingrese Fecha Finalización" readonly class="form_datetime form-control">
    @else
    <input name="end" size="1" type="text" value="{{session()->get('end')}}" placeholder="Ingrese Fecha Finalización" readonly class="form_datetime form-control">
    @endif
   </div>
 </div>                                    
   
  <br><br><br>
   
  <div class="form-group">
    <label class="col-md-12 control-label" for="example-text-input">Tipo Evento</label>
     <div class="col-md-12">
      <select class="form-control"  name="tipo" id="tipo">
       @if(session()->get('tipo') == '')
        <option value="" selected disabled hidden>Seleccione Tipo Evento</option>
       @else
        <option value="{{session()->get('tipo')}}" selected disabled hidden>{{session()->get('tipo')}}</option>
       @endif
       @foreach($eventodig as $eventodig)
        <option value="{{$eventodig->tipo}}">{{$eventodig->tipo}}</option>
       @endforeach
      </select>
     </div>
  </div>
                                      
     <input type="hidden" name="redireccion" value="{{Request::segment(1)}}">
      <div class="form-group form-actions">
       <div class="col-md-12">
        <br>
        <button type="submit" class="btn btn-sm btn-primary col-md-12"> Filtrar</button><br><br>
       </div>
      </div> 

 </form>

 <form action="/web/limpiezawebevento" role="form" method="post">
  <input type="hidden" name="redireccion" value="{{Request::segment(1)}}">
   <div class="form-group form-actions">
    <div class="col-md-12">
     <button type="submit" class="btn btn-sm btn-default col-md-12"> Limpiar</button>
    </div>
   </div> 
 </form>














<script type="text/javascript" src="vendors/time/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="vendors/time/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="vendors/time/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="vendors/time/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
    


<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        format: "mm/dd/yyyy hh:ii",
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
        showMeridian: 1
    });
  $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });
  $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 1,
    minView: 0,
    maxView: 1,
    forceParse: 0
    });
</script>

</body>
</html>
