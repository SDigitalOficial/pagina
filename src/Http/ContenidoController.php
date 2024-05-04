<?php

 namespace DigitalsiteSaaS\Pagina\Http;
 use DigitalsiteSaaS\Pagina\Page;
 use DigitalsiteSaaS\Pagina\Inputweb;
 use DigitalsiteSaaS\Pagina\Registro;
 use DigitalsiteSaaS\Pagina\Maxi;
  use DigitalsiteSaaS\Pagina\Maxima;
 use DigitalsiteSaaS\Pagina\Maxicar;
 use DigitalsiteSaaS\Pagina\Messagema;
 use DigitalsiteSaaS\Pagina\Maxo;
 use DigitalsiteSaaS\Pagina\Maxu;
 use DigitalsiteSaaS\Pagina\Maxe;
 use DigitalsiteSaaS\Pagina\Conte;
 use DigitalsiteSaaS\Pagina\Baner;
 use DigitalsiteSaaS\Pagina\Formu;
 use DigitalsiteSaaS\Pagina\Date;
 use DigitalsiteSaaS\Pagina\Bloguero;
 use DigitalsiteSaaS\Pagina\Venta;
 use DigitalsiteSaaS\Pagina\Select;
 use DigitalsiteSaaS\Pagina\Content;
 use DigitalsiteSaaS\Pagina\Template;
 use DigitalsiteSaaS\Pagina\Message;
 use DigitalsiteSaaS\Pagina\Muxu;
 use DigitalsiteSaaS\Pagina\Diagrama;
 use DigitalsiteSaaS\Pagina\Carousel;
 use DigitalsiteSaaS\Pagina\Empleo;
 use DigitalsiteSaaS\Pagina\Img;
 use DigitalsiteSaaS\Gestion\Producto;
 use DigitalsiteSaaS\Carrito\Categoria;
 use DigitalsiteSaaS\Carrito\Category;
 use DigitalsiteSaaS\Pagina\Shuffleweb;
 use App\Http\Requests\FichaCreateRequest;
 use App\Http\Requests\FichaUpdateRequest;
 use App\Http\Requests\FichaUpdateimgRequest;
 use DB;
 use Auth;
 use Hash;
 use App\Http\Controllers\Controller;
 use Input;
 use Illuminate\Support\Str;
 use Illuminate\Http\Request;
 use Hyn\Tenancy\Models\Hostname;
 use Hyn\Tenancy\Models\Website;
 use Hyn\Tenancy\Repositories\HostnameRepository;
 use Hyn\Tenancy\Repositories\WebsiteRepository;

 class ContenidoController extends Controller{

    protected $tenantName = null;

 public function __construct(){
  $this->middleware('auth');

  $hostname = app(\Hyn\Tenancy\Environment::class)->hostname();
        if ($hostname){
            $fqdn = $hostname->fqdn;
            $this->tenantName = explode(".", $fqdn)[0];
        }
 }

 public function index(){
  $contenido = Content::all();
  return View('pagina::contenidos')->with('contenido', $contenido);
 }

 public function digitales($id){
  if(!$this->tenantName){
  $master = Page::find($id);
  $contenido = Page::find($id)->Contents;
  $banners = Page::find($id)->Contents;
  $paginations = Page::find($id)->Blogs;
  $collapses = Page::find($id)->Contents;
  $carousel = Page::find($id)->Contents;
  $tabs = Page::find($id)->Contents;
  $shuffle = Page::find($id)->Contents;
  $formula = Page::find($id)->Contents;
  $plan = 0;
  }else{
  $master = \DigitalsiteSaaS\Pagina\Tenant\Page::find($id);
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Page::find($id)->Contents;
  $banners = \DigitalsiteSaaS\Pagina\Tenant\Page::find($id)->Contents;
  $paginations = \DigitalsiteSaaS\Pagina\Tenant\Page::find($id)->Blogs;
  $collapses = \DigitalsiteSaaS\Pagina\Tenant\Page::find($id)->Contents;
  $carousel = \DigitalsiteSaaS\Pagina\Tenant\Page::find($id)->Contents;
  $tabs = \DigitalsiteSaaS\Pagina\Tenant\Page::find($id)->Contents;
  $shuffle = \DigitalsiteSaaS\Pagina\Tenant\Page::find($id)->Contents;
  $formula = \DigitalsiteSaaS\Pagina\Tenant\Page::find($id)->Contents;
  $hostname = app(\Hyn\Tenancy\Environment::class)->hostname();
        if ($hostname){
            $plan = $hostname->plan_id;
          
        }
  

  }
  return view('pagina::contenidos')->with('contenido', $contenido)->with('galeria', $contenido)->with('master', $master)->with('paginations', $paginations)->with('collapses', $collapses)->with('tabs', $tabs)->with('shuffle', $shuffle)->with('banners', $banners)->with('formula', $formula)->with('carousel', $carousel)->with('plan', $plan);
 }



 public function diagrama($id){
  $diagramacion = DB::table('diagramas')->where('id', '=', $id)->get();
  return view('pagina::diagramas')->with('diagramacion', $diagramacion);
 }

 public function graficos($id){
  $contenido = Page::find($id);
   if(!$this->tenantName){
    $plan = 0;
   }{
   $hostname = app(\Hyn\Tenancy\Environment::class)->hostname();
        if ($hostname){
            $plan = $hostname->plan_id;
          
        }
    }
       
  return view('pagina::crear-contenido')->with('contenido', $contenido)->with('plan', $plan);
 }

 public function creargrafico(){
  $notaweb = Input::get('tagsa');
  $data = json_encode($notaweb, true);
  $vowels = array('"', '[', ']');
  $onlyconsonants = str_replace($vowels, '', $data);
  if(!$this->tenantName){
  $contenido = new Content;
  }else{
  $contenido = new \DigitalsiteSaaS\Pagina\Tenant\Content;
  }
  $contenido->title = Input::get('titulo');
  $contenido->slugcon = Str::slug($contenido->title);
  $contenido->description = Input::get('descripcion');
  $contenido->content = Input::get('contenido');
  $contenido->contents = Input::get('contenidos');
  $contenido->position = Input::get('posicion');
  $contenido->level = Input::get('nivel');
  $contenido->video = Input::get('video');
  $contenido->responsive = Input::get('responsive');
  $contenido->animacion = Input::get('animacion');
  $contenido->idioma = Input::get('idioma');
  $contenido->image = Input::get('FilePath');
  $contenido->imageal = Input::get('imageal');
  $contenido->url = Input::get('enlace');
  if($onlyconsonants == 'null'){
  $contenido->roles_id = Auth::user()->id;
  }
  else{
  $contenido->roles_id = $onlyconsonants;
  }
  $contenido->type = Input::get('tipo');
  $contenido->num = Input::get('num');
  $contenido->page_id = Input::get('peca');
  $contenido->template = Input::get('template');
  $contenido->nivel = Input::get('nivelpos');
  $contenido->save();
  return Redirect('gestion/contenidos/digitales/'.$contenido->page_id)->with('status', 'ok_create');
 }

 public function crearinput(){
  if(!$this->tenantName){
  $contenido = new Formu;
  }else{
  $contenido = new \DigitalsiteSaaS\Pagina\Tenant\Formu;  
  }
  $contenido->tipo = Input::get('tipo');
  $contenido->nombre = Input::get('nombre');
  $contenido->content_id = Input::get('content_id');
  $contenido->respon = Input::get('responsive');
  $contenido->nombreinput = Input::get('nombreinput');
  $contenido->nombreinputcrm = Input::get('nombreinputcrm');
  $contenido->requerido = Input::get('requerido');
  $contenido->save();
  return Redirect('gestion/contenidos/camposformulario/'.$contenido->content_id)->with('status', 'ok_create');
 }

 public function registrar(){
  $contenido = new Registro;
  $contenido->evento_id = Input::get('evento');
  $contenido->usuario_id = Input::get('usuario');
  $contenido->redireccion = Input::get('redireccion');
  $contenido->save();
  return Redirect('gestion/calendario/'.$contenido->redireccion)->with('status', 'ok_create');
 }

 public function crearselector(){
  if(!$this->tenantName){
  $contenido = new Select;
  }else{
$contenido = new \DigitalsiteSaaS\Pagina\Tenant\Select;
  }
  $contenido->nombre = Input::get('nombre');
  $contenido->input_id = Input::get('input_id');
  $contenido->save();
  return Redirect('gestion/contenidos/selectores/'.$contenido->input_id)->with('status', 'ok_create');
 }

 public function crearbaner(){
  $contenido = new Baner;
  $contenido->nombre = Input::get('nombre');
  $contenido->url_imagen = Input::get('FilePath');
  $contenido->empresa = Input::get('empresa');
  $contenido->page_id = Input::get('peca');
  $contenido->impresiones = Input::get('impresiones');
  $contenido->clics = Input::get('clics');
  $contenido->visitas = Input::get('visitas');
  $contenido->position = Input::get('position');
  $contenido->destino = Input::get('destino');
  $contenido->type = Input::get('tipo');
  $contenido->responsive = Input::get('responsive');
  $contenido->save();
  return Redirect('gestion/contenidos/digitales/'.$contenido->page_id)->with('status', 'ok_create');
 }



 public function editar($id){
  if(!$this->tenantName){
 $formularios = Content::where('type','=','formulas')->get();
 $category = Category::all();
  $contenido = Content::find($id);
  $producto = Producto::all();
  $contenidoweb = Categoria::join('contents','contents.contents','=','categoriapro.id')
  ->where('contents.id', $id)
  ->get();

  $contenidowebs = Category::join('contents','contents.imageal','=','categoriessd.id')
  ->where('contents.id', $id)
  ->get();

  $categoria = Categoria::all();
  $roles = DB::table('roles_comunidad')->get();
  $notador = Content::where('id','=',$id)->get();
  foreach ($notador as $notadores){
  $ideman = $notadores->roles_id;
  $id_str = explode(',', $ideman);
  $rols = DB::table('roles_comunidad')->whereIn('id', $id_str)->get();
   }
  
  $posicion = DB::table('posicion')->pluck('posicion');

  }else{
  $formularios = \DigitalsiteSaaS\Pagina\Tenant\Content::where('type','=','formulas')->get();
  $categoria = \DigitalsiteSaaS\Carrito\Tenant\Categoria::all();
  $producto = \DigitalsiteSaaS\Gestion\Tenant\Producto::all();
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Content::find($id);
  $category = \DigitalsiteSaaS\Carrito\Tenant\Category::all();
  $contenidoweb = \DigitalsiteSaaS\Pagina\Tenant\Categoria::join('contents','contents.contents','=','categoriapro.id')
  ->where('contents.id', $id)
  ->get();
  $contenidowebs = \DigitalsiteSaaS\Carrito\Tenant\Category::join('contents','contents.imageal','=','categoriessd.id')
  ->where('contents.id', $id)
  ->get();

  $roles = DB::table('roles_comunidad')->get();
  $notador = \DigitalsiteSaaS\Pagina\Tenant\Content::where('id','=',$id)->get();
  foreach ($notador as $notadores){
  $ideman = $notadores->roles_id;
  $id_str = explode(',', $ideman);
  $rols = DB::table('roles_comunidad')->whereIn('id', $id_str)->get();
   }
 
  $posicion = DB::table('posicion')->pluck('posicion');
 
  }

  return view('pagina::editar-contenido')->with('contenido', $contenido)->with('posicion', $posicion)->with('notador', $notador)->with('roles', $roles)->with('rols', $rols)->with('categoria', $categoria)->with('contenidoweb', $contenidoweb)->with('formularios', $formularios)->with('producto', $producto)->with('contenidowebs', $contenidowebs)->with('category', $category);
 }


 public function editartemp($id){
  if(!$this->tenantName){
 $formularios = Content::where('type','=','formulas')->get();
 $category = Category::all();
  $contenido = Content::find($id);
  $producto = Producto::all();
  $contenidoweb = Categoria::join('contents','contents.contents','=','categoriapro.id')
  ->where('contents.id', $id)
  ->get();

  $contenidowebs = Category::join('contents','contents.imageal','=','categoriessd.id')
  ->where('contents.id', $id)
  ->get();

  $categoria = Categoria::all();
  $roles = DB::table('roles_comunidad')->get();
  $notador = Content::where('id','=',$id)->get();
  foreach ($notador as $notadores){
  $ideman = $notadores->roles_id;
  $id_str = explode(',', $ideman);
  $rols = DB::table('roles_comunidad')->whereIn('id', $id_str)->get();
   }
  
  $posicion = DB::table('posicion')->pluck('posicion');

  }else{
  $formularios = \DigitalsiteSaaS\Pagina\Tenant\Content::where('type','=','formulas')->get();
  $categoria = \DigitalsiteSaaS\Carrito\Tenant\Categoria::all();
  $producto = \DigitalsiteSaaS\Gestion\Tenant\Producto::all();
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Content::find($id);
  $category = \DigitalsiteSaaS\Carrito\Tenant\Category::all();
  $contenidoweb = \DigitalsiteSaaS\Pagina\Tenant\Categoria::join('contents','contents.contents','=','categoriapro.id')
  ->where('contents.id', $id)
  ->get();
  $contenidowebs = \DigitalsiteSaaS\Carrito\Tenant\Category::join('contents','contents.imageal','=','categoriessd.id')
  ->where('contents.id', $id)
  ->get();

  $roles = DB::table('roles_comunidad')->get();
  $notador = \DigitalsiteSaaS\Pagina\Tenant\Content::where('id','=',$id)->get();
  foreach ($notador as $notadores){
  $ideman = $notadores->roles_id;
  $id_str = explode(',', $ideman);
  $rols = DB::table('roles_comunidad')->whereIn('id', $id_str)->get();
   }
 
  $posicion = DB::table('posicion')->pluck('posicion');
 
  }

  return view('pagina::editar-contenidotemp')->with('contenido', $contenido)->with('posicion', $posicion)->with('notador', $notador)->with('roles', $roles)->with('rols', $rols)->with('categoria', $categoria)->with('contenidoweb', $contenidoweb)->with('formularios', $formularios)->with('producto', $producto)->with('contenidowebs', $contenidowebs)->with('category', $category);
 }

 public function editarbanner($id){
  $banners = Baner::find($id);
  return view('pagina::editar-baner')->with('banners', $banners);
 }

 public function actualizar($id){
  $notaweb = Input::get('tagsa');
  $data = json_encode($notaweb, true);
  $vowels = array('"', '[', ']');
  $onlyconsonants = str_replace($vowels, '', $data);
  $input = Input::all();
  if(!$this->tenantName){
  $contenido = Content::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Content::find($id);
  }
  $contenido->title = Input::get('titulo');
  $contenido->slugcon = Str::slug($contenido->title);
  $contenido->description = Input::get('descripcion');
  $contenido->content = Input::get('contenido');
  $contenido->contents = Input::get('contenidos');
  $contenido->position = Input::get('posicion');
  $contenido->image = Input::get('FilePath');
  $contenido->imageal = Input::get('imageal');
  $contenido->video = Input::get('video');
  $contenido->idioma = Input::get('idioma');
  $contenido->responsive = Input::get('responsive');
  $contenido->animacion = Input::get('animacion');
  $contenido->url = Input::get('enlace');
  if($onlyconsonants == 'null'){
  $contenido->roles_id = Auth::user()->id;;
  }
  else{
  $contenido->roles_id = $onlyconsonants;
  }
  $contenido->type = Input::get('tipo');
  $contenido->level = Input::get('nivel');
  $contenido->nivel = Input::get('nivelpos');
  $contenido->template = Input::get('template');
  $contenido->save();
  return Redirect('gestion/contenidos/digitales/'.$contenido->page_id)->with('status', 'ok_update');
 }

 public function actualizartemp($id){
  $redireccion = Input::get('redireccion');
  $notaweb = Input::get('tagsa');
  $data = json_encode($notaweb, true);
  $vowels = array('"', '[', ']');
  $onlyconsonants = str_replace($vowels, '', $data);
  $input = Input::all();
  if(!$this->tenantName){
  $contenido = Content::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Content::find($id);
  }
  $contenido->title = Input::get('titulo');
  $contenido->slugcon = Str::slug($contenido->title);
  $contenido->description = Input::get('descripcion');
  $contenido->content = Input::get('contenido');
  $contenido->contents = Input::get('contenidos');
  $contenido->position = Input::get('posicion');
  $contenido->image = Input::get('FilePath');
  $contenido->imageal = Input::get('imageal');
  $contenido->video = Input::get('video');
  $contenido->idioma = Input::get('idioma');
  $contenido->responsive = Input::get('responsive');
  $contenido->animacion = Input::get('animacion');
  $contenido->url = Input::get('enlace');
  if($onlyconsonants == 'null'){
  $contenido->roles_id = Auth::user()->id;;
  }
  else{
  $contenido->roles_id = $onlyconsonants;
  }
  $contenido->type = Input::get('tipo');
  $contenido->level = Input::get('nivel');
  $contenido->nivel = Input::get('nivelpos');
  $contenido->template = Input::get('template');
  $contenido->save();
  
  return Redirect($redireccion)->with('status', 'ok_update');
 }

 public function creardiagrama(){
  $pagina = new Diagrama;
  $pagina->posicionSD1 = Input::get('posicionsd1');
  $pagina->posicionSD2 = Input::get('posicionsd2');
  $pagina->posicionSD3 = Input::get('posicionsd3');
  $pagina->posicionSD4 = Input::get('posicionsd4');
  $pagina->posicionSD5 = Input::get('posicionsd5');
  $pagina->posicionSD6 = Input::get('posicionsd6');
  $pagina->posicionSD7 = Input::get('posicionsd7');
  $pagina->posicionSD8 = Input::get('posicionsd8');
  $pagina->posicionSD9 = Input::get('posicionsd9');
  $pagina->posicionSD01 = Input::get('posicionsd01');
  $pagina->posicionSD02 = Input::get('posicionsd02');
  $pagina->page_id = Input::get('page');
  $pagina->save();
  return Redirect('gestion/paginas')->with('status', 'ok_create');
 }

 public function actualizardiagrama($id){
  $input = Input::all();
  if(!$this->tenantName){
  $pagina = Diagrama::find($id);
  }else{
  $pagina = \DigitalsiteSaaS\Pagina\Tenant\Diagrama::find($id);
  }
  $pagina->posicionSD1 = Input::get('posicionsd1');
  $pagina->posicionSD2 = Input::get('posicionsd2');
  $pagina->posicionSD3 = Input::get('posicionsd3');
  $pagina->posicionSD4 = Input::get('posicionsd4');
  $pagina->posicionSD5 = Input::get('posicionsd5');
  $pagina->posicionSD6 = Input::get('posicionsd6');
  $pagina->posicionSD7 = Input::get('posicionsd7');
  $pagina->posicionSD8 = Input::get('posicionsd8');
  $pagina->posicionSD9 = Input::get('posicionsd9');
  $pagina->bloqueSD1 = Input::get('bloquesd1');
  $pagina->bloqueSD2 = Input::get('bloquesd2');
  $pagina->bloqueSD3 = Input::get('bloquesd3');
  $pagina->bloqueSD4 = Input::get('bloquesd4');
  $pagina->bloqueSD5 = Input::get('bloquesd5');
  $pagina->bloqueSD6 = Input::get('bloquesd6');
  $pagina->bloqueSD7 = Input::get('bloquesd7');
  $pagina->bloqueSD8 = Input::get('bloquesd8');
  $pagina->bloqueSD9 = Input::get('bloquesd9');
  $pagina->sectionSD1 = Input::get('sectionsd1');
  $pagina->sectionSD2 = Input::get('sectionsd2');
  $pagina->sectionSD3 = Input::get('sectionsd3');
  $pagina->sectionSD4 = Input::get('sectionsd4');
  $pagina->sectionSD5 = Input::get('sectionsd5');
  $pagina->sectionSD6 = Input::get('sectionsd6');
  $pagina->sectionSD7 = Input::get('sectionsd7');
  $pagina->sectionSD8 = Input::get('sectionsd8');
  $pagina->sectionSD9 = Input::get('sectionsd9');
  $pagina->bloque = Input::get('bloque');
  $pagina->bloqueblog = Input::get('bloqueblog');
  $pagina->bloqueficha1 = Input::get('bloqueficha1');
  $pagina->bloqueficha2 = Input::get('bloqueficha2');
  $pagina->save();
  return Redirect('gestion/paginas')->with('status', 'ok_create');
 }

 public function actualizarbanner($id){
  $input = Input::all();
  $contenido = Baner::find($id);
  $contenido->nombre = Input::get('nombre');
  $contenido->url_imagen = Input::get('FilePath');
  $contenido->empresa = Input::get('empresa');
  $contenido->page_id = Input::get('peca');
  $contenido->impresiones = Input::get('impresiones');
  $contenido->clics = Input::get('clics');
  $contenido->visitas = Input::get('visitas');
  $contenido->position = Input::get('position');
  $contenido->destino = Input::get('destino');
  $contenido->page_id = Input::get('page_id');
  $contenido->type = Input::get('tipo');
  $contenido->responsive = Input::get('responsive');
  $contenido->save();
  return Redirect('gestion/contenidos/digitales/'.$contenido->page_id)->with('status', 'ok_create');
 }

 public function eliminar($id){
  if(!$this->tenantName){
  $contenido = Content::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Content::find($id);
  }
  $contenido->delete();
  return Redirect('gestion/contenidos/digitales/'.$contenido->page_id)->with('status', 'ok_delete');
 }


  public function eliminartemp($id){
  if(!$this->tenantName){
  $contenido = Content::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Content::find($id);
  }
  $contenido->delete();
  return back();
 }

 public function blogs(){
  if(!$this->tenantName){
  $blogs = Bloguero::all();
  }else{
  $blogs = \DigitalsiteSaaS\Pagina\Tenant\Bloguero::all(); 
  }
  return view('pagina::blog.blogs')->with('blogs', $blogs);
 }


 public function crearblog(){
  if(!$this->tenantName){
  $contenido = new Bloguero;
  }else{
  $contenido = new \DigitalsiteSaaS\Pagina\Tenant\Bloguero; 
  }
  $contenido->title = Input::get('titulo');
  $contenido->slug = Str::slug($contenido->title);
  $contenido->description = Input::get('descripcion');
  $contenido->content = Input::get('contenido');
  $contenido->position = Input::get('posicion');
  $contenido->level = Input::get('nivel');
  $contenido->responsive = Input::get('responsive');
  $contenido->image = Input::get('FilePath');
  $contenido->imageal = Input::get('imageal');
  $contenido->url = Input::get('enlace');
  $contenido->type = Input::get('tipo');
  $contenido->num = Input::get('num');
  $contenido->page_id = Input::get('peca');
  $contenido->save();
  return Redirect('gestion/contenidos/blog')->with('status', 'ok_create');
 }

 public function creargaleria(){
  if(!$this->tenantName){
  $contenido = new Maxima;
  }else{
  $contenido = new \DigitalsiteSaaS\Pagina\Tenant\Maxima;
  }
  $contenido->titlesd = Input::get('titulo');
  $contenido->imagesd = Input::get('FilePath');
  $contenido->descriptionsd = Input::get('descripcion');
  $contenido->contentsd = Input::get('contenido');
  $contenido->state = Input::get('estado');
  $contenido->animacionsd = Input::get('animacion');
  $contenido->urlsd = Input::get('url');
  $contenido->boton = Input::get('boton');
  $contenido->urlsduno = Input::get('urluno');
  $contenido->botonuno = Input::get('botonuno');
  $contenido->content_id = Input::get('id');
  $contenido->save();
  return Redirect('gestion/contenidos/imagenesgaleria/'.$contenido->content_id)->with('status', 'ok_create');
 }


  public function crearcarouselimgslide(){
  $contenido = new Maxicar;
  $contenido->titulo_ca = Input::get('titulo');
  $contenido->descripcion_ca = Input::get('descripcion');
  $contenido->estado = Input::get('estado');
  $contenido->content_id = Input::get('content_id');
  $contenido->save();
  return Redirect('gestion/contenidos/imagenescarousel/'.$contenido->content_id)->with('status', 'ok_create');
 }

  public function crearcarouselimg(){
  if(!$this->tenantName){
  $contenido = new Carousel;
  }else{
  $contenido = new \DigitalsiteSaaS\Pagina\Tenant\Carousel;  
  }
  $contenido->imagen_car = Input::get('FilePath');
  $contenido->titulo_car = Input::get('titulo');
  $contenido->descripcionweb_car = Input::get('descripcionweb');
  $contenido->slug_car =  Str::slug($contenido->titulo_car);
  $contenido->descripcion_car = Input::get('descripcion');
  $contenido->url_car = Input::get('url');
  $contenido->content_id = Input::get('content_id');
  $contenido->page_id = Input::get('page_id');
  $contenido->save();
  return Redirect('gestion/contenidos/imagenescarousel/'.$contenido->content_id)->with('status', 'ok_create');
 }


 public function crearshufflemen(){
  $contenido = new Shuffleweb;
  $contenido->categoria = Input::get('categoria');
  $contenido->categoria_slug = Str::slug($contenido->categoria);
  $contenido->content_id = Input::get('identificador');
  $contenido->save();
  return Redirect('gestion/contenidos/shuffle-menu/'.$contenido->content_id)->with('status', 'ok_create');
 }

 public function crearcollapse(){
  if(!$this->tenantName){
  $contenido = new Maxo;
  }else{
  $contenido = new \DigitalsiteSaaS\Pagina\Tenant\Maxo;
  }
  $contenido->titlecl = Input::get('titulo');
  $contenido->slug = Str::slug($contenido->titlecl);
  $contenido->descriptioncl = Input::get('descripcion');
  $contenido->contentcl = Input::get('contentcl');
  $contenido->state = Input::get('state');
  $contenido->content_id = Input::get('id');
  $contenido->save();
  return Redirect('gestion/contenidos/subcollapse/'.$contenido->content_id)->with('status', 'ok_create');
 }

 public function creartab(){
  if(!$this->tenantName){
  $contenido = new Maxu;
  }else{
  $contenido = new \DigitalsiteSaaS\Pagina\Tenant\Maxu;
  }
  $contenido->titlecl = Input::get('titlecl');
  $contenido->slug = Str::slug($contenido->titlecl);
  $contenido->descriptioncl = Input::get('descriptioncl');
  $contenido->contentcl = Input::get('contentcl');
  $contenido->posicion = Input::get('posicion');
  $contenido->urlsd = Input::get('enlace');
  $contenido->imagecl = Input::get('FilePath');
  $contenido->state = Input::get('state');
  $contenido->content_id = Input::get('id');
  $contenido->save();
  return Redirect('gestion/contenidos/subtab/'.$contenido->content_id)->with('status', 'ok_create');
 }

  public function crearempleo(){
  if(!$this->tenantName){
  $contenido = new Empleo;
  }else{
  $contenido = new \DigitalsiteSaaS\Pagina\Tenant\Empleo; 
  }
  $contenido->titulo_emp = Input::get('titulo');
  $contenido->titulo_empslug = Str::slug($contenido->titulo_emp);
  $contenido->descripcion_emp = Input::get('descripcion');;
  $contenido->requisitos_emp = Input::get('requisito');
  $contenido->area_emp = Input::get('area');
  $contenido->nivel_emp = Input::get('nivel');
  $contenido->ciudad_emp = Input::get('ciudad');
  $contenido->salario_emp = Input::get('salario');
  $contenido->fecha_emp = Input::get('fecha');
  $contenido->content_id = Input::get('id');
  $contenido->save();
  return Redirect('gestion/contenidos/subempleo/'.$contenido->content_id)->with('status', 'ok_create');
 }

 public function crearshuffle(){
  $contenido = new Maxe;
  $contenido->titlecl = Input::get('titlecl');
  $contenido->descriptioncl = Input::get('descriptioncl');
  $contenido->imagealcl = Input::get('FilePath');
  $contenido->shuffle_id = Input::get('shuffleid');
  $contenido->shuffleid = Input::get('shufflewebsite');
  $contenido->save();
  return Redirect('gestion/contenidos/shuffle-crear/'.$contenido->shuffle_id)->with('status', 'ok_create');
 }
	
 public function actualizarblog($id){
  $input = Input::all();
  if(!$this->tenantName){
  $contenido = Bloguero::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Bloguero::find($id);
  }
  $contenido->title = Input::get('titulo');
  $contenido->description = Input::get('descripcion');
  $contenido->content = Input::get('contenido');
  $contenido->position = Input::get('posicion');
  $contenido->level = Input::get('nivel');
  $contenido->responsive = Input::get('responsive');
  $contenido->animacion = Input::get('animacion');
  $contenido->image = Input::get('FilePath');
  $contenido->imageal = Input::get('imageal');
  $contenido->url = Input::get('enlace');
  $contenido->type = Input::get('tipo');
  $contenido->num = Input::get('num');
  $contenido->page_id = Input::get('peca');
  $contenido->save();
  return Redirect('gestion/contenidos/blog')->with('status', 'ok_update');
 }

 public function editarshufflemen($id){
  $sinslug = Input::get('categoria');
  $conslug = Str::slug($sinslug);
  $editar = DB::table('shuffle')
   ->where('shuffleid','=',$id)
   ->update(array('shuffle_id' => $conslug));
  $input = Input::all();
  $contenido = Shuffleweb::find($id);
  $contenido->categoria = Input::get('categoria');
  $contenido->categoria_slug = Str::slug($contenido->categoria);
  $contenido->content_id = Input::get('identificador');
  $contenido->save();
  return Redirect('gestion/contenidos/shuffle-menu/'.$contenido->content_id)->with('status', 'ok_update');
 }

 public function actualizargaleria($id){
  $input = Input::all();
  if(!$this->tenantName){
  $contenido = Img::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Img::find($id);
  }
  $contenido->state = Input::get('estado');
  $contenido->titlesd = Input::get('titulo');
  $contenido->imagesd = Input::get('FilePath');
  $contenido->descriptionsd = Input::get('descripcion');
  $contenido->animacionsd = Input::get('animacion');
  $contenido->contentsd = Input::get('contenido');
  $contenido->urlsd = Input::get('url');
  $contenido->boton = Input::get('boton');
  $contenido->urlsduno = Input::get('urluno');
  $contenido->botonuno = Input::get('botonuno');
  $contenido->save();
  return Redirect('gestion/contenidos/imagenesgaleria/'.$contenido->content_id)->with('status', 'ok_update');
 }

  public function actualizarcarousel($id){
  $input = Input::all();
  $contenido = Maxicar::find($id);
  $contenido->estado = Input::get('estado');
  $contenido->titulo_ca = Input::get('titulo');
  $contenido->descripcion_ca= Input::get('descripcion');
  $contenido->content_id = Input::get('content_id');
  $contenido->save();
  return Redirect('gestion/contenidos/imagenescarousel/'.$contenido->content_id)->with('status', 'ok_update');
 }


 public function actualizarcarouselimg($id){
  $input = Input::all();
  if(!$this->tenantName){
  $contenido = Carousel::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Carousel::find($id);  
  }
  $contenido->titulo_car = Input::get('titulo');
  $contenido->slug_car =  Str::slug($contenido->titulo_car);
  $contenido->descripcionweb_car = Input::get('descripcionweb');
  $contenido->imagen_car = Input::get('FilePath');
  $contenido->descripcion_car = Input::get('descripcion');
  $contenido->url_car = Input::get('url');
  $contenido->content_id = Input::get('content_id');
  $contenido->page_id = Input::get('page_id');
  $contenido->save();
  return Redirect('/gestion/contenidos/imagenescarousel/'.$contenido->content_id)->with('status', 'ok_update');
 }



 
 public function actualizarinput($id){
  $input = Input::all();
  if(!$this->tenantName){
  $contenido = Formu::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Formu::find($id); 
  }
  $contenido->tipo = Input::get('tipo');
  $contenido->nombre = Input::get('nombre');
  $contenido->respon = Input::get('responsive');
  $contenido->nombreinput = Input::get('nombreinput');
  $contenido->nombreinputcrm = Input::get('nombreinputcrm');
  $contenido->requerido = Input::get('requerido');
  $contenido->save();
  return Redirect('gestion/contenidos/camposformulario/'.$contenido->content_id)->with('status', 'ok_update');
 }

 public function actualizarselector($id){
  $input = Input::all();
  if(!$this->tenantName){
  $contenido = Select::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Select::find($id);  
  }
  $contenido->nombre = Input::get('nombre');
  $contenido->input_id = Input::get('input_id');
  $contenido->save();
  return Redirect('/gestion/contenidos/selectores/'.$contenido->input_id)->with('status', 'ok_update');
 }

 public function actualizarcollapse($id){
  $input = Input::all();
  if(!$this->tenantName){
  $contenido = Maxo::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Maxo::find($id);
  }
  $contenido->titlecl = Input::get('titulo');
  $contenido->slug = Str::slug($contenido->titlecl);
  $contenido->state = Input::get('state');
  $contenido->contentcl = Input::get('contentcl');
  $contenido->descriptioncl = Input::get('descripcion');
  $contenido->save();
  return Redirect('gestion/contenidos/subcollapse/'.$contenido->content_id)->with('status', 'ok_update');
 }

 public function actualizartab($id){
  $input = Input::all();
  if(!$this->tenantName){
  $contenido = Maxu::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Maxu::find($id);
  }
  $contenido->state = Input::get('state');
  $contenido->titlecl = Input::get('titlecl');
  $contenido->slug = Str::slug($contenido->titlecl);
  $contenido->contentcl = Input::get('contentcl');
  $contenido->posicion = Input::get('posicion');
  $contenido->urlsd = Input::get('enlace');
  $contenido->imagecl = Input::get('FilePath');
  $contenido->descriptioncl = Input::get('descriptioncl');
  $contenido->save();
  return Redirect('gestion/contenidos/subtab/'.$contenido->content_id)->with('status', 'ok_update');
 }

  public function actualizarempleo($id){
  $input = Input::all();
  if(!$this->tenantName){
  $contenido = Empleo::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Empleo::find($id); 
  }
  $contenido->titulo_emp = Input::get('titulo');
  $contenido->titulo_empslug = Str::slug($contenido->titulo_emp);
  $contenido->descripcion_emp = Input::get('descripcion');;
  $contenido->requisitos_emp = Input::get('requisito');
  $contenido->area_emp = Input::get('area');
  $contenido->nivel_emp = Input::get('nivel');
  $contenido->ciudad_emp = Input::get('ciudad');
  $contenido->salario_emp = Input::get('salario');
  $contenido->fecha_emp = Input::get('fecha');
  $contenido->content_id = Input::get('id');
  $contenido->save();
  return Redirect('gestion/contenidos/subempleo/'.$contenido->content_id)->with('status', 'ok_update');
 }


 public function actualizarshuffle($id){
  $input = Input::all();
  $contenido = Maxe::find($id);
  $contenido->titlecl = Input::get('titlecl');
  $contenido->descriptioncl = Input::get('descriptioncl');
  $contenido->imagealcl = Input::get('FilePath');
  $contenido->shuffle_id = Input::get('shuffleid');
  $contenido->shuffleid = Input::get('shufflewebsite');
  $contenido->save();
  return Redirect('gestion/contenidos/shuffle-crear/'.$contenido->shuffle_id)->with('status', 'ok_update');
 }  

 public function editargaleria($id){
  if(!$this->tenantName){
  $contenido = Img::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Img::find($id); 
  }
  return view('pagina::editar-galeria')->with('contenido', $contenido);
 }

 public function consultaselector($id){
  if(!$this->tenantName){
   $selectores = Select::where('input_id', '=', $id)->get();
  }else{
  $selectores = \DigitalsiteSaaS\Pagina\Tenant\Select::where('input_id', '=', $id)->get();
  }
  return view('pagina::crear-selector')->with('selectores', $selectores);
 }





  public function editarcarousel($id){
  $contenido = Maxicar::find($id);
  return view('pagina::editar-carousel')->with('contenido', $contenido);
 }

   public function editarcarouselimg($id){
   if(!$this->tenantName){
   $contenido = Carousel::find($id);
   }else{
   $contenido = \DigitalsiteSaaS\Pagina\Tenant\Carousel::find($id);
   }
   return view('pagina::editar-carouselimg')->with('contenido', $contenido);
 }

 public function editarinput($id){
  if(!$this->tenantName){
  $contenido = Inputweb::where('id','=',$id)->get();
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Inputweb::where('id','=',$id)->get();
  }
  return view('pagina::editar-input')->with('contenido', $contenido);
 }

 public function editarselector($id){
  if(!$this->tenantName){
  $contenido = Select::find($id);
   }else{
$contenido = \DigitalsiteSaaS\Pagina\Tenant\Select::find($id);
   }
  return view('pagina::editar-selector')->with('contenido', $contenido);
 }

 public function editarcollapse($id){
  if(!$this->tenantName){
  $contenido = Maxo::find($id);
  }else{
    $contenido = \DigitalsiteSaaS\Pagina\Tenant\Maxo::find($id);
  }
  return view('pagina::editar-collapse')->with('contenido', $contenido);
 }

 public function editartab($id){
  if(!$this->tenantName){
  $contenido = Maxu::find($id);
  }else{
    $contenido = \DigitalsiteSaaS\Pagina\Tenant\Maxu::find($id);
  }
  return view('pagina::editar-tabs')->with('contenido', $contenido);
 }

public function editarempleo($id){
  if(!$this->tenantName){
  $contenido = Empleo::where('id','=', $id)->get();
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Empleo::where('id','=', $id)->get();
  }
  return view('pagina::editar-empleo')->with('contenido', $contenido);
  }

 public function editarshuffle($id){
  $contenido = Maxe::find($id);
  return view('pagina::editar-shuffle')->with('contenido', $contenido);
 }

 public function editarblog($id){
  if(!$this->tenantName){
  $contenido = Bloguero::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Bloguero::find($id);
  }
  return View('pagina::editar-blog')->with('contenido', $contenido);
 }

 public function eliminarblog($id){
  if(!$this->tenantName){
  $contenido = Bloguero::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Bloguero::find($id);  
  }
  $contenido->delete();
  return Redirect('gestion/contenidos/blog')->with('status', 'ok_delete');
 }

 public function eliminarshufflemen($id){
  $contenido = Shuffleweb::find($id);
  $contenido->delete();
  $eliminar = DB::table('shuffle')->where('shuffle_id','=',$contenido->categoria)->delete();
		return Redirect('gestion/contenidos/shuffle-menu/'.$contenido->content_id)->with('status', 'ok_delete');
 }

 public function eliminarinput($id){
  if(!$this->tenantName){
  $contenido = Formu::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Formu::find($id);  
  }
  $contenido->delete();
  return Redirect('gestion/contenidos/camposformulario/'.$contenido->content_id)->with('status', 'ok_delete');
 }

 public function eliminarselector($id){
    if(!$this->tenantName){
  $contenido = Select::find($id);
}else{
   $contenido = \DigitalsiteSaaS\Pagina\Tenant\Select::find($id); 
}
  $contenido->delete();
  return Redirect('gestion/contenidos/selectores/'.$contenido->input_id)->with('status', 'ok_delete');
 }

 public function eliminarbanner($id){
  $contenido = Baner::find($id);
  $contenido->delete();
  return Redirect('gestion/contenidos/digitales/'.$contenido->page_id)->with('status', 'ok_delete');
 }

 public function eliminarshuffle($id){
  $contenido = Maxe::find($id);
  $contenido->delete();
  return Redirect('gestion/contenidos/subshuffle/'.$contenido->content_id)->with('status', 'ok_delete');
 }

 public function eliminarcollapse($id){
  if(!$this->tenantName){
  $contenido = Maxo::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Maxo::find($id);
  }
  $contenido->delete();
  return Redirect('gestion/contenidos/subcollapse/'.$contenido->content_id)->with('status', 'ok_delete');
 }

 public function eliminartab($id){
  if(!$this->tenantName){
  $contenido = Maxu::find($id);
  }else{$contenido = \DigitalsiteSaaS\Pagina\Tenant\Maxu::find($id);
  }
  $contenido->delete();
  return Redirect('gestion/contenidos/subtab/'.$contenido->content_id)->with('status', 'ok_delete');
 }

  public function eliminarempleo($id){
  if(!$this->tenantName){  
  $contenido = Empleo::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Empleo::find($id); 
  }
  $contenido->delete();
  return Redirect('gestion/contenidos/subempleo/'.$contenido->content_id)->with('status', 'ok_delete');
 }

 public function eliminargaleria($id){
  if(!$this->tenantName){
  $contenido = Img::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Img::find($id);
  }
  $contenido->delete();
  return Redirect('gestion/contenidos/imagenesgaleria/'.$contenido->content_id)->with('status', 'ok_delete');
 }

  public function eliminarcarousel($id){
  $contenido = Maxicar::find($id);
  $contenido->delete();
  return Redirect('gestion/contenidos/imagenescarousel/'.$contenido->content_id)->with('status', 'ok_delete');
 }

 public function eliminarcarouselimg($id){
  if(!$this->tenantName){
  $contenido = Carousel::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Carousel::find($id);
  }
  $contenido->delete();
  return Redirect('gestion/contenidos/imagenescarousel/'.$contenido->content_id)->with('status', 'ok_delete');
 }

 public function eliminarcontshuffle($id){
  $contenido = Maxe::find($id);
  $contenido->delete();
  return Redirect('gestion/contenidos/shuffle-crear/'.$contenido->shuffle_id)->with('status', 'ok_delete');
 }

  public function eliminarregistro($id){
  if(!$this->tenantName){
  $contenido = Messagema::find($id);
  $contenido->delete();
  }else{
   $contenido = \DigitalsiteSaaS\Pagina\Tenant\Messagema::find($id);
  $contenido->delete(); 
  }
  return Redirect('/consulta/formularios')->with('status', 'ok_delete');
 }


 public function show(){
  $roles = DB::table('pages')->orderBy('posti')->get();
  $rolesa = DB::table('pages')->orderBy('posta')->get();
  $datos = DB::table('datos')->where('id','=',1)->get();
  $datosa = DB::table('templa')->get();
  $plantilla = DB::table('template')->get();	
  $plantillaes = DB::table('template')->get();	
  return view('pagina::configurar')->with('roles', $roles)->with('rolesa', $rolesa)->with('plantilla', $plantilla)->with('plantillaes', $plantillaes)->with('datos', $datos)->with('datosa', $datosa);
 }

 public function imagenesgaleria($id){
  if(!$this->tenantName){
  $contenido = Img::where('content_id', '=' ,$id)->get();
  $contenida = Img::where('content_id', '=' ,$id)->get();
  $conteni = Content::find($id);
 }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Img::where('content_id', '=' ,$id)->get();
  $contenida = \DigitalsiteSaaS\Pagina\Tenant\Img::where('content_id', '=' ,$id)->get();
  $conteni = \DigitalsiteSaaS\Pagina\Tenant\Content::find($id);
 }
  return view('pagina::modulo-galeria')->with('contenido', $contenido)->with('contenida', $contenida)->with('amour', $contenido)->with('conteni', $conteni)->with('face', $contenido);
 }


