<?php

 namespace DigitalsiteSaaS\Pagina\Http;
 use DigitalsiteSaaS\Pagina\Page;
 use DigitalsiteSaaS\Pagina\Fichaje;
 use DigitalsiteSaaS\Pagina\Template;
 use DigitalsiteSaaS\Pagina\Estadistica;
 use DigitalsiteSaaS\Pagina\Maxo;
 use DigitalsiteSaaS\Pagina\Maxu;
 use DigitalsiteSaaS\Pagina\Maxe;
 use DigitalsiteSaaS\Pagina\Maxi;
 use DigitalsiteSaaS\Pagina\Muxu;
 use DigitalsiteSaaS\Pagina\Message;
 use DigitalsiteSaaS\Pagina\Messagema;
 use DigitalsiteSaaS\Pagina\Image;
 use DigitalsiteSaaS\Usuario\Usuario;
 use DigitalsiteSaaS\Pagina\Bloguero;
 use DigitalsiteSaaS\Pagina\Select;
 use DigitalsiteSaaS\Pagina\Zippera;
 use DigitalsiteSaaS\Pagina\Registrow;
 use DigitalsiteSaaS\Pagina\Product;
 use DigitalsiteSaaS\Pagina\OrderItem;
 use DigitalsiteSaaS\Pagina\Carousel;
 use DigitalsiteSaaS\Pagina\Empleo;
 use DigitalsiteSaaS\Pagina\Pais;
 use DigitalsiteSaaS\Pagina\Content;
 use DigitalsiteSaaS\Pagina\Ips;
 use DigitalsiteSaaS\Pagina\Diagrama;
 use DigitalsiteSaaS\Pagina\Formu;
 use DigitalsiteSaaS\Pagina\Seo;
 use DigitalsiteSaaS\Pagina\User;
 use DigitalsiteSaaS\Pagina\Planes;
 use DigitalsiteSaaS\Pagina\Whatsapp;
 use DigitalsiteSaaS\Pagina\Promocion;
 use DigitalsiteSaaS\Pagina\Departamentocon;
 use DigitalsiteSaaS\Pagina\Municipio;
 use DigitalsiteSaaS\Pagina\Categoria;
 use Mail;
 use DB;
 use Hash;
 use File;
 use Zipper;
 use Redirect;
 use App\Http\Controllers\Controller;
 use App\Http\Requests\FicusuarioCreateRequest;
 use Input;
 use Illuminate\Support\Str;
 use Illuminate\Http\Request;
 use App\Mail\Mensaje;
 use App\Mail\Mensajeficha;
 use App\Mail\Registro;
 use App\Mail\Mensajema;
 use App\Mail\SendMailable;
 use Validator;
 use Response;
 use DigitalsiteSaaS\Avanza\Avanzaempresa;
 use App\Http\Requests\FormularioFormRequest;
 use Auth;
 use Carbon\Carbon;
 use Hyn\Tenancy\Models\Hostname;
 use Hyn\Tenancy\Models\Website;
 use Hyn\Tenancy\Repositories\HostnameRepository;
 use Hyn\Tenancy\Repositories\WebsiteRepository;
 use GuzzleHttp\Client;
 use DigitalsiteSaaS\Elearning\Cursos;
 use App\Http\ConnectionsHelper;
 use URL;


class WebController extends Controller {

 protected $tenantName = null;

