 @extends ('adminsite.layout')
 

   @section('cabecera')
    @parent
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
    <script src="/vendors/ckeditor/ckeditor.js"></script>  

    @stop


  @section('ContenidoSite-01')

   <div class="content-header">
     <ul class="nav-horizontal text-center">
     <li class="active">
       <a href="/gestion/comunidad"><i class="fa fa-list-ul"></i> Categorias</a>
      </li>
      <li>
       <a href="/gestion/comunidad/temas"><i class="fa fa-file-o"></i> Campos conceptuales</a>
      </li>
      <li>
       <a href="/gestion/comunidad/areas"><i class="fa fa-clipboard"></i> Áreas</a>
      </li>
      <li>
       <a href="/gestion/comunidad/interes"><i class="fa fa-clipboard"></i> Temas de interés</a>
      </li>
       
       <li>
       <a href="/gestion/comunidad/roles"><i class="fa fa-user"></i> Roles comunidad</a>
      </li>
    
     </ul>
    </div>

 <div class="container">
  <?php $status=Session::get('status'); ?>
  @if($status=='ok_create')
   <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Usuario registrado con éxito</strong>
   </div>
  @endif

  @if($status=='ok_delete')
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Se ha eliminado la Nota seleccionada</strong>
   </div>
  @endif

  @if($status=='ok_update')
   <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Usuario actualizado con éxito</strong>
   </div>
  @endif

 </div>








<div class="container">
  <div class="row">
                            <div class="col-md-12">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            
                                        </div>
                                        <h2><strong>Crear</strong> Contenido</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/comunidad/crear-nota'))) }}

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', '', array('class' => 'form-control','placeholder'=>'Ingrese Nombre','required' => 'required'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Descripción</label>
                                            <div class="col-md-9">
                                                {{Form::text('descripcion', '', array('class' => 'form-control','placeholder'=>'Ingrese Descripción','required' => 'required'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Palabras clave</label>
                                            <div class="col-md-9">
                                                {{Form::text('keywords', '', array('class' => 'form-control','placeholder'=>'Ingrese Palabras clave','required' => 'required'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Contenido</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('contenido', '', array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese contenido'))}}
                                            </div>
                                        </div>

                                       <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Tipo nota</label>
                                            <div class="col-md-9">
                                                {{ Form::select('tipo', [
                                                   '1' => 'Video',
                                                   '2' => 'Articulo',
                                                   '3' => 'Audio'], null, array('class' => 'form-control','placeholder'=>'Seleccione tipo contenido')) }}
                                             </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                            <div class="col-md-9">
                                                <input type="text" name="FilePath" readonly="readonly" onclick="openKCFinder(this)" value="Click para seleccionar imagen" class="form-control" />
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Url Video</label>
                                            <div class="col-md-9">
                                                {{Form::text('video', '', array('class' => 'form-control','placeholder'=>'Ingrese url video'))}}
                                            </div>
                                        </div>

                                       
                                       

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Rol Acceso</label>
                                            <div class="col-md-9">
                                                <div id="output"></div>
                                                <select multiple="multiple" data-placeholder="Seleccione roles..." name="tagsa[]" multiple class="chosen-select form-control" id="tags">
                                                 @foreach($roles as $roles)
                                                 <option value="{{$roles->rol_comunidad}}">{{$roles->nombre}}</option>
                                                 @endforeach
                                                </select>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Tema de interés</label>
                                            <div class="col-md-9">
                                                <select name="interes" class="form-control" required>
                                                   <option value="" selected="selected" disabled>Seleccione tema de intéres</option>
                                                  @foreach($areas as $areas)
                                                 <option value="{{$areas->id}}">{{$areas->interes}}</option>
                                                  @endforeach
                                                </select>
                                            </div>
                                        </div>


                                    

                                         {{Form::hidden('area', '0', array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                          {{Form::hidden('tema', '0', array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                           {{Form::hidden('subtema', '0', array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            {{Form::hidden('parametro', '0', array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}

                                           <input type="hidden" name="webtipo" value="2"></input>
                                           <input type="hidden" name="peca" value="{{Request::segment(4)}}"></input>

                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Crear</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Cancelar</button>
                                            </div>
                                        </div>
                                    {{ Form::close() }}
                                
                                </div>
                                <!-- END Basic Form Elements Block -->
                            </div>
                          </div>
                          
</div>





    <script src="//harvesthq.github.io/chosen/chosen.jquery.js"></script>

  
    <script type="text/javascript">
document.getElementById('output').innerHTML = location.search;
$(".chosen-select").chosen();
</script>

  <script type="text/javascript">  
       CKEDITOR.replace( 'editor' );  
    </script>  


    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

<script type="text/javascript">
function openKCFinder(field) {
    window.KCFinder = {
        callBack: function(url) {
            field.value = url;
            window.KCFinder = null;
        }
    };
    window.open('/vendors/kcfinder/browse.php?type=images&dir=files/public', 'kcfinder_textbox',
        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
        'resizable=1, scrollbars=0, width=800, height=600'
    );
}
</script>

<script src="/vendors/ckeditor/config.js?t=HBDD" type="text/javascript"></script>

<script type="text/javascript">
     
      $('#tema').on('change',function(e){
        console.log(e);

        var cat_id = e.target.value;

        $.get('/memora/ajax-subcatweb?cat_id=' + cat_id, function(data){
            $('#subtema').empty();
            $.each(data, function(index, subcatObj){
              $('#subtema').append('<option value="" style="display:none">Seleccione Subtema</option>','<option value="'+subcatObj.id+'">'+subcatObj.subtema+'</option>' );

            });
        });
      });
   </script>  




  @stop