
@extends ('LayoutsSD.siteavanzaint')

    @section('cabecera')
    @parent
     {{ Html::style('//cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.css') }}
   
      <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.1/css/bootstrapValidator.min.css">
    @stop

@section('ContenidoSite-01')


 <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 topper">


  <?php $status=Session::get('status');?>
    @if($status=='ok_create')
      <div class="alert alert-success">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página registrada con exito</strong> US ...
      </div>
    @endif

    @if($status=='ok_delete')
      <div class="alert alert-danger">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página eliminada con exito</strong> US ...
      </div>
    @endif

    @if($status=='ok_update')
      <div class="alert alert-warning">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página actualizada con exito</strong> US ...
      </div>
    @endif
   


@if($conteo > 2)
Contactarnos
@else

<div class="container top">
 @include('avanza::alerts.request')
 {{ Form::open(array('files' => 'true', 'method' => 'POST','class' => 'form-horizontal','id' => 'tinyMCEForm', 'url' => array('gestion/avanza/crearficha'))) }}


  <div class="form-group">
    {{Form::label('titulo', 'Nombre de la empresa')}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::text('titulo', '', array('class' => 'form-control','placeholder'=>'Ingrese nombre de la empresa'))}}<br>
   </div>
  </div>



  <div class="form-group">
    {{Form::label('descripcion', 'Descripción SEO de la empresa')}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::text('descripcion', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción de la empresa'))}}<br>
   </div>
  </div>

 

  <div class="form-group">
    {{Form::label('contenido', 'Descripción ampliada de la empresa' )}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::textarea('contenido', '', array('placeholder'=>'Descripción ampliada de la empresa'))}}
   </div>
  </div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
<div class="form-group">
 <label class="control-label">Imagen</label>
  <div class="col-lg-12">
   <input type="file" class="form-control" name="file" />
  </div>
</div>
</div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
  <div class="form-group">
    {{Form::label('enlace', 'Url de la página' )}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::text('enlace', '', array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}<br>
   </div>
  </div>
</div>

 <div class="form-group">
 {{Form::label('nivel', 'Visualización' )}}
   <div class="col-lg-12">
    {{ Form::select('nivel', [
    '1' => 'Visible',
    '0' => 'No Visible'], null, array('class' => 'form-control')) }}
   </div>
  </div>


    <div class="col-lg-6">
      <div class="form-group">
          <label for="">Categories</label>
          <select class="form-control input-sm" name="category" id="category">
          @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->page}}</option>
          @endforeach
          </select> 
      </div>
 </div>
   <div class="col-lg-6">
      <div class="form-group">
          <label for="">Subcategory</label>
          <select class="form-control input-sm" name="subcategory" id="subcategory">
            <option value=""></option>
          </select> 
      </div>
  </div>
    
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
  <div class="form-group">
    {{Form::label('telefono', 'Telefono de su empresa')}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::text('telefono', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción de la empresa'))}}<br>
   </div>
  </div>
</div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
  <div class="form-group">
    {{Form::label('email', 'E-mail de contacto')}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::text('email', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción de la empresa'))}}<br>
   </div>
  </div>
</div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
  <div class="form-group">
    {{Form::label('ubicacion', 'Ubicacion geográfica de su empresa')}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::text('ubicacion', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción de la empresa'))}}<br>
   </div>
  </div>
</div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
  <div class="form-group">
    {{Form::label('direccion', 'Dirección de su empresa')}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::text('direccion', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción de la empresa'))}}<br>
   </div>
  </div>
</div>
     
   {{Form::hidden('imageal', '', array('class' => 'form-control'))}}   
   {{Form::hidden('tipo', 'ficha', array('class' => 'form-control'))}}
   {{Form::hidden('imageal', 'fichan', array('class' => 'form-control'))}}
   {{Form::hidden('usuario', Auth::user()->id, array('class' => 'form-control'))}}

          
   <div class="modal-footer">
    {{ Form::reset('Cancelar', array('class' => 'btn btn-default')) }}
    {{Form::submit('Crear', array('class' => 'btn btn-primary')  )}}
   </div>
 
 {{ Form::close() }}

</div>


@endif



  
  
<footer>


   {{ Html::script('EstilosSD/dist/js/jquery-1.10.2.min.js') }}   
 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
          <script src="//cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.1/js/bootstrapValidator.min.js"></script>
 {{ Html::script('siteavanza/validaciones/crearficha.js') }}  

     <script type="text/javascript">
     
      $('#category').on('change',function(e){
        console.log(e);

        var cat_id = e.target.value;

        $.get('/memo/ajax-subcat?cat_id=' + cat_id, function(data){
            $('#subcategory').empty();
            $.each(data, function(index, subcatObj){
              $('#subcategory').append('<option value="'+subcatObj.id+'">'+subcatObj.page+'</option>');
            });
        });
      });
   </script>   





</footer>

@stop

