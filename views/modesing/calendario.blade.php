
     {{ Html::style('Calendarioweb/css/calendar.css') }}


 

   <div class="container">
 <div class="page-header">
  <div class="pull-right form-inline">
      <div class="btn-group">
        <button class="btn btn-warning" data-calendar-nav="prev"><< Prev</button>
        <button class="btn btn-default" data-calendar-nav="today">Hoy</button>
        <button class="btn btn-warning" data-calendar-nav="next">Next >></button>
      </div>
      <div class="btn-group">
        <button class="btn btn-warning" data-calendar-view="year">Año</button>
        <button class="btn btn-warning active" data-calendar-view="month">Mes</button>
        <button class="btn btn-warning" data-calendar-view="week">Semana</button>
        <button class="btn btn-warning" data-calendar-view="day">Dia</button>
      </div>
  </div>
 
  <h3></h3>
  <small>Calendario Digital</small>
  </div>
 

  <div id="calendar"></div>
  <br><br>
  </div>

<footer>





<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

 {{ Html::script('Calendarioweb/jquery/jquery.min.js') }}
     {{ Html::script('Calendarioweb/bootstrap2/js/bootstrap.min.js') }}

  

     {{ Html::script('Calendarioweb/js/underscore-min.js') }}
     {{ Html::script('Calendarioweb/js/jstz.min.js') }}
     {{ Html::script('Calendarioweb/js/es-ES.js') }}
     {{ Html::script('Calendarioweb/js/calendar.js') }}
     {{ Html::script('Calendarioweb/js/apps.js') }}
     {{ Html::script('Calendarioweb/js/moment.min.js') }}
     {{ Html::script('Calendarioweb/js/bootstrap-datetimepicker.min.js') }}
     {{ Html::script('Calendarioweb/js/datetime.js') }}
     {{ Html::script('Calendarioweb/js/validator.js') }}
     {{ Html::script('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js') }}


</footer>


