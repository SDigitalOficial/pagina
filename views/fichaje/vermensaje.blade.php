
@extends ('LayoutsSD.siteavanzaint')
<style>
.shape{	
	border-style: solid; border-width: 0 70px 40px 0; float:right; height: 0px; width: 0px;
	-ms-transform:rotate(360deg); /* IE 9 */
	-o-transform: rotate(360deg);  /* Opera 10.5 */
	-webkit-transform:rotate(360deg); /* Safari and Chrome */
	transform:rotate(360deg);
}
.offer{
	background:#fff; border:1px solid #ddd; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); margin: 15px 0; overflow:hidden;
}
.offer-radius{
	border-radius:7px;
}
.offer-danger {	border-color: #d9534f; }
.offer-danger .shape{
	border-color: transparent #d9534f transparent transparent;
	border-color: rgba(255,255,255,0) #d9534f rgba(255,255,255,0) rgba(255,255,255,0);
}
.offer-success {	border-color: #5cb85c; }
.offer-success .shape{
	border-color: transparent #5cb85c transparent transparent;
	border-color: rgba(255,255,255,0) #5cb85c rgba(255,255,255,0) rgba(255,255,255,0);
}
.offer-default {	border-color: #999999; }
.offer-default .shape{
	border-color: transparent #999999 transparent transparent;
	border-color: rgba(255,255,255,0) #999999 rgba(255,255,255,0) rgba(255,255,255,0);
}
.offer-primary {	border-color: #428bca; }
.offer-primary .shape{
	border-color: transparent #428bca transparent transparent;
	border-color: rgba(255,255,255,0) #428bca rgba(255,255,255,0) rgba(255,255,255,0);
}
.offer-info {	border-color: #5bc0de; }
.offer-info .shape{
	border-color: transparent #5bc0de transparent transparent;
	border-color: rgba(255,255,255,0) #5bc0de rgba(255,255,255,0) rgba(255,255,255,0);
}
.offer-warning {	border-color: #CE1836; }
.offer-warning .shape{
	border-color: transparent #CE1836 transparent transparent;
	border-color: rgba(255,255,255,0) #CE1836 rgba(255,255,255,0) rgba(255,255,255,0);
}

.shape-text{
	color:#fff; font-size:12px; font-weight:bold; position:relative; right:-40px; top:2px; white-space: nowrap;
	-ms-transform:rotate(30deg); /* IE 9 */
	-o-transform: rotate(360deg);  /* Opera 10.5 */
	-webkit-transform:rotate(30deg); /* Safari and Chrome */
	transform:rotate(30deg);
}	
.offer-content{
	padding:70px 20px 100px;
}
</style>

 @section('ContenidoSite-01') 

  {{ Html::style('Calendario/css/calendar.css') }}
   {{ Html::style('Calendario/css/bootstrap-datetimepicker.min.css') }}
   {{ Html::style('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css') }}

<div class="col-xs-10 col-sm-10 col-md-10 col-lg-8 col-lg-offset-2">
  
   
<div class="container">
		<div class="row">
            			<div class="offer offer-radius offer-warning">
					<div class="shape">
						<div class="shape-text">
							msj							
						</div>
					</div>
					<div class="offer-content">
		<div class="row">


    <div class="col-lg-11">
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object dp img-circle" src="/siteavanza/imagenes/mensaje.png" style="width: 100px;height:100px;">
            </a>
            <div class="media-body">
                <h2 class="media-heading">Detalles de Mensaje</h2>
                <h5>Software Desarrollado por <a href="//sitedigital.com.co">Sitedigital</a></h5>
                <hr style="margin:8px auto">
                <h4>Nombre</h4>
                <small>{{$mensaje->nombre}}</small>
                <hr>
                <h4>Email</h4>
                <small>{{$mensaje->email}}</small>
                <hr>
                <h4>Empresa</h4>
                <small>{{$mensaje->sujeto}}</small>
                <hr>
                <h4>Teléfono</h4>
                <small>{{$mensaje->datos}}</small>
                <hr>
                <h4>Mensaje</h4>
                <small>{{$mensaje->mensaje}}</small>
                <hr>
     
            </div>
        </div>

    </div>

    

</div>
                     						
						 
					</div>
				</div>
			</div>
      
	</div>
	



</div>

    {{ Html::script('Calendario/jquery/jquery.min.js') }}
     {{ Html::script('Calendario/bootstrap2/js/bootstrap.min.js') }}
     {{ Html::script('Calendario/js/underscore-min.js') }}
     {{ Html::script('Calendario/js/jstz.min.js') }}
     {{ Html::script('Calendario/js/es-ES.js') }}
     {{ Html::script('Calendario/js/calendar.js') }}
     {{ Html::script('Calendario/js/apps.js') }}
     {{ Html::script('Calendario/js/moment.min.js') }}
     {{ Html::script('Calendario/js/bootstrap-datetimepicker.min.js') }}
     {{ Html::script('Calendario/js/datetime.js') }}
     {{ Html::script('Facturacion/js/validator.js') }}
     {{ Html::script('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js') }}
    @stop