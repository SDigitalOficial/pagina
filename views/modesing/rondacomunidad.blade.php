{{ Html::script('//code.jquery.com/jquery-latest.min.js') }}   
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
@if($contenido->level == 1)

@if(session()->get('areadina') == '' AND session()->get('gradodina') == '' )
@foreach($comunidadcateg as $comunidadcateg)
@if($contenido->contents == $comunidadcateg->id)
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:0px">
<h4><span style="background:{{$comunidadcateg->color}};padding:8px 25px;color:#fff">{{$comunidadcateg->com_nombre}} </span> <span class="pull-right" style="text-align:right;color:#A4A4A4"><a href="/comunidad/digital/{{$comunidadcateg->slug}}">//Ver todo//</a></span></h4>
<hr/ style="border:1px solid {{$comunidadcateg->color}}" class="linearondacomunidad">
</div>
@if($comunidadcateg->com_descripcion == '')
 <p style="color:#fff">...</p>
 @else
 {{$comunidadcateg->com_descripcion}}
 @endif
@endif

@endforeach

 <div class="gallery gallery-responsive portfolio_slider">
 @foreach($comunidad as $comunidad)

 @if($contenido->contents == $comunidad->nota_comunidad_id)
@if(Session::get('miSesionTextoaaac') == '')
 @if($comunidad->roles == '' OR $comunidad->roles == 'null')
    <div class="inner product-cat">
      @if($comunidad->webtipo == 1)
      <a href="/comunidad/nota/{{$comunidad->slugg}}">
        @else
        <a href="/comunidad/notaweb/{{$comunidad->slugg}}">
        @endif
        @if($comunidad->parametro_id)
         <span class="pull-right">Grado: <b>{{$comunidad->grado_comunidad}}</b></span>
        @else
        <span class="pull-right">Contenido general</span>
        @endif
      <img src="{{$comunidad->imagen}}"></a>
         @if($comunidad->tipo == 1)
       <span class="gradouno"><i class="fas fa-video"></i></span>
       @elseif($comunidad->tipo == 2)
       <span class="gradouno"><i class="far fa-file-alt"></i></span>
       @elseif($comunidad->tipo == 3)
       <span class="gradouno"><i class="fas fa-volume-down"></i></span>
       @endif
       @if($comunidad->area_id == NULL)
       <p style="background:{{$comunidad->color}}" class="area">{{$comunidad->interes}}</p>
       @else
        <p style="background:{{$comunidad->colorcom}}" class="area">{{$comunidad->area}}</p>
        @endif
       <div class="thumb-content">
        <a data-toggle="tooltip" data-placement="top" title="{!!substr($comunidad->descripcion, 0, 60)!!} ..." href="/comunidad/nota/{{$comunidad->slugg}}"><h3 style="color:{{$comunidad->color}}">{{$comunidad->titulo}}</h3></a>   
       </div>  
    </div>
  @else
    <div class="inner product-cat">
      <a data-toggle="modal" href='#modal-id'>
         <span class="roll" ></span>
         @if($comunidad->parametro_id)
         <span class="pull-right">Grado: <b>{{$comunidad->grado_comunidad}}</b></span>
        @else
        <span class="pull-right">Contenido general</span>
        @endif
      <img src="{{$comunidad->imagen}}"></a>
      @if($comunidad->tipo == 1)
       <span class="grado"><i class="fas fa-video"></i></span>
       @elseif($comunidad->tipo == 2)
       <span class="grado"><i class="far fa-file-alt"></i></span>
       @elseif($comunidad->tipo == 3)
       <span class="grado"><i class="fas fa-volume-down"></i></span>
       @endif
        @if($comunidad->area_id == NULL)
       <p style="background:{{$comunidad->color}}" class="area">{{$comunidad->interes}}</p>
       @else
        <p style="background:{{$comunidad->colorcom}}" class="area">{{$comunidad->area}}</p>
        @endif
       <div class="thumb-content">
        <a data-toggle="tooltip" data-placement="top" title="{!!substr($comunidad->descripcion, 0, 60)!!} ..." href="/comunidad/nota/{{$comunidad->slugg}}"><h3 style="color:{{$comunidad->color}}">{{$comunidad->titulo}} </h3></a>                           
       </div>  
    </div>
  @endif  
