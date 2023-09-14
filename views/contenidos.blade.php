@extends ('adminsite.layout')


@section('ContenidoSite-01')
 {{ Html::style('//cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.css') }}


  <div class="container">
   <a href="<?=URL::to('gestion/contenidos/graficos');?>/{{$master->id}}"><button type="button" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-star"></span> Nuevo Contenido</button></a>
  </div>

  <div class="container">
   <?php $status=Session::get('status');?>

    @if($status=='ok_create')
     <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Contenido registrada con éxito</strong> SD ...
     </div>
    @endif

    @if($status=='ok_delete')
     <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Contenido Eliminado con éxito</strong> SD ...
     </div>
    @endif

    @if($status=='ok_update')
     <div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Contenido actualizado con éxito</strong> SD ...
     </div>
    @endif
  </div>


<div class="container">
  
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#contenido" aria-controls="home" role="tab" data-toggle="tab">Contenido</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Blogs</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Galería</a></li>
    <li role="presentation"><a href="#collap" aria-controls="messages" role="tab" data-toggle="tab">Collapse</a></li>
    <li role="presentation"><a href="#tab" aria-controls="messages" role="tab" data-toggle="tab">Tab</a></li>
    <li role="presentation"><a href="#shuffle" aria-controls="messages" role="tab" data-toggle="tab">Shuffle</a></li>
    @if($plan == '0' OR  $plan == 'plan-mensual-intermedio' OR $plan == 'plan-semestral-intermedio' OR $plan == 'plan-anual-intermedio' OR $plan == 'plan-mensual-avanzado' OR $plan == 'plan-semestral-intermedio' OR $plan == 'plan-anual-avanzado')
    <li role="presentation"><a href="#banner" aria-controls="messages" role="tab" data-toggle="tab">Publicidad</a></li>
    <li role="presentation"><a href="#formu" aria-controls="messages" role="tab" data-toggle="tab">Formularios</a></li>
    @else
    @endif
    <li role="presentation"><a href="#carousel" aria-controls="messages" role="tab" data-toggle="tab">Carousel</a></li>
    @if($plan == '0' OR  $plan == 'plan-mensual-intermedio' OR $plan == 'plan-semestral-intermedio' OR $plan == 'plan-anual-intermedio' OR $plan == 'plan-mensual-avanzado' OR $plan == 'plan-semestral-intermedio' OR $plan == 'plan-anual-avanzado')
    <li role="presentation"><a href="#empleos" aria-controls="messages" role="tab" data-toggle="tab">Empleos</a></li>
    @else
    @endif
   
  </ul>

</div>
  <!-- Tab panes -->
  <div class="tab-content">


    <div role="tabpanel" class="tab-pane active" id="contenido">
 <div class="container">
  <?php $name=Session::get('name');?>


    <div class="block full">
                            <div class="block-title">
                                <h2><strong>Gestión</strong> contenidos</h2>
                            </div>
                           

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Título</th>
                                            <th class="text-center">Texto</th>
                                            <th>Posición</th>
                                            <th>Tipo</th>
                                            <th>Nivel</th>
                                            <th class="text-center">Creada</th>
                                             <th class="text-center">Actualización</th>
                                              <th class="text-center">Tarea</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($contenido as $contenidos)
                                        @if($contenidos->num == '1')
                                        <tr>
                                         <td>{{ $contenidos->title }}</td>
                                         <td>{{ $contenidos->description }}</td>
                                         <td>{{ $contenidos->position}}</td>
                                         <td>{{ $contenidos->type}}</td>
                                         <td>{{ $contenidos->level}}</td>
                                         <td>{{ $contenidos->created_at }}</td>
                                         <td>{{ $contenidos->updated_at }}</td>
                                         <td class="text-center">
                                        <a href="<?=URL::to('gestion/contenidos/editar/');?>/{{ $contenidos->id }}"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar contenido" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
                                          <script language="JavaScript">
                                            function confirmar ( mensaje ) {
                                            return confirm( mensaje );}
                                          </script>
                                          <a href="<?=URL::to('gestion/contenidos/eliminar/');?>/{{$contenidos->id}}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="bottom" title="Eliminar contenido" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
                                         </td>
                                        </tr>
                                        @else()
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
 </div>
    </div>







