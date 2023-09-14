@extends ('adminsite.layout')

<!-- Define el titulo de la Página -->    
@section('titulo')
 Crear Nuevo Contenido
@stop


@section('cabecera')
 @parent
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
    <script src="/vendors/ckeditor/ckeditor.js"></script>  
@stop

@section('ContenidoSite-01')

<div class="container">
  <div class="row">
                            <div class="col-md-12">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            
                                        </div>
                                        <h2><strong>Editar</strong> Blog</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                       {{ Form::open(array('files' => true,'method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/contenidos/actualizarblog',$contenido->id))) }}
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Título</label>
                                            <div class="col-md-9">
                                                {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Descripción</label>
                                            <div class="col-md-9">
                                                 {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Contenido</label>
                                            <div class="col-md-9">
                                                {{Form::textarea('contenido', $contenido->content, array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese contenido'))}}
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Imagen</label>
                                            <div class="col-md-9">
                                               <input type="text" name="FilePath" readonly="readonly" onclick="openKCFinder(this)" value="{{$contenido->image}}" class="form-control" />
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">URL</label>
                                            <div class="col-md-9">
                                                {{Form::text('enlace', $contenido->url, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Visualización</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('nivel', [$contenido->level => $contenido->level,
                                                '1' => 'Visible',
                                                '0' => 'No Visible'], null, array('class' => 'form-control')) }}
                                             </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Responsive</label>
                                            <div class="col-md-9">
                                                 {{Form::text('responsive', $contenido->responsive, array('class' => 'form-control','placeholder'=>'Ingrese responsive'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Animación</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('animacion', [$contenido->animacion => $contenido->animacion,
                                                  'bounce' => 'bounce',
                                                  'bounceIn' => 'bounceIn',
                                                  'bounceInDown' => 'bounceDown',
                                                  'bounceInLeft' => 'bounceLeft',
                                                  'bounceInRight' => 'bounceRight',
                                                  'bounceInUp' => 'bounceUp',
                                                  'fadeIn' => 'fadeIn',
                                                  'fadeInDown' => 'fadeDown',
                                                  'fadeInDownBig' => 'fadeDownBig',
                                                  'fadeInLeft' => 'fadeLeft',
                                                  'fadeInLeftBig' => 'fadeLeftBig',
                                                  'fadeInRight' => 'fadeRight',
                                                  'fadeInRightBig' => 'fadeRightBig',
                                                  'fadeInUp' => 'fadeUp',
                                                  'fadeInUpBig' => 'fadeUpBig'], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>
                                           {{Form::hidden('imageal', Auth::user()->name, array('class' => 'form-control'))}}
                                           {{Form::hidden('num', '3', array('class' => 'form-control'))}}
                                           {{Form::hidden('tipo', 'blog', array('class' => 'form-control'))}}
                                           {{Form::hidden('peca', $contenido->page_id, array('class' => 'form-control'))}}
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


<footer>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>


 <script type="text/javascript">  
       CKEDITOR.replace( 'editor' );  
    </script>  

<script src="/vendors/ckeditor/config.js?t=HBDD" type="text/javascript"></script>

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

</footer>

@stop