 @if($contenido->level == 1)
<div class="row suscripcion desing">
  <div class="container">
    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 text-center">
     <h4> {!!$contenido->content!!}</h4>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
     <form action="#">
              
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                 <input class="btn btn-lg" style="width:100%;border-radius:50px" name="email" id="email" type="email" placeholder="Escriba su correo electrónico" required>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                 <button style="margin-top:5px; width:100%;padding:12px" class="btn btn-info" type="submit">Suscribir</button>
                </div>
             </form>
    </div>
  </div>
</div>
@else
@endif
