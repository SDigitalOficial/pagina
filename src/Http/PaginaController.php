<?php

 namespace DigitalsiteSaaS\Pagina\Http;
 use DigitalsiteSaaS\Pagina\Page;
 use DigitalsiteSaaS\Pagina\Inputweb;
  use DigitalsiteSaaS\Pagina\Content;
 use DB;
 use Auth;
 use Zipper;
 use File;
 use Storage;
 use DigitalsiteSaaS\Pagina\User;
 use DigitalsiteSaaS\Pagina\Zippera;
 use DigitalsiteSaaS\Pagina\Messagema;
 use DigitalsiteSaaS\Pagina\Color;
 use DigitalsiteSaaS\Pagina\Pais;
 use App\Http\Controllers\Controller;
 use Input;
 use DigitalsiteSaaS\Pagina\Diagrama;
 use Illuminate\Support\Str;
 use Illuminate\Filesystem\Filesystem;
 use Illuminate\Http\Request;
 use Hyn\Tenancy\Models\Hostname;
 use Hyn\Tenancy\Models\Website;
 use Hyn\Tenancy\Repositories\HostnameRepository;
 use Hyn\Tenancy\Repositories\WebsiteRepository;
 use Carbon\Carbon;
 use Hash;
 use GuzzleHttp\Client;

 class PaginaController extends Controller{

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
  if(!$this->tenantName){

  $conteo = Messagema::where('estado','=','0')->count();
  $paginas = Page::all();
  $menu = Page::whereNull('page_id')->get();
  $casta = Page::count();
  $user = Page::where('posti','=','1')->count();
  }
  else{
  $paginas = \DigitalsiteSaaS\Pagina\Tenant\Page::all();
  $conteo = \DigitalsiteSaaS\Pagina\Tenant\Messagema::where('estado','=','0')->count();
  $menu = \DigitalsiteSaaS\Pagina\Tenant\Page::whereNull('page_id')->get();
  $casta = \DigitalsiteSaaS\Pagina\Tenant\Page::count();
  $user = \DigitalsiteSaaS\Pagina\Tenant\Page::where('posti','=','1')->count();
  }
  return view('pagina::paginas.paginas')->with('paginas', $paginas)->with('user', $user)->with('casta', $casta)->with('menu', $menu)->with('conteo', $conteo);
 
}


 public function sitesaas(){


$tarjetas = DB::table('tarjetas')->where('email', '=', Auth::user()->email)->get();
$tarjetascont = DB::table('tarjetas')->where('email', '=', Auth::user()->email)->count();
$suscripcioncont = DB::table('suscripcion')->where('user_id', '=', Auth::user()->id)->count();

if(!Auth::user()->saas_id){
  $suscripcion = DB::table('suscripcion')->where('user_id','=', Auth::user()->id)->orderby('id','DESC')->take(1)->get();

  $planes = DB::table('planes')->get();
 return View('pagina::saas.dashboard')->with('planes', $planes)->with('suscripcion', $suscripcion)->with('tarjetas', $tarjetas)->with('tarjetascont', $tarjetascont)->with('suscripcioncont', $suscripcioncont);
}else{

  $number = Auth::user()->id;
$idsuscripcion = DB::table('trans_payco')->where('email', '=', Auth::user()->email)->pluck('extra1')->first();

  $facturas = DB::table('trans_payco')->where('email','=', Auth::user()->email)->get();

  $infosaas = DB::table('tenancy.hostnames')
  ->join('tenancy.websites','websites.id','=','hostnames.website_id')
  ->where('hostnames.id', Auth::user()->saas_id)
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

  return View('pagina::saas.dashboard')->with('number', $number)->with('infosaas', $infosaas)->with('website', $website)->with('resp', $resp)->with('facturas', $facturas)->with('idsuscripcion', $idsuscripcion)->with('tarjetas', $tarjetas);
  }
} 

 public function editarsaas(){
  $paises = Pais::all();
  $usuario = User::leftJoin('paises', 'paises.id', '=', 'users.pais_id')->where('users.id','=', Auth::user()->id)->get();
  return View('pagina::saas.editar-usuario')->with('usuario', $usuario)->with('paises', $paises);
 }

  public function editarcontrasena(){
  $paises = Pais::all();
  $usuario = User::leftJoin('paises', 'paises.id', '=', 'users.pais_id')->where('users.id','=', Auth::user()->id)->get();
  return View('pagina::saas.editar-contrasena')->with('usuario', $usuario)->with('paises', $paises);
 }

 public function actualizaruser($id){
 $remember = Input::get('_token');
 $password = Input::get('password');
 $input = Input::all();
 $user = User::find($id);
 $user->name = Input::get('nombre');
 $user->last_name = Input::get('apellido');
 $user->tipo_documento = Input::get('tipo');
 $user->documento = Input::get('documento');
 $user->email = Input::get('email');
 $user->address = Input::get('direccion');
 $user->pais_id = Input::get('pais');
 $user->phone = Input::get('telefono');
 $user->rol_id = Auth::user()->rol_id;
 $user->save();
 return Redirect('/editar/usuariosaas')->with('status', 'ok_update');
}

