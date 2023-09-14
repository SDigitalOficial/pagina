
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
                                        <h2><strong>Crear</strong> Producto</h2>
                                    </div>
                                    <!-- END Normal Form Title -->
@foreach($contenido as $contenidos)
                                    <!-- Normal Form Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/gestion/contenidos/actualizarinput',$contenidos->id))) }}
                
                                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="form-group">
                                          <div class="col-md-12">
                                             <label class="control-label" for="example-email-input">Tipo</label>
                                            {{ Form::select('tipo', [$contenidos->tipo => $contenidos->tipo,
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
                                                  'time' => 'time',
                                                  'week' => 'week'], null, array('class' => 'form-control')) }}
                                          </div>
                                        </div>
                                       </div>

                                       <div class="col-xs-12 col-sm-12 col-md-2 col-lg-4">
                                          <div class="form-group">
                                          <div class="col-md-12">
                                             <label class="control-label" for="example-email-input">Nombre</label>
                                           {{Form::text('nombre',  $contenidos->nombre, array('class' => 'form-control','placeholder'=>'Ingrese nombre producto' ))}}
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-4">
                                          <div class="form-group">
                                          <div class="col-md-12">
                                             <label class="control-label" for="example-email-input">Responsive</label>
                                           {{Form::text('responsive', $contenidos->respon, array('class' => 'form-control','placeholder'=>'Ingrese nombre producto'))}}
                                          </div>
                                        </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="form-group">
                                          <div class="col-md-12">
                                             <label class="control-label" for="example-email-input">Tipo</label>
                                            {{ Form::select('nombreinput', [$contenidos->nombreinput => $contenidos->nombreinput,
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
                                            {{ Form::select('nombreinputcrm', [$contenidos->nombreinputcrm => $contenidos->nombreinputcrm,
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
                                            {{ Form::select('requerido', [$contenidos->requerido => $contenidos->requerido,
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
                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Editar</button>
                                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                        </div>
                                      </div>
                                    {{Form::close()}}
                                    <!-- END Normal Form Content -->
                                    @endforeach
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

<script src="//cdn.ckeditor.com/4.6.0/full/ckeditor.js"></script>
   {{ Html::script('ckfinder/ckfinder.js') }}   

   <script language="javascript" type="text/javascript">
   CKEDITOR.replace('editor',{
      filebrowserBrowseUrl: '/browser/browse.php',
      filebrowserImageBrowseUrl: '/browser/browse.php?type=Images',
      filebrowserUploadUrl: '/uploader/upload.php',
      filebrowserImageUploadUrl: '/uploader/upload.php?type=Images',
      filebrowserWindowWidth: '900',
      filebrowserWindowHeight: '400',
      filebrowserBrowseUrl: '../../../ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: '../../../ckfinder/ckfinder.html?Type=Images',
      filebrowserFlashBrowseUrl: '../../../ckfinder/ckfinder.html?Type=Flash',
      filebrowserUploadUrl: '../../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: '../../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl: '../../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
    </script>



 <script src="/adminsite/js/pages/tablesDatatables.js"></script>
        <script>$(function(){ TablesDatatables.init(); });</script>
</footer>
 @stop