 public function __construct()
 {
  $this->middleware('web');
  $hostname = app(\Hyn\Tenancy\Environment::class)->hostname();
  if ($hostname){
   $fqdn = $hostname->fqdn;
   $this->tenantName = explode(".", $fqdn)[0];
   }
  }
  

private function total(){
 $cart = session()->get('cart');
 $total = 0;
 if($cart == null){}
 else{
 foreach ($cart as $item) {
 $total += $item->precioinivafin * $item->quantity;
 }}
 return $total;
}

private function subtotal(){
 $cart = session()->get('cart');
 $subtotal = 0;
 if($cart == null){}
 else{
 foreach($cart as $item){
  $subtotal += $item->preciodescfin * $item->quantity;
 }}
 return $subtotal;
}

  

public function index(){



$avanzacat = Page::where('categoria', '=', 1)->get();
$whatsapp = Whatsapp::all();
$planessaas = Planes::all();
$departamentos = Departamentocon::all();
$municipios = Municipio::all();

if(!$this->tenantName){
$cursos = Cursos::all();
   $users = DB::table('pages')->where('posti', '1')->get();
  
    foreach ($users as $user){
    $contenido = Content::where('page_id',"=",$user->id)
    ->orderBy('nivel','ASC')
    ->get();
    $mediamini = Content::where('page_id',"=",$user->id)
    ->orderBy('nivel','ASC')
    ->get();
    $contenidos = Content::where('page_id',"=",$user->id)
    ->orderBy('nivel','ASC')
    ->get();
     $seo = Seo::where('id','=',1)->get(); 
     $menu = Page::whereNull('page_id')->orderBy('posta', 'asc')->get();
     $menufoot = Page::orderBy('posta', 'asc')->get();
     $meta = Page::where('id','=',$user->id)->get();
     $plantilla = Template::all();
     $paginations = Page::find($user->id)->Blogs()->paginate(9);
     $scroll = Template::where('id',1)->value('scroll');
     $temp = Template::where('id',1)->value('template');

     $temawebs = Template::where('id','=','1')->get();
     foreach($temawebs as $temaweb){
      if($scroll == 1){
      $contenido = Content::orderBy('nivel','ASC')->get();
      $contenido = Content::all();
      $diagramas = Diagrama::all();
      $formulario = Formu::join('contents','inputs.content_id','=','contents.id')
      ->select('inputs.*', 'inputs.id')
      ->orderBy('id','ASC')
      ->get();
      }else{
      $formulario = Formu::join('contents','inputs.content_id','=','contents.id')
      ->select('inputs.*', 'inputs.id')
      ->orderBy('id','ASC')
      ->where('contents.page_id', '=' ,$user->id)->get();
      $diagramas = Diagrama::where('id', "=", $user->id)->get();
      }
     }


    
     $eventos = DB::table('events')->orderBy('start_old', 'desc')->get();
     $start =  session()->get('start') ? session()->get('start') : 0;
     $end = session()->get('end') ? session()->get('end') : 100000000000000;
     $tipo = session()->get('tipo');
     $totaleventos = DB::table('events')
    ->whereBetween('start_old', array($start, $end))
    ->where('class', 'like', '%' . $tipo . '%')
    ->get();

     $stock = DB::table('products')
      //->leftJoin('order_items', 'order_items.product_id', '=', 'products.id')
      //->select(DB::raw('SUM(quantity) as cantidad'),DB::raw('(products.id) as product'),DB::raw('(product_id) as productse'))
      //->groupBy('products.id')
      ->get();
      $terminos = \DigitalsiteSaaS\Pagina\Template::all();
      $categories = Pais::all();
      $banners = Page::find($user->id)->Banners()->orderByRaw("RAND()")->take(1)->get();
      $bannersback = Page::find($user->id)->Banners()->orderByRaw("RAND()")->take(1)->get();
      $fichones = Page::find($user->id)->Fichas()->orderBy(DB::raw('RAND()'))->paginate(6);
      $empresas = Avanzaempresa::orderBy(DB::raw('RAND()'))->paginate(6);
      $contenidona = Maxo::join('contents','contents.id','=','collapse.content_id')
    ->orderBy('position','ASC')
    ->where('contents.page_id', '=' ,$user->id)->get();
   $contenidonu = Maxu::join('contents','contents.id','=','tabs.content_id')
    ->orderBy('position','ASC')
    ->where('contents.page_id', '=' ,$user->id)->get();
   $contenidonumas =  Fichaje::where('responsive', $user->id)->Orwhere('page_id', $user->id)->orderBy(DB::raw('RAND()'))->paginate(6, ['*'], 'contenidonumas');
   
     $contenida = Maxi::join('images','images.content_id','=','contents.id')

    ->where('contents.page_id', '=' ,$user->id)->get();
    
     $cart = session()->get('cart');
     $min_price = Input::has('min_price') ? Input::get('min_price') : 0;
     $max_price = Input::has('max_price') ? Input::get('max_price') : 10000000;
     $clientes =  session()->get('clientes');
     $areafil = session()->get('areafil');
     $bustext = session()->get('bustext');
     $parametrofil = session()->get('parametro');
     $autorfil = session()->get('autor');
     $subcategoriafil = session()->get('subcategoria');
      $products = Product::whereBetween('precio', array($min_price, $max_price))
      ->where('category_id', 'like', '%' . $clientes . '%')
     /* ->where('parametro_id', 'like', '%' . $parametrofil . '%') */
      ->where('autor_id', 'like', '%' . $autorfil . '%')
      ->where('categoriapro_id', 'like', '%' . $subcategoriafil . '%')
      ->where('name','like','%'.$bustext.'%')->Where('description','like','%'.$bustext.'%')
      ->where('visible','=','1')
      ->orderByRaw("RAND()")
      ->paginate(16);
      //dd($products);
   $total = $this->total();
   $subtotal = $this->subtotal();
   $carousel = DB::table('contents')
   ->join('carousel','contents.id','=','carousel.content_id')
   ->get();
   $carouselimg = Carousel::all();
   $filtros = DB::table('categoriessd')->get();
   $subcategoria = Categoria::all();;
   $parametro = DB::table('parametro')->get();
   $autor = DB::table('autor')->get();
   $area = DB::table('areas')->get();
    $selectores = Select::all();
   $eventodig = DB::table('tipo_evento')->get();  
   $promos = Promocion::all();  
   $venta = DB::table('venta')->get();  
   $colors = DB::table('colors')->get();  
   $arr_ip = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
     //dd($arr_ip);
     $ip = $arr_ip['ip'];

     $ciudad = $arr_ip['city'];
        
     $pais = $arr_ip['country'];
     $blogfoot = Content::where('type','=','blog')->inRandomOrder()->take(6)->get();
     $blogger = Content::where('type','=','blog')->inRandomOrder()->take(3)->get();
     $empleos = Empleo::join('contents','contents.id','=','empleos.content_id')
    ->orderBy('position','ASC')
    ->where('contents.page_id', '=' ,$user->id)
    ->get();

   return view('Templates.'.$temp.'.desing')->with('contenido', $contenidos)->with('contenidona', $contenidona)->with('contenidonu', $contenidonu)->with('contenidonus', $contenidonu)->with('menu', $menu)->with('menufoot', $menufoot)->with('galeria', $contenida)->with('mascar', $contenido)->with('pasto', $contenido)->with('casual', $contenido)->with('contenidu', $contenido)->with('whatsapp', $whatsapp)->with('plantilla', $plantilla)->with('meta', $meta)->with('paginations', $paginations)->with('fichones', $fichones)->with('contenidonumas', $contenidonumas)->with('banners', $banners)->with('bannersback', $bannersback)->with('selectores', $selectores)->with('cart', $cart)->with('products', $products)->with('total', $total)->with('subtotal', $subtotal)->with('diagramas', $diagramas)->with('subcategoria', $subcategoria)->with('autor', $autor)->with('parametro', $parametro)->with('area', $area)->with('stock', $stock)->with('filtros', $filtros)->with('eventodig', $eventodig)->with('eventos', $eventos)->with('totaleventos', $totaleventos)->with('colors', $colors)->with('ip', $ip)->with('ciudad', $ciudad)->with('pais', $pais)->with('carousel', $carousel)->with('carouselimg', $carouselimg)->with('blogfoot', $blogfoot)->with('empleos', $empleos)->with('terminos', $terminos)->with('categories', $categories)->with('planessaas', $planessaas)->with('formulario', $formulario)->with('seo', $seo)->with('avanzacat', $avanzacat)->with('mediamini', $mediamini)->with('empresas', $empresas)->with('cursos', $cursos)->with('promos', $promos)->with('departamentos',$departamentos)->with('municipios', $municipios)->with('blogger', $blogger);
     }}

     $hostname = app(\Hyn\Tenancy\Environment::class)->hostname();
  $infosaas = DB::table('tenancy.hostnames')
  ->join('tenancy.websites','websites.id','=','hostnames.website_id')
  ->where('hostnames.fqdn',  $hostname->fqdn)
  ->get();
  foreach ($infosaas as $infosaasweb) {
  $mihost =  ($infosaasweb->uuid.'.');
  $website = DB::table($mihost.'users')->get();
  $dias = date('Y-m-d');
  if($dias <=  $infosaasweb->presentacion){
  $resp = 'true';
  }else{
  $resp = 'false'; 
  }
}
     $users = DB::table('pages')->where('posti', '1')->get();
    
  foreach ($users as $user){
     $departamentos = \DigitalsiteSaaS\Pagina\Tenant\Departamentocon::all();
     $municipios = \DigitalsiteSaaS\Pagina\Tenant\Municipio::all();
     $cama = \DigitalsiteSaaS\Pagina\Tenant\Page::find($user->id);
     $menu = \DigitalsiteSaaS\Pagina\Tenant\Page::whereNull('page_id')->orderBy('posta', 'asc')->get();
     $menufoot = \DigitalsiteSaaS\Pagina\Tenant\Page::orderBy('posta', 'asc')->get();
     $meta = \DigitalsiteSaaS\Pagina\Tenant\Page::where('id','=',$user->id)->get();
     $plantilla = \DigitalsiteSaaS\Pagina\Tenant\Template::all();
    
     $plantillaes = \DigitalsiteSaaS\Pagina\Tenant\Template::all();
     $whatsapp = \DigitalsiteSaaS\Pagina\Tenant\Whatsapp::all();
     $paginations = \DigitalsiteSaaS\Pagina\Tenant\Page::find($user->id)->Blogs()->paginate(9);
     $diagramas = \DigitalsiteSaaS\Pagina\Tenant\Diagrama::where('id', "=", $user->id)->get();
     $temawebs = \DigitalsiteSaaS\Pagina\Tenant\Template::where('id','=','1')->get();
     foreach($temawebs as $temaweb){
      $contenido = \DigitalsiteSaaS\Pagina\Tenant\Content::where('page_id',"=",$user->id)
      /*->where('template',"=",$temaweb->template)*/
      ->orderBy('nivel','ASC')
      ->get();
      $mediamini = \DigitalsiteSaaS\Pagina\Tenant\Content::where('page_id',"=",$user->id)
    ->orderBy('nivel','ASC')
    ->get();
     }
    
      $planessaas = \DigitalsiteSaaS\Pagina\Tenant\Planes::all();
      $emails = ['myoneemail@esomething.com','myother@esomething.com','myother2@esomething.com'];
      

      $cada = \DigitalsiteSaaS\Pagina\Tenant\Content::where('type','=', 'formulas')->get();

 $for = ['darioma07@hotmail.com','darioma07@gmail.com','darioe.martinez.z@gmail.com'];


      foreach($cada as $cada){
          $casa = explode(",",$cada->video);
        
 
      }



       $avanzacat = \DigitalsiteSaaS\Pagina\Tenant\Page::where('categoria', '=', 1)->get(); 
     $productsa = \DigitalsiteSaaS\Pagina\Tenant\Product::inRandomOrder()->get();
     $eventos = DB::table('events')->orderBy('start_old', 'desc')->get();
     $start =  session()->get('start') ? session()->get('start') : 0;
   $end = session()->get('end') ? session()->get('end') : 100000000000000;
   $tipo = session()->get('tipo');
   $totaleventos = DB::table('events')
    ->whereBetween('start_old', array($start, $end))
    ->where('class', 'like', '%' . $tipo . '%')
    ->get();
   $productse = \DigitalsiteSaaS\Pagina\Tenant\Product::inRandomOrder()->get();
     $stock = DB::table('products')
      //->leftJoin('order_items', 'order_items.product_id', '=', 'products.id')
      //->select(DB::raw('SUM(quantity) as cantidad'),DB::raw('(products.id) as product'),DB::raw('(product_id) as productse'))
      //->groupBy('products.id')
      ->get();
      $terminos = \DigitalsiteSaaS\Pagina\Template::all();
    $categories = \DigitalsiteSaaS\Pagina\Tenant\Pais::all();
     $banners = \DigitalsiteSaaS\Pagina\Tenant\Page::find($user->id)->Banners()->orderByRaw("RAND()")->take(1)->get();
     $bannersback = \DigitalsiteSaaS\Pagina\Tenant\Page::find($user->id)->Banners()->orderByRaw("RAND()")->take(1)->get();
     $fichones = \DigitalsiteSaaS\Pagina\Tenant\Page::find($user->id)->Fichas()->orderBy(DB::raw('RAND()'))->paginate(6, ['*'], 'fichones');
     $empresas = \DigitalsiteSaaS\Avanza\Tenant\Avanzaempresa::orderBy(DB::raw('RAND()'))->paginate(6);
     $contenidona = \DigitalsiteSaaS\Pagina\Tenant\Maxo::join('contents','contents.id','=','collapse.content_id')
    ->orderBy('position','ASC')
    ->where('contents.page_id', '=' ,$user->id)->get();
   $contenidonu = \DigitalsiteSaaS\Pagina\Tenant\Maxu::join('contents','contents.id','=','tabs.content_id')
    ->orderBy('position','ASC')
    ->where('contents.page_id', '=' ,$user->id)->get();
   $contenidonumas =  \DigitalsiteSaaS\Pagina\Tenant\Fichaje::where('responsive', $user->id)->Orwhere('page_id', $user->id)->orderBy(DB::raw('RAND()'))->paginate(6, ['*'], 'contenidonumas');  

 $scroll = \DigitalsiteSaaS\Pagina\Tenant\Template::where('id',1)->value('scroll');
     $temp = \DigitalsiteSaaS\Pagina\Tenant\Template::where('id',1)->value('template');
     foreach($temawebs as $temaweb){
       if($scroll == 1){
      $contenido = \DigitalsiteSaaS\Pagina\Tenant\Content::orderBy('nivel','ASC')->get();
      $diagramas = \DigitalsiteSaaS\Pagina\Tenant\Diagrama::all();
      
      }else{
        $contenido = \DigitalsiteSaaS\Pagina\Tenant\Content::where('page_id',"=",$user->id)
      /*->where('template',"=",$temaweb->template)*/
      ->orderBy('nivel','ASC')
      ->get();
       
      $diagramas = \DigitalsiteSaaS\Pagina\Tenant\Diagrama::where('id', "=", $user->id)->get();
    }
     }

     $cursos = \DigitalsiteSaaS\Elearning\Tenant\Cursos::all();
     $contenida = \DigitalsiteSaaS\Pagina\Tenant\Maxi::join('images','images.content_id','=','contents.id')
    ->orderBy('position','ASC')
    ->where('contents.page_id', '=' ,$user->id)->get();
     $formulario = \DigitalsiteSaaS\Pagina\Tenant\Formu::join('contents','inputs.content_id','=','contents.id')
    ->select('inputs.*', 'inputs.id')
    ->orderBy('id','ASC')
    ->where('contents.page_id', '=' ,$user->id)->get();
     $cart = session()->get('cart');
     $min_price = session()->get('min_price');
     $max_price = session()->get('max_price');
     $clientes = session()->get('clientes');
     $bustext = session()->get('bustext');
     $areafil = session()->get('area');
     $parametrofil = session()->get('parametro');
     $autorfil = session()->get('autor');
     $subcategoriafil = session()->get('subcategoria');
     if($min_price == null){
     $products = \DigitalsiteSaaS\Pagina\Tenant\Product::
     paginate(1000);
     }else{
     $products =  \DigitalsiteSaaS\Pagina\Tenant\Product::leftjoin('contents','products.categoriapro_id','=','contents.contents')
     ->whereBetween('precio', array($min_price, $max_price))
      ->where('category_id', 'like', '%' . session()->get('categoria') . '%')
      /* ->where('parametro_id', 'like', '%' . $parametrofil . '%') */
      ->where('autor_id', 'like', '%' . session()->get('autor') . '%')
      ->where('categoriapro_id', 'like', '%' . session()->get('categoria') . '%')
      ->where('name','like','%' . session()->get('palabra').'%')
      ->Where('products.description','like','%' . session()->get('palabra').'%')
      ->where('visible','=','1')
      ->orderByRaw("RAND()")
      ->paginate(16);
    }
      //dd($products);
   $total = $this->total();
   $subtotal = $this->subtotal();
   $carousel = DB::table('contents')
   ->join('carousel','contents.id','=','carousel.content_id')
   ->get();
   $carouselimg = \DigitalsiteSaaS\Pagina\Tenant\Carousel::all();
   $filtros = DB::table('categoriessd')->get();
   $subcategoria = \DigitalsiteSaaS\Pagina\Tenant\Categoria::all();
   $parametro = \DigitalsiteSaaS\Carrito\Tenant\Parametro::all();
   $autor = DB::table('autor')->get();
   $area = DB::table('areas')->get();
    $selectores = \DigitalsiteSaaS\Pagina\Tenant\Select::all();
   $eventodig = DB::table('tipo_evento')->get();  
   $venta = DB::table('venta')->get();  
   $colors = DB::table('colors')->get();  
   $arr_ip = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
     //dd($arr_ip);
     $ip = $arr_ip['ip'];

     $ciudad = $arr_ip['city'];
        
     $pais = $arr_ip['country'];
     $blogfoot = \DigitalsiteSaaS\Pagina\Tenant\Content::where('type','=','blog')->inRandomOrder()->take(6)->get();
     $blogger = \DigitalsiteSaaS\Pagina\Tenant\Content::where('type','=','blog')->inRandomOrder()->take(3)->get();
     $empleos = Empleo::join('contents','contents.id','=','empleos.content_id')
    ->orderBy('position','ASC')
    ->where('contents.page_id', '=' ,$user->id)
    ->get();
    $temp = \DigitalsiteSaaS\Pagina\Tenant\Template::where('id',1)->value('template');
 $seo =  \DigitalsiteSaaS\Pagina\Tenant\Seo::where('id','=',1)->get();     

if($scroll == 1){
      $formulario = \DigitalsiteSaaS\Pagina\Tenant\Formu::join('contents','inputs.content_id','=','contents.id')
    ->select('inputs.*', 'inputs.id')
    ->orderBy('id','ASC')
   ->get();
    }else{
      $formulario = \DigitalsiteSaaS\Pagina\Tenant\Formu::join('contents','inputs.content_id','=','contents.id')
    ->select('inputs.*', 'inputs.id')
    ->orderBy('id','ASC')
    ->where('contents.page_id', '=' ,$user->id)->get();
    }

    $promos = \DigitalsiteSaaS\Avanza\Tenant\Promocion::all();  
 
    if($resp == 'true'){
   return view('Templates.'.$temp.'.desing')->with('contenido', $contenido)->with('contenidona', $contenidona)->with('contenidonu', $contenidonu)->with('contenidonus', $contenidonu)->with('menu', $menu)->with('menufoot', $menufoot)->with('galeria', $contenida)->with('mascar', $contenido)->with('pasto', $contenido)->with('casual', $contenido)->with('contenidu', $contenido)->with('plantilla', $plantilla)->with('plantillaes', $plantillaes)->with('whatsapp', $whatsapp)->with('meta', $meta)->with('paginations', $paginations)->with('fichones', $fichones)->with('contenidonumas', $contenidonumas)->with('cama', $cama)->with('banners', $banners)->with('bannersback', $bannersback)->with('selectores', $selectores)->with('cart', $cart)->with('products', $products)->with('productsa', $productsa)->with('productse', $productse)->with('total', $total)->with('subtotal', $subtotal)->with('diagramas', $diagramas)->with('subcategoria', $subcategoria)->with('autor', $autor)->with('parametro', $parametro)->with('area', $area)->with('stock', $stock)->with('filtros', $filtros)->with('eventodig', $eventodig)->with('eventos', $eventos)->with('totaleventos', $totaleventos)->with('colors', $colors)->with('ip', $ip)->with('ciudad', $ciudad)->with('pais', $pais)->with('carousel', $carousel)->with('carouselimg', $carouselimg)->with('blogfoot', $blogfoot)->with('empleos', $empleos)->with('terminos', $terminos)->with('categories', $categories)->with('formulario', $formulario)->with('seo', $seo)->with('avanzacat', $avanzacat)->with('planessaas', $planessaas)->with('mediamini', $mediamini)->with('empresas', $empresas)->with('cursos', $cursos)->with('promos', $promos)->with('municipios',$municipios)->with('departamentos',$departamentos)->with('blogger', $blogger);
    }else{
      dd('No ha pagado');
     }
    }

    }

