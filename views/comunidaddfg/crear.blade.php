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


{{ Form::select('grado_eva', $data, $retorno[0]->area_eva) }}
{{ Form::select('grado_eva', $grado, $retorno[0]->grado_eva) }}






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
<hr>
 <h4>Información eva</h4>
 {{session::get('grado_eva')}}
{{session::get('area_eva')}}
{{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/session/eva/web'))) }}
 <div class="form-group">
  <label class="col-md-3 control-label" for="example-select">Grado Eva</label>
   @if(session::get('grado_eva') == '')
   <div class="col-md-9">
    {{ Form::select('grado_eva', $grado, null, array('onchange' => 'this.form.submit()','class' => 'form-control','id' => 'grado_eva','placeholder'=>'Seleccione Grado')) }}
   </div>
   @else
   <div class="col-md-9">
       {{ Form::select('grado_eva',$grado,session::get('grado_eva') ,array('onchange' => 'this.form.submit()','class' => 'form-control','id' => 'grado_eva')) }}
   </div>
   @endif
 </div>





 <div class="form-group">
  <label class="col-md-3 control-label" for="example-select">Área Eva</label>
   @if(session::get('area_eva') == '')
   <div class="col-md-9">
    {{ Form::select('area_eva', $data, null, array('onchange' => 'this.form.submit()','class' => 'form-control','id' => 'saber_eva','placeholder'=>'Seleccione Área')) }}
   </div>
   @else
   <div class="col-md-9">
       {{ Form::select('area_eva',$data,session::get('area_eva') ,array('onchange' => 'this.form.submit()','class' => 'form-control','id' => 'area_eva')) }}
   </div>
   @endif
 </div>


 <input type="hidden" name="redireccion" id="input" class="form-control" value="{{Request::path()}}" required="required" pattern="" title="">
  {{ Form::close() }}





                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/comunidad/crear-nota'))) }}

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Saber Eva</label>
                                            <div class="col-md-9">
                                              <div id="output"></div>
                                             


                            {{ Form::select('saber_eva[]', $saber, null, array('class' => 'chosen-select form-control','multiple'=>'multiple','id' => 'tags')) }}
                                             </div>
                                        </div>


 <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Recursos Eva</label>
                                            <div class="col-md-9">
                                              <div id="output"></div>
                                             


                            {{ Form::select('recursos_eva[]', $recursos, null, array('class' => 'chosen-select form-control','multiple'=>'multiple','id' => 'tags')) }}
                                             </div>
                                        </div>


                                            <hr>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', '', array('class' => 'form-control','placeholder'=>'Ingrese Nombre','required' => 'required'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Propósito</label>
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
                                            <label class="col-md-3 control-label" for="example-text-input">Campos conceptuales</label>
                                            <div class="col-md-9">
                                                <select name="tema" class="form-control" id="tema" required>
                                                   <option value="" selected="selected" disabled>Seleccione tema</option>
                                                  @foreach($temas as $temas)
                                                 <option value="{{$temas->id}}">{{$temas->tema}}</option>
                                                  @endforeach
                                                </select>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Variables didácticas</label>
                                            <div class="col-md-9">
                                                <select name="subtema" id="subtema" class="form-control" required>
                                                 <option value="" disabled selected>Seleccione Subtema</option>
                                                 <option value="1"></option>
                                                </select>
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
                                            <label class="col-md-3 control-label" for="example-text-input">Área</label>
                                            <div class="col-md-9">
                                                <select name="area" class="form-control" id="area" required>
                                                   <option value="" selected="selected" disabled>Seleccione área</option>
                                                  @foreach($areas as $areas)
                                                 <option value="{{$areas->id}}">{{$areas->area}}</option>
                                                  @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Grado</label>
                                            <div class="col-md-9">
                                                <select name="parametro" id="parametro" class="form-control" required>
                                                
                                          
                                                 <option value="" disabled selected>Seleccione Grado</option>
                                                 <option value="1"></option>
                                             
                                                </select>
                                            </div>
                                        </div>

                                    

                                           <input type="hidden" name="webtipo" value="1"></input>
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

  <script type="text/javascript"></script>
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

   <script type="text/javascript">
      $('#area').on('change',function(e){
        console.log(e);
        var cat_id = e.target.value;
        $.get('/memorasa/ajax-subcatweb?cat_id=' + cat_id, function(data){
            $('#parametro').empty();
            $.each(data, function(index, subcatObj){
              $('#parametro').append('<option value="" style="display:none">Seleccione Grado</option>','<option value="'+subcatObj.id+'">'+subcatObj.grado_comunidad+'</option>' );

            });
        });
      });
   </script>

     <script type="text/javascript">
      $('#area_eva').on('change',function(e){
        console.log(e);
        var cat_id = e.target.value;
        $.get('/memorasa/ajax-subcatweb?cat_id='+cat_id'&cat_id'+cat_id, function(data){
            $('#parametro').empty();
            $.each(data, function(index, subcatObj){
              $('#parametro').append('<option value="" style="display:none">Seleccione Grado</option>','<option value="'+subcatObj.id+'">'+subcatObj.grado_comunidad+'</option>' );

            });
        });
      });
   </script>  




  @stop