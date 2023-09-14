@extends ('LayoutsSD.Layout')
@section('ContenidoSite-01')




<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-lg-offset-2">
  
 @foreach($notas as $notasweb)
  @if(Session::get('miSesionTextoaaac') == '')
   @if($notasweb->roles == '' OR $notasweb->roles == 'null')


   <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
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




  <div class="col-xs-8 col-sm-8 col-md-4 col-lg-4">
<h3 class="text-primary">Notas de interés</h3>
<br>
    @foreach($media as $mediav)
     @if($mediav->webtipo == 2)
     @if($mediav->nota_comunidad_id == $notasweb->nota_comunidad_id)
      @if($mediav->roles == '' OR $mediav->roles == 'null')
   <div class="media">
    <div class="media-left">
      <a href="/comunidad/notaweb/{{$mediav->slugg}}"><img src="{{$mediav->imagen}}" class="media-object" style="width:60px"></a>
    </div>
    <div class="media-body">
      <a href="/comunidad/notaweb/{{$mediav->slugg}}"><h4 class="media-heading"><strong>{{$mediav->titulo}}</strong></h4></a>
      <p>{!!substr($mediav->descripcion, 0, 60)!!}...</p>
    </div>
  </div>
  @else

   <div class="media">
    <div class="media-left">
      <a data-toggle="modal" href='#modal-id'><img src="{{$mediav->imagen}}" class="media-object" style="width:60px"></a>
    </div>
    <div class="media-body">
      <a data-toggle="modal" href='#modal-id'><h4 class="media-heading"><strong>{{$mediav->titulo}}</strong></h4></a>
      <p>{!!substr($mediav->descripcion, 0, 60)!!}...</p>
    </div>
  </div>
  @endif
  @else
  @endif
  @else
 
  @endif 
  @endforeach


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

   <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
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
  <div class="col-xs-8 col-sm-8 col-md-4 col-lg-4">
<h3 class="text-primary">Notas de interés</h3>
<br>
    @foreach($media as $media)
    <div class="media">
    <div class="media-left">
      <img src="{{$media->imagen}}" class="media-object" style="width:60px">
    </div>
    <div class="media-body">
      <h4 class="media-heading"><strong>{{$media->titulo}}</strong></h4>
      <p>{!!substr($media->descripcion, 0, 60)!!}...</p>
    </div>
  </div>
  @endforeach


  </div>

 @else
 <h1>No tiene permisos</h1>
 @endif
@endif
  @endforeach





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