    public function paginas($page){

    $departamentos = Departamentocon::all();
     $municipios = Municipio::all();
      $cursos = Cursos::all();
   $avanzacat = Page::where('categoria', '=', 1)->get(); 
    $planessaas = Planes::all();
   if(!$this->tenantName){
     $plantilla = Template::all();
   $plantillaes = Template::all();
   $whatsapp = Whatsapp::all();
   $promos = Promocion::all();  
   $menu = Page::whereNull('page_id')->orderBy('posta', 'asc')->get();
   foreach ($menu as $menus) {
    $menusa = $menus->slug;

    if(strcmp($menusa, $page) == 0)
 
    return response()->view('errors.404', [], 404);
     }
     $post = Page::where('slug','=',$menusa)->first();
     $meta = Page::where('slug','=',$menusa)->get();
     $metas = Page::where('slug','like', $menusa)->count(); 
   
   
   $menufoot = Page::orderBy('posta', 'asc')->get();
   $masa = DB::table('pages')->count('page_id');
   $cama = Page::find($post->id);

   $seo =  Seo::where('id','=',1)->get();  
   $filtros = DB::table('categoriessd')->get();
   $productsa = Product::inRandomOrder()->get();

   $stock = DB::table('products')
      //->leftJoin('order_items', 'order_items.product_id', '=', 'products.id')
      //->select(DB::raw('SUM(quantity) as cantidad'),DB::raw('(products.id) as product'),DB::raw('(product_id) as productse'))
      //->groupBy('products.id')
      ->get();
    

   $diagramas = Diagrama::where('id',"=",$post->id)->get();
   $fichones = Page::find($post->id)->Fichas()->orderBy(DB::raw('RAND()'))->paginate(6, ['*'], 'fichones');
   $empresas = Avanzaempresa::orderBy(DB::raw('RAND()'))->paginate(6);
   
   $contenidos = Content::where('page_id',"=",$post->id)
      /*->where('template',"=",$temaweb->template)*/
      ->orderBy('nivel','ASC')
      ->get();
     $contenido = Content::where('page_id',"=",$post->id)
    ->orderBy('nivel','ASC')
    ->get();
    $mediamini = Content::where('page_id',"=",$post->id)
    ->orderBy('nivel','ASC')
    ->get();
   $banners = Page::find($post->id)->Banners()->orderByRaw("RAND()")->take(1)->get();
  $terminos = \DigitalsiteSaaS\Pagina\Template::all();
$categories = Pais::all();
   $bannersback = Page::find($post->id)->Banners()->orderByRaw("RAND()")->take(1)->get();
   $contenidona = Maxo::join('contents','contents.id','=','collapse.content_id')
    ->orderBy('position','ASC')
    ->where('contents.page_id', '=' ,$post->id)->get();
     $contenidonu = Maxu::join('contents','contents.id','=','tabs.content_id')
    ->orderBy('position','ASC')
    ->where('contents.page_id', '=' ,$post->id)
    ->get();

    $formulario = Formu::join('contents','inputs.content_id','=','contents.id')
    ->select('inputs.*', 'inputs.id')
    ->orderBy('id','ASC')
    ->where('contents.page_id', '=' ,$post->id)->get();

    $empleos = Empleo::join('contents','contents.id','=','empleos.content_id')
    ->orderBy('position','ASC')
    ->where('contents.page_id', '=' ,$post->id)
    ->get();
   $contenidonumas = Fichaje::where('responsive', $post->id)->Orwhere('page_id', $post->id)->orderBy(DB::raw('RAND()'))->paginate(6, ['*'], 'contenidonumas');
   
     $paginations = Page::find($post->id)->Blogs()->paginate(9);
   $contenida =Maxi::join('images','images.content_id','=','contents.id')
    ->orderBy('position','ASC')
    ->where('contents.page_id', '=' ,$post->id)->get();
    
     $eventos = DB::table('events')->where('start_old', '>', date('m/d/Y'))->orderBy('start_old', 'asc')->take(3)->get();
     $start =  session()->get('start') ? session()->get('start') : 0;
   $end = session()->get('end') ? session()->get('end') : 100000000000000;
   $tipo = session()->get('tipo');
   $totaleventos = DB::table('events')
    ->whereBetween('start_old', array($start, $end))
    ->where('class', 'like', '%' . $tipo . '%')
    ->get();
     $cart = session()->get('cart');
     $min_price = Input::has('min_price') ? Input::get('min_price') : 0;
     $max_price = Input::has('max_price') ? Input::get('max_price') : 10000000;
     $clientes =  session()->get('clientes');
     $bustext =  session()->get('bustext');
     $areafil = session()->get('area');
     $parametrofil = session()->get('parametro');
     $subcategoriafil = session()->get('subcategoria');
      $products =  Product::leftjoin('contents','products.categoriapro_id','=','contents.contents')
     ->whereBetween('precio', array($min_price, $max_price))
      ->where('category_id', 'like', '%' . session()->get('categoria') . '%')
      /* ->where('parametro_id', 'like', '%' . $parametrofil . '%') */
      ->where('autor_id', 'like', '%' . session()->get('autor') . '%')
      ->where('categoriapro_id', 'like', '%' . session()->get('categoria') . '%')
      ->where('name','like','%' . session()->get('palabra').'%')
      ->Where('products.description','like','%' . session()->get('palabra').'%')
      ->where('visible','=','1')
      ->orderByRaw("RAND()")
      ->paginate(16);
     
     $areadinamizador =  session()->get('areadina');
     $gradodinamizador = session()->get('gradodina');
     $campodinamizador = session()->get('campodina');
     $variabledinamizador = session()->get('variabledina');
     $casa =  session()->get('casa');
    
   
   $selectores = Select::all();
   $total = $this->total();
   $subtotal = $this->subtotal();
   $filtros = DB::table('categoriessd')->where('categoriapro_id','=',$subcategoriafil)->get();
   $subcategoria = Categoria::all();
   $parametro = DB::table('parametro')->get();
   $autor = DB::table('autor')->get();
   $area = DB::table('areas')->get();



   
   
   $eventodig = DB::table('tipo_evento')->get();
   $carousel = DB::table('contents')
   ->join('carousel','contents.id','=','carousel.content_id')
   ->get();
   $carouselimg = Carousel::all();;
   $colors = DB::table('colors')->get();
   $arr_ip = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
     //dd($arr_ip);
     $ip = $arr_ip['ip'];
     $ciudad = $arr_ip['city'];
     $pais = $arr_ip['country'];
     $blogfoot = Content::where('type','=','blog')->inRandomOrder()->take(6)->get();
     $blogger = Content::where('type','=','blog')->inRandomOrder()->take(3)->get();
     $temp = Template::where('id',1)->value('template');
     
   return view('Templates.'.$temp.'.desing')->with('contenidos', $contenidos)->with('contenidona', $contenidona)->with('contenidonu', $contenidonu)->with('contenidonus', $contenidonu)->with('menu', $menu)->with('menufoot', $menufoot)->with('galeria', $contenida)->with('plantilla', $plantilla)->with('mascar', $contenido)->with('plantillaes', $plantillaes)->with('whatsapp', $whatsapp)->with('meta', $meta)->with('paginations', $paginations)->with('fichones', $fichones)->with('contenidonumas', $contenidonumas)->with('cama', $cama)->with('banners', $banners)->with('bannersback', $bannersback)->with('selectores', $selectores)->with('cart', $cart)->with('products', $products)->with('productsa', $productsa)->with('clientes', $clientes)->with('total', $total)->with('subtotal', $subtotal)->with('filtros', $filtros)->with('diagramas', $diagramas)->with('subcategoria', $subcategoria)->with('autor', $autor)->with('parametro', $parametro)->with('area', $area)->with('filtros', $filtros)->with('eventos', $eventos)->with('totaleventos', $totaleventos)->with('stock', $stock)->with('eventodig', $eventodig)->with('colors', $colors)->with('ip', $ip)->with('ciudad', $ciudad)->with('pais', $pais)->with('carousel', $carousel)->with('carouselimg', $carouselimg)->with('blogfoot', $blogfoot)->with('empleos', $empleos)->with('terminos', $terminos)->with('categories', $categories)->with('planessaas', $planessaas)->with('formulario', $formulario)->with('seo', $seo)->with('avanzacat', $avanzacat)->with('mediamini', $mediamini)->with('empresas', $empresas)->with('cursos', $cursos)->with('promos', $promos)->with('departamentos',$departamentos)->with('municipios',$municipios)->with('blogger', $blogger);
   }
      $hostname = app(\Hyn\Tenancy\Environment::class)->hostname();
  $infosaas = DB::table('tenancy.hostnames')
  ->join('tenancy.websites','websites.id','=','hostnames.website_id')
  ->where('hostnames.fqdn',  $hostname->fqdn)
  ->get();
  foreach ($infosaas as $infosaasweb) {
  $mihost =  ($infosaasweb->uuid.'.');
  $website = DB::table($mihost.'users')->get();
  $dias = date('Y-m-d');
  if($dias <=  $infosaasweb->presentacion){
  $resp = 'true';
  }else{
  $resp = 'false'; 
  }
}
$cursos = \DigitalsiteSaaS\Elearning\Tenant\Cursos::all();
    $avanzacat = \DigitalsiteSaaS\Pagina\Tenant\Page::where('categoria', '=', 1)->get(); 
    $plantilla = \DigitalsiteSaaS\Pagina\Tenant\Template::all();
   $plantillaes = \DigitalsiteSaaS\Pagina\Tenant\Template::all();
   $whatsapp = \DigitalsiteSaaS\Pagina\Tenant\Whatsapp::all();
   $post = \DigitalsiteSaaS\Pagina\Tenant\Page::where('slug','=',$page)->first();
   $menu = \DigitalsiteSaaS\Pagina\Tenant\Page::whereNull('page_id')->orderBy('posta', 'asc')->get(); 
   $meta = \DigitalsiteSaaS\Pagina\Tenant\Page::where('slug','=',$page)->get();
  $departamentos = \DigitalsiteSaaS\Pagina\Tenant\Departamentocon::all();
     $municipios = \DigitalsiteSaaS\Pagina\Tenant\Municipio::all();
   foreach ($meta as $metas) {
    $metasa = $metas->slug;
    if(strcmp($metasa, $page) !== 0)
 
    return response()->view('errors.404', [], 404);
     }
   $menufoot = \DigitalsiteSaaS\Pagina\Tenant\Page::orderBy('posta', 'asc')->get();
   $masa = \DigitalsiteSaaS\Pagina\Tenant\Page::count('page_id');
   $cama = \DigitalsiteSaaS\Pagina\Tenant\Page::find($post->id);
  
   $filtros = DB::table('categoriessd')->get();


   $stock = DB::table('products')
      //->leftJoin('order_items', 'order_items.product_id', '=', 'products.id')
      //->select(DB::raw('SUM(quantity) as cantidad'),DB::raw('(products.id) as product'),DB::raw('(product_id) as productse'))
      //->groupBy('products.id')
      ->get();
     
  
   $planessaas = \DigitalsiteSaaS\Pagina\Tenant\Planes::all();

   $diagramas = \DigitalsiteSaaS\Pagina\Tenant\Diagrama::where('id',"=",$post->id)->get();
   $fichones = \DigitalsiteSaaS\Pagina\Tenant\Page::find($post->id)->Fichas()->orderBy(DB::raw('RAND()'))->paginate(6, ['*'], 'fichones');
   $empresas = \DigitalsiteSaaS\Avanza\Tenant\Avanzaempresa::orderBy(DB::raw('RAND()'))->paginate(6);
   $contenidos = \DigitalsiteSaaS\Pagina\Tenant\Content::where('page_id',"=",$post->id)
      /*->where('template',"=",$temaweb->template)*/
      ->orderBy('nivel','ASC')
      ->get();
      $mediamini = \DigitalsiteSaaS\Pagina\Tenant\Content::where('page_id',"=",$post->id)
    ->orderBy('nivel','ASC')
    ->get();
$productsa = \DigitalsiteSaaS\Pagina\Tenant\Product::inRandomOrder()->get();
   $banners = \DigitalsiteSaaS\Pagina\Tenant\Page::find($post->id)->Banners()->orderByRaw("RAND()")->take(1)->get();
  $terminos = \DigitalsiteSaaS\Pagina\Tenant\Template::all();
$categories = \DigitalsiteSaaS\Pagina\Tenant\Pais::all();
   $bannersback = \DigitalsiteSaaS\Pagina\Tenant\Page::find($post->id)->Banners()->orderByRaw("RAND()")->take(1)->get();
   $contenidona = \DigitalsiteSaaS\Pagina\Tenant\Maxo::join('contents','contents.id','=','collapse.content_id')
    ->orderBy('position','ASC')
    ->where('contents.page_id', '=' ,$post->id)->get();
     $contenidonu = \DigitalsiteSaaS\Pagina\Tenant\Maxu::join('contents','contents.id','=','tabs.content_id')
    ->orderBy('position','ASC')
    ->where('contents.page_id', '=' ,$post->id)
    ->get();

    $empleos = \DigitalsiteSaaS\Pagina\Tenant\Empleo::join('contents','contents.id','=','empleos.content_id')
    ->orderBy('position','ASC')
    ->where('contents.page_id', '=' ,$post->id)
    ->get();
   $contenidonumas = \DigitalsiteSaaS\Pagina\Tenant\Fichaje::where('responsive', $post->id)->Orwhere('page_id', $post->id)->orderBy(DB::raw('RAND()'))->paginate(6, ['*'], 'contenidonumas');

     $paginations = \DigitalsiteSaaS\Pagina\Tenant\Page::find($post->id)->Blogs()->paginate(9);
   $contenida = \DigitalsiteSaaS\Pagina\Tenant\Maxi::join('images','images.content_id','=','contents.id')
    ->orderBy('position','ASC')
    ->where('contents.page_id', '=' ,$post->id)->get();
   
     $eventos = DB::table('events')->where('start_old', '>', date('m/d/Y'))->orderBy('start_old', 'asc')->take(3)->get();
     $start =  session()->get('start') ? session()->get('start') : 0;
   $end = session()->get('end') ? session()->get('end') : 100000000000000;
   $tipo = session()->get('tipo');
   $totaleventos = DB::table('events')
    ->whereBetween('start_old', array($start, $end))
    ->where('class', 'like', '%' . $tipo . '%')
    ->get();
     $formulario = \DigitalsiteSaaS\Pagina\Tenant\Formu::join('contents','inputs.content_id','=','contents.id')
    ->select('inputs.*', 'inputs.id')
    ->orderBy('id','ASC')
    ->where('contents.page_id', '=' ,$post->id)->get();
     $cart = session()->get('cart');
   $min_price = Input::has('min_price') ? Input::get('min_price') : 0;
     $max_price = Input::has('max_price') ? Input::get('max_price') : 10000000;
     $clientes =  session()->get('clientes');
     $bustext =  session()->get('bustext');
     $areafil = session()->get('area');
     $parametrofil = session()->get('parametro');
     $autorfil = session()->get('autor');
     $subcategoriafil = session()->get('subcategoria');
    
     $idpage = \DigitalsiteSaaS\Pagina\Tenant\Content::leftjoin('pages','contents.page_id','=','pages.id')
     ->where('type','=', 'productos')
     ->where('slug','=', $page)
    ->pluck('contents');
    $idpagecount = \DigitalsiteSaaS\Pagina\Tenant\Content::leftjoin('pages','contents.page_id','=','pages.id')
     ->where('type','=', 'productos')
     ->where('slug','=', $page)
    ->count();
  
    if($idpagecount == 0){
     $products =  \DigitalsiteSaaS\Pagina\Tenant\Product::whereBetween('precio', array($min_price, $max_price))
      ->where('category_id', 'like', '%' . session()->get('categoria') . '%')
      /* ->where('parametro_id', 'like', '%' . $parametrofil . '%') */
      ->where('autor_id', 'like', '%' . session()->get('autor') . '%')
      ->where('categoriapro_id', 'like', '%' . session()->get('categoria') . '%')
      ->where('name','like','%' . session()->get('palabra').'%')
      ->Where('description','like','%' . session()->get('palabra').'%')
      ->where('visible','=','1')
     
      ->orderByRaw("RAND()")
      ->paginate(16);
   }else{
      $products =  \DigitalsiteSaaS\Pagina\Tenant\Product::whereBetween('precio', array($min_price, $max_price))
      ->where('category_id', 'like', '%' . session()->get('categoria') . '%')
      /* ->where('parametro_id', 'like', '%' . $parametrofil . '%') */
      ->where('autor_id', 'like', '%' . session()->get('autor') . '%')
      ->where('categoriapro_id', 'like', '%' . session()->get('categoria') . '%')
      ->where('name','like','%' . session()->get('palabra').'%')
      ->Where('description','like','%' . session()->get('palabra').'%')
      ->where('visible','=','1')
    
      ->orderByRaw("RAND()")
      ->paginate(16);
   }
$products = \DigitalsiteSaaS\Pagina\Tenant\Product::
     paginate(1000);

 
     $areadinamizador =  session()->get('areadina');
     $gradodinamizador = session()->get('gradodina');
     $campodinamizador = session()->get('campodina');
     $variabledinamizador = session()->get('variabledina');
     $casa =  session()->get('casa');
    
    
  
   
      $selectores = \DigitalsiteSaaS\Pagina\Tenant\Select::all();
   $total = $this->total();
   $subtotal = $this->subtotal();
   $filtros = DB::table('categoriessd')->where('categoriapro_id','=',$subcategoriafil)->get();
   $subcategoria = \DigitalsiteSaaS\Pagina\Tenant\Categoria::all();;
   $parametro = DB::table('parametro')->get();
   $autor = DB::table('autor')->get();
   $area = DB::table('areas')->get();
  
   

    $seo =  \DigitalsiteSaaS\Pagina\Tenant\Seo::where('id','=',1)->get();  

   
   $eventodig = DB::table('tipo_evento')->get();
   $carousel = DB::table('contents')
   ->join('carousel','contents.id','=','carousel.content_id')
   ->get();
   $carouselimg = \DigitalsiteSaaS\Pagina\Tenant\Carousel::all();;
   $colors = DB::table('colors')->get();
   $arr_ip = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
     //dd($arr_ip);
     $ip = $arr_ip['ip'];
     $ciudad = $arr_ip['city'];
     $pais = $arr_ip['country'];
     $blogfoot = \DigitalsiteSaaS\Pagina\Tenant\Content::where('type','=','blog')->inRandomOrder()->take(6)->get();
     $blogger = \DigitalsiteSaaS\Pagina\Tenant\Content::where('type','=','blog')->inRandomOrder()->take(3)->get();
     $temp = \DigitalsiteSaaS\Pagina\Tenant\Template::where('id',1)->value('template');
     $promos = \DigitalsiteSaaS\Avanza\Tenant\Promocion::all();  
     if($resp == 'true'){
     return view('Templates.'.$temp.'.desing')->with('contenidos', $contenidos)->with('contenidona', $contenidona)->with('contenidonu', $contenidonu)->with('contenidonus', $contenidonu)->with('menu', $menu)->with('menufoot', $menufoot)->with('galeria', $contenida)->with('mascar', $contenidos)->with('pasto', $contenidos)->with('casual', $contenidos)->with('plantilla', $plantilla)->with('plantillaes', $plantillaes)->with('whatsapp', $whatsapp)->with('meta', $meta)->with('contenidu', $contenidos)->with('paginations', $paginations)->with('fichones', $fichones)->with('contenidonumas', $contenidonumas)->with('cama', $cama)->with('banners', $banners)->with('bannersback', $bannersback)->with('selectores', $selectores)->with('cart', $cart)->with('products', $products)->with('productsa', $productsa)->with('clientes', $clientes)->with('total', $total)->with('subtotal', $subtotal)->with('filtros', $filtros)->with('diagramas', $diagramas)->with('subcategoria', $subcategoria)->with('autor', $autor)->with('parametro', $parametro)->with('area', $area)->with('filtros', $filtros)->with('eventos', $eventos)->with('totaleventos', $totaleventos)->with('stock', $stock)->with('eventodig', $eventodig)->with('colors', $colors)->with('ip', $ip)->with('ciudad', $ciudad)->with('pais', $pais)->with('carousel', $carousel)->with('carouselimg', $carouselimg)->with('blogfoot', $blogfoot)->with('empleos', $empleos)->with('terminos', $terminos)->with('categories', $categories)->with('formulario', $formulario)->with('planessaas', $planessaas)->with('seo', $seo)->with('avanzacat', $avanzacat)->with('mediamini', $mediamini)->with('empresas', $empresas)->with('cursos', $cursos)->with('promos', $promos)->with('departamentos',$departamentos)->with('municipios',$municipios)->with('blogger', $blogger);
 }else{
  dd('No ha pagaf');
 }
    }







public function paginasin($page){

$pages = \Request::path();


    $departamentos = Departamentocon::all();
     $municipios = Municipio::all();
      $cursos = Cursos::all();
   $avanzacat = Page::where('categoria', '=', 1)->get(); 
    $planessaas = Planes::all();
   if(!$this->tenantName){
     $plantilla = Template::all();
   $plantillaes = Template::all();
   $whatsapp = Whatsapp::all();
   $promos = Promocion::all();  
   $menu = Page::whereNull('page_id')->orderBy('posta', 'asc')->get();
   foreach ($menu as $menus) {
    $menusa = $menus->slug;

    if(strcmp($menusa, $pages) == 0)
 
    return response()->view('errors.404', [], 404);
     }
     $post = Page::where('slug','=',$menusa)->first();
     $meta = Page::where('slug','=',$menusa)->get();
     $metas = Page::where('slug','like', $menusa)->count(); 
   
   
   $menufoot = Page::orderBy('posta', 'asc')->get();
   $masa = DB::table('pages')->count('page_id');
   $cama = Page::find($post->id);

   $seo =  Seo::where('id','=',1)->get();  
   $filtros = DB::table('categoriessd')->get();
   $productsa = Product::inRandomOrder()->get();

   $stock = DB::table('products')
      //->leftJoin('order_items', 'order_items.product_id', '=', 'products.id')
      //->select(DB::raw('SUM(quantity) as cantidad'),DB::raw('(products.id) as product'),DB::raw('(product_id) as productse'))
      //->groupBy('products.id')
      ->get();
    

   $diagramas = Diagrama::where('id',"=",$post->id)->get();
   $fichones = Page::find($post->id)->Fichas()->orderBy(DB::raw('RAND()'))->paginate(6, ['*'], 'fichones');
   $empresas = Avanzaempresa::orderBy(DB::raw('RAND()'))->paginate(6);
   
   $contenidos = Content::where('page_id',"=",$post->id)
      /*->where('template',"=",$temaweb->template)*/
      ->orderBy('nivel','ASC')
      ->get();
     $contenido = Content::where('page_id',"=",$post->id)
    ->orderBy('nivel','ASC')
    ->get();
    $mediamini = Content::where('page_id',"=",$post->id)
    ->orderBy('nivel','ASC')
    ->get();
   $banners = Page::find($post->id)->Banners()->orderByRaw("RAND()")->take(1)->get();
  $terminos = \DigitalsiteSaaS\Pagina\Template::all();
$categories = Pais::all();
   $bannersback = Page::find($post->id)->Banners()->orderByRaw("RAND()")->take(1)->get();
   $contenidona = Maxo::join('contents','contents.id','=','collapse.content_id')
    ->orderBy('position','ASC')
    ->where('contents.page_id', '=' ,$post->id)->get();
     $contenidonu = Maxu::join('contents','contents.id','=','tabs.content_id')
    ->orderBy('position','ASC')
    ->where('contents.page_id', '=' ,$post->id)
    ->get();

    $formulario = Formu::join('contents','inputs.content_id','=','contents.id')
    ->select('inputs.*', 'inputs.id')
    ->orderBy('id','ASC')
    ->where('contents.page_id', '=' ,$post->id)->get();

    $empleos = Empleo::join('contents','contents.id','=','empleos.content_id')
    ->orderBy('position','ASC')
    ->where('contents.page_id', '=' ,$post->id)
    ->get();
   $contenidonumas = Fichaje::where('responsive', $post->id)->Orwhere('page_id', $post->id)->orderBy(DB::raw('RAND()'))->paginate(6, ['*'], 'contenidonumas');
   
     $paginations = Page::find($post->id)->Blogs()->paginate(9);
   $contenida =Maxi::join('images','images.content_id','=','contents.id')
    ->orderBy('position','ASC')
    ->where('contents.page_id', '=' ,$post->id)->get();
    
     $eventos = DB::table('events')->where('start_old', '>', date('m/d/Y'))->orderBy('start_old', 'asc')->take(3)->get();
     $start =  session()->get('start') ? session()->get('start') : 0;
   $end = session()->get('end') ? session()->get('end') : 100000000000000;
   $tipo = session()->get('tipo');
   $totaleventos = DB::table('events')
    ->whereBetween('start_old', array($start, $end))
    ->where('class', 'like', '%' . $tipo . '%')
    ->get();
     $cart = session()->get('cart');
     $min_price = Input::has('min_price') ? Input::get('min_price') : 0;
     $max_price = Input::has('max_price') ? Input::get('max_price') : 10000000;
     $clientes =  session()->get('clientes');
     $bustext =  session()->get('bustext');
     $areafil = session()->get('area');
     $parametrofil = session()->get('parametro');
     $subcategoriafil = session()->get('subcategoria');
      $products =  Product::leftjoin('contents','products.categoriapro_id','=','contents.contents')
     ->whereBetween('precio', array($min_price, $max_price))
      ->where('category_id', 'like', '%' . session()->get('categoria') . '%')
      /* ->where('parametro_id', 'like', '%' . $parametrofil . '%') */
      ->where('autor_id', 'like', '%' . session()->get('autor') . '%')
      ->where('categoriapro_id', 'like', '%' . session()->get('categoria') . '%')
      ->where('name','like','%' . session()->get('palabra').'%')
      ->Where('products.description','like','%' . session()->get('palabra').'%')
      ->where('visible','=','1')
      ->orderByRaw("RAND()")
      ->paginate(16);
     
     $areadinamizador =  session()->get('areadina');
     $gradodinamizador = session()->get('gradodina');
     $campodinamizador = session()->get('campodina');
     $variabledinamizador = session()->get('variabledina');
     $casa =  session()->get('casa');
    
   
   $selectores = Select::all();
   $total = $this->total();
   $subtotal = $this->subtotal();
   $filtros = DB::table('categoriessd')->where('categoriapro_id','=',$subcategoriafil)->get();
   $subcategoria = Categoria::all();
   $parametro = DB::table('parametro')->get();
   $autor = DB::table('autor')->get();
   $area = DB::table('areas')->get();



   
   
   $eventodig = DB::table('tipo_evento')->get();
   $carousel = DB::table('contents')
   ->join('carousel','contents.id','=','carousel.content_id')
   ->get();
   $carouselimg = Carousel::all();;
   $colors = DB::table('colors')->get();
   $arr_ip = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
     //dd($arr_ip);
     $ip = $arr_ip['ip'];
     $ciudad = $arr_ip['city'];
     $pais = $arr_ip['country'];
     $blogfoot = Content::where('type','=','blog')->inRandomOrder()->take(6)->get();
     $blogger = Content::where('type','=','blog')->inRandomOrder()->take(3)->get();
     $temp = Template::where('id',1)->value('template');
     
   return view('Templates.'.$temp.'.desing')->with('contenidos', $contenidos)->with('contenidona', $contenidona)->with('contenidonu', $contenidonu)->with('contenidonus', $contenidonu)->with('menu', $menu)->with('menufoot', $menufoot)->with('galeria', $contenida)->with('plantilla', $plantilla)->with('mascar', $contenido)->with('plantillaes', $plantillaes)->with('whatsapp', $whatsapp)->with('meta', $meta)->with('paginations', $paginations)->with('fichones', $fichones)->with('contenidonumas', $contenidonumas)->with('cama', $cama)->with('banners', $banners)->with('bannersback', $bannersback)->with('selectores', $selectores)->with('cart', $cart)->with('products', $products)->with('productsa', $productsa)->with('clientes', $clientes)->with('total', $total)->with('subtotal', $subtotal)->with('filtros', $filtros)->with('diagramas', $diagramas)->with('subcategoria', $subcategoria)->with('autor', $autor)->with('parametro', $parametro)->with('area', $area)->with('filtros', $filtros)->with('eventos', $eventos)->with('totaleventos', $totaleventos)->with('stock', $stock)->with('eventodig', $eventodig)->with('colors', $colors)->with('ip', $ip)->with('ciudad', $ciudad)->with('pais', $pais)->with('carousel', $carousel)->with('carouselimg', $carouselimg)->with('blogfoot', $blogfoot)->with('empleos', $empleos)->with('terminos', $terminos)->with('categories', $categories)->with('planessaas', $planessaas)->with('formulario', $formulario)->with('seo', $seo)->with('avanzacat', $avanzacat)->with('mediamini', $mediamini)->with('empresas', $empresas)->with('cursos', $cursos)->with('promos', $promos)->with('departamentos',$departamentos)->with('municipios',$municipios)->with('blogger', $blogger);
   }
      $hostname = app(\Hyn\Tenancy\Environment::class)->hostname();
  $infosaas = DB::table('tenancy.hostnames')
  ->join('tenancy.websites','websites.id','=','hostnames.website_id')
  ->where('hostnames.fqdn',  $hostname->fqdn)
  ->get();
  foreach ($infosaas as $infosaasweb) {
  $mihost =  ($infosaasweb->uuid.'.');
  $website = DB::table($mihost.'users')->get();
  $dias = date('Y-m-d');
  if($dias <=  $infosaasweb->presentacion){
  $resp = 'true';
  }else{
  $resp = 'false'; 
  }
}
$cursos = \DigitalsiteSaaS\Elearning\Tenant\Cursos::all();
    $avanzacat = \DigitalsiteSaaS\Pagina\Tenant\Page::where('categoria', '=', 1)->get(); 
    $plantilla = \DigitalsiteSaaS\Pagina\Tenant\Template::all();
   $plantillaes = \DigitalsiteSaaS\Pagina\Tenant\Template::all();
   $whatsapp = \DigitalsiteSaaS\Pagina\Tenant\Whatsapp::all();
   $post = \DigitalsiteSaaS\Pagina\Tenant\Page::where('slug','=',$pages)->first();
   $menu = \DigitalsiteSaaS\Pagina\Tenant\Page::whereNull('page_id')->orderBy('posta', 'asc')->get(); 
   $meta = \DigitalsiteSaaS\Pagina\Tenant\Page::where('slug','=',$pages)->get();
  $departamentos = \DigitalsiteSaaS\Pagina\Tenant\Departamentocon::all();
     $municipios = \DigitalsiteSaaS\Pagina\Tenant\Municipio::all();
   foreach ($meta as $metas) {
    $metasa = $metas->slug;
    if(strcmp($metasa, $pages) !== 0)
 
    return response()->view('errors.404', [], 404);
     }
   $menufoot = \DigitalsiteSaaS\Pagina\Tenant\Page::orderBy('posta', 'asc')->get();
   $masa = \DigitalsiteSaaS\Pagina\Tenant\Page::count('page_id');
   $cama = \DigitalsiteSaaS\Pagina\Tenant\Page::find($post->id);
  
   $filtros = DB::table('categoriessd')->get();


   $stock = DB::table('products')
      //->leftJoin('order_items', 'order_items.product_id', '=', 'products.id')
      //->select(DB::raw('SUM(quantity) as cantidad'),DB::raw('(products.id) as product'),DB::raw('(product_id) as productse'))
      //->groupBy('products.id')
      ->get();
     
  
   $planessaas = \DigitalsiteSaaS\Pagina\Tenant\Planes::all();

   $diagramas = \DigitalsiteSaaS\Pagina\Tenant\Diagrama::where('id',"=",$post->id)->get();
   $fichones = \DigitalsiteSaaS\Pagina\Tenant\Page::find($post->id)->Fichas()->orderBy(DB::raw('RAND()'))->paginate(6, ['*'], 'fichones');
   $empresas = \DigitalsiteSaaS\Avanza\Tenant\Avanzaempresa::orderBy(DB::raw('RAND()'))->paginate(6);
   $contenidos = \DigitalsiteSaaS\Pagina\Tenant\Content::where('page_id',"=",$post->id)
      /*->where('template',"=",$temaweb->template)*/
      ->orderBy('nivel','ASC')
      ->get();
      $mediamini = \DigitalsiteSaaS\Pagina\Tenant\Content::where('page_id',"=",$post->id)
    ->orderBy('nivel','ASC')
    ->get();
$productsa = \DigitalsiteSaaS\Pagina\Tenant\Product::inRandomOrder()->get();
   $banners = \DigitalsiteSaaS\Pagina\Tenant\Page::find($post->id)->Banners()->orderByRaw("RAND()")->take(1)->get();
  $terminos = \DigitalsiteSaaS\Pagina\Tenant\Template::all();
$categories = \DigitalsiteSaaS\Pagina\Tenant\Pais::all();
   $bannersback = \DigitalsiteSaaS\Pagina\Tenant\Page::find($post->id)->Banners()->orderByRaw("RAND()")->take(1)->get();
   $contenidona = \DigitalsiteSaaS\Pagina\Tenant\Maxo::join('contents','contents.id','=','collapse.content_id')
    ->orderBy('position','ASC')
    ->where('contents.page_id', '=' ,$post->id)->get();
     $contenidonu = \DigitalsiteSaaS\Pagina\Tenant\Maxu::join('contents','contents.id','=','tabs.content_id')
    ->orderBy('position','ASC')
    ->where('contents.page_id', '=' ,$post->id)
    ->get();

    $empleos = \DigitalsiteSaaS\Pagina\Tenant\Empleo::join('contents','contents.id','=','empleos.content_id')
    ->orderBy('position','ASC')
    ->where('contents.page_id', '=' ,$post->id)
    ->get();
   $contenidonumas = \DigitalsiteSaaS\Pagina\Tenant\Fichaje::where('responsive', $post->id)->Orwhere('page_id', $post->id)->orderBy(DB::raw('RAND()'))->paginate(6, ['*'], 'contenidonumas');

     $paginations = \DigitalsiteSaaS\Pagina\Tenant\Page::find($post->id)->Blogs()->paginate(9);
   $contenida = \DigitalsiteSaaS\Pagina\Tenant\Maxi::join('images','images.content_id','=','contents.id')
    ->orderBy('position','ASC')
    ->where('contents.page_id', '=' ,$post->id)->get();
   
     $eventos = DB::table('events')->where('start_old', '>', date('m/d/Y'))->orderBy('start_old', 'asc')->take(3)->get();
     $start =  session()->get('start') ? session()->get('start') : 0;
   $end = session()->get('end') ? session()->get('end') : 100000000000000;
   $tipo = session()->get('tipo');
   $totaleventos = DB::table('events')
    ->whereBetween('start_old', array($start, $end))
    ->where('class', 'like', '%' . $tipo . '%')
    ->get();
     $formulario = \DigitalsiteSaaS\Pagina\Tenant\Formu::join('contents','inputs.content_id','=','contents.id')
    ->select('inputs.*', 'inputs.id')
    ->orderBy('id','ASC')
    ->where('contents.page_id', '=' ,$post->id)->get();
     $cart = session()->get('cart');
   $min_price = Input::has('min_price') ? Input::get('min_price') : 0;
     $max_price = Input::has('max_price') ? Input::get('max_price') : 10000000;
     $clientes =  session()->get('clientes');
     $bustext =  session()->get('bustext');
     $areafil = session()->get('area');
     $parametrofil = session()->get('parametro');
     $autorfil = session()->get('autor');
     $subcategoriafil = session()->get('subcategoria');
    
     $idpage = \DigitalsiteSaaS\Pagina\Tenant\Content::leftjoin('pages','contents.page_id','=','pages.id')
     ->where('type','=', 'productos')
     ->where('slug','=', $pages)
    ->pluck('contents');
    $idpagecount = \DigitalsiteSaaS\Pagina\Tenant\Content::leftjoin('pages','contents.page_id','=','pages.id')
     ->where('type','=', 'productos')
     ->where('slug','=', $pages)
    ->count();
  
    if($idpagecount == 0){
     $products =  \DigitalsiteSaaS\Pagina\Tenant\Product::whereBetween('precio', array($min_price, $max_price))
      ->where('category_id', 'like', '%' . session()->get('categoria') . '%')
      /* ->where('parametro_id', 'like', '%' . $parametrofil . '%') */
      ->where('autor_id', 'like', '%' . session()->get('autor') . '%')
      ->where('categoriapro_id', 'like', '%' . session()->get('categoria') . '%')
      ->where('name','like','%' . session()->get('palabra').'%')
      ->Where('description','like','%' . session()->get('palabra').'%')
      ->where('visible','=','1')
     
      ->orderByRaw("RAND()")
      ->paginate(16);
   }else{
      $products =  \DigitalsiteSaaS\Pagina\Tenant\Product::whereBetween('precio', array($min_price, $max_price))
      ->where('category_id', 'like', '%' . session()->get('categoria') . '%')
      /* ->where('parametro_id', 'like', '%' . $parametrofil . '%') */
      ->where('autor_id', 'like', '%' . session()->get('autor') . '%')
      ->where('categoriapro_id', 'like', '%' . session()->get('categoria') . '%')
      ->where('name','like','%' . session()->get('palabra').'%')
      ->Where('description','like','%' . session()->get('palabra').'%')
      ->where('visible','=','1')
    
      ->orderByRaw("RAND()")
      ->paginate(16);
   }
$products = \DigitalsiteSaaS\Pagina\Tenant\Product::
     paginate(1000);

 
     $areadinamizador =  session()->get('areadina');
     $gradodinamizador = session()->get('gradodina');
     $campodinamizador = session()->get('campodina');
     $variabledinamizador = session()->get('variabledina');
     $casa =  session()->get('casa');
    
    
  
   
      $selectores = \DigitalsiteSaaS\Pagina\Tenant\Select::all();
   $total = $this->total();
   $subtotal = $this->subtotal();
   $filtros = DB::table('categoriessd')->where('categoriapro_id','=',$subcategoriafil)->get();
   $subcategoria = \DigitalsiteSaaS\Pagina\Tenant\Categoria::all();;
   $parametro = DB::table('parametro')->get();
   $autor = DB::table('autor')->get();
   $area = DB::table('areas')->get();
  
   

    $seo =  \DigitalsiteSaaS\Pagina\Tenant\Seo::where('id','=',1)->get();  

   
   $eventodig = DB::table('tipo_evento')->get();
   $carousel = DB::table('contents')
   ->join('carousel','contents.id','=','carousel.content_id')
   ->get();
   $carouselimg = \DigitalsiteSaaS\Pagina\Tenant\Carousel::all();;
   $colors = DB::table('colors')->get();
   $arr_ip = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
     //dd($arr_ip);
     $ip = $arr_ip['ip'];
     $ciudad = $arr_ip['city'];
     $pais = $arr_ip['country'];
     $blogfoot = \DigitalsiteSaaS\Pagina\Tenant\Content::where('type','=','blog')->inRandomOrder()->take(6)->get();
     $blogger = \DigitalsiteSaaS\Pagina\Tenant\Content::where('type','=','blog')->inRandomOrder()->take(3)->get();
     $temp = \DigitalsiteSaaS\Pagina\Tenant\Template::where('id',1)->value('template');
     $promos = \DigitalsiteSaaS\Avanza\Tenant\Promocion::all();  
     if($resp == 'true'){
     return view('Templates.'.$temp.'.desing')->with('contenidos', $contenidos)->with('contenidona', $contenidona)->with('contenidonu', $contenidonu)->with('contenidonus', $contenidonu)->with('menu', $menu)->with('menufoot', $menufoot)->with('galeria', $contenida)->with('mascar', $contenidos)->with('pasto', $contenidos)->with('casual', $contenidos)->with('plantilla', $plantilla)->with('plantillaes', $plantillaes)->with('whatsapp', $whatsapp)->with('meta', $meta)->with('contenidu', $contenidos)->with('paginations', $paginations)->with('fichones', $fichones)->with('contenidonumas', $contenidonumas)->with('cama', $cama)->with('banners', $banners)->with('bannersback', $bannersback)->with('selectores', $selectores)->with('cart', $cart)->with('products', $products)->with('productsa', $productsa)->with('clientes', $clientes)->with('total', $total)->with('subtotal', $subtotal)->with('filtros', $filtros)->with('diagramas', $diagramas)->with('subcategoria', $subcategoria)->with('autor', $autor)->with('parametro', $parametro)->with('area', $area)->with('filtros', $filtros)->with('eventos', $eventos)->with('totaleventos', $totaleventos)->with('stock', $stock)->with('eventodig', $eventodig)->with('colors', $colors)->with('ip', $ip)->with('ciudad', $ciudad)->with('pais', $pais)->with('carousel', $carousel)->with('carouselimg', $carouselimg)->with('blogfoot', $blogfoot)->with('empleos', $empleos)->with('terminos', $terminos)->with('categories', $categories)->with('formulario', $formulario)->with('planessaas', $planessaas)->with('seo', $seo)->with('avanzacat', $avanzacat)->with('mediamini', $mediamini)->with('empresas', $empresas)->with('cursos', $cursos)->with('promos', $promos)->with('departamentos',$departamentos)->with('municipios',$municipios)->with('blogger',$blogger);
 }else{
  dd('No ha pagaf');
 }
    }





