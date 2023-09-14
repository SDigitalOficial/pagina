
  
@foreach($totaleventos as $totaleventos)


<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">

  <div class="media">
  <a class="pull-left" data-toggle="modal" href="#{{$totaleventos->id}}" style="text-decoration:none">
  @if(date('d-m-y') <= date('d-m-y', strtotime($totaleventos->start_old)))
   <p class="bg-primary" style="padding:15px; text-align:center; height:80px; width:80px;color:#fff;font-size:30px; font-weight:600">
    @else
    <p  style="padding:15px; text-align:center; height:80px; width:80px;color:#fff;font-size:30px;font-weight:600; background:#303030">
    @endif
    <span class="fechas">{{ date('M', strtotime($totaleventos->start_old)) }}</span>
    {{ date('d', strtotime($totaleventos->start_old)) }}
  </p>
  </a>
  <div class="media-body">
    <h4 class="media-heading"><b>{{$totaleventos->title}}</b></h4>
    <p class="text-justify">{{str_limit($totaleventos->body,60)}}</p>
  </div>
</div>

</div>
<div class="modal fade" id="{{$totaleventos->id}}">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">{{$totaleventos->title}}</h4>
      </div>
      <div class="modal-body">
        <img src="{{$totaleventos->imagen}}" class="img-responsive" title="{{$contenido->title}}" title="{{$contenido->title}}">
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
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>


@endforeach

