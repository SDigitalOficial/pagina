{{ Html::script('//code.jquery.com/jquery-latest.min.js') }}   
@if($contenido->level == 1)



@foreach($comunidadcategnotas as $comunidadcategnotas)
@if($contenido->contents == $comunidadcategnotas->id)
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:0px">
<h4><span style="background:{{$comunidadcategnotas->color}};padding:8px 25px;color:#fff">{{$comunidadcategnotas->com_nombre}} </span> <span class="pull-right" style="text-align:right;color:#A4A4A4"><a href="/comunidad/digital/{{$comunidadcategnotas->slug}}">//Ver todo//</a></span></h4>
<hr/ style="border:1px solid {{$comunidadcategnotas->color}}" class="linearondacomunidad">
</div>

 <p>{{$comunidadcategnotas->com_descripcion}}</p>
@endif

@endforeach

 <div class="gallery gallery-responsive portfolio_slider">
 @foreach($comunidadnotas as $comunidadnotas)




 @if($contenido->contents == $comunidadnotas->nota_comunidad_id)
@if(Session::get('miSesionTextoaaac') == '')
 @if($comunidadnotas->roles == '' OR $comunidadnotas->roles == 'null')
    <div class="inner product-cat">
      @if($comunidadnotas->webtipo == 1)
      <a href="/comunidad/notaweb/{{$comunidadnotas->slugg}}">
        @else
        <a href="/comunidad/notaweb/{{$comunidadnotas->slugg}}">
        @endif
        @if($comunidadnotas->parametro_id)
         <span class="pull-right">Grado: <b>{{$comunidadnotas->parametro_id}}</b></span>
        @else
        <span class="pull-right">Contenido general</span>
        @endif
      <img src="{{$comunidadnotas->imagen}}"></a>
         @if($comunidadnotas->tipo == 1)
       <span class="grado"><i class="fas fa-video"></i></span>
       @elseif($comunidadnotas->tipo == 2)
       <span class="grado"><i class="far fa-file-alt"></i></span>
       @elseif($comunidadnotas->tipo == 3)
       <span class="grado"><i class="fas fa-volume-down"></i></span>
       @endif
       @if($comunidadnotas->area_id == NULL OR $comunidadnotas->area_id == '0')
       <p style="background:{{$comunidadnotas->color}}" class="area">{{$comunidadnotas->interes}}</p>
       @else
        <p style="background:{{$comunidadnotas->colorcom}}" class="area">{{$comunidadnotas->area}}</p>
        @endif
       <div class="thumb-content">
        <a data-toggle="tooltip" data-placement="top" title="{!!substr($comunidadnotas->descripcion, 0, 60)!!} ..." href="/comunidad/notaweb/{{$comunidadnotas->slugg}}"><h3 style="color:{{$comunidadnotas->color}}">{{$comunidadnotas->titulo}}</h3></a>                           
       </div>  
    </div>
  @else
    <div class="inner product-cat">
      <a data-toggle="modal" href='#modal-id'>
         <span class="roll" ></span>
         @if($comunidadnotas->parametro_id)
         <span class="pull-right">Grado: <b>{{$comunidadnotas->parametro_id}}</b></span>
        @else
        <span class="pull-right">Contenido general</span>
        @endif
      <img src="{{$comunidadnotas->imagen}}"></a>
      @if($comunidadnotas->tipo == 1)
       <span class="grado"><i class="fas fa-video"></i></span>
       @elseif($comunidadnotas->tipo == 2)
       <span class="grado"><i class="far fa-file-alt"></i></span>
       @elseif($comunidadnotas->tipo == 3)
       <span class="grado"><i class="fas fa-volume-down"></i></span>
       @endif
        @if($comunidadnotas->area_id == NULL OR $comunidadnotas->area_id == '0')
       <p style="background:{{$comunidadnotas->color}}" class="area">{{$comunidadnotas->interes}}</p>
       @else
        <p style="background:{{$comunidadnotas->colorcom}}" class="area">{{$comunidadnotas->area}}</p>
        @endif
       <div class="thumb-content">
        <a data-toggle="tooltip" data-placement="top" title="{!!substr($comunidadnotas->descripcion, 0, 60)!!} ..." href="/comunidad/notaweb/{{$comunidadnotas->slugg}}"><h3 style="color:{{$comunidadnotas->color}}">{{$comunidadnotas->titulo}} </h3></a>                           
       </div>  
    </div>
  @endif  
