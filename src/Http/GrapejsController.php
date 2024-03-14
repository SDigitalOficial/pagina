<?php

namespace DigitalsiteSaaS\Pagina\Http;
use App\Http\Controllers\Controller;
use DigitalsiteSaaS\Pagina\Page;
use DigitalsiteSaaS\Pagina\Gratemplates;
use DigitalsiteSaaS\Pagina\GrapeTemp;
use Input;

use Illuminate\Http\Request;

class GrapejsController extends Controller
{

 protected $tenantName = null;

 public function __construct(){
 $this->middleware('auth');
 $hostname = app(\Hyn\Tenancy\Environment::class)->hostname();
  if($hostname){
  $fqdn = $hostname->fqdn;
  $this->tenantName = explode(".", $fqdn)[0];
 }
 }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     if(!$this->tenantName){
     $contenidos = Gratemplates::all();
     $pages = Page::all();
     }else{
     $contenidos = \DigitalsiteSaaS\Pagina\Tenant\Gratemplates::where('template_id','=',1)->get(); 
     $pages = \DigitalsiteSaaS\Pagina\Tenant\Page::all();
     $plantillas = \DigitalsiteSaaS\Pagina\Tenant\GrapeTemp::where('id','=','1')->get();
     } 


     $contenidos->transform(function($contenido){
     return[
        'id' => $contenido->id,
        'attributes' => $contenido->attributes,
        'media' => $contenido->media,
        'label' => $contenido->label,
        'content' => $contenido->content,
        'activate' => $contenido->activate,
        'category' => $contenido->category,
      ];
      });
      

    return View('pagina::grapejs.grapejs')->with('contenidos', $contenidos)->with('pages', $pages)->with('plantillas', $plantillas);
      
    }

     public function all(Request $request){
      if(!$this->tenantName){
      Page::where('id', $request->get('pagesold'))
      ->update(['page_data' => $request->get('html')]);
      }else{
       \DigitalsiteSaaS\Pagina\Tenant\Page::where('id', $request->get('pagesold'))
      ->update(['page_data' => $request->get('html')]); 
      }
     }

     public function alltrait(Request $request){
      if(!$this->tenantName){
     $datamas = Page::where('id', $request->get('pagesold'))->select('page_data')->get();
      }else{
        $datamas = \DigitalsiteSaaS\Pagina\Tenant\Page::where('id', $request->get('pagesold'))->select('page_data')->get(); 
      }
     return response(json_encode($datamas),200)->header('Content-type','text/plain');
      
    }

    public function vistatemplates(){
     if(!$this->tenantName){
     $templates = GrapeTemp::all();
     }else{
    $templates = \DigitalsiteSaaS\Pagina\Tenant\GrapeTemp::all();
     }

     return View('pagina::grapejs.templates')->with('templates', $templates);
      
    }


    public function vercomponentes($id){
     if(!$this->tenantName){
     $componentes = Templates::where('template_id','=',$id)->get();
     }else{
    $componentes = \DigitalsiteSaaS\Pagina\Tenant\Gratemplates::where('template_id','=',$id)->get();
     }

     return View('pagina::grapejs.componentes')->with('componentes', $componentes);
      
    }


    public function crearcomponentes($id){
   
     return View('pagina::grapejs.crearcomponentes');
      
    }

     public function crearcomponentesweb($id){
   
     if(!$this->tenantName){
      $contenido = new Gratemplates;
      }else{
      $contenido = new \DigitalsiteSaaS\Pagina\Tenant\Gratemplates;  
      }
      $contenido->label = Input::get('nombre');
      $contenido->media = Input::get('imagen');
      $contenido->content = Input::get('contenido');
      $contenido->category = Input::get('categoria');
      $contenido->activate = Input::get('estado');
      $contenido->template_id = Input::get('template');
      $contenido->save();
      return Redirect('gestion/ver-componentes/'.$contenido->template_id)->with('status', 'ok_create');
     
      
    }

    public function editarcomponentes($id){
     if(!$this->tenantName){
     $componentes = Gratemplates::where('id','=',$id)->get();
     }else{
    $componentes = \DigitalsiteSaaS\Pagina\Tenant\Gratemplates::where('id','=',$id)->get();
     }

     return View('pagina::grapejs.editarcomponentes')->with('componentes', $componentes);
      
    }

    public function creartemplate(){

     return View('pagina::grapejs.crear-template');
      
    }

    public function editaremplate(){

     return View('pagina::grapejs.crear-template');
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if(!$this->tenantName){
      $contenido = new Plantilla;
      }else{
      $contenido = new \DigitalsiteSaaS\Pagina\Tenant\Plantilla;  
      }
      $contenido->plantilla = Input::get('nombre');
      $contenido->css = Input::get('css');
      $contenido->javascript = Input::get('javascript');
      $contenido->save();
      return Redirect('gestor/templates')->with('status', 'ok_create');
    }


     public function editarcomponentesweb($id){
     $input = Input::all();
     if(!$this->tenantName){
     $contenido = Gratemplates::find($id);
     }else{
     $contenido = \DigitalsiteSaaS\Pagina\Tenant\Gratemplates::find($id);
     }
     $contenido->label = Input::get('nombre');
     $contenido->media = Input::get('imagen');
     $contenido->content = Input::get('contenido');
     $contenido->category = Input::get('categoria');
     $contenido->activate = Input::get('estado');
     $contenido->template_id = Input::get('template');
     $contenido->save();
     return Redirect('gestion/ver-componentes/'.$contenido->template_id)->with('status', 'ok_create');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function temagrapejs()
    {
        dd('hola');
       return View('pagina::grapejs.templates');
    }
}