<div role="tabpanel" class="tab-pane" id="collap">
 <div class="container">
  <?php $name=Session::get('name');?>
   <div class="block full">
    <div class="block-title">
     <h2><strong>Gestión</strong> contenidos</h2>
    </div>
                            
    <div class="table-responsive">
     <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
      <thead>
       <tr>
        <th class="text-center">Título</th>
        <th class="text-center">Texto</th>
        <th>Posición</th>
        <th>Tipo</th>
        <th>Nivel</th>
        <th class="text-center">Creada</th>
        <th class="text-center">Actualización</th>
        <th class="text-center">Tarea</th>
       </tr>
      </thead>
      
      <tbody>
      @foreach($collapses as $collapses)
       @if($collapses->num == '4')
       <tr>
        <td>{{ $collapses->title }}</td>
        <td>{{ $collapses->description }}</td>
        <td>{{ $collapses->position}}</td>
        <td>{{ $collapses->type}}</td>
        <td>{{ $collapses->level}}</td>
        <td>{{ $collapses->created_at }}</td>
        <td>{{ $collapses->updated_at }}</td>
        <td class="text-center">
          <a href="<?=URL::to('gestion/contenidos/subcollapse');?>/{{ $collapses->id }}"><span  id="tip" data-toggle="tooltip" data-placement="left" title="Crear items" class="btn btn-warning"><i class="fa fa-list-alt sidebar-nav-icon"></i></span></a>
        <a href="<?=URL::to('gestion/contenidos/editar');?>/{{ $collapses->id }}"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar contenido" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
        <script language="JavaScript">
         function confirmar ( mensaje ) {
         return confirm( mensaje );}
        </script>
        
        <a href="<?=URL::to('gestion/contenidos/eliminar/');?>/{{$collapses->id}}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="right" title="Eliminar contenido" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
        </td>
        </tr>
        @else()
        @endif
        @endforeach
      </tbody>
     </table>
    </div>
   </div>
  </div>
 </div>

 <div role="tabpanel" class="tab-pane" id="empleos">
 <div class="container">
  <?php $name=Session::get('name');?>


 <div class="block full">
                            <div class="block-title">
                                <h2><strong>Gestión</strong> contenidos</h2>
                            </div>
                            

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Título</th>
                                            <th class="text-center">Texto</th>
                                            <th>Posición</th>
                                            <th>Tipo</th>
                                            <th>Nivel</th>
                                            <th class="text-center">Creada</th>
                                             <th class="text-center">Actualización</th>
                                              <th class="text-center">Tarea</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   @foreach($tabs as $tabse)
    @if($tabse->num == '29')
                                        <tr>
                                          <td>{{ $tabse->title }}</td>
      <td>{{ $tabse->description }}</td>
      <td>{{ $tabse->position}}</td>
      <td>{{ $tabse->type}}</td>
      <td>{{ $tabse->level}}</td>
      <td>{{ $tabse->created_at }}</td>
      <td>{{ $tabse->updated_at }}</td>
                                         <td class="text-center">
                                            <a href="<?=URL::to('gestion/contenidos/subempleo');?>/{{ $tabse->id }}"><span  id="tip" data-toggle="tooltip" data-placement="left" title="Crear items" class="btn btn-warning"><i class="fa fa-list-alt sidebar-nav-icon"></i></span></a>
                                          <a href="<?=URL::to('gestion/contenidos/editar');?>/{{ $tabse->id }}"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar contenido" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>

      
      <script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );}
</script>
    <a href="<?=URL::to('gestion/contenidos/eliminar/');?>/{{$tabse->id}}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="right" title="Eliminar contenido" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
                                         </td>
                                        </tr>
                                        @else()
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

 
 </div>
    </div>



