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
                                        <h2><strong>Crear</strong> Contenidos</h2>
                                    </div>
                                    <!-- END Normal Form Title -->

                                    <!-- Normal Form Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizarselector',$contenido->id))) }}
                
                       
                                       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                          <div class="col-md-12">
                                             <label class="control-label" for="example-email-input">Nombre</label>
                                           {{Form::text('nombre', $contenido->nombre, array('class' => 'form-control','placeholder'=>'Ingrese nombre producto' ))}}
                                          </div>
                                        </div>
                                      </div>

                                      

                                    
                                    
                                        {{Form::hidden('input_id', $contenido->input_id, array('class' => 'form-control','placeholder'=>'Ingrese nombre producto'))}}


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