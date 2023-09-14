

@extends ('LayoutsSD.Layout')
@section('ContenidoSite-01')


<style type="text/css">

.card {
   
    

    box-shadow:0 20px 50px rgba(0,0,0,.1);
    border-radius:10px;
    transition:0.5;
    padding: 20px;
    border: 1px solid #f2f2f2;
    margin-bottom: 40px

}
.card:hover {
    box-shadow:0 30px 70px rgba(0,0,0,.2);
}
.card .box {

    top:50%;
    left:0;
    transform:translateY(-50%);
    text-align:center;
    padding:20px;
    box-sizing:border-box;
    width:100%;
}
.card .box .img {
    width:120px;
    height:120px;
    margin:0 auto;
    border-radius:50%;
    overflow:hidden;
}

</style>

 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4 col-lg-offset-4">
  <?php $status=Session::get('status'); ?>
  @if($status=='ok_create')
   <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Se ha registrado satisfactoriamente a nuestro evento</strong>
   </div>
  @endif

  @if($status=='ok_delete')
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Se ha eliminado la Nota seleccionada</strong>
   </div>
  @endif

  @if($status=='ok_update')
   <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Usuario actualizado con éxito</strong>
   </div>
  @endif

 </div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-4 col-lg-offset-4 card">
    @foreach($calendario as $calendario)
    <img src="{{$calendario->imagen}}" class="img-responsive" alt="Image">
    <hr>
    <h3>{{$calendario->title}}</h3>
    <p class="text-justify">{{$calendario->body}}</p>
    <hr>
    <b>Lugar:</b> 
    <hr>
    <b>Fecha Desde:</b> {{$calendario->start_old}}<br>
    <b>Fecha Hasta:</b> {{$calendario->end_old}}
    <hr>
    Url información: <a href="{{$calendario->url}}">Ver información del evento</a>
    <hr>
    <div class="form-group">
            
@if(DB::table('comunidad_registro')->where('usuario_id', '=', Auth::user()->id)->where('evento_id', '=', $calendario->id)->exists())
<button type="submit" class="btn btn-primary col-lg-12" disabled>Ya se encuentra registrado</button>
@else
<form action="/gestion/calendario/registro" method="POST" role="form">

     @if(Auth::check())
      <input type="hidden" name="usuario" class="form-control" id="" placeholder="Input field" value="{{Auth::user()->id}}">
      <input type="hidden" name="evento" class="form-control" id="" placeholder="Input field" value="{{$calendario->id}}">
      <input type="hidden" name="redireccion" class="form-control" id="" placeholder="Input field" value="{{Request::segment(3)}}">
     @else
     @endif

    

    <button type="submit" class="btn btn-primary col-lg-12">Quiero Asistir</button>
</form>
@endif


            </div>
    @endforeach

</div>


@stop