@else
 @if(in_array(Session::get('miSesionTextoaaac'), explode(',', $comunidad->roles)) OR $comunidad->roles == 'null')
 <div class="inner product-cat">
        @if($comunidad->webtipo == 1)
      <a href="/comunidad/nota/{{$comunidad->slugg}}">
        @else
        <a href="/comunidad/notaweb/{{$comunidad->slugg}}">
        @endif
        @if($comunidad->parametro_id)
         <span class="pull-right">Grado: <b>{{$comunidad->grado_comunidad}}</b></span>
        @else
        <span class="pull-right">Contenido general</span>
        @endif
      <img src="{{$comunidad->imagen}}"></a>
         @if($comunidad->tipo == 1)
       <span class="grado"><i class="fas fa-video"></i></span>
       @elseif($comunidad->tipo == 2)
       <span class="grado"><i class="far fa-file-alt"></i></span>
       @elseif($comunidad->tipo == 3)
       <span class="grado"><i class="fas fa-volume-down"></i></span>
       @endif
        @if($comunidad->area_id == NULL)
       <p style="background:{{$comunidad->color}}" class="area">{{$comunidad->interes}}</p>
       @else
        <p style="background:{{$comunidad->colorcom}}" class="area">{{$comunidad->area}}</p>
        @endif
       <div class="thumb-content">
        <a data-toggle="tooltip" data-placement="top" title="{!!substr($comunidad->descripcion, 0, 60)!!} ..." href="/comunidad/nota/{{$comunidad->slugg}}"><h3 style="color:{{$comunidad->color}}">{{$comunidad->titulo}}</h3></a>                           
       </div>  
    </div>
    @else
     <div class="inner product-cat">
      <a data-toggle="modal" href='#modal-id'>
         <span class="roll" ></span>
         @if($comunidad->parametro_id)
         <span class="pull-right">Grado: <b>{{$comunidad->grado_comunidad}}</b></span>
        @else
         <span class="pull-right">Contenido general</span>
        @endif
      <img src="{{$comunidad->imagen}}"></a>
         @if($comunidad->tipo == 1)
       <span class="grado"><i class="fas fa-video"></i></span>
       @elseif($comunidad->tipo == 2)
       <span class="grado"><i class="far fa-file-alt"></i></span>
       @elseif($comunidad->tipo == 3)
       <span class="grado"><i class="fas fa-volume-down"></i></span>
       @endif
        @if($comunidad->area_id == NULL)
       <p style="background:{{$comunidad->color}}" class="area">{{$comunidad->interes}}</p>
       @else
        <p style="background:{{$comunidad->colorcom}}" class="area">{{$comunidad->area}}</p>
        @endif
       <div class="thumb-content">
        <a  data-toggle="tooltip" data-placement="top" title="{!!substr($comunidad->descripcion, 0, 60)!!} ..." href="/comunidad/nota/{{$comunidad->slug}}"><h3 style="color:{{$comunidad->color}}">{{$comunidad->titulo}} </h3></a>                           
       </div>  
    </div>
 @endif
@endif

 
 @endif


 @endforeach
  </div>



@else




 @foreach($categoriascm as $categoriascmv)

 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:0px">
<h4><span style="background:{{$categoriascmv->color_tema}};padding:8px 25px;color:#fff">{{$categoriascmv->tema}} </span> <span class="pull-right" style="text-align:right;color:#A4A4A4"></span></h4>
<hr/ style="border:1px solid {{$categoriascmv->color_tema}}" class="linearondacomunidad">
</div>

 <p>{{$categoriascmv->descripciontema}} </p>


 <div class="gallery gallery-responsive portfolio_slider">
  @foreach($notascm as $notascmv)
  @if($categoriascmv->id == $notascmv->tema_id)

  <div class="inner product-cat">
      @if($notascmv->webtipo == 1)
      <a href="/comunidad/nota/{{$notascmv->slugg}}">
        @else
        <a href="/comunidad/notaweb/{{$notascmv->slugg}}">
        @endif
        @if($notascmv->parametro_id == $notascmv->id)
         <span class="pull-right">Grado: <b>{{$notascmv->grado_comunidad_id}}</b></span>
        @else
        <span class="pull-right">Contenido general</span>
        @endif
      <img src="{{$notascmv->imagen}}"></a>
         @if($notascmv->tipo == 1)
       <span class="grado"><i class="fas fa-video"></i></span>
       @elseif($notascmv->tipo == 2)
       <span class="grado"><i class="far fa-file-alt"></i></span>
       @elseif($notascmv->tipo == 3)
       <span class="grado"><i class="fas fa-volume-down"></i></span>
       @endif
       @if($notascmv->area_id == NULL)

       @else
        <p style="background:{{$notascmv->colorcom}}" class="area">{{$notascmv->area}}</p>
        @endif
       <div class="thumb-content">
        <a data-toggle="tooltip" data-placement="top" title="{!!substr($notascmv->descripcion, 0, 60)!!} ..." href="/comunidad/nota/{{$notascmv->slugg}}"><h3 style="color:{{$categoriascmv->color_tema}}">{{$notascmv->titulo}}</h3></a>   
       </div>  
    </div>


  @endif
  @endforeach
</div>
 @endforeach


@endif

@else
@endif



<div class="modal fade" id="modal-id">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Acceso Exclusivo</h4>
   </div>
   
   <div class="modal-body">
    <h2 class="text-center">Acceso exclusivo</h2>

    <p class="text-center">Esta intentado acceder a un material exclusivo de la Editorial Libros y Libros.
    Para visualizar este contenido inicie sesión con su usuario y contraseña EVA o FOCUS:</p>
    <p class="text-center">(Espacio para poner el usuario y contraseña).</p>
    <p class="text-center">En caso de no tener usuario, conéctenos (Enlace a un formulario).</p>
    <!-- 
   <div class="container">
    <div id="auth-form" class="panel panel-primary">
     <div class="panel-heading">
      <h3 class="panel-title">Auth Form</h3>
     </div>
    
     <form class="panel-body" method="post" action="/pruebas/login"> 
     <div class="input-group">
      <span class="input-group-addon">
       <span class="glyphicon glyphicon-user"></span>
      </span>
      <input type="text" id="login" name="email" class="form-control" placeholder="Login">
     </div>
     
     <div class="input-group">
      <span class="input-group-addon">
      <span class="glyphicon glyphicon-lock"></span>
      </span>
      <input type="password" id="password" name="password" class="form-control" placeholder="Password">
     </div>
     <button type="submit" class="btn btn-primary">Login</button>
    </form>

    </div>
    </div>
    -->
<div class="container-fluid">
   <div class="col-sm-12 text-center">
       <a href="/ingreso-comunidad" class="btn btn-primary">Ingreso a Nuestra Comunidad</a>
   </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>