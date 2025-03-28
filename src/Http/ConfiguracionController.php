<?php

namespace DigitalsiteSaaS\Pagina\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Input;
use Madzipper;
use File;
use Auth;
use Storage;
use Illuminate\Support\Str;
use DigitalsiteSaaS\Pagina\Template;
use DigitalsiteSaaS\Pagina\Zippera;
use DigitalsiteSaaS\Pagina\Color;
use DigitalsiteSaaS\Pagina\Venta;
use DigitalsiteSaaS\Pagina\Date;
use DigitalsiteSaaS\Pagina\Paiscon;
use DigitalsiteSaaS\Pagina\Departamentocon;
use DigitalsiteSaaS\Pagina\Pais;
use DigitalsiteSaaS\Pagina\Municipio;
use DigitalsiteSaaS\Pagina\Recaptcha;
use DigitalsiteSaaS\Pagina\Whatsapp;
use App\User;
use Excel;
use GuzzleHttp\Client;
use DigitalsiteSaaS\Pagina\Seo;

class ConfiguracionController extends Controller
{

    protected $tenantName = null;

 public function __construct(){
  $this->middleware('auth');

  $hostname = app(\Hyn\Tenancy\Environment::class)->hostname();
        if ($hostname){
            $fqdn = $hostname->fqdn;
            $this->tenantName = explode(".", $fqdn)[0];
        }
 }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
     $tenantName = $this->tenantName;
     $templates = DB::table('templa')
     ->get();
     return view('pagina::configuracion.ver-templates')->with('templates', $templates)->with('tenantName', $tenantName);
    }


     public function publico(){
  return view('pagina::configuracion.publico');
 }

 public function privado(){
  return view('pagina::configuracion.privado');
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
     $file = Input::file('file');
     $destinoPath = public_path().'/templatezip';
     $destinoPathweb = public_path().'/Template/momo';
     $url_imagen = $file->getClientOriginalName();
     $url = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
     $urlenvio = $destinoPath.'/'.$url_imagen;
     $subir=$file->move($destinoPath,$file->getClientOriginalName());
     $destinoPathsite = public_path().'/Template/'.$url.'/template/';
     $path = base_path() . '/resources/views/Templates/'.$url;
     File::makeDirectory($path, 0777, true);
     $zipper = new Madzipper();
     Madzipper::make($urlenvio)->extractTo('Template');
     $zippera = new Zippera;
     $zippera->nombre = $url;
     $zippera->slug = Str::slug($zippera->nombre);
     $zippera->save();
     $color = new Color;
     $color->template = Str::slug($url);
     $color->save();
     $memo =  public_path().'\old_folders';
     $mema =  base_path().'\new_folders';
     File::copyDirectory($destinoPathsite,$path);
     File::deleteDirectory($destinoPathweb);
     return Redirect('gestor/subir-template')->with('status', 'ok_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id){
     $input = Input::all();
     $configuracion = Color::find($id);
     $configuracion->bg_encabezado = Input::get('bg-encabezado');
     $configuracion->text_encabezado = Input::get('text-encabezado');
     $configuracion->icon_encabezado = Input::get('icono-encabezado');
     $configuracion->titulo_basep = Input::get('titulo-principal');
     $configuracion->titulo_bases = Input::get('titulo-secundario');
     $configuracion->btn_base = Input::get('btn-base');
     $configuracion->icon_base = Input::get('icono-base');
     $configuracion->btn_alto = Input::get('btn-alto');
     $configuracion->icon_pie = Input::get('icono-pie');
     $configuracion->titulo_pie = Input::get('titulo-pie');
     $configuracion->btn_baseh = Input::get('btn-baseh');
     $configuracion->bg_menu = Input::get('bg-menu');
     $configuracion->btn_pie = Input::get('boton-pie');
     $configuracion->btn_pieh = Input::get('boton-pieh');
     $configuracion->text_menu = Input::get('text-menu');
     $configuracion->text_menuh = Input::get('text-menuh');
     $configuracion->text_base = Input::get('text-base');
     $configuracion->icon_bajo = Input::get('icono-bajo');
     $configuracion->bg_boton = Input::get('bg-boton');
     $configuracion->btn_redondo = Input::get('btn-redondo');
     $configuracion->inp_alto = Input::get('inp-alto');
     $configuracion->bg_pie = Input::get('bg-pie');
     $configuracion->text_pie = Input::get('text-pie');
     $configuracion->bg_bajo = Input::get('bg-bajo');
     $configuracion->text_bajo = Input::get('text-bajo');
     $configuracion->template = Input::get('template');
     $configuracion->save();
     return Redirect('gestor/ver-templates')->with('status', 'ok_update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
     $destinoPathweb = public_path().'/Template/'.$id;
     $destinoPathwebbase = base_path().'/resources/views/Templates/'.$id;
     $destinoPathwebbasesite = public_path().'/templatezip/'.$id.'.zip';
     File::deleteDirectory($destinoPathweb);
     File::deleteDirectory($destinoPathwebbase);
     File::delete($destinoPathwebbasesite);
     $templates = DB::table('templa')->where('nombre',$id)->delete();
     $templatescolor = DB::table('colors')->where('template',$id)->delete();
     return Redirect('/gestor/ver-templates')->with('status', 'ok_delete');
    }

    public function templatevista(){
     return view('pagina::configuracion.crear-template');
    }

   


    public function crearconfiguracion(){
     $configuracion = new Color;
     $configuracion->bg_encabezado = Input::get('bg-encabezado');
     $configuracion->text_encabezado = Input::get('text-encabezado');
     $configuracion->bg_menu = Input::get('bg-menu');
     $configuracion->text_menu = Input::get('text-menu');
     $configuracion->text_menuh = Input::get('text-menuh');
     $configuracion->text_base = Input::get('text-base');
     $configuracion->btn_redondo = Input::get('btn-redondo');
     $configuracion->inp_alto = Input::get('inp-alto');
     $configuracion->bg_pie = Input::get('bg-pie');
     $configuracion->text_pie = Input::get('text-pie');
     $configuracion->bg_bajo = Input::get('bg-bajo');
     $configuracion->text_bajo = Input::get('text-bajo');
     $configuracion->template = Input::get('template');
     $configuracion->save();
     return Redirect('gestor/ver-templates')->with('status', 'ok_create');
    }

      public function seo(){
    if(!$this->tenantName){  
     $seo = Seo::where('id', '=', '1')->get();
     }else{
     $seo = \DigitalsiteSaaS\Pagina\Tenant\Seo::where('id', '=', '1')->get();   
     }
     return View('pagina::configuracion.seo')->with('seo', $seo);
    }

    public function updateseo(){
     $input = Input::all();
     if(!$this->tenantName){
     $contenido = Seo::find(1);
     }else{
     $contenido = \DigitalsiteSaaS\Pagina\Tenant\Seo::find(1);
     }
     $contenido->idioma = Input::get('idioma');
     $contenido->canonical = Input::get('canonical');
     $contenido->robots = Input::get('robot');
     $contenido->og_type = Input::get('og_type');
     $contenido->og_image = Input::get('FilePath');
     $contenido->og_url = Input::get('og_url');
     $contenido->og_title = Input::get('og_title');
     $contenido->og_name = Input::get('og_name');
     $contenido->og_description = Input::get('og_description');
     $contenido->twitter_card = Input::get('twitter_card');
     $contenido->twitter_site = Input::get('twitter_site');
     $contenido->twitter_creator = Input::get('twitter_creator');
     $contenido->twitter_title = Input::get('twitter_title');
     $contenido->twitter_description = Input::get('twitter_description');
     $contenido->twitter_image = Input::get('FilePatha');
     $contenido->analitica = Input::get('analitica');
     $contenido->ads = Input::get('ads');
     $contenido->ico = Input::get('FilePathb');
     $contenido->icoapple = Input::get('FilePathc');

     $contenido->save();
     return Redirect('gestor/ver-templates')->with('status', 'ok_update');
    }

    public function venta(){
     if(!$this->tenantName){  
     $venta = Venta::where('id', '=', '1')->get();
     }else{
     $venta = \DigitalsiteSaaS\Pagina\Tenant\Venta::where('id', '=', '1')->get();   
     }
     return View('pagina::configuracion.venta')->with('venta', $venta);
    }

    public function crearlogo(){
     $contenido = Input::all();
     if(!$this->tenantName){
     $contenido = Template::find(1);
     }else{
     $contenido = \DigitalsiteSaaS\Pagina\Tenant\Template::find(1); 
     }
     $contenido->logo = Input::get('FilePath');
     $contenido->save();
     return Redirect('gestion/logo-head')->with('status', 'ok_update');
    }

    public function verredes(){
    if(!$this->tenantName){
     $template = Template::all();
     $plantilla = Template::all();
    }else{
     $template = \DigitalsiteSaaS\Pagina\Tenant\Template::all();
     $plantilla = \DigitalsiteSaaS\Pagina\Tenant\Template::all(); 
    }
     return View('pagina::configuracion.redes')->with('plantilla', $plantilla)->with('template', $template);
    }


    public function tenants(){
    if(!$this->tenantName){
    $tenants = DB::table('tenancy.hostnames')->get(); 
    $sites = DB::table('tenancy.websites')->get();
    $users = DB::table('multitenant.users')->get();
    }else{
     $tenants = DB::table('tenancy.hostnames')->get(); 
     $sites = DB::table('tenancy.websites')->get();
     $users = DB::table('multitenant.users')->get();
   
 
    }
   
     return View('pagina::configuracion.tenants')->with('tenants', $tenants)->with('sites', $sites)->with('users', $users);
    }

    public function editartenants($id){
    if(!$this->tenantName){
    $tenants = DB::table('tenancy.hostnames')->where('id','=',$id)->get();
    $users = User::all();
    }else{
     $tenants = DB::table('tenancy.hostnames')->where('id','=',$id)->get();
     $users = User::all();
    }
   dd($users);
     return View('pagina::configuracion.editartenants')->with('tenants', $tenants)->with('users', $users);
    }

    public function verubicacion(){
    if(!$this->tenantName){
    $pais = Paiscon::all();
    }else{
    $pais = \DigitalsiteSaaS\Pagina\Tenant\Paiscon::all();
    }
    return View('pagina::configuracion.paises')->with('pais',$pais);
    }

    public function creardepartamentos($id){
     return View('pagina::configuracion.crear-departamento');
    }

    public function crearwhatsapp(){
        if(!$this->tenantName){
    $whatsapp = Whatsapp::count();
    
    }else{
    $whatsapp = \DigitalsiteSaaS\Pagina\Tenant\Whatsapp::count();  
    }
     return View('pagina::configuracion.crear-whatsapp')->with('whatsapp', $whatsapp);
    }

    public function creamunicipio($id){
    return View('pagina::configuracion.crear-municipio');
    }

    public function configwhatsapp(){
    if(!$this->tenantName){
    $whatsapp = Whatsapp::all();
    }else{
    $whatsapp = \DigitalsiteSaaS\Pagina\Tenant\Whatsapp::all();  
    }
    return View('pagina::configuracion.whatsapp')->with('whatsapp', $whatsapp);
    }


    public function configcorreo(){
    if(!$this->tenantName){
    $datos = Date::where('id','=',1)->get();
    }else{
    $datos = \DigitalsiteSaaS\Pagina\Tenant\Date::where('id','=',1)->get();  
    }
    return View('pagina::configuracion.correo')->with('datos', $datos);
    }

    public function recaptcha(){
    if(!$this->tenantName){
    $datos = Recaptcha::where('id','=',1)->get();
    }else{
    $datos = \DigitalsiteSaaS\Pagina\Tenant\Recaptcha::where('id','=',1)->get();  
    }
    return View('pagina::configuracion.recaptcha')->with('datos', $datos);
    }

    public function logohead(){
    if(!$this->tenantName){ 
    $plantilla = Template::all();
    }else{
    $plantilla = \DigitalsiteSaaS\Pagina\Tenant\Template::all();   
    }
    return View('pagina::configuracion.logo-head')->with('plantilla', $plantilla);
    }



    public function logofooter(){
    if(!$this->tenantName){ 
    $plantilla = Template::all();
    }else{
    $plantilla = \DigitalsiteSaaS\Pagina\Tenant\Template::all();
    }
    return View('pagina::configuracion.logo-footer')->with('plantilla', $plantilla);
    }




    public function crearlogofooter(){
     $contenido = Input::all();
     if(!$this->tenantName){ 
     $contenido = Template::find(1);
     }else{
     $contenido = \DigitalsiteSaaS\Pagina\Tenant\Template::find(1);   
     }
     $contenido->logofooter = Input::get('FilePath');        
     $contenido->save();
     return Redirect('gestion/logo-footer')->with('status', 'ok_update');
    }




    public function actualizarservicio(){
     $input = Input::all();
     if(!$this->tenantName){ 
     $contenido = Date::find(1);
     }else{
     $contenido = \DigitalsiteSaaS\Pagina\Tenant\Date::find(1);  
     }
     $contenido->correo = Input::get('correo');
     $contenido->sujeto = Input::get('sujeto');
     $contenido->mensaje = Input::get('mensaje');
     $contenido->save();
     return Redirect('gestion/configurar-correo')->with('status', 'ok_update');
    }


    public function actualizarrecaptcha(){
     $input = Input::all();
     if(!$this->tenantName){ 
     $contenido = Recaptcha::find(1);
     }else{
     $contenido = \DigitalsiteSaaS\Pagina\Tenant\Recaptcha::find(1);  
     }
     $contenido->public_key = Input::get('publickey');
     $contenido->private_key = Input::get('privatekey');
     $contenido->save();
     return Redirect('gestion/recaptcha')->with('status', 'ok_update');
    }

    public function actualizarventa(){
     $input = Input::all();
     if(!$this->tenantName){ 
     $contenido = Venta::find(1);
     }else{
     $contenido = \DigitalsiteSaaS\Pagina\Tenant\Venta::find(1);   
     }
     $contenido->pagina = Input::get('pagina');
     $contenido->estadistica = Input::get('estadistica');
     $contenido->calendario = Input::get('calendario');
     $contenido->facturacion = Input::get('facturacion');
     $contenido->carrito = Input::get('carrito');
     $contenido->siteavanza = Input::get('siteavanza');
     $contenido->usuarios = Input::get('usuarios');
     $contenido->save();
     return Redirect('gestion/venta')->with('status', 'ok_update');
    }

    public function updatered(){
     $input = Input::all();
     if(!$this->tenantName){
     $contenido = Template::find(1);
     }else{
     $contenido = \DigitalsiteSaaS\Pagina\Tenant\Template::find(1);
     }
     $contenido->facebook = Input::get('facebook');
     $contenido->twitter = Input::get('twitter');
     $contenido->youtube = Input::get('youtube');
     $contenido->linkedin = Input::get('linkedin');
     $contenido->template = Input::get('template');
     $contenido->instagram = Input::get('instagram');
     $contenido->vimeo = Input::get('vimeo');
     $contenido->google = Input::get('google');
     $contenido->pinterest = Input::get('pinterest');
     $contenido->whatsapp = Input::get('whatsapp');
     $contenido->direccion = Input::get('direccion');
     $contenido->telefono = Input::get('telefono');
     $contenido->horario = Input::get('horario');
     $contenido->correo = Input::get('correo');
     $contenido->suscribete = Input::get('suscribete');
     $contenido->descripcion = Input::get('descripcion');
     $contenido->terminos = Input::get('terminos');
     $contenido->head = Input::get('head');
     $contenido->footer = Input::get('footer');
     $contenido->empresa = Input::get('empresa');
     $contenido->cook_titulo = Input::get('cook_titulo');
     $contenido->cook_texto = Input::get('cook_texto');
     $contenido->cook_enlace = Input::get('cook_enlace');
     $contenido->cook_estado = Input::get('cook_estado');
     $contenido->save();
     return Redirect('gestion/redes-sociales')->with('status', 'ok_update');
    }

    public function template(){
    $user_id = Auth::user()->id;
    $file = Input::file('file');
    $destinoPath = 'templatezip';
    $url_imagen = $file->getClientOriginalName();
    $url = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
    $urlenvio = $destinoPath.'/'.$url_imagen;
    $subir=$file->move($destinoPath,$file->getClientOriginalName());
    $zipper = new Madzipper();
    Madzipper::make($urlenvio)->extractTo('Template');
    $path = '../resources/views/Templates/'.$url;
    File::makeDirectory($path, 0777, true, true);
    $destinoPathsite = public_path().'/Template/'.$url.'/template/';
    File::copyDirectory($destinoPathsite,$path);
    $zipper = new Madzipper();
    Madzipper::make($urlenvio)->extractTo('Template');
    if(!$this->tenantName){
    $zippera = new Zippera;
    $zippera->nombre = $url;
    $zippera->slug = Str::slug($zippera->nombre);
    $zippera->user_id = 'sitek';
    $zippera->save();
    }else{
    $website = app(\Hyn\Tenancy\Environment::class)->website();
    $zippera = new Zippera;
    $zippera->nombre = $url;
    $zippera->slug = Str::slug($zippera->nombre);
    $zippera->user_id = $website->uuid;
    $zippera->save();
    }
    $color = new Color;
    $color->template = Str::slug($url);
    $color->save();
    $memo =  public_path().'\old_folders';
    $mema =  base_path().'\new_folders';

    File::copyDirectory($destinoPathsite,$path);

    

        return Redirect('gestor/subir-template')->with('status', 'ok_create');
    }


    public function importExportmun()
    {
        return view('importExport');
    }


    public function downloadExcelmun($type)
    {
        $data = Paiscon::get()->toArray();
        return Excel::create('Paises', function($excel) use ($data) {
            $excel->sheet('Paises', function($sheet) use ($data)
            {
             $sheet->fromArray($data);
            });
        })->download($type);
    }


    public function importExcelmun()
    {
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $insert[] = [
                    'pais' => $value->pais,
                    ];
                }
                if(!empty($insert)){
                    DB::table('paises')->insert($insert);
                    return Redirect('gestion/ubicacion')->with('status', 'ok_create');
                }
            }
        }
        return back();
    }



     public function importExportdep()
    {
        return view('importExport');
    }


    public function downloadExceldep($type)
    {
        $data = Departamentocon::get()->toArray();
        return Excel::create('Departamentos', function($excel) use ($data) {
            $excel->sheet('Departamentos', function($sheet) use ($data)
            {
             $sheet->fromArray($data);
            });
        })->download($type);
    }


    public function importExceldep()
    {
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $insert[] = [
                    'departamento' => $value->departamento,
                    'pais_id' => $value->pais_id,
                    ];
                }
                if(!empty($insert)){
                    DB::table('departamentos')->insert($insert);
                    return Redirect('gestion/ubicacion')->with('status', 'ok_create');
                }
            }
        }
        return back();
    }



    public function departamentos($id) {
    if(!$this->tenantName){
    $departamentos = Departamentocon::where('pais_id','=', $id)->get();
    }else{
        $departamentos = \DigitalsiteSaaS\Pagina\Tenant\Departamentocon::where('pais_id','=', $id)->get(); 
    }
    return view('pagina::configuracion.departamentos')->with('departamentos',$departamentos);
}