<div role="tabpanel" class="tab-pane" id="carousel">
 <div class="container">
  <?php $name=Session::get('name');?>
   <div class="block full">
    <div class="block-title">
     <h2><strong>Gestión</strong> contenidosdf</h2>
    </div>
                            
    <div class="table-responsive">
     <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
      <thead>
       <tr>
        <th class="text-center">Título</th>
        <th class="text-center">Texto</th>
        <th>Posición</th>
        <th>Tipo</th>
        <th>Nivel</th>
        <th class="text-center">Creada</th>
        <th class="text-center">Actualización</th>
        <th class="text-center">Tarea</th>
       </tr>
      </thead>
      
      <tbody>
      @foreach($carousel as $carousel)
       @if($carousel->num == 8)
       <tr>
        <td>{{ $carousel->title }}</td>
        <td>{{ $carousel->description }}</td>
        <td>{{ $carousel->position}}</td>
        <td>{{ $carousel->type}}</td>
        <td>{{ $carousel->level}}</td>
        <td>{{ $carousel->created_at }}</td>
        <td>{{ $carousel->updated_at }}</td>
        <td class="text-center">
        <a href="<?=URL::to('gestion/contenidos/imagenescarousel');?>/{{ $carousel->id }}"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar Contenido" class="btn btn-warning"><i class="fa fa-list-alt sidebar-nav-icon"></i></span></a>
        <a href="<?=URL::to('gestion/contenidos/editar');?>/{{ $carousel->id }}"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar Contenido" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
        <script language="JavaScript">
         function confirmar ( mensaje ) {
         return confirm( mensaje );}
        </script>
        
        <a href="<?=URL::to('gestion/contenidos/eliminar/');?>/{{$carousel->id}}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="bottom" title="Editar Página" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
        </td>
        </tr>
        @else()
        @endif
        @endforeach
      </tbody>
     </table>
    </div>
   </div>
  </div>
 </div>


    <div role="tabpanel" class="tab-pane" id="tab">
 <div class="container">
  <?php $name=Session::get('name');?>


 <div class="block full">
                            <div class="block-title">
                                <h2><strong>Gestión</strong> contenidos</h2>
                            </div>
                            

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Título</th>
                                            <th class="text-center">Texto</th>
                                            <th>Posición</th>
                                            <th>Tipo</th>
                                            <th>Nivel</th>
                                            <th class="text-center">Creada</th>
                                             <th class="text-center">Actualización</th>
                                              <th class="text-center">Tarea</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   @foreach($tabs as $tabs)
    @if($tabs->num == '5')
                                        <tr>
                                          <td>{{ $tabs->title }}</td>
      <td>{{ $tabs->description }}</td>
      <td>{{ $tabs->position}}</td>
      <td>{{ $tabs->type}}</td>
      <td>{{ $tabs->level}}</td>
      <td>{{ $tabs->created_at }}</td>
      <td>{{ $tabs->updated_at }}</td>
                                         <td class="text-center">
                                          <a href="<?=URL::to('gestion/contenidos/subtab');?>/{{ $tabs->id }}"><span  id="tip" data-toggle="tooltip" data-placement="left" title="Crear items" class="btn btn-warning"><i class="fa fa-list-alt sidebar-nav-icon"></i></span></a>
                                          <a href="<?=URL::to('gestion/contenidos/editar');?>/{{ $tabs->id }}"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar contenido" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>

        
      <script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );}
</script>
    <a href="<?=URL::to('gestion/contenidos/eliminar/');?>/{{$tabs->id}}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="right" title="Eliminar contenido" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
                                         </td>
                                        </tr>
                                        @else()
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

 
 </div>
    </div>






    <div role="tabpanel" class="tab-pane" id="shuffle">
  <div class="container">
  <?php $name=Session::get('name');?>



 <div class="block full">
                            <div class="block-title">
                                <h2><strong>Gestión</strong> contenidos</h2>
                            </div>
                           

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Título</th>
                                            <th class="text-center">Texto</th>
                                            <th>Posición</th>
                                            <th>Tipo</th>
                                            <th>Nivel</th>
                                            <th class="text-center">Creada</th>
                                             <th class="text-center">Actualización</th>
                                              <th class="text-center">Tarea</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($shuffle as $shuffle)
    @if($shuffle->num == '7')
                                        <tr>
                                          <td>{{ $shuffle->title }}</td>
      <td>{{ $shuffle->description }}</td>
      <td>{{ $shuffle->position}}</td>
      <td>{{ $shuffle->type}}</td>
      <td>{{ $shuffle->level}}</td>
      <td>{{ $shuffle->created_at }}</td>
      <td>{{ $shuffle->updated_at }}</td>
      <td class="text-center">
      <a href="<?=URL::to('gestion/contenidos/shuffle-menu');?>/{{ $shuffle->id }}"><span  id="tip" data-toggle="tooltip" data-placement="left" title="Ver Contenidos" class="btn btn-warning"><i class="fa fa-list-alt sidebar-nav-icon"></i></span></a>
                                          <a href="<?=URL::to('gestion/contenidos/editar');?>/{{ $shuffle->id }}"><span  id="tip" data-toggle="tooltip" data-placement="bottom" title="Editar Contenido" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
      <script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );}