public function imagenescarousel($id){
  if(!$this->tenantName){
  $contenido = Content::find($id)->Imagescar;
  $contenida = Content::find($id)->Imagescar;
  $conteni = Content::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Content::find($id)->Imagescar;
  $contenida = \DigitalsiteSaaS\Pagina\Tenant\Content::find($id)->Imagescar;
  $conteni = \DigitalsiteSaaS\Pagina\Tenant\Content::find($id);
  }
  return view('pagina::modulo-carousel')->with('contenido', $contenido)->with('contenida', $contenida)->with('amour', $contenido)->with('conteni', $conteni)->with('face', $contenido);
 }

 public function carouselimg($id){
  $contenido = DB::table('carousel_image')->where('content_id', '=', $id)->get();
  $conteo = DB::table('carousel_image')->where('content_id', '=', $id)->count();
  return view('pagina::modulo-carouselimg')->with('amour', $contenido)->with('conteo', $conteo);
 }


 public function shufflemenu($id){
  $categorias = DB::table('shuffleweb')->where('content_id','=',$id)->get();
  return view('pagina::modulo-shuffle')->with('categorias', $categorias);
 }

 public function shufflecrear($id){
  $contenido = Content::find($id);
  $contenida = Content::find($id);
  $conteni = Content::find($id);
  $categorias = DB::table('shuffle')->where('shuffle_id','=',$id)->get();
  return view('pagina::shuffle-crear')->with('categorias', $categorias)->with('contenido', $contenido)->with('contenida', $contenida)->with('amour', $contenido)->with('conteni', $conteni)->with('face', $contenido);;
 }

 public function camposformulario($id){
  if(!$this->tenantName){
  $contenido = Formu::where('content_id', '=', $id)->get();
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Formu::where('content_id', '=', $id)->get();
  }
  return view('pagina::modulo-formulario')->with('contenido', $contenido)->with('amour', $contenido)->with('face', $contenido);
 }

 public function subcollapse($id){
  if(!$this->tenantName){
  $contenido = Content::find($id)->Collapses;
  $contenida = Content::find($id)->Collapses;
  $conteni = Content::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Content::find($id)->Collapses;
  $contenida = \DigitalsiteSaaS\Pagina\Tenant\Content::find($id)->Collapses;
  $conteni = \DigitalsiteSaaS\Pagina\Tenant\Content::find($id);
  }
  return view('pagina::modulo-collapse')->with('contenido', $contenido)->with('contenida', $contenida)->with('amour', $contenido)->with('conteni', $conteni)->with('face', $contenido);
 }

  public function carouseledit($id){
  $contenido = Content::find($id)->Collapses;
  $contenida = Content::find($id)->Collapses;
  $conteni = Content::find($id);
  return view('pagina::modulo-carousel')->with('contenido', $contenido)->with('contenida', $contenida)->with('amour', $contenido)->with('conteni', $conteni)->with('face', $contenido);
 }

 public function subtab($id){
  if(!$this->tenantName){
  $contenido = Content::find($id)->Tabs;
  $contenida = Content::find($id)->Tabs;
  $conteni = Content::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Content::find($id)->Tabs;
  $contenida = \DigitalsiteSaaS\Pagina\Tenant\Content::find($id)->Tabs;
  $conteni = \DigitalsiteSaaS\Pagina\Tenant\Content::find($id);
  }
  return view('pagina::modulo-tabs')->with('contenido', $contenido)->with('contenida', $contenida)->with('amour', $contenido)->with('conteni', $conteni)->with('face', $contenido);
 }

  public function subempleo($id){
  if(!$this->tenantName){
  $contenido = Content::find($id)->Empleo;
  $contenida = Content::find($id)->Empleo;
  $conteni = Content::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Content::find($id)->Empleo;
  $contenida = \DigitalsiteSaaS\Pagina\Tenant\Content::find($id)->Empleo;
  $conteni = \DigitalsiteSaaS\Pagina\Tenant\Content::find($id);
  }
  return view('pagina::modulo-empleo')->with('contenido', $contenido)->with('contenida', $contenida)->with('amour', $contenido)->with('conteni', $conteni)->with('face', $contenido);
 }

 public function subshuffle($id){
  $contenido = Content::find($id)->Shuffles;
  $contenida = Content::find($id)->Shuffles;
  $conteni = Content::find($id);
  return view('pagina::modulo-shuffle')->with('contenido', $contenido)->with('contenida', $contenida)->with('amour', $contenido)->with('conteni', $conteni)->with('face', $contenido);
 }

 public function texto($id){
  $temp = DB::table('template')->where('id','=','1')->get();
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-texto')->with('posicion', $posicion)->with('temp', $temp);
 }

 public function boton($id){
  $temp = DB::table('template')->where('id','=','1')->get();
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-boton')->with('posicion', $posicion)->with('temp', $temp);
 }

 public function ficha($id){
  $temp = DB::table('template')->where('id','=','1')->get();
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-ficha')->with('posicion', $posicion)->with('temp', $temp);
 }

 public function fichan($id){
  $temp = DB::table('template')->where('id','=','1')->get();
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-fichan')->with('posicion', $posicion)->with('temp', $temp);
 }

 public function collapse($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-collapse')->with('posicion', $posicion);
 }

 public function listas($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-listas')->with('posicion', $posicion);
 }

 public function thumbail($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-thumbail')->with('posicion', $posicion);
 }

 public function parallax($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-parallax')->with('posicion', $posicion);
 }

 public function imagenes($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-imagen')->with('posicion', $posicion);
 }



 public function blog(){
  return view('pagina::contenidos/crear-blog');
 }

 public function jumbotron($id){
  if(!$this->tenantName){
  $formularios = Content::where('page_id','=',$id)->where('type','=','formulas')->get();
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  $producto = Producto::all();
  }else{
  $formularios = \DigitalsiteSaaS\Pagina\Tenant\Content::where('page_id','=',$id)->where('type','=','formulas')->get();
  $posicion = \DigitalsiteSaaS\Pagina\Tenant\Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  $producto = \DigitalsiteSaaS\Gestion\Tenant\Producto::all(); 
  }
  return view('pagina::contenidos/crear-jumbutron')->with('posicion', $posicion)->with('formularios', $formularios)->with('producto', $producto);
 }

 public function mapa($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-mapa')->with('posicion', $posicion);
 }

 public function mailing($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-mailing')->with('posicion', $posicion);
 }

 public function mediaobject($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-media-object')->with('posicion', $posicion);
 }

 public function subservicios($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-subservicios')->with('posicion', $posicion);
 }

 public function clientes($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-clientes')->with('posicion', $posicion);
 }

 public function titulo($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-titulo')->with('posicion', $posicion);
 }

 public function shuffleweb($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-Shufflesub')->with('posicion', $posicion);
 }

 public function hover($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-hover')->with('posicion', $posicion);
 }

 public function video($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-video')->with('posicion', $posicion);
 }

 public function responsive($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-responsive')->with('posicion', $posicion);
 }

 public function collapsum($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-collapsum')->with('posicion', $posicion);
 }

 public function modal($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-modal')->with('posicion', $posicion);
 }

 public function galeria($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-galeria')->with('posicion', $posicion);
 }

 public function busqueda($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-busqueda')->with('posicion', $posicion);
 }

 public function filtroevento($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-filtroevento')->with('posicion', $posicion);
 }	

 public function tab($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-tabas')->with('posicion', $posicion);
 }

 public function shuffle($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-shuffle')->with('posicion', $posicion);
 }

 public function imagen($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-imagenes')->with('posicion', $posicion);
 }	

  public function imagencarou($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-imagenescarou')->with('posicion', $posicion);
 }  

  public function imagencarouslide($id){

  if(!$this->tenantName){
  $identificador = Content::where('id', '=', $id)->get();
  }else{
  $identificador = \DigitalsiteSaaS\Pagina\Tenant\Content::where('id', '=', $id)->get();
  }

  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-imagenescarouslide')->with('posicion', $posicion)->with('identificador', $identificador);
 }  

 public function formu($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-formu')->with('posicion', $posicion);
 }	

 public function menus($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-menu')->with('posicion', $posicion);
 }	

 public function baner($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
    if(!$this->tenantName){
    $plan = 0;
   }{
   $hostname = app(\Hyn\Tenancy\Environment::class)->hostname();
        if ($hostname){
            $plan = $hostname->plan_id;
          
        }
    }
  return view('pagina::contenidos/crear-baner')->with('posicion', $posicion)->with('plan', $plan);
 }	

 public function collapsable($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-collapsable')->with('posicion', $posicion);
 }		

 public function subtabs($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-subtabs')->with('posicion', $posicion);
 }

  public function subempleos($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-subempleos')->with('posicion', $posicion);
 }	

 public function subshuffleweb($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-subshuffle')->with('posicion', $posicion);
 }	

 public function formulario($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-formulario')->with('posicion', $posicion);
 }

 public function formulas($id){
 if(!$this->tenantName){
  $formularios = Content::where('page_id','=',$id)->where('type','=','formulas')->get();
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  $producto = Producto::all();
  }else{
  $formularios = \DigitalsiteSaaS\Pagina\Tenant\Content::where('page_id','=',$id)->where('type','=','formulas')->get();
  $posicion = \DigitalsiteSaaS\Pagina\Tenant\Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  $producto = \DigitalsiteSaaS\Gestion\Tenant\Producto::all(); 
  }
if(!$this->tenantName){
    $plan = 0;
   }{
   $hostname = app(\Hyn\Tenancy\Environment::class)->hostname();
        if ($hostname){
            $plan = $hostname->plan_id;
          
        }
    }
  return view('pagina::contenidos/crear-formulas')->with('posicion', $posicion)->with('formularios', $formularios)->with('producto', $producto)->with('plan', $plan);
 }


 public function productos($id){
    if(!$this->tenantName){
      $categoria = Categoria::all();
      $category = Category::all();
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
    $plan = 0;
   }else{
  $categoria = \DigitalsiteSaaS\Carrito\Tenant\Categoria::all();
  $category = \DigitalsiteSaaS\Carrito\Tenant\Category::all();
  $posicion = \DigitalsiteSaaS\Pagina\Tenant\Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
   $hostname = app(\Hyn\Tenancy\Environment::class)->hostname();
        if ($hostname){
            $plan = $hostname->plan_id;
          
        }
    }
  return view('pagina::contenidos/crear-productos')->with('posicion', $posicion)->with('plan', $plan)->with('categoria', $categoria)->with('category', $category);
 }

 public function filtros($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
   if(!$this->tenantName){
    $plan = 0;
   }{
   $hostname = app(\Hyn\Tenancy\Environment::class)->hostname();
        if ($hostname){
            $plan = $hostname->plan_id;
          
        }
    }
  return view('pagina::contenidos/crear-filtros')->with('posicion', $posicion)->with('plan', $plan);
 }

 public function filtrosdinami($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-filtrosdinami')->with('posicion', $posicion);
 }

 public function rondaproductos($id){
  if(!$this->tenantName){
  $categoria = Categoria::all();
  $category =  Category::all();
  }else{
  $categoria = \DigitalsiteSaaS\Carrito\Tenant\Categoria::all();
  $category = \DigitalsiteSaaS\Carrito\Tenant\Category::all();
  }
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-ronda')->with('posicion', $posicion)->with('categoria', $categoria)->with('category', $category);
 }

  public function empresas($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-empresa')->with('posicion', $posicion);
 }


  public function carousel($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-carousel')->with('posicion', $posicion);
 }




 public function videoclips($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-videoclip')->with('posicion', $posicion);
 }

 public function documento($id){
  $roles = DB::table('roles_comunidad')->get();
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-documento')->with('posicion', $posicion)->with('roles', $roles);
 }

 public function vimeoback($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-vimeoback')->with('posicion', $posicion);
 }

 public function eventos($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-eventos')->with('posicion', $posicion);
 }

 public function calendario($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-calendario')->with('posicion', $posicion);
 }

 public function totaleventos($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-totaleventos')->with('posicion', $posicion);
 }

 public function planes($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-plan')->with('posicion', $posicion);
 }

 public function empleos($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
   if(!$this->tenantName){
    $plan = 0;
   }{
   $hostname = app(\Hyn\Tenancy\Environment::class)->hostname();
        if ($hostname){
            $plan = $hostname->plan_id;
          
        }
    }
  return view('pagina::contenidos/crear-empleo')->with('posicion', $posicion)->with('plan', $plan);
 }

 public function backimage($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-backimage')->with('posicion', $posicion);
 }

 public function cuenta($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-cuenta')->with('posicion', $posicion);
 }

 public function mediamini($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-mediamini')->with('posicion', $posicion);
 }	

 public function galeriavideo($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-galeriavideo')->with('posicion', $posicion);
 }

 public function imgaleriavideo($id){
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-imgaleriavideo')->with('posicion', $posicion);
 }

 public function imgshuffleweb($id){
  $categoria = DB::table('shuffleweb')->get();
  $posicion = Conte::Orderby('id', 'asc')->take(10)->pluck('posicion','posicion');
  return view('pagina::contenidos/crear-imagenshuffle')->with('posicion', $posicion)->with('categoria', $categoria);
 }

 public function verregistro($id){
 if(!$this->tenantName){
 $mensaje = Content::leftJoin('mesagema','contents.id','=','mesagema.form_id')
 ->where('mesagema.id','=',$id)
 ->get();
 
 $inputs = Inputweb::all();

 $user = Messagema::where('id',$id)
          ->update(['estado' => 1]);
}else{

   $mensaje = \DigitalsiteSaaS\Pagina\Tenant\Content::leftJoin('mesagema','contents.id','=','mesagema.form_id')
 ->where('mesagema.id','=',$id)
 ->get();
 
 $inputs = \DigitalsiteSaaS\Pagina\Tenant\Inputweb::all();

 $user = \DigitalsiteSaaS\Pagina\Tenant\Messagema::where('id',$id)
          ->update(['estado' => 1]);

}
  return view('pagina::registros')->with('mensaje', $mensaje)->with('inputs', $inputs);
 }



}

