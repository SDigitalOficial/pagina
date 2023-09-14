 @extends ('adminsite.layout')
<!-- Define el titulo de la Página -->    


 @section('ContenidoSite-01')
@foreach($categoria as $categoria)
                                                  @endforeach
<div class="container">
  
<div class="block">
                                    <!-- Normal Form Title -->
                        <div class="block-title">
                                       
                                        <h2><strong>Editar</strong> Categoria Shuffle</h2>
                                    </div>
                                    <!-- END Normal Form Title -->
                                  
                                    <!-- Normal Form Content -->
                                     {{ Form::open(array('method' => 'PUT','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('/editar/categoria/shuffle',$categoria->id))) }}
                
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                          <div class="col-md-12">
                                             <label class="control-label" for="example-email-input">Categoría</label>

                                           {{Form::text('categoria', $categoria->categoria, array('class' => 'form-control','placeholder'=>'Ingrese nombre categoria' ))}}

                                          </div>
                                        </div>
                                       </div>

                                       <input type="hidden" name="identificador" value="{{$categoria->content_id}}">

                                <div class="container">
                                        <div class="form-group form-actions">
                                           <div class="col-lg-12">
                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Editar</button>
                                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Cancelar</button>
                                        </div>
                                      </div>
                                    </div>
                                    {{Form::close()}}
                                    <!-- END Normal Form Content -->
                                    <br>
                                    <br>
                                       

</div></div>

<footer>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</footer>
 @stop