public function paiseditar($id) {
     if(!$this->tenantName){ 
    $pais = Pais::where('id','=',$id)->get();
    }else{
    $pais = \DigitalsiteSaaS\Pagina\Tenant\Pais::where('id','=',$id)->get(); 
    }
    return view('pagina::configuracion.pais-editar')->with('pais',$pais);
}


public function whatsappeditar($id) {

    if(!$this->tenantName){
     $whatsapp = Whatsapp::where('id','=',$id)->get();
     }else{
     $whatsapp = \DigitalsiteSaaS\Pagina\Tenant\Whatsapp::where('id','=',$id)->get();
     }

    return view('pagina::configuracion.whatsapp-editar')->with('whatsapp',$whatsapp);
}

     public function actualizarpais($id){
    $input = Input::all();
    if(!$this->tenantName){
    $pais = Pais::find($id);
    }else{
     $pais = \DigitalsiteSaaS\Pagina\Tenant\Pais::find($id);   
    }
    $pais->pais = Input::get('pais');

    $pais->save();
    return Redirect('gestion/ubicacion')->with('status', 'ok_update');
    }

  public function crearpais(){
   if(!$this->tenantName){
    $pais = new Pais;
    }
    else{
    $pais = new \DigitalsiteSaaS\Pagina\Tenant\Pais;
    }
    $pais->pais = Input::get('pais');
    $pais->save();
       return Redirect('/gestion/ubicacion')->with('status', 'ok_create');
    }

      public function eliminarpais($id){
if(!$this->tenantName){
        $pais = Pais::find($id);
    }else{
         $pais = \DigitalsiteSaaS\Pagina\Tenant\Pais::find($id);
    }
        $pais->delete();
        
        return Redirect('/gestion/ubicacion')->with('status', 'ok_delete');
    }


       public function creardepartamento(){
    if(!$this->tenantName){
    $departamento = new Departamentocon;
    $departamento->departamento = Input::get('departamento');
    $departamento->pais_id = Input::get('pais_id');
    $departamento->save();
   }else{
    $departamento = new \DigitalsiteSaaS\Pagina\Tenant\Departamentocon;
    $departamento->departamento = Input::get('departamento');
    $departamento->pais_id = Input::get('pais_id');
    $departamento->save();
   }
     return Redirect('/gestion/ubicacion/departamentos/'.$departamento->pais_id)->with('status', 'ok_create');
   }
  



    public function crearwhats(){
  if(!$this->tenantName){
  $contenido = new Whatsapp;
  }else{
  $contenido = new \DigitalsiteSaaS\Pagina\Tenant\Whatsapp;  
  }
  $contenido->bienvenida = Input::get('bienvenida');
  $contenido->numero = Input::get('numero');
  $contenido->principal = Input::get('principal');
  $contenido->secundario = Input::get('secundario');
  $contenido->llamado = Input::get('llamado');
  $contenido->imagen = Input::get('imagen');
  $contenido->estado = Input::get('estado');
  $contenido->presentacion = Input::get('presentacion');
  $contenido->accion = Input::get('accion');
  $contenido->empresa = Input::get('empresa');
  $contenido->visualizacion = Input::get('visualizacion');
  $contenido->save();
  return Redirect('gestion/whatsapp')->with('status', 'ok_create');
 }



  public function editarwhatsapp($id){
     $input = Input::all();
     if(!$this->tenantName){ 
     $contenido = Whatsapp::find($id);
     }else{
     $contenido = \DigitalsiteSaaS\Pagina\Tenant\Whatsapp::find($id);  
     }
     $contenido->bienvenida = Input::get('bienvenida');
     $contenido->numero = Input::get('numero');
     $contenido->principal = Input::get('principal');
     $contenido->secundario = Input::get('secundario');
     $contenido->llamado = Input::get('llamado');
     $contenido->imagen = Input::get('imagen');
     $contenido->estado = Input::get('estado');
     $contenido->presentacion = Input::get('presentacion');
     $contenido->accion = Input::get('accion');
     $contenido->empresa = Input::get('empresa');
     $contenido->visualizacion = Input::get('visualizacion');
     $contenido->save();
     return Redirect('/gestion/whatsapp')->with('status', 'ok_update');
    }

 




    public function departamentoeditar($id) {
        if(!$this->tenantName){ 
    $departamento = Departamentocon::where('id','=',$id)->get();
   }else{
    $departamento = \DigitalsiteSaaS\Pagina\Tenant\Departamentocon::where('id','=',$id)->get();
   }
    return view('pagina::configuracion.departamento-editar')->with('departamento',$departamento);
    }



      public function actualizardepartamento($id){
if(!$this->tenantName){ 
    $departamento = Departamentocon::where('id','=',$id)
                     ->update(['departamento' => Input::get('departamento'),
                               'pais_id' => Input::get('pais_id')]);
}else{
    $departamento = \DigitalsiteSaaS\Pagina\Tenant\Departamentocon::where('id','=',$id)
                     ->update(['departamento' => Input::get('departamento'),
                               'pais_id' => Input::get('pais_id')]);
}

    return Redirect('/gestion/ubicacion/departamentos/'.Input::get('pais_id'))->with('status', 'ok_update');
    }

    public function eliminardepartamento($id){
        if(!$this->tenantName){ 
        $departamento = Departamentocon::find($id);
     }else{
        $departamento = \DigitalsiteSaaS\Pagina\Tenant\Departamentocon::find($id);
     }
        $departamento->delete();
        
        return Redirect('/gestion/ubicacion/departamentos/'.$departamento->pais_id)->with('status', 'ok_delete');
    }

    public function municipios($id) {
    if(!$this->tenantName){ 
    $municipios = Municipio::where('departamento_id','=', $id)->get();
    }else{
    $municipios = \DigitalsiteSaaS\Pagina\Tenant\Municipio::where('departamento_id','=', $id)->get();  
    }
    return view('pagina::configuracion.municipios')->with('municipios',$municipios);
}
    
        public function crearmunicipio(){
     if(!$this->tenantName){       
    $departamento = new Municipio;
     }else{
        $departamento = new \DigitalsiteSaaS\Pagina\Tenant\Municipio; 
     }
    $departamento->municipio = Input::get('municipio');
    $departamento->departamento_id = Input::get('departamento_id');
    $departamento->p_municipio = Input::get('p_municipio');
    $departamento->save();
     return Redirect('/gestion/municipios/'.$departamento->departamento_id)->with('status', 'ok_create');
    }


    public function municipioeditar($id) {
    if(!$this->tenantName){ 
    $departamento = Municipio::where('id','=',$id)->get();
    }else{
     $departamento = \DigitalsiteSaaS\Pagina\Tenant\Municipio::where('id','=',$id)->get();   
    }
    return view('pagina::configuracion.municipios-editar')->with('departamento',$departamento);
}

