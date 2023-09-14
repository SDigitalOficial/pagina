
@extends ('LayoutsSD.siteavanzaint')


 @section('ContenidoSite-01') 

     {{ Html::style('//cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css') }}
  

<div class="col-xs-10 col-sm-10 col-md-10 col-lg-8 col-lg-offset-2 top">
  
  <table id="example" class="table table-striped table-bordered toptable" cellspacing="0" width="100%">
    <thead>
     <tr>
      <th>Estado</th>
      <th>Nombre</th>
      <th>Empresa</th>
      <th>Email</th>
      <th>Empresa</th>
      <th>Tareas</th>
     </tr>
    </thead>

    <tbody>
 @foreach($mensaje as $mensaje)
 {{ Form::open(array('method' => 'GET','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/avanza/leer',$mensaje->id))) }}
 
     <tr>
      @if($mensaje->cargo == 1)
      <td class="bg-success text-success">Leido</td>
      @else
      <td class="bg-danger text-danger">No Leido</td>
      @endif
      <td>{{ $mensaje->nombre }} </td>
      <td>{{ $mensaje->sujeto }}</td>
      <td>{{ $mensaje->email }}</td>
      <td>{{ $mensaje->empresa }}</td>
      <td> 
   
      <a class="btn btn-primary" href="<?=URL::to('gestion/avanza/leer');?>/{{$mensaje->id}}"><i class="fa fa-low-vision"></i></a>
      	</td>
           
</tr>

 
 {{ Form::close() }}
  @endforeach
    </tbody>
   </table>



</div>

      {{ Html::script('//code.jquery.com/jquery-1.12.4.js') }}
    {{ Html::script('//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js') }} 
    {{ Html::script('//cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js') }}


      <script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
  
  
    @stop