</script>
    <a href="<?=URL::to('gestion/contenidos/eliminar/');?>/{{$shuffle->id}}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="right" title="Eliminar Contenido" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
                                         </td>
                                        </tr>
                                        @else()
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

 </div>
    </div>






    <div role="tabpanel" class="tab-pane" id="formu">
 <div class="container">
  <?php $name=Session::get('name');?>


 <div class="block full">
                            <div class="block-title">
                               <h2><strong>Gestión</strong> contenidos</h2>
                            </div>
                            

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Título</th>
                                            <th class="text-center">Texto</th>
                                            <th>Tipo</th>
                                            <th>Nivel</th>
                                            <th class="text-center">Creada</th>
                                             <th class="text-center">Actualización</th>
                                              <th class="text-center">Tarea</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($formula as $formula)

 @if($formula->num == '7')
                                        <tr>
                                          <td>{{ $formula->title }}</td>
      <td>{{ $formula->description }}</td>
      <td>{{ $formula->type}}</td>
      <td>{{ $formula->imageal}}</td>
      <td>{{ $formula->created_at }}</td>
      <td>{{ $formula->updated_at }}</td>
                                         <td class="text-center">
                                         <a href="<?=URL::to('gestion/contenidos/camposformulario');?>/{{ $formula->id }}"><span  id="tip" data-toggle="tooltip" data-placement="left" title="Crear items" class="btn btn-warning"><i class="fa fa-list-alt sidebar-nav-icon"></i></span></a>
                                         <a href="<?=URL::to('gestion/contenidos/editar');?>/{{ $formula->id }}"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar contenido" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
      <script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );}
</script>
    <a href="<?=URL::to('gestion/contenidos/eliminar/');?>/{{$formula->id}}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="right" title="Eliminar contenido" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
                                         </td>
                                        </tr>
                                        @else()
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>



 </div>
    </div>














    <div role="tabpanel" class="tab-pane" id="profile">
 <div class="container">
  <?php $name=Session::get('name');?>


 <div class="block full">
                            <div class="block-title">
                               <h2><strong>Gestión</strong> contenidos</h2>
                            </div>
                           

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Título</th>
                                            <th class="text-center">Texto</th>
                                            <th>Tipo</th>
                                            <th>Nivel</th>
                                            <th class="text-center">Creada</th>
                                             <th class="text-center">Actualización</th>
                                              <th class="text-center">Tarea</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($paginations as $pagination)
 @if($pagination->num == '3')
                                        <tr>
                                          <td>{{ $pagination->title }}</td>
      <td>{{ $pagination->description }}</td>
      <td>{{ $pagination->type}}</td>
      <td>{{ $pagination->imageal}}</td>
      <td>{{ $pagination->created_at }}</td>
      <td>{{ $pagination->updated_at }}</td>
                                         <td class="text-center">
                                         <a href="<?=URL::to('gestion/contenidos/editarblog');?>/{{ $pagination->id }}"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar contenido" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
      <script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );}
