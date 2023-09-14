<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>jQuery - agregar y eliminar filas en una tabla</title>
        <script language="javascript" type="text/javascript" src="../jquery-1.3.2.min.js"></script>
        <script language="javascript" type="text/javascript" src="../jquery.validate.1.5.2.js"></script>
        <script language="javascript" type="text/javascript" src=".//script.js"></script>
        <link href="../estilo.css" rel="stylesheet" type="text/css" />

<script language="javascript" src="jquery-1.2.6.min.js"></script>
<script type="text/javascript">
            $(document).ready (function () {
                $('.boton').click ( function () {
                    if (confirm("¿ Está seguro de que desea eliminar ?")) {
                    var id = $(this).attr ("title");
                    $('#recargado').load('eliminar/'+id, function() {
  location.reload(true);
});
                    }


                });

            });
        </script>

        <script type="text/javascript">
            $(document).ready (function () {
                $('#agregar').click ( function () {
                    if (confirm("¿ Está seguro de que desea eliminar ?")) {
                    
                    $('#recargado').load('eliminar/', function() {
  location.reload(true);
});
                    }


                });

            });
        </script>

        <script type="text/javascript">
            $(document).ready (function () {
                $('.voto').click ( function () {
                    if (confirm("¿ Está seguro de que desea eliminar ?")) {
                    var id = $(this).attr ("title");
                    $('#recargado').load('sabroso/'+id);
                    }


                });

            });
        </script>

<script type="text/javascript">
$('.vot').click ( function () {
$('defaultForm1').submit(function(event){
    var id = $(this).attr ("title");
    $.post('sabroso/'+id)
        .success(function(result){
            $('#cartdialog').html(result);
        })}
        .error(function(){
            console.log('Error loading page');
        })
    return false;
});
</script>




<script type="text/javascript">
$(document).ready (function() {
        $("input:checkbox").change(
            function() {
                if( $(this).is(":checked") )
                {
                    $("#defaultForm1").submit(),function(){
                     var id = $(this).attr ("title");
                    $('#recargado').load('sabroso/'+id);
                } 
                }
            }
        )
    }
);
</script




<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('input[type=checkbox]').live('click', function(){
        var parent = $(this).parent().attr('id');
        $('#'+parent+' input[type=checkbox]').removeAttr('checked');
        $(this).attr('checked', 'checked');
    });
});
</script>




    </head>
    
    <body>
        <div id="contenedor">
    
    
            <h1>jQuery - agregar y eliminar filas en una tabla</h1>
             {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('contenidos/mas'))) }}
                <table class="formulario"><br />
                    <thead>
                        <tr>
                            <th colspan="2"><img src="add.png" /> Agregando fila a tabla</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        <tr>
                            <td>Nombre</td>
                            <td><input name="name" type="text" id="valor_uno" size="40" class="required" /></td>
                        </tr>
                        <tr>
                            <td>Apellido</td>
                            <td><input name="last_name" type="text" id="valor_dos" size="40" class="required" /></td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td><input name="barname" type="text" id="valor_tres" size="30" class="required email" /></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"><input name="agregar" type="submit" id="agregar" value="Agregar" /></td>
                        </tr>
                    </tfoot>
                </table>

            {{ Form::close() }}
            <table id="grilla" class="lista">
              <thead>
                    <tr>
                        <th>Ide</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>E-mail</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($contenido as $contenido)
                   {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm1', 'url' => array('contenidos/sabroso',$contenido->id))) }}
                    <tr id="recargado">
                        <td>{{ $contenido->id }}</td>
                        <td><input name="titulo" type="text" id="valor_tres" size="30" class="required email" value="{{ $contenido->nombre }}" /></td>
                        <td>Chiguay</td>
                        <td>hector2c@live.com</td>
                        <td><div id="product1">
                        <input type="checkbox" value="1" id="product-1-1" name="check" class="vot" title="{{$contenido->id}}" /> Atributo 1<br/>
                            <button type="submit" class="btn btn-primary">Submit</button>
 
</div></td>
                        <td>
                            {{ HTML::link('#', 'Borrar', array('class'=>'boton', 'title' => $contenido->id)) }}
                        </td>
                    </tr>
                    {{ Form::close() }}
                   @endforeach
                </tbody>
                <tfoot>
                  <tr>
                      <td colspan="5"><strong>Cantidad:</strong> <span id="span_cantidad">4</span> usuarios.</td>
                    </tr>
                </tfoot>
            </table>
            <hr />
            <p class="autor">Mas información en: <a href="http://hector2c.wordpress.com">http://hector2c.wordpress.com</a></p>
        </div>







    </body>
</html>