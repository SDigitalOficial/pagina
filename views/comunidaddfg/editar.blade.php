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




@foreach($notas as $notas)
@endforeach



<div class="container">
  <div class="row">
                            <div class="col-md-12">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            
                                        </div>
                                        <h2><strong>Editar</strong> Contenido</h2>
                                    </div>


                                    <hr>
 <h4>Información eva</h4>
 {{session::get('grado_eva')}}
{{session::get('area_eva')}}
{{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/session/eva/web'))) }}
 <div class="form-group">
  <label class="col-md-3 control-label" for="example-select">Grado Eva</label>
   <div class="col-md-9">
    {{ Form::select('grado_eva', $grado, $retorno[0]->grado_eva, array('onchange' => 'this.form.submit()','class' => 'form-control','id' => 'grado_eva')) }}
   </div>
 </div>


 <div class="form-group">
  <label class="col-md-3 control-label" for="example-select">Área Eva</label>
   <div class="col-md-9">
    {{ Form::select('area_eva', $data, $retorno[0]->area_eva, array('onchange' => 'this.form.submit()','class' => 'form-control','id' => 'area_eva')) }}
   </div>
 </div>


 <input type="hidden" name="redireccion" id="input" class="form-control" value="{{Request::path()}}" required="required" pattern="" title="">
  {{ Form::close() }}


                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'PUT','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/comunidad/editar',Request::segment(4)))) }}
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $notas->titulo, array('class' => 'form-control','placeholder'=>'Ingrese Nombre','required' => 'required'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Propósito</label>
                                            <div class="col-md-9">
                                                {{Form::text('descripcion', $notas->descripcion, array('class' => 'form-control','placeholder'=>'Ingrese Descripción','required' => 'required'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Palabras clave</label>
                                            <div class="col-md-9">
                                                {{Form::text('keywords', $notas->keywords, array('class' => 'form-control','placeholder'=>'Ingrese Palabras clave','required' => 'required'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Contenido</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('contenido', $notas->contenido, array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese contenido'))}}
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Tipo nota</label>
                                            <div class="col-md-9">
                                                {{ Form::select('tipo', [$notas->tipo => $notas->tipo,
                                                   '1' => 'Video',
                                                   '2' => 'Articulo',
                                                   '3' => 'Audio'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                  

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                            <div class="col-md-9">
                                                <input type="text" name="FilePath" readonly="readonly" onclick="openKCFinder(this)" value="{{$notas->imagen}}" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-text-input">Url Video</label>
                                          <div class="col-md-9">
                                                {{Form::text('video', $notas->video, array('class' => 'form-control','placeholder'=>'Ingrese url video'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Campos conceptuales</label>
                                            <div class="col-md-9">
                                                <select name="tema" class="form-control" id="tema" required>
                                                   <option value="{{$notas->tema_id}}" selected="selected">{{$notas->tema}}</option>
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
                                                 <option value="{{$notas->subtema_id}}">{{$notas->subtema}}</option>
                                                 <option value="1"></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Rol acceso</label>
                                            <div class="col-md-9">
                                                <div id="output"></div>
                                                <select multiple="multiple" data-placeholder="Seleccione roles..." name="tagsa[]" multiple class="chosen-select form-control" id="tags">
                                                @foreach($rols as $rols)
                                                 @if($rols->rol_comunidad == 1)
                                                 <option value="{{$rols->rol_comunidad}}" selected>{{$rols->nombre}}</option>
                                                 @elseif($rols->id == 2)
                                                 <option value="{{$rols->rol_comunidad}}" selected>{{$rols->nombre}}</option>
                                                 @elseif($rols->id == 3)
                                                 <option value="{{$rols->rol_comunidad}}" selected>{{$rols->nombre}}</option>
                                                 @elseif($rols->id == 4)
                                                 <option value="{{$rols->rol_comunidad}}" selected>{{$rols->nombre}}</option>
                                                 @endif
                                                @endforeach
                                                @foreach($roles as $roles)
                                                 <option value="{{$roles->rol_comunidad}}">{{$roles->nombre}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                              

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Área o tema de intéres</label>
                                            <div class="col-md-9">
                                                <select name="area" id="area" class="form-control" required>
                                                   <option value="{{$notas->area_id}}" selected="selected">{{$notas->area}}</option>
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
                                                   <option value="{{$notas->parametro_id}}" selected="selected">{{$notas->grado_comunidad}}</option>
                                              
                                                </select>
                                            </div>
                                        </div>

                                

                                         <input type="hidden" name="webtipo" value="1"></input>
                                           <input type="hidden" name="peca" value="{{$notas->nota_comunidad_id}}"></input>

                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Editar</button>
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

  

  @stop