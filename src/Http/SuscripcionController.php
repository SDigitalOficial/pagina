<?php

 namespace DigitalsiteSaaS\Pagina\Http;



use App\Providers\RouteServiceProvider;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

use Illuminate\Foundation\Auth\RegistersUsers;
use Request;
use App\Http\Controllers\Controller;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Repositories\HostnameRepository;
use Hyn\Tenancy\Repositories\WebsiteRepository;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\User;
use Input;
use File;
use Redirect;
use DigitalsiteSaaS\Carrito\Transaccion;
use DigitalsiteSaaS\Pagina\Credencial;
use DigitalsiteSaaS\Pagina\Planes;
use GuzzleHttp\Client;
use Auth;

 class SuscripcionController extends Controller{

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

  public function crearplanessaas(){
    return view('pagina::configuracion.crear-plansaas');
  }

  public function resperror(){
      $plantilla = \DigitalsiteSaaS\Pagina\Template::all();
    $menu = \DigitalsiteSaaS\Pagina\Page::whereNull('page_id')->orderBy('posta', 'desc')->get();
    $subtotal = $this->subtotal();
    $total = $this->total();
    return view('pagina::suscripcion.respuesta-error')->with('plantilla', $plantilla)->with('menu', $menu)->with('subtotal', $subtotal)->with('total', $total);
  }



  
   public function editarcredenciales(){
    $credenciales = Credencial::where('id', '=', '1')->get();

    return view('pagina::suscripcion.credenciales')->with('credenciales', $credenciales);
  }


  public function pagos(){
    $facturas = DB::table('trans_payco')->get();

    return view('pagina::suscripcion.pagos')->with('facturas', $facturas);
  }

   public function editarcredencialesweb(){
     $input = Input::all();
     $user = Credencial::find(1);
     $user->public_key = Input::get('public_key');
     $user->private_key = Input::get('private_key');
     $user->save();
    return Redirect('/suscripcion/credenciales')->with('status', 'ok_update');
  }


  public function editarplanessaas($id){

    $planes = DB::table('planes')->where('id_plan','=',$id)->get();
    return view('pagina::configuracion.editar-planessaas')->with('planes', $planes);
  }

  public function actualizarhost(){

      $plan = DB::table('tenancy.hostnames')->where('id','=',Auth::user()->saas_id)->get();
    
    return view('pagina::suscripcion.editar-host')->with('plan', $plan);
  }

  public function planessaas(){
    $credenciales = Credencial::where('id', 1)->get();
    foreach ($credenciales as $credencialesw) {
        $public_key = $credencialesw->public_key;
        $private_key = $credencialesw->private_key;
    }
    $client = new Client(['http_errors' => false]);
    $response = $client->post('https://api.secure.payco.co/v1/auth/login', [
    'form_params' => [
    'public_key' =>  $credencialesw->public_key,
    'private_key' => $credencialesw->private_key,
     ],
    ]);
    $xml = json_decode($response->getBody()->getContents(), true);
    $token = $xml['bearer_token'];
    $tok = "Bearer"." ".$token;
    $responsed = $client->get('https://api.secure.payco.co/recurring/v1/plans', [
    'headers' => [
    'Authorization' =>  $tok,
    'Content-Type' => 'application/json',
    'Accept' => 'application/json',
    'Type' => 'sdk-jwt',
    ],
    ]);
    $xmls = json_decode($responsed->getBody()->getContents(), true);
    return view('pagina::configuracion.planes-saas')->with('xmls', $xmls);
  }


  public function cancelarplan(Request $request){
    $idsuscripcion = Input::get('idsuscripcion');
    $credenciales = Credencial::where('id', 1)->get();
    foreach ($credenciales as $credencialesw) {
        $public_key = $credencialesw->public_key;
        $private_key = $credencialesw->private_key;
    }

    $client = new Client(['http_errors' => false]);
    $response = $client->post('https://api.secure.payco.co/v1/auth/login', [
    'form_params' => [
    'public_key' =>  $credencialesw->public_key,
    'private_key' => $credencialesw->private_key,
    ],
    ]);
    $xml = json_decode($response->getBody()->getContents(), true);
    $token = $xml['bearer_token'];
    $tok = "Bearer"." ".$token;
    $responsed = $client->post('https://api.secure.payco.co/recurring/v1/subscription/cancel', [
    'headers' => [
    'Authorization' =>  $tok,
    'Content-Type' => 'application/json',
    'Accept' => 'application/json',
    'Type' => 'sdk-jwt',
    ],
    'json' => [
    'id' => $idsuscripcion,
    ],
    ]);
    $xmls = json_decode($responsed->getBody()->getContents(), true);
    $respuesta = $xmls['status'];
    if($respuesta == 'true'){
      return Redirect('/saas/sitesaas')->with('status', 'ok_create');
    }
    return Redirect('/saas/sitesaas')->with('status', 'ok_delete');
  }



  public function eliminarplan($id){
    $credenciales = Credencial::where('id', 1)->get();
    foreach ($credenciales as $credencialesw) {
        $public_key = $credencialesw->public_key;
        $private_key = $credencialesw->private_key;
    }
    $client = new Client(['http_errors' => false]);
    $response = $client->post('https://api.secure.payco.co/v1/auth/login', [
    'form_params' => [
    'public_key' =>  $credencialesw->public_key,
    'private_key' => $credencialesw->private_key,
    ],
    ]);
    $xml = json_decode($response->getBody()->getContents(), true);
    $token = $xml['bearer_token'];
    $tok = "Bearer"." ".$token;
    $responsed = $client->post('https://api.secure.payco.co/recurring/v1/plan/remove/public_key/'.$id, [
    'headers' => [
    'Authorization' =>  $tok,
    'Content-Type' => 'application/json',
    'Accept' => 'application/json',
    'Type' => 'sdk-jwt',
    ],
    ]);
    $xmls = json_decode($responsed->getBody()->getContents(), true);
    return Redirect('/gestor/planes-saas')->with('status', 'ok_create');
  }

  public function listaclientes(){
    $credenciales = Credencial::where('id', 1)->get();
    foreach ($credenciales as $credencialesw) {
        $public_key = $credencialesw->public_key;
        $private_key = $credencialesw->private_key;
    }

    $public_key = $public_key;
    $client = new Client(['http_errors' => false]);
    $response = $client->post('https://api.secure.payco.co/v1/auth/login', [
    'form_params' => [
    'public_key' =>  $credencialesw->public_key,
    'private_key' => $credencialesw->private_key,
    ],
    ]);
    $xml = json_decode($response->getBody()->getContents(), true);
    $token = $xml['bearer_token'];
    $tok = "Bearer"." ".$token;
    $responsed = $client->get('https://api.secure.payco.co/payment/v1/customers/'.$public_key, [
    'headers' => [
    'Authorization' =>  $tok,
    'Content-Type' => 'application/json',
    'Accept' => 'application/json',
    'Type' => 'sdk-jwt',
    ],
    ]);
    $xmls = json_decode($responsed->getBody()->getContents(), true);

    return view('pagina::suscripcion.clientes')->with('xmls', $xmls);
  }

  public function listasuscripciones(){

    $credenciales = Credencial::where('id', 1)->get();
    foreach ($credenciales as $credencialesw) {
        $public_key = $credencialesw->public_key;
        $private_key = $credencialesw->private_key;
    }
    $public_key = $public_key;
    $client = new Client(['http_errors' => false]);
    $response = $client->post('https://api.secure.payco.co/v1/auth/login', [
    'form_params' => [
    'public_key' =>  $credencialesw->public_key,
    'private_key' => $credencialesw->private_key,
    ],
    ]);
    $xml = json_decode($response->getBody()->getContents(), true);
    $token = $xml['bearer_token'];
    $tok = "Bearer"." ".$token;
    $responsed = $client->get('https://api.secure.payco.co/recurring/v1/subscriptions/'.$public_key, [
    'headers' => [
    'Authorization' =>  $tok,
    'Content-Type' => 'application/json',
    'Accept' => 'application/json',
    'Type' => 'sdk-jwt',
    ],
    ]);
    $xmls = json_decode($responsed->getBody()->getContents(), true);

    return view('pagina::suscripcion.suscripciones')->with('xmls', $xmls);
  }


  public function crearplan(Request $request){

    $credenciales = Credencial::where('id', 1)->get();
    foreach ($credenciales as $credencialesw) {
        $public_key = $credencialesw->public_key;
        $private_key = $credencialesw->private_key;
    }
    $name = Input::get('name');
    $id_plan = Str::slug($name);
    $description = Input::get('description');
    $amount = Input::get('amount');
    $moneda = Input::get('moneda');
    $intervalo = Input::get('intervalo');
    $int_conteo = Input::get('int_conteo');
    $trial = Input::get('trial');

    $client = new Client(['http_errors' => false]);
    $response = $client->post('https://api.secure.payco.co/v1/auth/login', [
    'form_params' => [
    'public_key' =>  $credencialesw->public_key,
    'private_key' => $credencialesw->private_key,
    ],
    ]);
    $xml = json_decode($response->getBody()->getContents(), true);

    $token = $xml['bearer_token'];
    $tok = "Bearer"." ".$token;
    $responsed = $client->post('https://api.secure.payco.co/recurring/v1/plan/create', [
    'headers' => [
    'Authorization' =>  $tok,
    'Content-Type' => 'application/json',
    'Accept' => 'application/json',
    'Type' => 'sdk-jwt',
    ],
    'json' => [
    'id_plan' => $id_plan,
    'name' => $name,
    'description' => $description,
    'amount' => $amount,
    'currency' => $moneda,
    'interval' => $intervalo,
    'interval_count' => $int_conteo,
    'trial_days' => $trial,
    ],
    ]);
    $xmls = json_decode($responsed->getBody()->getContents(), true);

     $respuesta = $xmls['status'];

     if($respuesta == 'true'){
     $plan = new Planes;
     $plan->name = Input::get('name');
     $plan->id_plan = Str::slug($plan->name);
     $plan->description = Input::get('description');
     $plan->amount = Input::get('amount');
     $plan->moneda = Input::get('moneda');
     $plan->intervalo = Input::get('intervalo');
     $plan->int_conteo = Input::get('int_conteo');
     $plan->datos = Input::get('datos');
     $plan->estado = Input::get('estado');
     $plan->trial = Input::get('trial');
     $plan->datos = Input::get('datos');
     $plan->estado = Input::get('estado');
     $plan->save();

     return Redirect('/gestor/planes-saas')->with('status', 'ok_create');
   }

    return Redirect('/gestor/planes-saas')->with('status', 'ok_delete');
  }

  public function actualizarplansaas($id){

  Planes::where('id_plan', $id)
       ->update([
           'name' => Input::get('name'),
           'id_plan' => Input::get('id_plan'),
           'description' => Input::get('description'),
           'amount' => Input::get('amount'),
           'moneda' => Input::get('moneda'),
           'intervalo' => Input::get('intervalo'),
           'int_conteo' => Input::get('int_conteo'),
           'datos' => Input::get('datos'),
           'estado' => Input::get('estado'),
           'trial' => Input::get('trial')
        ]);


 return Redirect('/gestor/planes-saas')->with('status', 'ok_update');
}

  public function updatehost($id){

  DB::table('tenancy.hostnames')->where('id', '=', $id)
       ->update([
           'fqdn' => Input::get('hostname'),
        ]);


 return Redirect('/actualizar/host')->with('status', 'ok_update');
}


  public function formulario(){
     
    if(!Auth::user()){

    $pais = DB::table('paises')->get();
    $planes = DB::table('planes')->get();
    if(!$this->tenantName){
    $plantilla = \DigitalsiteSaaS\Pagina\Template::all();
    $menu = \DigitalsiteSaaS\Pagina\Page::whereNull('page_id')->orderBy('posta', 'desc')->get();
    }
   else{
    $plantilla = \DigitalsiteSaaS\Pagina\Tenant\Template::all();
    $menu = \DigitalsiteSaaS\Pagina\Tenant\Page::whereNull('page_id')->orderBy('posta', 'desc')->get();
    }
    $subtotal = $this->subtotal();
    $total = $this->total();
   
    return view('pagina::suscripcion.formulario')->with('plantilla', $plantilla)->with('menu', $menu)->with('planes', $planes)->with('subtotal', $subtotal)->with('total', $total)->with('pais', $pais);
  
  }else{
     if(!Auth::user()->rol_id == '5'){
      return Redirect('/saas/sitesaas');
    }
  }
  }


   public function respuesta($id){

    $plantilla = \DigitalsiteSaaS\Pagina\Template::all();
    $menu = \DigitalsiteSaaS\Pagina\Page::whereNull('page_id')->orderBy('posta', 'desc')->get();
    $subtotal = $this->subtotal();
    $total = $this->total();
    $informacion = Transaccion::where('referencia','=',$id)->get();
    return view('pagina::suscripcion.respuesta')->with('plantilla', $plantilla)->with('menu', $menu)->with('subtotal', $subtotal)->with('total', $total)->with('informacion', $informacion);
    }


     public function informacion(Request $request){
       $referencia = Request::input('x_ref_payco');
       $valor = Request::input('x_amount');
       $fecha_trans = Request::input('x_fecha_transaccion');
       $respuesta = Request::input('x_respuesta');
       $descripcion = Request::input('x_description');
       $autorizacion = Request::input('x_approval_code');
       $franquicia = Request::input('x_franchise');
       $recibo = Request::input('x_transaction_id');
       $banco = Request::input('x_bank_name');
       $extra2 = Request::input('x_extra2');
       $extra3 = Request::input('x_extra3');
       $email = Request::input('x_customer_email');
       $pais = Request::input('x_customer_country');
       $moneda = Request::input('x_currency_code');
       $iva = Request::input('x_tax');
       $suscripcion =  Request::input('x_extra1');
       $ip = Request::input('x_customer_ip');
       $public_key = '00183a3712a6c49a93ebe60d06613558';
       $union = $suscripcion . '/' . $public_key;

       $client = new Client(['http_errors' => false]);
       $response = $client->post('https://api.secure.payco.co/v1/auth/login', [
       'form_params' => [
       'public_key' =>  $credencialesw->public_key,
       'private_key' => $credencialesw->private_key,
        ],
       ]);
       $xml = json_decode($response->getBody()->getContents(), true);
       $token = $xml['bearer_token'];
       $tok = "Bearer"." ".$token;
       $responsed = $client->get('https://api.secure.payco.co/recurring/v1/subscription/'.$union, [
       'headers' => [
       'Authorization' =>  $tok,
       'Content-Type' => 'application/json',
       'Accept' => 'application/json',
       'Type' => 'sdk-jwt',
       ],
       ]);
       $xmls = json_decode($responsed->getBody()->getContents(), true);
    
       $fechaweb = $xmls['current_period_end'];

       DB::table('trans_payco')->insert([
        ['ref_payco' => $referencia,
         'valor' => $valor,
         'iva' => $iva,
         'fecha_trans' => $fecha_trans,
         'respuesta' => $respuesta,
         'descripcion' => $descripcion,
         'autorizacion' => $autorizacion,
         'recibo' => $recibo,
         'franquicia' => $franquicia,
         'banco' => $banco,
         'extra1' => $suscripcion,
         'extra2' => $extra2,
         'extra3' => $extra3,
         'pais' => $pais,
         'moneda' => $moneda,
         'email' => $email,
         'ip' => $ip]
    ]);

       $users = DB::table('users')->join('tenancy.hostnames', 'users.saas_id', '=', 'tenancy.hostnames.id')
       ->where('email', '=', $email)
       ->get();
     if($respuesta == 'Acepdata'){
        foreach ($users as $usersna) {
         $upda = DB::table('tenancy.hostnames')->where('id', '=', $usersna->saas_id)
          ->update(['presentacion' => $fechaweb]);
      
        }
        }




    }

  }

  
