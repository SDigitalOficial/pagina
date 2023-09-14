 @if($contenido->level == 1)
 @if(session()->get('casa') == '')
<div class="row desing" style="background:{{$contenido->url}}; padding-bottom:25px ">
  <div class="container">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
     <h4> {!!$contenido->content!!}</h4>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
     <form action="/web/session/filtrodina" method="post">
              

                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                 <input class="form-control input-lg" style="width:100%;border-radius:50px" name="q" id="text" type="text" placeholder="Ingrese un término de búsqueda">
                </div>
                <input class="btn btn-lg" name="redireccion" id="text" type="hidden" value="{{Request::segment(1)}}">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                 <button style="margin-top:0px; width:100%;padding:12px" class="btn btn-info" type="submit">Suscribir</button>
                </div>
             </form>
    </div>
  </div>
</div>

@else
<div class="row desing" style="background:{{$contenido->url}}; padding-bottom:25px ">
  <div class="container">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
     <h4> {!!$contenido->content!!}</h4>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
     <form action="/web/session/filtrodina" method="post">
              
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                 <input class="form-control input-lg" style="width:100%;border-radius:50px" name="q" value="{{session()->get('casa')}}" id="text" type="text" placeholder="Ingrese un término de búsqueda">
                </div>
                 <input class="btn btn-lg" name="redireccion" id="text" type="hidden" value="{{Request::segment(1)}}" required>
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                 <button style="margin-top:0px; width:100%;padding:12px" class="btn btn-info" type="submit">Suscribir</button>
                </div>
             </form>
    </div>
  </div>
</div>
@endif
@else
@endif


