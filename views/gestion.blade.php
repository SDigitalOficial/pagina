@extends ('LayoutsSD.Layout')

 @section('cabecera')
   
   @foreach($gestion as $gestions)
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{$gestions->descripcion_car}}">
    <meta name="keywords" content="">
    <meta name="tile" content="{{$gestions->titulo_car}}">
    <meta name="author" content="Site Digital">
    <meta http-equiv="Cache-control" content="public">
    <title>{{$gestions->titulo_car}}</title>
   @endforeach

    @foreach($seo as $seo)
    <link rel="canonical" href="{{$seo->canonical}}{{Request::getRequestUri()}}"/>
    <meta property="og:locale" content="{{$seo->idioma}}">
    <meta property="og:type" content="{{$seo->og_type}}">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:url" content="{{$seo->og_url}}">
    <meta property="og:site_name" content="{{$seo->og_name}}">
    <meta property="og:image" content="{{$seo->canonical}}/{{$seo->og_image}}">
    <meta name="twitter:card" content="{{$seo->twitter_card}}"/>
    <meta name="twitter:site" content="{{$seo->twitter_site}}" />
    <meta name="twitter:creator" content="{{$seo->twitter_creator}}" />
    <meta name="twitter:title" content="{{$seo->twitter_title}}" />
    <meta name="twitter:description" content="{{$seo->twitter_description}}" />
    <meta name="twitter:image" content="{{$seo->twitter_image}}" />
    <link rel="shortcut icon" href="{{$seo->ico}}" type="image/icon">
    <link rel="apple-touch-icon" href="{{$seo->icoapple}}" />
    @endforeach
 
  @stop

@section('ContenidoSite-01')
<style>
  .card-header{
    background: none
  }
</style>

<div class="container">
<div class="row">
 

@foreach($gestion as $gestion)
 <div class="col-xs-8 col-sm-8 col-md-7 col-lg-7 mt-5">
  <img src="{!!$gestion->imagen_car!!}" class="center-block img-fluid" alt="Image">
  <p class="text-justify mr-5 pr-5 ml-5 pl-6">{!!$gestion->descripcion_car!!}</p>
 </div>
@endforeach


<div class="col-xs-4 col-sm-4 col-md-5 col-lg-5 mt-5 mb-5">
 <div id="accordion">
  @foreach($collapse as $collapsed)
   @foreach($identificador as $identificadorsa)
    @if($collapsed->page_id == $identificadorsa->page_id)
  <div class="card">
    <div class="card-header" id="headingOne">
      <h6 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#{{$collapsed->slugcon}}" aria-expanded="true" aria-controls="collapseOne">
        <span style="font-size: 15px; color: #FF5E15"> {{$collapsed->description}}</span>
        </button>
      </h6>
    </div>
    
     @foreach($identificador as $identificadors)
     @if($collapsed->id == $identificadors->content_id)
    <div id="{{$collapsed->slugcon}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      @else
      <div id="{{$collapsed->slugcon}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      @endif
      @endforeach
      <div class="card-body">
        
         @foreach($gestioncarta as $gestioncars)
           @if($collapsed->id == $gestioncars->content_id)
            <div class="media">
             
             <div class="col-xs-3 col-sm-3 col-md-3 col-lg-4">
              <a class="pull-left" href="/gestiones/{{$gestioncars->slug_car}}">
               <img class="media-object" src="{{$gestioncars->imagen_car}}" style="width:100%" alt="Image">
              </a>
             </div>
            
             <div class="media-body">
              <h6 class="media-heading"><b>{{$gestioncars->titulo_car}}</b></h6>
              <p>{!!substr($gestioncars->descripcionweb_car, 0, 110)!!} ...</p>
             </div>
      
            </div>
            @else
           @endif
          @endforeach

      </div>
    </div>
  </div>
  @else
  @endif
  @endforeach
  @endforeach
</div>
 </div>


</div></div>


@stop