    public function gestion($page){
      if(!$this->tenantName){
        $gestiona = Carousel::where('slug_car','=',$page)->count();
      if($gestiona == 0){
        dd('No existe');
      }
      $plantilla = Template::all();
      $collapse = DB::table('contents')
      ->where('type','=','carousel')
      ->get();
      $identificador = Carousel::where('slug_car','=',$page)->get();
      $menu = Page::whereNull('page_id')->orderBy('posta', 'asc')->get();
      $whatsapp = Whatsapp::all();
      $menufoot = Page::orderBy('posta', 'desc')->get();
      $seo = Seo::where('id','=',1)->get();
      $gestion = Carousel::where('slug_car','=',$page)->get();
      $gestioncar = Carousel::inRandomOrder()->take(6)->get();
      $gestioncarta = Carousel::get();
      $colors = DB::table('colors')->get();
      $blogfoot = Content::where('type','=','blog')->inRandomOrder()->take(6)->get();
      $blogger = Content::where('type','=','blog')->inRandomOrder()->take(3)->get();
      $cart = session()->get('cart');
      $subtotal = $this->subtotal();
      $meta = Page::where('id','=','1')->get();
      $total = $this->total();
      }else{
          $gestiona = \DigitalsiteSaaS\Pagina\Tenant\Carousel::where('slug_car','=',$page)->count();
      if($gestiona == 0){
        dd('No existe');
      }
      $plantilla = \DigitalsiteSaaS\Pagina\Tenant\Template::all();
      $seo = \DigitalsiteSaaS\Pagina\Tenant\Seo::where('id','=',1)->get();
      $whatsapp = \DigitalsiteSaaS\Pagina\Tenant\Whatsapp::all();
      $collapse = \DigitalsiteSaaS\Pagina\Tenant\Content::where('type','=','carousel')->get();
      $identificador = \DigitalsiteSaaS\Pagina\Tenant\Carousel::where('slug_car','=',$page)->get();
      $menu = \DigitalsiteSaaS\Pagina\Tenant\Page::whereNull('page_id')->orderBy('posta', 'asc')->get();
      $menufoot = \DigitalsiteSaaS\Pagina\Tenant\Page::orderBy('posta', 'desc')->get();
      $gestion = \DigitalsiteSaaS\Pagina\Tenant\Carousel::where('slug_car','=',$page)->get();
      $meta = \DigitalsiteSaaS\Pagina\Tenant\Page::where('id','=','1')->get();
      //foreach ($gestion as $gestions) {
       //$gestiona = $gestions->slug_car;
        //if(strcmp($metasa, $page) !== 0) 
        //return response()->view('errors.404', [], 404);
       //}
      $gestioncar = \DigitalsiteSaaS\Pagina\Tenant\Carousel::inRandomOrder()->take(6)->get();
      $gestioncarta = \DigitalsiteSaaS\Pagina\Tenant\Carousel::get();
      $colors = DB::table('colors')->get();
      $blogfoot = \DigitalsiteSaaS\Pagina\Tenant\Content::where('type','=','blog')->inRandomOrder()->take(6)->get();
      $blogger = \DigitalsiteSaaS\Pagina\Tenant\Content::where('type','=','blog')->inRandomOrder()->take(3)->get();
      $cart = session()->get('cart');
      $subtotal = $this->subtotal();
      $total = $this->total();
      }


       $arr_ip = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
     //dd($arr_ip);
     $ip = $arr_ip['ip'];

     $ciudad = $arr_ip['city'];
        
     $pais = $arr_ip['country'];
      return view('pagina::gestion')->with('gestion', $gestion)->with('plantilla', $plantilla)->with('menu', $menu)->with('menufoot', $menufoot)->with('gestioncar', $gestioncar)->with('colors', $colors)->with('collapse', $collapse)->with('blogfoot', $blogfoot)->with('ip', $ip)->with('ciudad', $ciudad)->with('pais', $pais)->with('gestioncarta', $gestioncarta)->with('identificador', $identificador)->with('seo', $seo)->with('cart', $cart)->with('subtotal', $subtotal)->with('total', $total)->with('whatsapp', $whatsapp)->with('meta', $meta)->with('blogger', $blogger);

      }


