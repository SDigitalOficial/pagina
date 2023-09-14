@extends ('LayoutsSD.Layout')
@section('ContenidoSite-01')




  
 @foreach($notas as $notasweb)
  @if(Session::get('miSesionTextoaaac') == '')
   @if($notasweb->roles == '' OR $notasweb->roles == 'null')
<div class="row" style="background: #f2f2f2; margin-bottom: 30px">
  
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">

   <h3>{{$notasweb->titulo}}</h3>
   <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
   <img src="{{$notasweb->imagen}}" class="img-responsive" style="padding:25px 25px 25px 10px" alt="Image">
   </div>
   <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
     <h3>{{$notasweb->subtema}}</h3>
     <p class="text-justify">{{$notasweb->descripcion}}</p>
    @if($notasweb->orientacion == '')
      
      @else
      <a class="btn btn-primary" href="{{$notasweb->orientacion}}" style="width:100%" download="Orientacion-{{$notasweb->slugca}}"> <i class="fa fa-download"></i> Orientación Didáctica</a>
      @endif
   </div>

</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">

 <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
  @if($notasweb->video == NULL)
   <img src="{{$notasweb->imagen}}" class="img-responsive" alt="Image">
  @else
   <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" src="{{$notasweb->video}}" allowfullscreen></iframe>
   </div>
  @endif

  <h3>{{$notasweb->titulo}}</h3>
   <div role="tabpanel">
    <ul class="nav nav-tabs" role="tablist">
     <li role="presentation" class="active">
      <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Descrpción</a>
     </li>
     <li role="presentation">
      <a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">Descargables</a>
     </li>
    </ul>

   <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
     {!!$notasweb->contenido!!}
    </div>
  <div role="tabpanel" class="tab-pane" id="tab">

    @foreach($documentos as $documentos)
    @if($documentos->visible == 1)
<div class="{{$documentos->responsive}}">
  
   <div class="media" style="background: #f2f2f2; padding: 30px 30px 15px 0px; margin-top:10px">
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
     <a class="pull-left" href="#">
      <i style="font-size: 40px; text-align: center;" class="{{$documentos->icono}}"></i>
     </a>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
     <div class="media-body">
       <h4 class="media-heading text-center">{{$documentos->titulo_des}}</h4>
       <p class="text-center">{{$documentos->descripcion_des}}</p>
     </div>
     </div>
     <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
     <a href="{{$documentos->documento}}" download="{{$documentos->slug}}"> <i style="font-size: 40px;display: inline; opacity: 0.1" class="fas fa-arrow-circle-down"></i></a>
    </div>
   </div>
</div>
@else
@endif

  
      @endforeach
    
  </div>
</div>

   </div>
</div>

  <div class="col-xs-8 col-sm-8 col-md-4 col-lg-4">
<h3 class="text-primary">Notas de interés</h3>
<br>
    @foreach($media as $media)
     @if($media->webtipo == 1)

      @if($media->roles == '' OR $media->roles == 'null')
   <div class="media">
    <div class="media-left">
      <a href="/comunidad/nota/{{$media->slugg}}"><img src="{{$media->imagen}}" class="media-object" style="width:60px"></a>
    </div>
    <div class="media-body">
      <a href="/comunidad/nota/{{$media->slugg}}"><h4 class="media-heading"><strong>{{$media->titulo}}</strong></h4></a>
      <p>{!!substr($media->descripcion, 0, 60)!!}...</p>
    </div>
  </div>
  @else

   <div class="media">
    <div class="media-left">
      <a data-toggle="modal" href='#modal-id'><img src="{{$media->imagen}}" class="media-object" style="width:60px"></a>
    </div>
    <div class="media-body">
      <a data-toggle="modal" href='#modal-id'><h4 class="media-heading"><strong>{{$media->titulo}}</strong></h4></a>
      <p>{!!substr($media->descripcion, 0, 60)!!}...</p>
    </div>
  </div>
  @endif

  @else
 
  @endif 
  @endforeach

</div>
  </div>

  @else
  <h1>No tiene Permisos para este contenido</h1>
  @endif

  @else
 @if(in_array(Session::get('miSesionTextoaaac'), explode(',', $notasweb->roles)) OR $notasweb->roles == NULL)

<div class="container-fluid">   
    <table class="table table-bordered">
     <tbody>
      <tr>
       <td>Área:</td>
       <td>Grado: </td>
      </tr>
      <tr>
       <td>Campo conceptual: </td>
       <td>Variable didáctica: </td>
      </tr>
     </tbody>
    </table>
   </div>
<div class="container-fluid">
   <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
    @if($notasweb->video == NULL)
     <img src="{{$notasweb->imagen}}" class="img-responsive" alt="Image">
    @else
     <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item" src="{{$notasweb->video}}" allowfullscreen></iframe>
   </div>
    @endif
   <h3>{{$notasweb->titulo}}</h3>
   <p>{!!$notasweb->contenido!!}</p>
   </div>




  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
<h3 class="text-primary">Notas de interés</h3>
<br>
    @foreach($media as $media)
      @if($media->webtipo == 1)
    <div class="media">
    <div class="media-left">
      <a href="/comunidad/nota/{{$media->slugg}}"><img src="{{$media->imagen}}" class="media-object" style="width:60px"></a>
    </div>
    <div class="media-body">
      <a href="/comunidad/nota/{{$media->slugg}}"><h4 class="media-heading"><strong>{{$media->titulo}}</strong></h4></a>
      <p>{!!substr($media->descripcion, 0, 60)!!}...</p>
    </div>
  </div>
  @else
   <div class="media">
    <div class="media-left">
      <a href="/comunidad/notaweb/{{$media->slugg}}"><img src="{{$media->imagen}}" class="media-object" style="width:60px"></a>
    </div>
    <div class="media-body">
      <a href="/comunidad/notaweb/{{$media->slugg}}"><h4 class="media-heading"><strong>{{$media->titulo}}</strong></h4></a>
      <p>{!!substr($media->descripcion, 0, 60)!!}...</p>
    </div>
  </div>
  @endif
  @endforeach

</div>

  </div>

 @else
 <h1>No tiene permisos</h1>
 @endif
@endif
  @endforeach

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

<div class="row" style="background: #f2f2f2; margin-bottom: 30px; padding: 40px">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">

  <h3>Evaluación</h3>
  
 @if($notasweb->orientacion == '')
     
      @else
       <a class="btn btn-primary" href="{{$notasweb->evaluacion}}" style="width:100%" download="Evaluacion-{{$notasweb->slugca}}"> <i class="fa fa-download"></i> Evaluación</a>
      @endif
</div>
</div>
</div>
</div>


<div class="modal fade" id="modal-id">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Acceso Exclusivo</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>


@stop






