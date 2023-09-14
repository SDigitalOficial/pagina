
 @if(session()->get('start') == '' or session()->get('end') == '' )
@foreach($eventos as $eventos)

@if(date('M') == date('M', strtotime($eventos->start_old)))

<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">

  <div class="media" style="height:120px">
  <a style="text-decoration:none" class="pull-left" data-toggle="modal" href="#{{$eventos->id}}">
   <p class="bg-primary" style="padding:15px; text-align:center; height:80px; width:80px;color:#fff;font-size:30px; font-weight:600">
    <span class="fechas">{{ date('M', strtotime($eventos->start_old)) }}</span>
    {{ date('d', strtotime($eventos->start_old)) }}
  </p>
  </a>
  <div class="media-body">
    <h4 class="media-heading"><b>{{$eventos->title}}</b></h4>
    <p>{{str_limit($eventos->body,60)}}</p>
  </div>
</div>

</div>
@else
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">

  <div class="media" style="height:120px">
  <a style="text-decoration:none" class="pull-left" data-toggle="modal" href="#{{$eventos->id}}">
   <p style="background:#465d46;padding:15px; text-align:center; height:80px; width:80px;color:#fff;font-size:30px; font-weight:600">
    <span class="fechas">{{ date('M', strtotime($eventos->start_old)) }}</span>
    {{ date('d', strtotime($eventos->start_old)) }}
  </p>
  </a>
  <div class="media-body">
    <h4 class="media-heading"><b>{{$eventos->title}}</b></h4>
    <p>{{str_limit($eventos->body,60)}}</p>
  </div>
</div>

</div>
@endif

<div class="modal fade" id="{{$eventos->id}}">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">{{$eventos->title}}</h4>
      </div>
      <div class="modal-body">
        <img src="{{$eventos->imagen}}" class="img-responsive" alt="{{$contenido->title}}" title="{{$contenido->title}}">
        <hr>
        <b>Descripción:</b> <br>
        <p class="text-justify">{{$eventos->body}}</p> 
        <hr>
        <b>Lugar:</b> <br>
        <p class="text-justify">{{$eventos->lugar}}</p>
        <hr>
        <b>Evento Desde:</b> {{ date('d M Y g:ia' ,strtotime($eventos->start_old)) }}<br>
        <b>Evento Hasta:</b> {{ date('d M Y g:ia' ,strtotime($eventos->end_old)) }}
        <hr>
        <b>Url información:</b> <a href="{{$eventos->url}}">Ver información del evento</a>
         <hr>
      </div>
     

       <div class="container-fluid">
 @if (Session::get('miSesionTextoaaaa') == '')           

@else
@if(DB::table('comunidad_registro')->where('usuario_id', '=', Auth::user()->id)->where('evento_id', '=', $eventos->id)->exists())
<button type="submit" class="btn btn-primary col-lg-12" disabled>Ya se encuentra registrado</button>
@else
<form action="/gestion/calendario/registroa" method="POST" role="form">


      <input type="hidden" name="usuario" class="form-control" id="" placeholder="Input field" value="{{Session::get('miSesionTextoaaaa')}}">
      <input type="hidden" name="evento" class="form-control" id="" placeholder="Input field" value="{{$eventos->id}}">
      <input type="hidden" name="redireccion" class="form-control" id="" placeholder="Input field" value="{{Request::segment(1)}}">
  
    
@if(date('M') == date('M', strtotime($eventos->start_old)))
    <button type="submit" class="btn btn-primary col-lg-12">Quiero Asistir</button>
@else

@endif
</form>
@endif
@endif

            </div>
            <br>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  
      </div>
    </div>
  </div>
</div>


@endforeach


@else
@foreach($totaleventos as $totaleventos)

@if(date('M') == date('M', strtotime($totaleventos->start_old)))

<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">

  <div class="media" style="height:120px">
  <a style="text-decoration:none" class="pull-left" data-toggle="modal" href="#{{$totaleventos->id}}">
   <p class="bg-primary" style="padding:15px; text-align:center; height:80px; width:80px;color:#fff;font-size:30px; font-weight:600">
    <span class="fechas">{{ date('M', strtotime($totaleventos->start_old)) }}</span>
    {{ date('d', strtotime($totaleventos->start_old)) }}
  </p>
  </a>
  <div class="media-body">
    <h4 class="media-heading"><b>{{$totaleventos->title}}</b></h4>
    <p>{{str_limit($totaleventos->body,60)}}</p>
  </div>
</div>

</div>
@else
@endif

<div class="modal fade" id="{{$totaleventos->id}}">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">{{$totaleventos->title}}</h4>
      </div>
      <div class="modal-body">
        <img src="{{$totaleventos->imagen}}" class="img-responsive" alt="{{$contenido->title}}" title="{{$contenido->title}}">
        <hr>
        <b>Descripción:</b> <br>
        <p class="text-justify">{{$totaleventos->body}}</p> 
        <hr>
        <b>Lugar:</b> <br>
        <p class="text-justify">{{$totaleventos->lugar}}</p>
        <hr>
        <b>Evento Desde:</b> {{ date('d M Y g:ia' ,strtotime($totaleventos->start_old)) }}<br>
        <b>Evento Hasta:</b> {{ date('d M Y g:ia' ,strtotime($totaleventos->end_old)) }}
        <hr>
        <b>Url información:</b> <a href="{{$totaleventos->url}}">Ver información del evento</a>
         <hr>
      </div>
     

       <div class="container-fluid">
            
@if(DB::table('comunidad_registro')->where('usuario_id', '=', Auth::user()->id)->where('evento_id', '=', $totaleventos->id)->exists())
<button type="submit" class="btn btn-primary col-lg-12" disabled>Ya se encuentra registrado</button>
@else
<form action="/gestion/calendario/registroa" method="POST" role="form">

  
      <input type="hidden" name="usuario" class="form-control" id="" placeholder="Input field" value="{{Session::get('miSesionTextoaaaa')}}">
      <input type="hidden" name="evento" class="form-control" id="" placeholder="Input field" value="{{$totaleventos->id}}">
      <input type="hidden" name="redireccion" class="form-control" id="" placeholder="Input field" value="{{Request::segment(1)}}">
  

    

    <button type="submit" class="btn btn-primary col-lg-12">Quiero Asistir</button>
</form>
@endif


            </div>
            <br>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  
      </div>
    </div>
  </div>
</div>


@endforeach

@endif