    public function ingresar(){
      if(!$this->tenantName){
        $whatsapp = Whatsapp::all();
   $seo = Seo::where('id','=',1)->get(); 
   $meta = Page::where('id','=','1')->get();
   $plantilla = \DigitalsiteSaaS\Pagina\Template::all();
   foreach ($plantilla as $plantillas) {
   $templateweb = $plantillas->template;
   }
   $cart = session()->get('cart');
   $total = $this->total();
   $subtotal = $this->subtotal();
   $colors = DB::table('colors')->get();

   $menu = \DigitalsiteSaaS\Pagina\Page::whereNull('page_id')->orderBy('posta', 'asc')->get();
   $menufoot = \DigitalsiteSaaS\Pagina\Page::orderBy('posta', 'asc')->get();
   }else{
   $seo =  \DigitalsiteSaaS\Pagina\Tenant\Seo::where('id','=',1)->get(); 
   $plantilla = \DigitalsiteSaaS\Pagina\Tenant\Template::all();
   foreach ($plantilla as $plantillas) {
   $templateweb = $plantillas->template;
   }
   $cart = session()->get('cart');
   $total = $this->total();
   $subtotal = $this->subtotal();
   $colors = DB::table('colors')->get();
   $menu = \DigitalsiteSaaS\Pagina\Tenant\Page::whereNull('page_id')->orderBy('posta', 'asc')->get();
   $menufoot = \DigitalsiteSaaS\Pagina\Tenant\Page::orderBy('posta', 'asc')->get();
   $whatsapp = \DigitalsiteSaaS\Pagina\Tenant\Whatsapp::all();
   $meta = \DigitalsiteSaaS\Pagina\Tenant\Page::where('id','=','1')->get();

  }
   return view('Templates.'.$templateweb.'.carrito.logina')->with('plantilla', $plantilla)->with('menu', $menu)->with('menufoot', $menufoot)->with('cart', $cart)->with('total', $total)->with('subtotal', $subtotal)->with('colors', $colors)->with('seo', $seo)->with('whatsapp', $whatsapp)->with('meta', $meta);
  }



