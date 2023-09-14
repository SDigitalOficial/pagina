<?php
Route::group(['middleware' => ['auths','saas']], function (){
 Route::post('/suscripcion/tarjeta', 'DigitalsiteSaaS\Pagina\Http\UsersaasController@tarjeta');
  Route::get('/suscripcion/planweb', 'DigitalsiteSaaS\Pagina\Http\UsersaasController@planweb');
  Route::post('/suscripcion/crearhost', 'DigitalsiteSaaS\Pagina\Http\UsersaasController@create');
 Route::get('saas/sitesaas', 'DigitalsiteSaaS\Pagina\Http\PaginaController@sitesaas');
 Route::get('editar/usuariosaas', 'DigitalsiteSaaS\Pagina\Http\PaginaController@editarsaas');
 Route::post('usuario/actualizar/{id}', 'DigitalsiteSaaS\Pagina\Http\PaginaController@actualizaruser');
 Route::post('usuario/cancelarplan/', 'DigitalsiteSaaS\Pagina\Http\SuscripcionController@cancelarplan');
  Route::post('usuario/actualizarpass/{id}', 'DigitalsiteSaaS\Pagina\Http\PaginaController@actualizaruserpass');
 Route::get('editar/contrasena', 'DigitalsiteSaaS\Pagina\Http\PaginaController@editarcontrasena');
  Route::get('actualizar/host', 'DigitalsiteSaaS\Pagina\Http\SuscripcionController@actualizarhost');
  Route::post('suscripcion/actualizarhost/{id}', 'DigitalsiteSaaS\Pagina\Http\SuscripcionController@updatehost');
});

Route::group(['middleware' => ['auths','administrador']], function (){

 Route::resource('gestion/paginas', 'DigitalsiteSaaS\Pagina\Http\PaginaController');
 Route::resource('gestion/paginas/crear', 'DigitalsiteSaaS\Pagina\Http\PaginaController@show');
 Route::post('gestion/paginas/crearpagina', 'DigitalsiteSaaS\Pagina\Http\PaginaController@crearpagina');
 Route::get('gestion/paginas/actualizar/{id}', 'DigitalsiteSaaS\Pagina\Http\PaginaController@actualizar');
 Route::get('gestion/paginas/editar/{id}', 'DigitalsiteSaaS\Pagina\Http\PaginaController@editar');
 Route::get('gestion/paginas/editarre/{id}', 'DigitalsiteSaaS\Pagina\Http\PaginaController@editarre');
 Route::get('gestion/paginas/subpagina/{id}', 'DigitalsiteSaaS\Pagina\Http\PaginaController@subpagina');
 Route::get('gestion/paginas/eliminar/{id}', 'DigitalsiteSaaS\Pagina\Http\PaginaController@eliminar');


 

Route::get('gestion/contenidos/diagrama/update/{id}', 'DigitalsiteSaaS\Pagina\Http\PaginaController@editardiagrama');
});