@else
 @if(in_array(Session::get('miSesionTextoaaac'), explode(',', $comunidadnotas->roles)) OR $comunidadnotas->roles == 'null')
 <div class="inner product-cat">
        @if($comunidadnotas->webtipo == 1)
      <a href="/comunidad/notaweb/{{$comunidadnotas->slugg}}">
        @else
        <a href="/comunidad/notaweb/{{$comunidadnotas->slugg}}">
        @endif
        @if($comunidadnotas->parametro_id)
         <span class="pull-right">Grado: <b>{{$comunidadnotas->parametro_id}}</b></span>
        @else
        <span class="pull-right">Contenido general</span>
        @endif
      <img src="{{$comunidadnotas->imagen}}"></a>
         @if($comunidadnotas->tipo == 1)
       <span class="grado"><i class="fas fa-video"></i></span>
       @elseif($comunidadnotas->tipo == 2)
       <span class="grado"><i class="far fa-file-alt"></i></span>
       @elseif($comunidadnotas->tipo == 3)
       <span class="grado"><i class="fas fa-volume-down"></i></span>
       @endif
        @if($comunidadnotas->area_id == NULL OR $comunidadnotas->area_id == '0')
       <p style="background:{{$comunidadnotas->color}}" class="area">{{$comunidadnotas->interes}}</p>
       @else
        <p style="background:{{$comunidadnotas->colorcom}}" class="area">{{$comunidadnotas->area}}</p>
        @endif
       <div class="thumb-content">
        <a data-toggle="tooltip" data-placement="top" title="{!!substr($comunidadnotas->descripcion, 0, 60)!!} ..." href="/comunidad/notaweb/{{$comunidadnotas->slugg}}"><h3 style="color:{{$comunidadnotas->color}}">{{$comunidadnotas->titulo}}</h3></a>                           
       </div>  
    </div>
    @else
     <div class="inner product-cat">
      <a data-toggle="modal" href='#modal-id'>
         <span class="roll" ></span>
         @if($comunidadnotas->parametro_id)
         <span class="pull-right">Grado: <b>{{$comunidadnotas->parametro_id}}</b></span>
        @else
         <span class="pull-right">Contenido general</span>
        @endif
      <img src="{{$comunidadnotas->imagen}}"></a>
         @if($comunidadnotas->tipo == 1)
       <span class="grado"><i class="fas fa-video"></i></span>
       @elseif($comunidadnotas->tipo == 2)
       <span class="grado"><i class="far fa-file-alt"></i></span>
       @elseif($comunidadnotas->tipo == 3)
       <span class="grado"><i class="fas fa-volume-down"></i></span>
       @endif
        @if($comunidadnotas->area_id == NULL OR $comunidadnotas->area_id == '')
       <p style="background:{{$comunidadnotas->color}}" class="area">{{$comunidadnotas->interes}}</p>
       @else
        <p style="background:{{$comunidadnotas->colorcom}}" class="area">{{$comunidadnotas->area}}</p>
        @endif
       <div class="thumb-content">
        <a data-toggle="tooltip" data-placement="top" title="{!!substr($comunidadnotas->descripcion, 0, 60)!!} ..." href="/comunidad/notaweb/{{$comunidadnotas->slug}}"><h3 style="color:{{$comunidadnotas->color}}">{{$comunidadnotas->titulo}} </h3></a>                           
       </div>  
    </div>
 @endif
@endif

 
 @endif
 @endforeach
  </div>
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