    public function blog($id){
  if(!$this->tenantName){
   $plantilla = Template::all();
   $whatsapp =  Whatsapp::all();
   $subtotal = $this->subtotal();
   $total = $this->total();
   $contenidos = Content::where('slugcon','=',$id)->get(); 
   $menu = Page::whereNull('page_id')->orderBy('posta', 'asc')->get();
   $menufoot = Page::orderBy('posta', 'asc')->get();
   $cart = session()->get('cart');
   $colors = DB::table('colors')->get();
   $blogfoot = Content::where('type','=','blog')->inRandomOrder()->take(6)->get();
   $meta = Page::where('id','=','1')->get();
   $seo =  Seo::where('id','=',1)->get(); 
   }else{
   $plantilla = \DigitalsiteSaaS\Pagina\Tenant\Template::all();
   $subtotal = $this->subtotal();
   $total = $this->total();
   $contenidos = \DigitalsiteSaaS\Pagina\Tenant\Content::where('slugcon','=',$id)->get();
   $meta = \DigitalsiteSaaS\Pagina\Tenant\Page::where('id','=','1')->get();
   $whatsapp = \DigitalsiteSaaS\Pagina\Tenant\Whatsapp::all();
   $menu = \DigitalsiteSaaS\Pagina\Tenant\Page::whereNull('page_id')->orderBy('posta', 'asc')->get();
   $menufoot = \DigitalsiteSaaS\Pagina\Tenant\Page::orderBy('posta', 'asc')->get();
   $cart = session()->get('cart');
   $colors = DB::table('colors')->get();
   $seo =  \DigitalsiteSaaS\Pagina\Tenant\Seo::where('id','=',1)->get(); 
   $blogfoot = \DigitalsiteSaaS\Pagina\Tenant\Content::where('type','=','blog')->inRandomOrder()->take(6)->get(); 
   }
   return view('pagina::blog')->with('contenidos', $contenidos)->with('plantilla', $plantilla)->with('menu', $menu)->with('cart', $cart)->with('subtotal', $subtotal)->with('total', $total)->with('colors', $colors)->with('blogfoot', $blogfoot)->with('menufoot', $menufoot)->with('whatsapp', $whatsapp)->with('meta', $meta)->with('seo', $seo);
  }