public function actualizarmunicipio($id){
if(!$this->tenantName){ 
    $departamento = Municipio::where('id','=',$id)
                     ->update(['municipio' => Input::get('municipio'),
                               'departamento_id' => Input::get('departamento_id'),
                               'p_municipio' => Input::get('p_municipio')]);
}else{
    $departamento = \DigitalsiteSaaS\Pagina\Tenant\Municipio::where('id','=',$id)
                     ->update(['municipio' => Input::get('municipio'),
                               'departamento_id' => Input::get('departamento_id'),
                               'p_municipio' => Input::get('p_municipio')]);
}

    return Redirect('gestion/municipios/'.Input::get('departamento_id'))->with('status', 'ok_update');
    }

    public function eliminarmunicipio($id){
if(!$this->tenantName){ 
        $municipio = Municipio::find($id);
    }else{
        $municipio = \DigitalsiteSaaS\Pagina\Tenant\Municipio::find($id);
    }
        $municipio->delete();
        
        return Redirect('/gestion/municipios/'.$municipio->departamento_id)->with('status', 'ok_delete');
    }

     public function eliminarwhatsapp($id){
  if(!$this->tenantName){
  $contenido = Whatsapp::find($id);
  }else{
  $contenido = \DigitalsiteSaaS\Pagina\Tenant\Whatsapp::find($id);  
  }
  $contenido->delete();
  return Redirect('gestion/whatsapp')->with('status', 'ok_delete');
 }

}
