@extends ('adminsite.layout')
<!-- Define el titulo de la Página -->    
@section('titulo')
Crear Nuevo Contenido
@stop



@section('ContenidoSite-01')
<div class="container">

  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/collapse/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Collapse</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>

  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/texto/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/texto.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Texto</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/listas/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/listas.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Listas</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/thumbail/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/thumb.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Thumbnail</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>




  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/blog/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/blog.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Blog</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>

  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/jumbotron/{{Request::segment(4)}}" class="widget widget-hover-effect1" style="background: red">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Jumbotron</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/mapa/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/mapa.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Mapa</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/mailing/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Mailing</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>



  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/mediaobject/{{Request::segment(4)}}" class="widget widget-hover-effect1" style="background: red">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Media Object</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>

  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/subservicios/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/contador.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Contador</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/clientes/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/clientes.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Clientes</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/titulo/{{Request::segment(4)}}" class="widget widget-hover-effect1" style="background: red">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Título</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>


  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/shuffleweb/{{Request::segment(4)}}" class="widget widget-hover-effect1" style="background: red">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Shuffleweb</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>

  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/hover/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Hover</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/video/{{Request::segment(4)}}" class="widget widget-hover-effect1" style="background: red">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Video</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/responsive/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/video-you.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Video</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>



 <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/collapsum/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Collapsum</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>

  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/modal/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Modal</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/galeria/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/galeria.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Galeria</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/tab/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/tabs.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Tabs</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>


 <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/shuffle/{{Request::segment(4)}}" class="widget widget-hover-effect1" style="background: red">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Shuffle</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>

  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/formulario/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Formulario</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/cuenta/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/cuenta.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Cuenta</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/imagenes/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/imagen.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Imagenes</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>                            


 <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/mediamini/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Mediamini</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>

  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/galeriavideo/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Galeria Video</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/menu/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Menú</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>

@if($plan == '0' OR  $plan == 'plan-mensual-intermedio' OR $plan == 'plan-semestral-intermedio' OR $plan == 'plan-anual-intermedio' OR $plan == 'plan-mensual-avanzado' OR $plan == 'plan-semestral-intermedio' OR $plan == 'plan-anual-avanzado')
  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/baner/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/baner.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Baner</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
@else
@endif
  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/parallax/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Parallax</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>

@if($plan == '0' OR  $plan == 'plan-mensual-intermedio' OR $plan == 'plan-semestral-intermedio' OR $plan == 'plan-anual-intermedio' OR $plan == 'plan-mensual-avanzado' OR $plan == 'plan-semestral-intermedio' OR $plan == 'plan-anual-avanzado')
 <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/formulas/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Formulas</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div> 
@else
@endif
@if($plan == '0' OR  $plan == 'plan-mensual-intermedio' OR $plan == 'plan-semestral-intermedio' OR $plan == 'plan-anual-intermedio' OR $plan == 'plan-mensual-avanzado' OR $plan == 'plan-semestral-intermedio' OR $plan == 'plan-anual-avanzado')
 <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/productos/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Productos</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div> 
@else
@endif
@if($plan == '0' OR  $plan == 'plan-mensual-intermedio' OR $plan == 'plan-semestral-intermedio' OR $plan == 'plan-anual-intermedio' OR $plan == 'plan-mensual-avanzado' OR $plan == 'plan-semestral-intermedio' OR $plan == 'plan-anual-avanzado')
<div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/filtros/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Filtros</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div> 
@else
@endif
<div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/filtrosdinami/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Filtros Cm</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div> 

<div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/rondaproductos/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Ronda Pr.</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div> 

<div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/carousel/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Carousel Th.</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div> 

<div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/videoclips/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Video Clip</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div> 
<div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/backimage/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Texto Img</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div> 
<div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/rondacomunidad/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Ronda Cm</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
<div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/rondacomunidadina/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Ronda Gr</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div> 
<div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/documento/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Documento</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
<div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/vimeoback/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Viemo Vid</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div> 
<div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/eventos/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/eventos.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Eventos</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
<div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/calendario/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/calendario.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Calendario</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div> 
  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/busqueda/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Busqueda</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
  <div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/filtroevento/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Filtro evento</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
<div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/totaleventos/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Total eventos</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div>
@if($plan == '0' OR  $plan == 'plan-mensual-intermedio' OR $plan == 'plan-semestral-intermedio' OR $plan == 'plan-anual-intermedio' OR $plan == 'plan-mensual-avanzado' OR $plan == 'plan-semestral-intermedio' OR $plan == 'plan-anual-avanzado')
<div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/empleos/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Ofertas</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div> 
@else
@endif
<div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/boton/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Botón</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div> 
<div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/fichan/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Ficha Pr</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div> 

<div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/empresas/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Empresas</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div> 
<div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/ficha/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Ficha Sec.</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div> 
<div class="col-sm-6 col-lg-3">
                                <a href="/gestion/contenidos/planes/{{Request::segment(4)}}" class="widget widget-hover-effect1 themed-background">
                                    <div class="widget-simple">
                                        <img src="/adminsite/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Planes</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                </a>
                            </div> 





</div>






<footer>
{{ Html::script('Calendario/jquery/jquery.min.js') }}

    {{ Html::script('Pagina/js/Validador.js') }} 
    {{ Html::script('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js') }} 
    {{ Html::script('ckeditor/ckeditor.js') }}    
    {{ Html::script('ckfinder/ckfinder.js') }}
    {{ Html::script('EstilosSD/dist/js/jquery.minicolors.min.js') }}
<script type="text/javascript">
    CKEDITOR.replace('contenido');

</script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script type="text/javascript">
$.fn.modal.Constructor.prototype.enforceFocus = function () {
    modal_this = this
    $(document).on('focusin.modal', function (e) {
        if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length
        // add whatever conditions you need here:
        &&
        !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select') && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
            modal_this.$element.focus()
        }
    })
};
</script>

<script type="text/javascript">
$( 'textarea.editor').each( function() {

    CKEDITOR.replace( $(this).attr('id') );

});
</script>


<script type="text/javascript">
$(function(){
  var colpick = $('.demo').each( function() {
    $(this).minicolors({
      control: $(this).attr('data-control') || 'hue',
      inline: $(this).attr('data-inline') === 'true',
      letterCase: 'lowercase',
      opacity: false,
      change: function(hex, opacity) {
        if(!hex) return;
        if(opacity) hex += ', ' + opacity;
        try {
          console.log(hex);
        } catch(e) {}
        $(this).select();
      },
      theme: 'bootstrap'
    });
  });
  
  var $inlinehex = $('#inlinecolorhex h3 small');
  $('#inlinecolors').minicolors({
    inline: true,
    theme: 'bootstrap',
    change: function(hex) {
      if(!hex) return;
      $inlinehex.html(hex);
    }
  });
});
</script>
</footer>
@stop