  public function oferta($id){
  if(!$this->tenantName){
   $plantilla = Template::all();
   $ofertas = Empleo::where('titulo_empslug', '=', $id)->get();
   $blogfoot = Content::where('type','=','blog')->inRandomOrder()->take(6)->get();
   $menu = Page::whereNull('page_id')->orderBy('posta', 'desc')->get();
   $menufoot = Page::orderBy('posta', 'desc')->get();
   $arr_ip = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
   $whatsapp = Whatsapp::all();
   $ip = $arr_ip['ip'];
   $ciudad = $arr_ip['city'];
   $pais = $arr_ip['country'];
   }else{
   $plantilla = \DigitalsiteSaaS\Pagina\Tenant\Template::all();
   $ofertas = \DigitalsiteSaaS\Pagina\Tenant\Empleo::where('titulo_empslug', '=', $id)->get();
   $blogfoot = \DigitalsiteSaaS\Pagina\Tenant\Content::where('type','=','blog')->inRandomOrder()->take(6)->get();
   $menu = \DigitalsiteSaaS\Pagina\Tenant\Page::whereNull('page_id')->orderBy('posta', 'desc')->get();
   $menufoot = \DigitalsiteSaaS\Pagina\Tenant\Page::orderBy('posta', 'desc')->get();
   $whatsapp = \DigitalsiteSaaS\Pagina\Tenant\Whatsapp::all();
   $arr_ip = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
   $ip = $arr_ip['ip'];
   $ciudad = $arr_ip['city'];
   $pais = $arr_ip['country'];
   }
   return view('pagina::vista-empleos')->with('ofertas', $ofertas)->with('plantilla', $plantilla)->with('menu', $menu)->with('menufoot', $menufoot)->with('ip', $ip)->with('ciudad', $ciudad)->with('pais', $pais)->with('blogfoot', $blogfoot)->with('whatsapp', $whatsapp);
  }







    public function crearusuario(){
    if(!$this->tenantName){
    $price = User::max('id');
    }else{
    $price = \App\Tenant\User::max('id');
    }
    $suma = $price + 1;
    $path = public_path() . '/fichaimg/clientes/'.$suma;
    File::makeDirectory($path, 0777, true);
    $passwordwe = Input::get('password');
    $remember = Input::get('_token');
    if(!$this->tenantName){ 
    $userma = User::create([
    'compania' => Input::get('compania'),
    'tipo_documento' => Input::get('tdocumento'),
    'documento' => Input::get('documento'),
    'name' => Input::get('name'),
    'email' => Input::get('email'),
    'phone' => Input::get('phone'),
    'celular' => Input::get('celular'),
    'address' => Input::get('address'),
    'pais_id' => Input::get('pais'),
    'ciudad' => Input::get('ciudad'),
    'rol_id' => Input::get('rol'),
    'remember_token' => Hash::make($remember),
    'password' => Hash::make($passwordwe),
     ]);
     }else{
      $userma = \App\Tenant\User::create([
    'compania' => Input::get('compania'),
    'tipo_documento' => Input::get('tdocumento'),
    'documento' => Input::get('documento'),
    'name' => Input::get('name'),
    'email' => Input::get('email'),
    'phone' => Input::get('phone'),
    'celular' => Input::get('celular'),
    'address' => Input::get('address'),
    'pais_id' => Input::get('pais'),
    'ciudad' => Input::get('ciudad'),
    'rol_id' => Input::get('rol'),
    'remember_token' => Hash::make($remember),
    'password' => Hash::make($passwordwe),
     ]);
     }
    
   /* $datas = DB::table('datos')->where('id','1')->get();
     foreach ($datas as $user){
      Mail::to(Input::get('email'))
      ->bcc($user->correo)
    ->send(new Registro($userma));
   }*/
   return Redirect('/login')->with('status', 'ok_create');
    }

