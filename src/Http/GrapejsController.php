<?php

namespace DigitalsiteSaaS\Pagina\Http;
use App\Http\Controllers\Controller;
use DigitalsiteSaaS\Pagina\Page;
use DigitalsiteSaaS\Pagina\Gratemplates;
use DigitalsiteSaaS\Pagina\GrapeTemp;
use DigitalsiteSaaS\Pagina\GrapeImage;
use DigitalsiteSaaS\Pagina\Grapeselect;
use Input;
 use Hyn\Tenancy\Models\Hostname;
 use Hyn\Tenancy\Models\Website;
 use Hyn\Tenancy\Repositories\HostnameRepository;
 use Hyn\Tenancy\Repositories\WebsiteRepository;
use DB;
use Illuminate\Http\Request;
use File;
use Storage;

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
    public function index(Request $request)
    {
    $page = $request->get('page');
    
     if(!$this->tenantName){
     $select = Grapeselect::where('id','=', '1')->get();
     foreach($select as $select){
     $contenidos = Gratemplates::all();
     $pages = Page::where('id','=',$page)->get();
     $plantillas = GrapeTemp::where('id','=',$select->template)->get();
     $assets = GrapeImage::all();
     }
     }else{
     $select = \DigitalsiteSaaS\Pagina\Tenant\Grapeselect::where('id','=', '1')->get();
     foreach($select as $select){
     $contenidos = Gratemplates::where('template_id','=',$select->template)->get(); 
     $pages = \DigitalsiteSaaS\Pagina\Tenant\Page::where('id','=',$page)->get();
     $plantillas = GrapeTemp::where('id','=',$select->template)->get();
     $assets = \DigitalsiteSaaS\Pagina\Tenant\GrapeImage::orderBy('id', 'DESC')->get();
     }
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
      

    return View('pagina::grapejs.grapejs')->with('contenidos', $contenidos)->with('pages', $pages)->with('plantillas', $plantillas)->with('assets', $assets);
      
    }

     public function all(Request $request){
      if(!$this->tenantName){
      Page::where('id', $request->get('pagesold'))
      ->update(['page_data' => $request->get('html')]);
      }else{
       \DigitalsiteSaaS\Pagina\Tenant\Page::where('id', $request->get('pagesold'))
      ->update(['page_data' => $request->get('html'),'page_css' => $request->get('css'),'page_js' => $request->get('js')]); 
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
     $select = \DigitalsiteSaaS\Pagina\Tenant\Grapeselect::join('grape_template','grape_select.template','=','grape_template.id')
    ->where('grape_select.id', 1)
    ->get();

     }else{
    $templates = GrapeTemp::all();

    $select = \DigitalsiteSaaS\Pagina\Tenant\Grapeselect::join('grape_template','grape_select.template','=','grape_template.id')
    ->where('grape_select.id', 1)
    ->get();

     }

     return View('pagina::grapejs.templates')->with('templates', $templates)->with('select', $select);
      
    }


    public function vercomponentes($id){
     if(!$this->tenantName){
     $componentes = Gratemplates::where('template_id','=',$id)->get();
     }else{
    $componentes = Gratemplates::where('template_id','=',$id)->get();
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
      $contenido = new Gratemplates;  
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
    $componentes = Gratemplates::where('id','=',$id)->get();
     }

     return View('pagina::grapejs.editarcomponentes')->with('componentes', $componentes);
      
    }

      public function editartemplate($id){
     if(!$this->tenantName){
     $componentes = GrapeTemp::where('id','=',$id)->get();
     }else{
    $componentes = GrapeTemp::where('id','=',$id)->get();
     }

     return View('pagina::grapejs.editartemplate')->with('componentes', $componentes);
      
    }

    public function creartemplate(){

     return View('pagina::grapejs.crear-template');
      
    }

    public function grapeupload(Request $request){

$dominio =  $_SERVER['HTTP_HOST'];
$hostname = DB::table('tenancy.hostnames')->where('fqdn','=',$dominio)->get();

foreach ($hostname as $hostname) {
 $websites = DB::table('tenancy.websites')->where('id','=',$hostname->website_id)->get();   
}
foreach($websites as $websites){
$salida = $websites->uuid;
}


    if($_FILES)
{
$resultArray = array();
    foreach ( $_FILES as $file){
                $fileName = $file['name'];
                $tmpName = $file['tmp_name'];
                $fileSize = $file['size'];
                $fileType = $file['type'];
                if ($file['error'] != UPLOAD_ERR_OK)
                {
                        error_log($file['error']);
                        echo JSON_encode(null);
                }
                $fp = fopen($tmpName, 'r');
                $content = fread($fp, filesize($tmpName));
                fclose($fp);
                $result=array(
                        'name'=>$file['name'],
                        'type'=>'image',
                        'src'=>"data:".$fileType.";base64,".base64_encode($content),
                        'height'=>350,
                        'width'=>250
                ); 

    $uploadDir = public_path('saas/'.$salida);
      $uploadDirsave = '/saas/'.$salida.'/'.$file['name'];
$targetPath = $uploadDir.'/'. $fileName;
$lata = move_uploaded_file($tmpName, $targetPath);


if(!$this->tenantName){
 GrapeImage::insert([
  'image' => $uploadDirsave
 ]);
}else{
\DigitalsiteSaaS\Pagina\Tenant\GrapeImage::insert([
  'image' => $uploadDirsave
 ]);
}

           

         

                array_push($resultArray,$result);
    }    
$response = array( 'data' => $resultArray );
echo json_encode($response);
}

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
      $contenido = new GrapeTemp;
      }else{
      $contenido = new \DigitalsiteSaaS\Pagina\Tenant\GrapeTemp;  
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
     $contenido = Gratemplates::find($id);
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


     public function actualizatemplate(){
     $input = Input::all();
     if(!$this->tenantName){
     $contenido = Grapeselect::find(1);
     }else{
     $contenido = \DigitalsiteSaaS\Pagina\Tenant\Grapeselect::find(1);
     }
     $contenido->template = Input::get('template');
     $contenido->save();
     return Redirect('gestor/templates')->with('status', 'ok_create');
    }

      public function editartemplateweb($id){
     $input = Input::all();
     if(!$this->tenantName){
     $contenido = GrapeTemp::find($id);
     }else{
     $contenido = \DigitalsiteSaaS\Pagina\Tenant\GrapeTemp::find($id);
     }
     $contenido->plantilla = Input::get('nombre');
      $contenido->css = Input::get('css');
      $contenido->javascript = Input::get('javascript');
      $contenido->save();
     return Redirect('gestor/templates/')->with('status', 'ok_create');
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
