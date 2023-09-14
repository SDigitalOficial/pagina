
 @extends ('adminsite.layout')

    @section('cabecera')
    @parent
     {{ Html::style('//cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.css') }}
     {{ Html::style('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css') }}
    @stop


 @section('ContenidoSite-01')


<div class="container">
  
<div class="block">
                                    <!-- Normal Form Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">No Borders</a>
                                        </div>
                                        <h2><strong>Crear</strong> campo</h2>
                                    </div>
                                    <!-- END Normal Form Title -->

                                    <!-- Normal Form Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/crearinput'))) }}
                
                                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="form-group">
                                          <div class="col-md-12">
                                             <label class="control-label" for="example-email-input">Tipo</label>
                                            {{ Form::select('tipo', ['' => '-- Seleccionar --',
                                                  'text' => 'text',
                                                  'textarea' => 'textarea',
                                                  'color' => 'color',
                                                  'email' => 'email',
                                                  'emailnoti' => 'emailnoti',
                                                  'date' => 'date',
                                                  'telefono' => 'telefono',
                                                  'month' => 'month',
                                                  'number' => 'number',
                                                  'select' => 'select',
                                                  'terminos' => 'terminos',

                                                  'time' => 'time',
                                                  'week' => 'week'], null, array('class' => 'form-control')) }}
                                          </div>
                                        </div>
                                       </div>

                                       <div class="col-xs-12 col-sm-12 col-md-2 col-lg-4">
                                          <div class="form-group">
                                          <div class="col-md-12">
                                             <label class="control-label" for="example-email-input">Nombre</label>
                                           {{Form::text('nombre', '', array('class' => 'form-control','placeholder'=>'Ingrese nombre producto' ))}}
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-4">
                                          <div class="form-group">
                                          <div class="col-md-12">
                                             <label class="control-label" for="example-email-input">Responsive</label>
                                           {{Form::text('responsive', 'col-xs-12 col-sm-12 col-md-12 col-lg-12', array('class' => 'form-control','placeholder'=>'Ingrese nombre producto'))}}
                                          </div>
                                        </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="form-group">
                                          <div class="col-md-12">
                                             <label class="control-label" for="example-email-input">Tipo</label>
                                            {{ Form::select('nombreinput', ['' => '-- Seleccione --',
                                                  'campo1' => 'campo1',
                                                  'campo2' => 'campo2',
                                                  'campo3' => 'campo3',
                                                  'campo4' => 'campo4',
                                                  'campo5' => 'campo5',
                                                  'campo6' => 'campo6',
                                                  'campo7' => 'campo7',
                                                  'campo8' => 'campo8',
                                                  'campo9' => 'campo9',
                                                  'campo10' => 'campo10',
                                                  'campo11' => 'campo11',
                                                  'campo12' => 'campo12',
                                                  'campo13' => 'campo13',
                                                  'campo14' => 'campo14',
                                                  'campo15' => 'campo15',
                                                  'campo16' => 'campo16',
                                                  'campo17' => 'campo17',
                                                  'campo18' => 'campo18',
                                                  'campo19' => 'campo19',
                                                  'campo20' => 'campo20'], null, array('class' => 'form-control')) }}
                                          </div>
                                        </div>
                                       </div>

                                       <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="form-group">
                                          <div class="col-md-12">
                                             <label class="control-label" for="example-email-input">CRM</label>
                                            {{ Form::select('nombreinputcrm', ['' => '-- Seleccione --',
                                                  'nombre' => 'nombre (Campo1)',
                                                  'apellido' => 'apellido (Campo2)',
                                                  'numero' => 'numero (Campo3)',
                                                  'direccion' => 'direccion (Campo4)',
                                                  'empresa' => 'empresa (Campo5)',
                                                  'email' => 'email (Email)'
                  
                                                  ], null, array('class' => 'form-control')) }}
                                          </div>
                                        </div>
                                       </div>

                                       <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="form-group">
                                          <div class="col-md-12">
                                             <label class="control-label" for="example-email-input">Requerido</label>
                                            {{ Form::select('requerido', [
                                                  '1' => 'No requerido',
                                                  '2' => 'Requerido'], null, array('class' => 'form-control')) }}
                                          </div>
                                        </div>
                                       </div>

                                        {{Form::hidden('content_id', Request::segment(4), array('class' => 'form-control','placeholder'=>'Ingrese nombre producto'))}}


                                       </br>
                                       <br>
                                      
                                        <div class="form-group form-actions">
                                           <div class="col-lg-12">
                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Crear</button>
                                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                        </div>
                                      </div>
                                    {{Form::close()}}
                                    <!-- END Normal Form Content -->
                                </div>