    public function tempalte(){
     $file = Input::file('file');
   $destinoPath = public_path().'/testcon';
   $url_imagen = $file->getClientOriginalName();
   $url = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);  
     $subir=$file->move($destinoPath,$file->getClientOriginalName());
     $zipper = new Zipper();
   Zipper::make($url_imagen)->extractTo('test');
   $zippera = new Zippera;
   $zippera->nombre = $url;
   $zippera->slug = Str::slug($zippera->nombre);
   $zippera->save();
    }

    public function memo(){
  $cat_id = Input::get('cat_id');
  if(!$this->tenantName){
  $subcategories = Page::where('page_id', '=', $cat_id)->orderBy('page', 'DESC')->get();
    }else{
    $subcategories = \DigitalsiteSaaS\Pagina\Tenant\Page::where('page_id', '=', $cat_id)->orderBy('page', 'ASC')->get();
    }
  return Response::json($subcategories);
}

  public function detallempresa($page){
  if(!$this->tenantName){
   $plantilla = Template::all();
   $plantillaes = Template::find(1);
   $whatsapp = Whatsapp::all();
   $temp = Template::where('id',1)->value('template');
   $contenido = Fichaje::where('slug','=',$page)->get();
   $contenida = Fichaje::where('slug','=',$page)->get();
   $meta = Page::where('id','=','1')->get();
   $menu = Page::whereNull('page_id')->orderBy('posta', 'asc')->get();
      $menufoot = Page::orderBy('posta', 'asc')->get();
      foreach ($contenido as $item) {
   $total = $item->identificador;
   }
   $productos = Fichaje::where('identificador','=',$total)->get();
   $blogfoot = Content::where('type','=','blog')->inRandomOrder()->take(6)->get();
   return view('avanza::fichaje/avanza')->with('contenido', $contenido)->with('plantilla', $plantilla)->with('menu', $menu)->with('contenida', $contenida)->with('plantillaes', $plantillaes)->with('blogfoot', $blogfoot)->with('meta', $meta);
   }else{
   $plantilla = \DigitalsiteSaaS\Pagina\Tenant\Template::all();
   $plantillaes = \DigitalsiteSaaS\Pagina\Tenant\Template::find(1);
   $temp = \DigitalsiteSaaS\Pagina\Tenant\Template::where('id',1)->value('template');
   $meta = \DigitalsiteSaaS\Pagina\Tenant\Page::where('id','=','1')->get();
   $contenido = \DigitalsiteSaaS\Pagina\Tenant\Fichaje::where('slug','=',$page)->get();
   $contenida = \DigitalsiteSaaS\Pagina\Tenant\Fichaje::where('slug','=',$page)->get();
   foreach ($contenido as $item) {
   $total = $item->identificador;
   }
   $productos = \DigitalsiteSaaS\Pagina\Tenant\Fichaje::where('identificador','=',$total)->get();
   $menu = \DigitalsiteSaaS\Pagina\Tenant\Page::whereNull('page_id')->orderBy('posta', 'asc')->get();
   $menufoot = \DigitalsiteSaaS\Pagina\Tenant\Page::orderBy('posta', 'asc')->get();
   $blogfoot = \DigitalsiteSaaS\Pagina\Tenant\Content::where('type','=','blog')->inRandomOrder()->take(6)->get();
   $whatsapp = \DigitalsiteSaaS\Pagina\Tenant\Whatsapp::all();
   return view('Templates.'.$temp.'.avanza')->with('contenido', $contenido)->with('plantilla', $plantilla)->with('menu', $menu)->with('menufoot', $menufoot)->with('contenida', $contenida)->with('whatsapp', $whatsapp)->with('plantillaes', $plantillaes)->with('blogfoot', $blogfoot)->with('whatsapp', $whatsapp)->with('meta', $meta)->with('productos', $productos);
  
    }
  return Response::json($subcategories);
}



 public function infoempresa($page){
  if(!$this->tenantName){
   $plantilla = Template::all();
   $plantillaes = Template::find(1);
   $whatsapp = Whatsapp::all();
   $contenido = Avanzaempresa::where('slug','=',$page)->get();
   $promociones = Avanzaempresa::join('promociones','avanza_empresa.usuario_id','=','promociones.user_id')->where('slug','=',$page)->get();
   $menu = Page::whereNull('page_id')->orderBy('posta', 'desc')->get();
    $menufoot = Page::orderBy('posta', 'desc')->get();
   $blogfoot = Content::where('type','=','blog')->inRandomOrder()->take(6)->get();
    $meta = Page::where('id','=','1')->get();
   $identificador = Avanzaempresa::where('slug', '=', $page)->get();
   foreach ($identificador as $identificador){
   $productos = Fichaje::where('identificador','=',$identificador->id)->get();
   }
   return view('avanza::fichaje/empresa')->with('contenido', $contenido)->with('plantilla', $plantilla)->with('menu', $menu)->with('menufoot', $menufoot)->with('plantillaes', $plantillaes)->with('blogfoot', $blogfoot)->with('productos', $productos)->with('meta', $meta)->with('whatsapp', $whatsapp)->with('promociones', $promociones);
  
   }else{
    $plantilla = \DigitalsiteSaaS\Pagina\Tenant\Template::all();
        foreach ($plantilla as $plantillas) {
        $templateweb = $plantillas->template;
        }
    $meta = \DigitalsiteSaaS\Pagina\Tenant\Page::where('id','=','1')->get();
   $plantilla = \DigitalsiteSaaS\Pagina\Tenant\Template::all();
   $whatsapp = \DigitalsiteSaaS\Pagina\Tenant\Whatsapp::all();
   $plantillaes = \DigitalsiteSaaS\Pagina\Tenant\Template::find(1);
   $contenido = \DigitalsiteSaaS\Avanza\Tenant\Avanzaempresa::where('slug','=',$page)->get();
   $promociones = \DigitalsiteSaaS\Avanza\Tenant\Avanzaempresa::join('promociones','avanza_empresa.usuario_id','=','promociones.user_id')->where('slug','=',$page)->get();  
   $menu = \DigitalsiteSaaS\Pagina\Tenant\Page::whereNull('page_id')->orderBy('posta', 'desc')->get();
   $menufoot = \DigitalsiteSaaS\Pagina\Tenant\Page::orderBy('posta', 'desc')->get();
   $blogfoot = \DigitalsiteSaaS\Pagina\Tenant\Content::where('type','=','blog')->inRandomOrder()->take(6)->get();

   $identificador = \DigitalsiteSaaS\Avanza\Tenant\Avanzaempresa::where('slug', '=', $page)->get();
   foreach ($identificador as $identificador){
   $productos =  \DigitalsiteSaaS\Pagina\Tenant\Fichaje::where('identificador','=',$identificador->id)->get();
   }
   return view('Templates.'.$templateweb.'.empresa')->with('contenido', $contenido)->with('plantilla', $plantilla)->with('menu', $menu)->with('menufoot', $menufoot)->with('plantillaes', $plantillaes)->with('blogfoot', $blogfoot)->with('productos', $productos)->with('meta', $meta)->with('whatsapp', $whatsapp)->with('promociones', $promociones);
  
    }
  return Response::json($subcategories);
}




    public function filtrohome(){
     $category = Input::get('category');
     $subcategory = Input::get('subcategory');
     return Redirect($subcategory)->with('status', 'ok_create');
    }

    public function installHellovista(){
     return view('pagina::zip');
    }

    public function viola(){
   $contenido = DB::table('templa')->get();
   return view('pagina::zipper')->with('contenido', $contenido);
  }

    public function checkUsernameAvailability(){
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
    }

    public function checkUsernameAvailabilityinput($id){
      if(!$this->tenantName){
     $user = Formu::orWhere('content_id','=', $id)->where('nombreinput', Input::get('nombreinput'))->count();
     }
     else{
       $user = \DigitalsiteSaaS\Pagina\Tenant\Formu::orWhere('content_id','=', $id)->where('nombreinput', Input::get('nombreinput'))->count();
     }
     if($user > 0){
      $isAvailable = FALSE;
     }else{
      $isAvailable = TRUE;
     }
     echo json_encode(
     array(
     'valid' => $isAvailable
     )); 
    }


        public function checkUsernameAvailabilityinputcrm($id){
      if(!$this->tenantName){
     $user = Formu::orWhere('content_id','=', $id)->where('nombreinputcrm', Input::get('nombreinputcrm'))->count();
     }
     else{
       $user = \DigitalsiteSaaS\Pagina\Tenant\Formu::orWhere('content_id','=', $id)->where('nombreinputcrm', Input::get('nombreinputcrm'))->count();
   
     }


     if($user > 0){
      $isAvailable = FALSE;
     }else{
      $isAvailable = TRUE;
     }
     echo json_encode(
     array(
     'valid' => $isAvailable
     )); 
    }

    public function autocomplete(Request $request)
    {
      if(!$this->tenantName){
        $data = Product::select("name as name","image as img","name as desc")->where("name","LIKE","%{$request->input('query')}%")->get();
        return response()->json($data);
      }else{
        $data = \DigitalsiteSaaS\Pagina\Tenant\Product::select("name as name","image as img","name as desc")->where("name","LIKE","%{$request->input('query')}%")->get();
        return response()->json($data);
      }
    }


     public function contador($id)
    {
      if(!$this->tenantName){
       $url = Content::where('id',$id)->pluck('url');
       Content::where('id',$id)->limit(1)->update(['content'=> DB::raw('content + 1')]);
      }else{
        $url = \DigitalsiteSaaS\Pagina\Tenant\Content::where('id',$id)->pluck('url');
        \DigitalsiteSaaS\Pagina\Tenant\Content::where('id',$id)->limit(1)->update(['content'=> DB::raw('content + 1')]);
      }

      foreach ($url as $url){

return redirect($url);
}
    }


    public function autoCompletea()
    {
        return view('autocomplete');
    }
    
    public function autoCompleteAjax(Request $request)
    {
        $search=  $request->term;
        
        $posts = \DigitalsiteSaaS\Carrito\Tenant\Product::where('name','LIKE',"%{$search}%")
                       ->orderBy('created_at','DESC')->limit(5)->get();

        if(!$posts->isEmpty())
        {
            foreach($posts as $post)
            {
                
                $new_row['name']= $post->name;
                $new_row['image']= $post->image;
                $new_row['slug']= url('product/detail/'.$post->slug);
                $row_set[] = $new_row; //build an array
            }
        }
        
        echo json_encode($row_set); 
    }



    public function checkUsernameAvailabilitydocument(){
     $user = DB::table('clientes')->where('documento', Input::get('documento'))->count();
     if($user > 0) {
      $isAvailable = FALSE;
     }else{
     $isAvailable = TRUE;}
     echo json_encode(
      array(
      'valid' => $isAvailable
     )); 
    }

    public function registrara(){
   $contenido = new Registrow;
   $contenido->evento_id = Input::get('evento');
   $contenido->usuario_id = Input::get('usuario');
   $contenido->redireccion = Input::get('redireccion');
   $contenido->save();
     return Redirect($contenido->redireccion)->with('status', 'ok_create');
  }

    public function robot(){
    if(!$this->tenantName){
      $seo = Seo::where('id','=',1)->get(); 
    }else{
      $seo = \DigitalsiteSaaS\Pagina\Tenant\Seo::where('id','=',1)->get(); 
    }
    return view('pagina::configuracion/robots')->with('seo', $seo);
    }

   public function mensajeficha(){

        if(!$this->tenantName){   
      $userma = Message::create([
      'nombre' => Input::get('nombre'),
      'sujeto' => Input::get('sujeto'),
      'cargo' => Input::get('cargo'),
      'email' => Input::get('email'),
      'interes' => Input::get('interes'),
      'datos' => Input::get('datos'),
      'mensaje' => Input::get('mensaje'),
      'empresa' => Input::get('empresa'),
      'remember_token' => Input::get('_token'),
          ]);
      }else{
        $userma = \DigitalsiteSaaS\Pagina\Tenant\Message::create([
      'nombre' => Input::get('nombre'),
      'sujeto' => Input::get('sujeto'),
      'cargo' => Input::get('cargo'),
      'email' => Input::get('email'),
      'interes' => Input::get('interes'),
      'datos' => Input::get('datos'),
      'mensaje' => Input::get('mensaje'),
      'empresa' => Input::get('empresa'),
      'remember_token' => Input::get('_token'),
          ]);
      }
        $redireccion = Input::get('redireccion');
        $ema = Input::get('ema');

      $datas = DB::table('datos')->where('id','1')->get();
      foreach ($datas as $user){
        Mail::to(Input::get('email'))
          ->bcc($user->correo)
          ->cc($ema)
        ->send(new Mensajeficha($userma));

      }
  
    return Redirect::to($redireccion)->with('status', 'ok_create');
}


    public function crearmensajeinput(){

       if(!$this->tenantName){
     $userma = Messagema::create([
   'campo1' => Input::get('campo1'),
   'campo2' => Input::get('campo2'),
   'campo3' => Input::get('campo3'),
   'campo4' => Input::get('campo4'),
   'campo5' => Input::get('campo5'),
   'campo6' => Input::get('campo6'),
   'campo7' => Input::get('campo7'),
   'campo8' => Input::get('campo8'),
   'campo9' => Input::get('campo9'),
   'campo10' => Input::get('campo10'),
   'campo11' => Input::get('campo11'),
   'campo12' => Input::get('campo12'),
   'campo13' => Input::get('campo13'),
   'campo14' => Input::get('campo14'),
   'campo15' => Input::get('campo15'),
   'campo16' => Input::get('campo16'),
   'campo17' => Input::get('campo17'),
   'campo18' => Input::get('campo18'),
   'campo19' => Input::get('campo19'),
   'campo20' => Input::get('campo20'),
   'form_id' => Input::get('form_id'),
   'email' => Input::get('email'),
   'radio' => Input::get('radio'),
   'estado' => '0',
   'remember_token' => Hash::make('_token'),
     ]);

     
    $usermacrm = Gestion::create([
   'nombre' => Input::get('campo1'),
   'apellido' => Input::get('campo2'),
   'email' => Input::get('campo3'),
   'numero' => Input::get('campo4'),
   'direccion' => Input::get('campo5'),
   'empresa' => Input::get('campo6'),
   'nit' => '1',
   'interes' => '1',
   'sector_id' => '1',
   'cantidad_id' => '1',
   'referido_id' => '1',
   'pais_id' => '1',
   'ciudad_id' => '1',
   'comentarios' => '1',
   'tipo' => '1',
   'utm_source' => Input::get('utm_source'),
   'utm_campaign' => Input::get('utm_campaign'),
   'utm_medium' => Input::get('utm_medium'),
   'remember_token' => Hash::make('_token'),
]);



     $envio =  Input::get('form_id');
     $redireccion = Input::get('redireccion');
     $ema = Input::get('email');
      if($ema == ''){
      return Redirect::to($redireccion)->with('status', 'ok_create');
     }
     else{
      $datas = Content::where('id',$envio)->get();
       foreach ($datas as $user){
       Mail::to(Input::get('email'))
       ->bcc($user->video)
     ->send(new Mensajema($userma));
     }
     return Redirect::to($redireccion)->with('status', 'ok_create');
   }
    }

    $userma = \DigitalsiteSaaS\Pagina\Tenant\Messagema::create([
   'campo1' => Input::get('campo1'),
   'campo2' => Input::get('campo2'),
   'campo3' => Input::get('campo3'),
   'campo4' => Input::get('campo4'),
   'campo5' => Input::get('campo5'),
   'campo6' => Input::get('campo6'),
   'campo7' => Input::get('campo7'),
   'campo8' => Input::get('campo8'),
   'campo9' => Input::get('campo9'),
   'campo10' => Input::get('campo10'),
   'campo11' => Input::get('campo11'),
   'campo12' => Input::get('campo12'),
   'campo13' => Input::get('campo13'),
   'campo14' => Input::get('campo14'),
   'campo15' => Input::get('campo15'),
   'campo16' => Input::get('campo16'),
   'campo17' => Input::get('campo17'),
   'campo18' => Input::get('campo18'),
   'campo19' => Input::get('campo19'),
   'campo20' => Input::get('campo20'),
   'form_id' => Input::get('form_id'),
   'email' => Input::get('email'),
   'radio' => Input::get('radio'),
   'estado' => '0',
   'remember_token' => Hash::make('_token'),
]);

    if(Input::get('campo1') == '')
    $campo1 = '0';
    else
    $campo1 = Input::get('campo1');
    if(Input::get('campo2') == '')
    $campo2 = '0';
    else
    $campo2 = Input::get('campo2');

      if(Input::get('campo3') == '')
    $campo3 = '0';
    else
    $campo3 = Input::get('campo3');

  if(Input::get('email') == '')
    $email = '0';
    else
    $email = Input::get('email');
    if(Input::get('campo4') == '')
    $campo4 = '0';
    else
    $campo4 = Input::get('campo4');
  if(Input::get('campo5') == '')
    $campo5 = 'Sin Informacion';
    else
    $campo5 = Input::get('campo5');
    if(Input::get('campo6') == '')
    $campo6 = '0';
    else
    $campo6 = Input::get('campo6');
  if(Input::get('producto') == '')
    $interes = '0';
    else
    $interes = Input::get('producto');
  if(Input::get('utm_crm') == '')
    $utm_crm = '0';
    else
    $utm_crm = Input::get('utm_crm');
  if(Input::get('utm_medium') == '')
    $utm_medium = '0';
    else
    $utm_medium = Input::get('utm_medium');
  if(Input::get('utm_campaign') == '')
    $utm_campaign = '0';
    else
    $utm_campaign = Input::get('utm_campaign');
  if(Input::get('utm_source') == '')
    $utm_source = '0';
    else
    $utm_source = Input::get('utm_source');

   $usermacrm = \DigitalsiteSaaS\Gestion\Tenant\Gestion::create([
   'nombre' => $campo1,
   'apellido' => $campo2,
   'email' => $email,
   'numero' => $campo3,
   'direccion' => $campo4,
   'empresa' => $campo5,
   'nit' => '1',
   'interes' => $interes,
   'sector_id' => '1',
   'cantidad_id' => '1',
   'referido_id' => $utm_crm,
   'utm_source' => $utm_source,
   'utm_campaign' => $utm_campaign,
   'utm_medium' => $utm_medium,
   'pais_id' => '1',
   'ciudad_id' => '1',
   'comentarios' => '1',
   'tipo' => '1',
   'remember_token' => Hash::make('_token'),
]);

  $envio =  Input::get('form_id');
     $redireccion = Input::get('redireccion');
     $ema = Input::get('email');
      if($ema == ''){
      return Redirect::to($redireccion)->with('status', 'ok_create');
     }
     else{
      $datas =\DigitalsiteSaaS\Pagina\Tenant\Content::where('id',$envio)->get();
       foreach ($datas as $user){
        $for = ['darioma07@hotmail.com','darioma07@gmail.com','dario.martinez@sitedigital.com.co'];
        $id_str = explode(',', trim($user->video));
       Mail::to(Input::get('email'))
       ->bcc([$id_str][0])
     ->send(new Mensajema($userma));
     }
     return Redirect::to($redireccion)->with('status', 'ok_create');
   }
    
    }

  public function estadistica(){
    if(!$this->tenantName){
   $user = Ips::where('ip', Input::get('ip'))->first();
    }else{
    $user = \DigitalsiteSaaS\Pagina\Tenant\Ips::where('ip', Input::get('ip'))->first();
    } 
   if ($user){} else{
   if(!$this->tenantName){
   $pagina = new Estadistica;
   }else{
   $pagina = new \DigitalsiteSaaS\Pagina\Tenant\Estadistica;
   }
   $pagina->ip = Input::get('ip');
   $pagina->host = Input::get('host');
   $pagina->navegador = Input::get('navegador');
   $pagina->referido = Input::get('referido');
   $pagina->ciudad = Input::get('ciudad');
   $pagina->pais = Input::get('pais');
   $pagina->pagina = Input::get('pagina');
   $pagina->mes = Input::get('mes');
   $pagina->ano = Input::get('ano');
   $pagina->hora = Input::get('hora');
   $pagina->dia = Input::get('dia');
   $pagina->idioma = Input::get('idioma');
   $pagina->cp = Input::get('cp');
   $pagina->longitud = Input::get('longitud');
   $pagina->latitud = Input::get('latitud');
   $pagina->fecha = Input::get('fecha');
   $pagina->cp = Input::get('meses');
   $pagina->utm_medium = Input::get('utm_medium');
   $pagina->utm_source = Input::get('utm_source');
   $pagina->utm_campana = Input::get('utm_campana');
   $pagina->remember_token = Input::get('_token');
   $pagina->save();
     $redireccion = Input::get('redireccion');
     return Redirect::to($redireccion)->with('status', 'ok_create');
    }
   }
  }