public function actualizaruserpass($id){
 $remember = Input::get('_token');
 $password = Input::get('password');
 $input = Input::all();
 $user = User::find($id);
 $user->name = Input::get('nombre');
 $user->last_name = Input::get('apellido');
 $user->tipo_documento = Input::get('tipo');
 $user->documento = Input::get('documento');
 $user->email = Input::get('email');
 $user->address = Input::get('direccion');
 $user->pais_id = Input::get('pais');
 $user->phone = Input::get('telefono');
 $user->rol_id = Auth::user()->rol_id;
 $user->password = Hash::make($password);
 $user->remember_token = Hash::make($remember);
 $user->save();
 return Redirect('/editar/usuariosaas')->with('status', 'ok_update');
}


 public function show(){
   if(!$this->tenantName){
  $number = Auth::user()->id;
  $user = Page::where('posti','=','1')->count();
  $conteo = Messagema::where('estado','=','0')->count();
  }else{
  $number = Auth::user()->id;
  $user = \DigitalsiteSaaS\Pagina\Tenant\Page::where('posti','=','1')->count();
  $conteo = \DigitalsiteSaaS\Pagina\Tenant\Messagema::where('estado','=','0')->count();
  }
  return View('pagina::paginas.crear-pagina')->with('user', $user)->with('number', $number)->with('conteo', $conteo);
 }

 public function registrosaas(){
  $tenantName = $this->tenantName;
  return View('auth.register')->with('tenantName', $tenantName);
 }