</div>

<div class="container">
 <?php $status=Session::get('status');?>

   @if($status=='ok_create')
    <div class="alert alert-success">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     <strong>Input registrado con éxito</strong> SD ...
    </div>
   @endif

   @if($status=='ok_delete')
    <div class="alert alert-danger">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     <strong>Input eliminado con éxito</strong> SD ...
    </div>
   @endif

   @if($status=='ok_update')
    <div class="alert alert-warning">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     <strong>Input actualizado con éxito</strong> SD ...
    </div>
   @endif

</div> 

<div class="container">

  <div class="block full">
                            <div class="block-title">
                                <h2><strong>Campos</strong> registrados</h2>
                            </div>
                            

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Id</th>
                                            <th class="text-center">Título</th>
                                            <th class="text-center">Descripción</th>
                                            <th>Imagen</th>
                                            <th>Campo</th>
                                            <th>CampoCRM</th>
                                            <th>Estado</th>
                                            <th class="text-center">Tarea</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contenido as $contenido)
                                        <tr>
                                          <td>{{$contenido->id}}</td>
                                          <td>{{$contenido->tipo}}</td>
                                          <td>{{$contenido->nombre}}</td>
                                          <td>{{$contenido->respon}}</td>
                                          <td>{{$contenido->nombreinput}}</td>
                                          <td>{{$contenido->nombreinputcrm}}</td>
                                          @if($contenido->requerido == 1)
                                          <td>No Requerido</td>
                                          @else
                                          <td>Requerido</td>
                                          @endif


                                         <td class="text-center">
                                          @if($contenido->tipo == 'select')
                                          <a href="<?=URL::to('gestion/contenidos/selectores/');?>/{{$contenido->id}}"><span id="tup" data-toggle="tooltip" data-placement="bottom" title="Editar Página" class="btn btn-warning"><i class="fa fa-list-alt sidebar-nav-icon"></i></span></a>
                                          @else
                                          @endif

                                         <a href="<?=URL::to('gestion/contenidos/editarinput');?>/{{ $contenido->id }}"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar Contenido" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
      <script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );}
</script>
    <a href="<?=URL::to('gestion/contenidos/eliminarinput/');?>/{{$contenido->id}}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="bottom" title="Editar Página" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></span></a>
                                         </td>
                                        </tr>
                                       @endforeach 
                               
                                    </tbody>
                                </table>
                            </div>
                        </div>

</div>





 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  
<script type="text/javascript">

 
$(document).ready(function() {
    $('#defaultForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {

            tipo: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    },
                    regexp: {
                        regexp: /[a-zA-Z0-9_\. ,ñáéíóú]/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            nombre: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    },
                    stringLength: {
                        min: 1,
                        max: 20,
                        message: 'El nombre exige un minimo de 1 y un maximo de 20 caracteres.'
                    },
                    regexp: {
                        regexp: /[a-zA-Z0-9_\. ,ñáéíóú]/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },

                nombreinput: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    },
                    remote: {
                        type: 'GET',
                        url: '/gestor/validacionesinput/{{Request::segment(4)}}',
                        message: 'Este campo ya esta registrado',
                        delay: 2000
                    }
                }
            },

              nombreinputcrm: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    },
                    remote: {
                        type: 'GET',
                        url: '/gestor/validacionesinputcrm/{{Request::segment(4)}}',
                        message: 'Este campo ya esta registrado',
                        delay: 2000
                    }
                }
            },

            
             titulo: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Debe registrar un titulo para la página'
                    },
                    stringLength: {
                        min: 50,
                        max: 55,
                        message: 'El titulo exige un minimo de 50 y un maximo de 55 Caracteres'
                    },
                    regexp: {
                     regexp: /[a-zA-Z0-9_\. ,ñáéíóú]/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },


             palabras: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Debe registrar un titulo para la página'
                    },
                    stringLength: {
                        min: 1,
                        max: 150,
                        message: 'El titulo exige un minimo de 50 y un maximo de 55 Caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\. ,ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },

                  descripcion: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Debe registrar una descripción para la página'
                    },
                    stringLength: {
                        min: 155,
                        max: 160,
                        message: 'La descripción exige un minimo de 155 y un maximo de 160 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\. ,ñáéíóú]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },

            nivel: {
                validators: {
                    notEmpty: {
                        message: 'Es rol de usuario es Requerido'
                    }
                }
            },
        }
    });
  $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
});



</script>


  {{ Html::script('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js') }} 





 <script src="/adminsite/js/pages/tablesDatatables.js"></script>
        <script>$(function(){ TablesDatatables.init(); });</script>
</footer>
 @stop