Route::group(['middleware' => ['auths','administrador']], function (){
 Route::resource('/gestor/ver-templates', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController');
 Route::get('/gestor/ver-config/publico', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@publico');
 Route::get('/gestor/ver-config/privado', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@privado');
 Route::get('/gestor/planes-saas', 'DigitalsiteSaaS\Pagina\Http\SuscripcionController@planessaas');
  Route::get('/gestor/editar-plan/{id}', 'DigitalsiteSaaS\Pagina\Http\SuscripcionController@editarplanessaas');
   Route::post('suscripcion/editar-plan/{id}', 'DigitalsiteSaaS\Pagina\Http\SuscripcionController@actualizarplansaas');
 Route::get('/suscripcion/pagos', 'DigitalsiteSaaS\Pagina\Http\SuscripcionController@pagos');
  Route::get('/gestor/crear-plansaas', 'DigitalsiteSaaS\Pagina\Http\SuscripcionController@crearplanessaas');
   Route::post('/suscripcion/crear-plan', 'DigitalsiteSaaS\Pagina\Http\SuscripcionController@crearplan');
   Route::get('/suscripcion/eliminar-plan/{id}', 'DigitalsiteSaaS\Pagina\Http\SuscripcionController@eliminarplan');
   Route::get('/suscripcion/ver-clientes', 'DigitalsiteSaaS\Pagina\Http\SuscripcionController@listaclientes');
    Route::get('/suscripcion/ver-suscripciones', 'DigitalsiteSaaS\Pagina\Http\SuscripcionController@listasuscripciones');
    Route::get('/suscripcion/credenciales', 'DigitalsiteSaaS\Pagina\Http\SuscripcionController@editarcredenciales');
    Route::post('/suscripcion/editarcredenciales', 'DigitalsiteSaaS\Pagina\Http\SuscripcionController@editarcredencialesweb');
 Route::post('/gestor/zip', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@template');
 Route::get('/gestor/subir-template', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@templatevista');
 Route::resource('gestor/templates/eliminartemplate', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@destroy');
 Route::post('gestion/contenidos/crear-configuracion', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@crearconfiguracion');
 Route::post('gestion/contenidos/actualizar-configuracion/{id}', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@update');
 Route::get('gestion/venta', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@venta');
 Route::post('gestion/contenidos/crearlogo', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@crearlogo');
 Route::post('gestion/contenidos/crearlogofooter', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@crearlogofooter');
 Route::post('gestion/contenidos/actualizarservicio', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@actualizarservicio');
  Route::post('gestion/contenidos/actualizarrecaptcha', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@actualizarrecaptcha');
 Route::post('gestion/contenidos/actualizarventa', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@actualizarventa');
 Route::post('gestion/contenidos/seoupdate', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@updateseo');
 Route::post('gestion/contenidos/redes-sociales', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@updatered');
 Route::get('gestion/recaptcha', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@recaptcha');
 
 

  Route::get('gestion/redes-sociales', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@verredes'); 

  Route::get('gestion/ubicacion', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@verubicacion');

Route::get('gestion/seo', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@seo');
 

  Route::get('gestion/pais-editar/{id}', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@paiseditar'); 
  Route::post('gestion/editwhats/{id}', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@editarwhatsapp'); 
  Route::get('gestion/whatsapp-editar/{id}', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@whatsappeditar'); 
  Route::post('gestion/actualizarpais/{id}', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@actualizarpais');
  Route::get('gestion/eliminarpais/{id}', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@eliminarpais');
  Route::get('gestion/eliminarwhatsapp/{id}', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@eliminarwhatsapp');

  Route::get('gestion/paises/importExport', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@importExportmun');
  Route::get('gestion/paises/downloadExcel/{type}', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@downloadExcelmun');
  Route::post('gestion/paises/importExcel', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@importExcelmun');

   Route::post('gestion/creardepartamento', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@creardepartamento'); 
   Route::post('gestion/crearwhats', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@crearwhats'); 
  Route::get('gestion/ubicacion/departamentos/{id}', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@departamentos');
  Route::get('gestion/departamento-editar/{id}', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@departamentoeditar');
  Route::post('gestion/actualizardepartamento/{id}', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@actualizardepartamento');
  Route::get('gestion/eliminardepartamento/{id}', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@eliminardepartamento');
  

  Route::get('gestion/crear-departamentos/{id}', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@creardepartamentos');
  Route::get('gestion/crear-whatsapp', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@crearwhatsapp');
  


  Route::get('gestion/departamentos/importExport', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@importExportdep');
  Route::get('gestion/departamentos/downloadExcel/{type}', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@downloadExceldep');
  Route::post('gestion/departamentos/importExcel', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@importExceldep');

  Route::get('gestion/municipios/{id}', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@municipios');
  Route::post('gestion/crearmunicipio/{id}', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@crearmunicipio');
  Route::get('gestion/municipio-editar/{id}', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@municipioeditar'); 
  Route::post('gestion/actualizarmunicipio/{id}', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@actualizarmunicipio');
  Route::get('gestion/eliminarmunicipio/{id}', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@eliminarmunicipio');

   Route::get('gestion/crear-municipio/{id}', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@creamunicipio');
 

 Route::get('gestion/whatsapp', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@configwhatsapp');

 
 Route::get('gestion/logo-head', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@logohead');

 Route::get('gestion/logo-footer', 'DigitalsiteSaaS\Pagina\Http\ConfiguracionController@logofooter');



 Route::get('/gestion/crear-template/{id}', function($id){ 
  return View::make('pagina::informacion-template');
 });
 Route::get('/gestion/editar-template/{id}', function($id){ 
  $template = DB::table('colors')->where('template','=',$id)->get();
  return View::make('pagina::configuracion.informacion-editemplate')->with('template', $template);
 });


 
});


Route::group(['middleware' => ['auths','administrador']], function (){
  Route::get('gestion/registrosaas', 'DigitalsiteSaaS\Pagina\Http\PaginaController@registrosaas');

  Route::post('gestion/registrosaas/create', 'DigitalsiteSaaS\Pagina\Http\UsersaasController@create');


 Route::resource('gestion/calendario/registro', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@registrar');
 Route::resource('gestion/contenidos', 'DigitalsiteSaaS\Pagina\Http\ContenidoController');
 Route::post('gestion/contenidos/creardiagrama', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@creardiagrama');
 Route::get('gestion/contenidos/digitales/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@digitales');


 Route::resource('gestion/contenidos/diagrama', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@diagrama');
 Route::post('gestion/contenidos/actualizardiagrama/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@actualizardiagrama');
 Route::get('gestion/contenidos/graficos/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@graficos');
 Route::get('gestion/contenidos/collapse/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@collapse');
 Route::get('gestion/contenidos/texto/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@texto');
 Route::get('gestion/contenidos/boton/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@boton');
 Route::get('gestion/contenidos/ficha/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@ficha');
 Route::get('gestion/contenidos/fichan/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@fichan');
 Route::get('gestion/contenidos/busqueda/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@busqueda');
 Route::get('gestion/contenidos/filtroevento/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@filtroevento');

 Route::get('gestion/contenidos/listas/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@listas');
 Route::get('gestion/contenidos/thumbail/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@thumbail');
 Route::get('gestion/contenidos/parallax/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@parallax');
 Route::get('gestion/contenidos/blog/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@blog');
 Route::get('gestion/contenidos/jumbotron/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@jumbotron');
 Route::get('gestion/contenidos/mapa/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@mapa');
 Route::get('gestion/contenidos/mailing/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@mailing');
 Route::get('gestion/contenidos/mediaobject/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@mediaobject');
 Route::get('gestion/contenidos/subservicios/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@subservicios');
 Route::get('gestion/contenidos/clientes/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@clientes');
 Route::get('gestion/contenidos/titulo/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@titulo');
 Route::resource('gestion/contenidos/shuffleweb', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@shuffleweb');
 Route::get('gestion/contenidos/hover/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@hover');
 Route::resource('gestion/contenidos/video', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@video');
 Route::get('gestion/contenidos/responsive/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@responsive');
 Route::get('gestion/contenidos/collapsum/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@collapsum');
 Route::get('gestion/contenidos/modal/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@modal');
 Route::get('gestion/contenidos/galeria/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@galeria');
 Route::get('gestion/contenidos/tab/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@tab');
 Route::resource('gestion/contenidos/shuffle', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@shuffle');
 Route::get('gestion/contenidos/formulario/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@formulario');
 Route::get('gestion/contenidos/formulas/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@formulas');
 Route::get('gestion/contenidos/productos/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@productos');
 Route::get('gestion/contenidos/filtros/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@filtros');
 Route::get('gestion/contenidos/filtrosdinami/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@filtrosdinami');
 Route::get('gestion/contenidos/rondaproductos/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@rondaproductos');
 Route::get('gestion/contenidos/empresas/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@empresas');
 Route::get('gestion/contenidos/carousel/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@carousel');
 Route::get('gestion/contenidos/rondacomunidad/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@rondacomunidad');
 Route::get('gestion/contenidos/rondacomunidadina/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@rondacomunidadina');
 Route::get('gestion/contenidos/documento/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@documento');
 Route::get('gestion/contenidos/vimeoback/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@vimeoback');
 Route::get('gestion/contenidos/eventos/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@eventos');
 Route::get('gestion/contenidos/calendario/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@calendario');
 Route::get('gestion/contenidos/totaleventos/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@totaleventos');
 Route::get('gestion/contenidos/empleos/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@empleos');
 Route::get('gestion/contenidos/planes/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@planes');
 Route::get('gestion/contenidos/videoclips/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@videoclips');
 Route::get('gestion/contenidos/backimage/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@backimage');
 Route::get('gestion/contenidos/cuenta/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@cuenta');
 Route::get('gestion/contenidos/mediamini/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@mediamini');
 Route::get('gestion/contenidos/galeriavideo/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@galeriavideo');
 Route::post('gestion/contenidos/creargrafico', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@creargrafico');
 Route::post('gestion/contenidos/crearinput', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@crearinput');
 Route::post('gestion/contenidos/crearselector', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@crearselector');
 Route::post('gestion/contenidos/crearbaner', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@crearbaner');
 Route::get('gestion/contenidos/eliminar/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@eliminar');
 Route::post('gestion/contenidos/crearblog', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@crearblog');
 Route::get('gestion/contenidos/eliminarblog/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@eliminarblog');
 Route::get('gestion/contenidos/eliminarinput/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@eliminarinput');
 Route::get('gestion/contenidos/eliminarselector/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@eliminarselector');
 Route::get('gestion/contenidos/eliminarbanner/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@eliminarbanner');
 Route::get('gestion/contenidos/imagenesgaleria/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@imagenesgaleria');
 Route::get('gestion/contenidos/imagenescarousel/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@imagenescarousel');
 Route::get('gestion/contenidos/carouselimg/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@carouselimg');
 Route::resource('gestion/contenidos/shuffle-menu', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@shufflemenu');
 Route::resource('gestion/contenidos/shuffle-crear', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@shufflecrear');
 Route::get('gestion/contenidos/camposformulario/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@camposformulario');
 Route::get('gestion/contenidos/imagen/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@imagen');
 Route::resource('gestion/contenidos/imagencarou', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@imagencarou');
 Route::get('gestion/contenidos/imagencarouslide/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@imagencarouslide');
 Route::resource('gestion/contenidos/formu', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@formu');
 Route::get('gestion/contenidos/menu/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@menus');
 Route::get('gestion/contenidos/baner/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@baner');
 Route::post('gestion/contenidos/creargaleria', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@creargaleria');
 Route::resource('gestion/contenidos/crearcarousel', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@crearcarousel');
 Route::post('gestion/contenidos/crearcarouselimg', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@crearcarouselimg');
 Route::resource('gestion/contenidos/crearcarouselimgslide', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@crearcarouselimgslide');
 Route::resource('/crear/categoria/shuffle', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@crearshufflemen');
 Route::resource('/editar/categoria/shuffle', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@editarshufflemen');
 Route::get('gestion/contenidos/editargaleria/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@editargaleria');
 Route::resource('gestion/contenidos/editarcarousel', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@editarcarousel');
 Route::get('gestion/contenidos/editarcarouselimg/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@editarcarouselimg');
 Route::get('gestion/contenidos/editarinput/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@editarinput');
 Route::get('gestion/contenidos/editarselector/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@editarselector');
 Route::post('gestion/contenidos/actualizarselector/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@actualizarselector');
 Route::post('gestion/contenidos/actualizargaleria/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@actualizargaleria');
 Route::resource('gestion/contenidos/actualizarcarousel', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@actualizarcarousel');
 Route::post('gestion/contenidos/actualizarcarouselimg/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@actualizarcarouselimg');
 Route::post('gestion/contenidos/actualizarinput/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@actualizarinput');
 Route::get('gestion/contenidos/editar/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@editar');
 Route::get('gestion/contenidos/editar-banner/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@editarbanner');
 Route::post('gestion/contenidos/actualizar/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@actualizar');
 Route::post('gestion/contenidos/actualizarbanner/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@actualizarbanner');
 Route::get('gestion/contenidos/subtab/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@subtab');
 Route::get('gestion/contenidos/subempleo/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@subempleo');
 Route::get('gestion/contenidos/subtabs/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@subtabs');
 Route::get('gestion/contenidos/subempleos/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@subempleos');
 Route::resource('gestion/contenidos/imgaleriavideo', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@imgaleriavideo');
 Route::resource('gestion/contenidos/imgshuffleweb', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@imgshuffleweb');
 Route::post('gestion/contenidos/creartab', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@creartab');
 Route::post('gestion/contenidos/crearempleo', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@crearempleo');
 Route::get('gestion/contenidos/editartab/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@editartab');
  Route::get('gestion/contenidos/editarempleo/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@editarempleo');
 Route::post('gestion/contenidos/actualizartab/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@actualizartab');
 Route::post('gestion/contenidos/actualizarempleo/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@actualizarempleo');
 Route::get('gestion/contenidos/eliminartab/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@eliminartab');
  Route::get('gestion/contenidos/eliminarempleo/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@eliminarempleo');
 Route::resource('gestion/contenidos/eliminarshufflemen', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@eliminarshufflemen');
 Route::resource('gestion/contenidos/subshuffle', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@subshuffle');
 Route::resource('gestion/contenidos/subshuffleweb', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@subshuffleweb');
 Route::resource('gestion/contenidos/crearshuffle', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@crearshuffle');
 Route::get('gestion/contenidos/editarblog/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@editarblog');
 Route::post('gestion/contenidos/actualizarblog/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@actualizarblog');
 Route::get('gestion/contenidos/eliminargaleria/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@eliminargaleria');
 Route::resource('gestion/contenidos/eliminarcarousel', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@eliminarcarousel');
 Route::get('gestion/contenidos/eliminarcarouselimg/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@eliminarcarouselimg');
 Route::resource('gestion/contenidos/eliminarcontshuffle', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@eliminarcontshuffle');
 Route::resource('gestion/contenidos/eliminarformulario', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@eliminarformulario');
 Route::get('gestion/contenidos/subcollapse/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@subcollapse');

 Route::get('gestion/contenidos/imagenes/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@imagenes');
 Route::get('gestion/contenidos/collapsable/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@collapsable');

 Route::post('gestion/contenidos/crearcollapse', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@crearcollapse');
 Route::get('gestion/contenidos/editarcollapse/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@editarcollapse');
 Route::get('gestion/contenidos/actualizarcollapse/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@actualizarcollapse');
 Route::get('gestion/contenidos/eliminarcollapse/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@eliminarcollapse');
 Route::resource('gestion/contenidos/editarshuffle', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@editarshuffle');
 Route::resource('gestion/contenidos/actualizarshuffle', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@actualizarshuffle');
 Route::resource('gestion/contenidos/eliminarshuffle', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@eliminarshuffle');

Route::get('gestion/registro/ver-registro/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@verregistro');
Route::get('gestion/registro/eliminar-registro/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@eliminarregistro');








 Route::get('consulta/formularios', 'DigitalsiteSaaS\Pagina\Http\PaginaController@consultaform');

 Route::get('gestion/contenidos/editarcontshuffle/{id}', function($id){
  $contenidos = DB::table('shuffle')->where('id', "=", $id)->get();  
  return View::make('pagina::actualizar-contshuffle')->with('contenidos', $contenidos);
 });


Route::get('gestion/contenidos/selectores/{id}', 'DigitalsiteSaaS\Pagina\Http\ContenidoController@consultaselector');

});

// Esta información es abierta

//Termina aca


Route::get('/gestor/validacionesinput/{id}', 'DigitalsiteSaaS\Pagina\Http\WebController@checkUsernameAvailabilityinput');
Route::get('/gestor/validacionesinputcrm/{id}', 'DigitalsiteSaaS\Pagina\Http\WebController@checkUsernameAvailabilityinputcrm');


/*
Route::get('ingreso/comunidad', function(){

return view('ingresoapi');
}); 



Route::any('fgpruebas/login', 'Digitalsite\Carrito\Http\UserController@login');
Route::any('pruebas/olvido', 'Digitalsite\Carrito\Http\UserController@olvido');


Route::get('acceso/exclusivo', function(){

return view('pagina::accesoexclusivo');
}); 

Route::get('/eva/ajax-subcatweb',function(){
 $cat_id = Input::get('cat_id');
 $cat_ids = Input::get('cat_ids');
 $client = new GuzzleHttp\Client(['http_errors' => false]);
 $response = $client->post('https://evaback.lyl.com.co:8000/api/ws/evaauthservice', [
 'form_params' => [
 'username' => 'sitedigital@sitedigital.com',
 'password' => 'Colombia2018',
 'action' => 'login',
 'token' => 'true',
 ],
 ]);

 $xml = json_decode($response->getBody()->getContents(), true);
 $token = $xml['data']['token'];
 $tok = "JWT"." ".$token;

 $area = '1';

$client = new GuzzleHttp\Client();
$responsed = $client->request('GET', "https://evaback.lyl.com.co:8000/api/ws/eva_get_knowledges", [
    "query" => [
        "subject_id" => $cat_id,
        "tier_id"=> $cat_ids,
    ],
    'headers' => [
 'authorization' =>  $tok,
 ],
]);




$xmls = json_decode($responsed->getBody()->getContents(), true);
dd($xmls);
$valor = []; 
$data = [];
$data1 = [];

foreach($xmls['data'] as $index => $valor)
     {
      $data[$valor['id']] = $valor['name'];
    }

        $cat_id = Input::get('cat_id');
        $subcategories = Digitalsite\Pagina\Subtema::where('subtemaid', '=', $cat_id)->get();
        return Response::json($subcategories);
});
*/
 Route::get('/memora/ajax-subcatweb',function(){
  $cat_id = Input::get('cat_id');
  $subcategories = DigitalsiteSaaS\Pagina\Subtema::where('subtemaid', '=', $cat_id)->get();
  return Response::json($subcategories);
 });
 Route::get('/memora/ajax-subcatweb',function(){
  $cat_id = Input::get('cat_id');
  $subcategories = DigitalsiteSaaS\Pagina\Subtema::where('subtemaid', '=', $cat_id)->get();
  return Response::json($subcategories);
 });
 Route::get('/memorasa/ajax-subcatweb',function(){
  $cat_id = Input::get('cat_id');
  $subcategories = DigitalsiteSaaS\Pagina\Gradocom::where('area_id', '=', $cat_id)->get();
  return Response::json($subcategories);
 });
 Route::get('/memagrado/ajax-subcatweb',function(){
  $cat_id = Input::get('cat_id');
  $subcategories = DigitalsiteSaaS\Pagina\Gradocom::where('area_id', '=', $cat_id)->get();
  return Response::json($subcategories);
 });
 Route::get('/memacampo/ajax-subcatweb',function(){
  $cat_id = Input::get('cat_id');
  $subcategories = DigitalsiteSaaS\Pagina\Tema::where('grado_id', '=', $cat_id)->get();
  return Response::json($subcategories);
 });

Route::get('gestor/validacion/pagina', function () {
          $user = DB::table('pages')->where('page', Input::get('pagina'))->count();
    if($user > 0) {
        $isAvailable = FALSE;
    } else {
        $isAvailable = TRUE;
    }
    echo json_encode(
            array(
                'valid' => $isAvailable
            )); 

});

Route::get('gestor/validacion/emailsaas', function () {
          $user = DB::table('users')->where('email', Input::get('email'))->count();
    
    if($user > 0) {
        $isAvailable = FALSE;
    } else {
        $isAvailable = TRUE;
    }
    echo json_encode(
            array(
                'valid' => $isAvailable
            )); 

});

Route::get('gestor/validacion/fqdn', function () {

$fqdn = sprintf('%s.%s', Input::get('fqdn'), env('APP_DOMAIN'));
$user = DB::table('tenancy.hostnames')->where('fqdn', $fqdn)->count();
    if($user > 0) {
        $isAvailable = FALSE;
    } else {
        $isAvailable = TRUE;
    }
    echo json_encode(
            array(
                'valid' => $isAvailable
            )); 

});

Route::get('/ciudad/ajax-subcatweb',function(){

        $cat_id = Input::get('cat_id');
        $subcategories = DigitalsiteSaaS\Pagina\Tenant\Ciudad::where('pais_id', '=', $cat_id)->get();
        return Response::json($subcategories);
});

Route::get('/ubicacionciudad/ajax-subcatweb',function(){

    $cat_id = Input::get('cat_id');
    $subcategories = DigitalsiteSaaS\Pagina\Tenant\Departamentocon::where('pais_id', '=', $cat_id)->get();
    return Response::json($subcategories);
});

Route::get('/ubicacion/ajax-subcatweb',function(){

        $cat_id = Input::get('cat_id');
        $subcategories = DigitalsiteSaaS\Carrito\Tenant\Municipio::where('departamento_id', '=', $cat_id)->get();
        return Response::json($subcategories);
});




Route::group(['middleware' => ['web']], function (){
  Route::get('mensajes/estadisticas', 'DigitalsiteSaaS\Pagina\Http\WebController@estadistica');
     Route::get('robots.txt', 'DigitalsiteSaaS\Pagina\Http\WebController@robot');
  Route::get('autocomplete/web',array('as'=>'autocomplete/web','uses'=>'DigitalsiteSaaS\Pagina\Http\WebController@autocomplete'));
  Route::get('/respuesta/error', 'DigitalsiteSaaS\Pagina\Http\SuscripcionController@resperror');
  Route::post('respuesta/informacion', 'DigitalsiteSaaS\Pagina\Http\SuscripcionController@informacion');
 Route::post('/suscripcion/suscripcion', 'DigitalsiteSaaS\Pagina\Http\UsersaasController@suscripcion');

 Route::get('ingresar', 'DigitalsiteSaaS\Pagina\Http\WebController@ingresar');
 Route::resource('ingreso-comunidad', 'DigitalsiteSaaS\Pagina\Http\WebController@ingresarcomunidad');
 Route::post('mensajes/crearmensajeinput', 'DigitalsiteSaaS\Pagina\Http\WebController@crearmensajeinput');
 Route::get('/', 'DigitalsiteSaaS\Pagina\Http\WebController@index');
 Route::get('en', 'DigitalsiteSaaS\Pagina\Http\WebController@index');
 Route::get('es', 'DigitalsiteSaaS\Pagina\Http\WebController@index');
 Route::get('/{id}', 'DigitalsiteSaaS\Pagina\Http\WebController@paginas');

 Route::get('en/{page}', 'DigitalsiteSaaS\Pagina\Http\WebController@paginasin');
  Route::get('es/{page}', 'DigitalsiteSaaS\Pagina\Http\WebController@paginasin');
 Route::get('{{id}}', 'DigitalsiteSaaS\Pagina\Http\WebController@subpaginas');
 Route::get('blog/{id}', 'DigitalsiteSaaS\Pagina\Http\WebController@blog');
 Route::get('/es/blog/{id}', 'DigitalsiteSaaS\Pagina\Http\WebController@blog');
 Route::get('/en/blog/{id}', 'DigitalsiteSaaS\Pagina\Http\WebController@blog');
 Route::get('gestiones/{id}', 'DigitalsiteSaaS\Pagina\Http\WebController@gestion');
 Route::get('respuesta/suscripcion/{id}', 'DigitalsiteSaaS\Pagina\Http\SuscripcionController@respuesta');
 Route::get('respuesta/respuesta', 'DigitalsiteSaaS\Pagina\Http\WebController@respuestaweb');


  Route::get('suscripcion/servicio', 'DigitalsiteSaaS\Pagina\Http\SuscripcionController@formulario');

Route::get('demos/autocomplete','DigitalsiteSaaS\Pagina\Http\WebController@autoCompletea');  
Route::get('demos/autocompleteajax','DigitalsiteSaaS\Pagina\Http\WebController@autoCompleteAjax');
});