public function consultaform(){
  if(!$this->tenantName){
  $formulario =  Input::get('formulario') ;
  $plantilla = Inputweb::where('content_id','=',$formulario)->orderBy('nombreinput', 'asc')->get();
  $respuesta = Messagema::where('form_id','=',$formulario)->orderBy('id', 'asc')->get();
  $contenido = Content::where('type','=','formulas')->get();
  $conteo = Messagema::where('estado','=','0')->count();
 }else{
  $formulario =  Input::get('formulario') ;
  $plantilla = \DigitalsiteSaaS\Pagina\Tenant\Inputweb::where('content_id','=',$formulario)->orderBy('nombreinput', 'asc')->get();
  $respuesta = \DigitalsiteSaaS\Pagina\Tenant\Messagema::where('form_id','=',$formulario)->orderBy('id', 'asc')->get();
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Content::where('type','=','formulas')->get();
  $conteo = \DigitalsiteSaaS\Pagina\Tenant\Messagema::where('estado','=','0')->count();
 }
 return View('pagina::mercado')->with('plantilla', $plantilla)->with('respuesta', $respuesta)->with('contenido', $contenido)->with('conteo', $conteo);
 }



  public function editardiagrama($id){
  if(!$this->tenantName){
  $diagramas = Diagrama::where('id', "=", $id)->get();
  }else{
  $diagramas = \DigitalsiteSaaS\Pagina\Tenant\Diagrama::where('id', "=", $id)->get();
  }
  return View('pagina::actualizar-diagrama')->with('diagramas', $diagramas);
 }



 public function crearpagina(){

  if(!$this->tenantName){
  $pagina = new Page;
  $pagina->page = Input::get('pagina');
  $pagina->slug = Str::slug($pagina->page);
  $pagina->description = Input::get('descripcion');
  $pagina->visualizafoot = Input::get('visualizafoot');
  $pagina->titulo = Input::get('titulo');
  $pagina->palabras = Input::get('palabras');
  $pagina->posti = Input::get('posti');
  $pagina->posta = Input::get('posicion');
  $pagina->robot = '1';
  $pagina->nivel = Input::get('nivel');
  $pagina->categoria = Input::get('categoria');
  $pagina->sitio = Input::get('sitio');
  $pagina->idioma = Input::get('idioma');
  $pagina->seguimiento = Input::get('seguimiento');
  $pagina->pixel = Input::get('pixel');
  $pagina->page_id = Input::get('DNI');
  $pagina->save();
  $diagrama = new Diagrama;
  $diagrama->posicionSD01 = 'row';
  $diagrama->posicionSD1 = 'container';
  $diagrama->posicionSD2 = 'row';
  $diagrama->posicionSD02 = 'container';
  $diagrama->posicionSD3 = 'container';
  $diagrama->bloque = 'container';
  $diagrama->bloqueSD1 = 'container';
  $diagrama->bloqueSD2 = 'container';
  $diagrama->bloqueSD3 = 'container';
  $diagrama->bloqueSD4 = 'container';
  $diagrama->bloqueSD5 = 'container';
  $diagrama->bloqueSD6 = 'container';
  $diagrama->bloqueSD7 = 'container';
  $diagrama->bloqueSD8 = 'container';
  $diagrama->bloqueSD9 = 'container';
  $diagrama->posicionSD4 = 'col-xs-12 col-sm-12 col-md-3 col-lg-3';
  $diagrama->posicionSD5 = 'col-xs-12 col-sm-12 col-md-6 col-lg-6';
  $diagrama->posicionSD6 = 'col-xs-12 col-sm-12 col-md-3 col-lg-3';
  $diagrama->posicionSD7 = 'container';
  $diagrama->posicionSD8 = 'container';
  $diagrama->posicionSD9 = 'row';
  $diagrama->bloqueblog = 'container';
  $diagrama->posicionSD03 = 'container';
  $diagrama->bloqueficha1 = 'container';
  $diagrama->bloqueficha2 = 'container';
  $diagrama->save();
 }
 else{
  $pagina = new \DigitalsiteSaaS\Pagina\Tenant\Page;
  $pagina->page = Input::get('pagina');
  $pagina->slug = Str::slug($pagina->page);
  $pagina->description = Input::get('descripcion');
  $pagina->visualizafoot = Input::get('visualizafoot');
  $pagina->titulo = Input::get('titulo');
  $pagina->palabras = Input::get('palabras');
  $pagina->posti = Input::get('posti');
  $pagina->nivel = Input::get('nivel');
  $pagina->robot = '1';
  $pagina->categoria = Input::get('categoria');
  $pagina->sitio = Input::get('sitio');
  $pagina->idioma = Input::get('idioma');
  $pagina->seguimiento = Input::get('seguimiento');
  $pagina->pixel = Input::get('pixel');
  $pagina->page_id = Input::get('DNI');
  $pagina->save();
  $diagrama = new \DigitalsiteSaaS\Pagina\Tenant\Diagrama;
  $diagrama->posicionSD01 = 'row';
  $diagrama->posicionSD1 = 'container';
  $diagrama->posicionSD2 = 'row';
  $diagrama->posicionSD02 = 'container';
  $diagrama->posicionSD3 = 'container';
  $diagrama->bloque = 'container';
  $diagrama->bloqueSD1 = 'container';
  $diagrama->bloqueSD2 = 'container';
  $diagrama->bloqueSD3 = 'container';
  $diagrama->bloqueSD4 = 'container';
  $diagrama->bloqueSD5 = 'container';
  $diagrama->bloqueSD6 = 'container';
  $diagrama->bloqueSD7 = 'container';
  $diagrama->bloqueSD8 = 'container';
  $diagrama->bloqueSD9 = 'container';
  $diagrama->posicionSD4 = 'col-xs-12 col-sm-12 col-md-3 col-lg-3';
  $diagrama->posicionSD5 = 'col-xs-12 col-sm-12 col-md-6 col-lg-6';
  $diagrama->posicionSD6 = 'col-xs-12 col-sm-12 col-md-3 col-lg-3';
  $diagrama->posicionSD7 = 'container';
  $diagrama->posicionSD8 = 'container';
  $diagrama->posicionSD9 = 'row';
  $diagrama->bloqueblog = 'container';
  $diagrama->posicionSD03 = 'container';
  $diagrama->bloqueficha1 = 'container';
  $diagrama->bloqueficha2 = 'container';
  $diagrama->save();
  }
  return Redirect('gestion/paginas')->with('status', 'ok_create');
 }

 public function actualizar($id){
  $input = Input::all();
  if(!$this->tenantName){
  $pagina = Page::find($id);
  }
  else{
  $pagina = \DigitalsiteSaaS\Pagina\Tenant\Page::find($id);
  }
  $pagina->page = Input::get('pagina');
  $pagina->slug = Str::slug($pagina->page);
  $pagina->visualizafoot = Input::get('visualizafoot');
  $pagina->description = Input::get('descripcion');
  $pagina->titulo = Input::get('titulo');
  $pagina->nivel = Input::get('nivel');
  $pagina->posta = Input::get('posicion');
  $pagina->robot = '1';
  $pagina->categoria = Input::get('categoria');
  $pagina->sitio = Input::get('sitio');
  $pagina->idioma = Input::get('idioma');
  $pagina->palabras = Input::get('palabras');	
  $pagina->seguimiento = Input::get('seguimiento');
  $pagina->pixel = Input::get('pixel');
  $pagina->save();
  return Redirect('gestion/paginas')->with('status', 'ok_update');
 }

 public function editar($id){
  if(!$this->tenantName){
  $number = Auth::user()->id;
  $paginas = Page::find($id);
}
else{
  $number = Auth::user()->id;
  $paginas = \DigitalsiteSaaS\Pagina\Tenant\Page::find($id);
}
  return view('pagina::paginas.editar-pagina')->with('paginas', $paginas)->with('number', $number);
 }


  public function editarre($id){
  if(!$this->tenantName){
  $number = Auth::user()->id;
  $paginas = Page::find($id);
}
else{
  $number = Auth::user()->id;
  $paginas = \DigitalsiteSaaS\Pagina\Tenant\Page::find($id);
}
  return view('pagina::paginas.editar-paginare')->with('paginas', $paginas)->with('number', $number);
 }

 public function subpagina(){
  if(!$this->tenantName){
  $user = Page::where('posti','=','1')->count();
  $conteo = Messagema::where('estado','=','0')->count();
  }else{
  $user =  \DigitalsiteSaaS\Pagina\Tenant\Page::where('posti','=','1')->count();
  $conteo = \DigitalsiteSaaS\Pagina\Tenant\Messagema::where('estado','=','0')->count();
  }
  return View('pagina::paginas.crear-subpagina')->with('user', $user)->with('conteo', $conteo);
 }

 public function eliminar($id){
 if(!$this->tenantName){
  $res = Diagrama::where('id',$id)->delete();
  $conteo = Page::where('page_id','=',$id)->count();
  if($conteo == 0){
  $pagina = Page::find($id);
  $pagina->delete();
    return Redirect('/gestion/paginas')->with('status', 'ok_delete');
  }
  else{
    return Redirect('/gestion/paginas')->with('status', 'ok_nodelete');
  }
 }else{
  $res = \DigitalsiteSaaS\Pagina\Tenant\Diagrama::where('id',$id)->delete();
  $conteo = \DigitalsiteSaaS\Pagina\Tenant\Page::where('page_id','=',$id)->count();
  if($conteo == 0){
  $pagina = \DigitalsiteSaaS\Pagina\Tenant\Page::find($id);
  $pagina->delete();
    return Redirect('/gestion/paginas')->with('status', 'ok_delete');
  }
  else{
    return Redirect('/gestion/paginas')->with('status', 'ok_nodelete');
  }
  }
 }

}