</script>
    <a href="<?=URL::to('gestion/contenidos/eliminarblog/');?>/{{$pagination->id}}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="bottom" title="Eliminar contenido" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
                                         </td>
                                        </tr>
                                        @else()
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>



 </div>
    </div>


    <div role="tabpanel" class="tab-pane" id="messages">
 <div class="container">

 <?php $name=Session::get('name');?>
 <div class="block full">
                            <div class="block-title">
                                <h2><strong>Gestión</strong> contenidos</h2>
                            </div>
                           

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Título</th>
                                            <th class="text-center">Texto</th>
                                            
                                            <th>Tipo</th>
                                            <th>Nivel</th>
                                            <th class="text-center">Creada</th>
                                             <th class="text-center">Actualización</th>
                                              <th class="text-center">Tarea</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   @foreach($galeria as $contenido)
    @if($contenido->num == '2')
                                        <tr>
                                          <td>{{ $contenido->title }}</td>
      <td>{{ $contenido->description }}</td>
      <td>{{ $contenido->type}}</td>
      <td>{{ $contenido->level}}</td>
      <td>{{ $contenido->created_at }}</td>
      <td>{{ $contenido->updated_at }}</td>
                                         <td class="text-center">
                                         <a href="<?=URL::to('gestion/contenidos/imagenesgaleria');?>/{{ $contenido->id }}"><span  id="tip" data-toggle="tooltip" data-placement="left" title="Crear items" class="btn btn-warning"><i class="fa fa-list-alt sidebar-nav-icon"></i></span></a>
         <a href="<?=URL::to('gestion/contenidos/editar/');?>/{{ $contenido->id }}"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar contenido" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
      <script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );}
</script>
    <a href="<?=URL::to('gestion/contenidos/eliminar/');?>/{{$contenido->id}}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="right" title="Eliminar contenido" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
                                         </td>
                                        </tr>
                                        @else()
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

 </div>
    </div>
   

    <div role="tabpanel" class="tab-pane" id="banner">
 <div class="container">
  <?php $name=Session::get('name');?>

  <div class="block full">
                            <div class="block-title">
                                <h2><strong>Gestión</strong> contenidos</h2>
                            </div>
                            

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Título</th>
                                            <th class="text-center">Texto</th>
                                            <th>Impresiones</th>
                                            <th>Clics</th>
                                            <th>Pauta</th>
                                            <th class="text-center">Creada</th>
                                            
                                              <th class="text-center">Tarea</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($banners as $banners)
                            @if($banners->num == '30')
                                        <tr>
                                          <td>{{ $contenido->title }}</td>
      <td>{{ $banners->description }}</td>
      <td>{{ $banners->imageal}}</td>
      <td>{{ $banners->content}}</td>
      <td>{{ $banners->contents }}</td>
      <td>{{ $banners->created_at }}</td>
                                         <td class="text-center">
                                         <a href="<?=URL::to('gestion/contenidos/editar/');?>/{{ $banners->id }}"><span  id="tip" data-toggle="tooltip" data-placement="left" title="Editar Contenido" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
      <script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );}
</script>
    <a href="<?=URL::to('gestion/contenidos/eliminar/');?>/{{$banners->id}}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="right" title="Eliminar contenido" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
                                         </td>
                                        </tr>
                                        @else()
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

 </div>
    </div>



  </div>





@foreach($master as $master)
@endforeach





               

   {{ HTML::script('//code.jquery.com/jquery-1.11.1.min.js') }}
   {{ HTML::script('//cdn.datatables.net/1.10.1/js/jquery.dataTables.min.js') }}
   {{ HTML::script('//cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.js') }}
 
   <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    $('#example').dataTable();} );
   </script>
      <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    $('#example1').dataTable();} );
   </script>
      <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    $('#example2').dataTable();} );
   </script>

  <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    $('#example3').dataTable();} );
   </script>

     <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    $('#example4').dataTable();} );
   </script>

        <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    $('#example5').dataTable();} );
   </script>

   <script>
    $(document).ready (function () {
    $('.delete').click (function () {
    if (confirm("¿ Está seguro de que desea eliminar ?")) {
    var id = $(this).attr ("title");
    document.location.href=' <?=URL::to('contenidos/delete/');?>/'+id;}});});
   </script>



    <script type="text/javascript">
function confirmarRegistro()
{
   if (window.confirm("Desea eliminar el registro?") == true)
      {
        var id = $(this).attr ("title");
        document window.location = "http://localhost"+id;
      }
else
   {
      alert("Cancelado será redirigido a la pagina principal");
      window.location ="http://localhost";
   }
}
</script>
   <script src="/adminsite/js/pages/tablesDatatables.js"></script>
        <script>$(function(){ TablesDatatables.init(); });</script>
@stop