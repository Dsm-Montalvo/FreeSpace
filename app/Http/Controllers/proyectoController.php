<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Validation\Rule;

class proyectoController extends Controller
{
    public function index(){
        return view('inicio');
    }
    public function info(){
        return view('informacion');
    }
    public function graficos(){
        return view('grafico.graficas');
    }


    public function listado(){
        $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
        $response = Http::get($url.'/usuarios');
        $datos = $response->json();
        return view('listado', compact('datos'));
    }

    public function listadoPIR(){
        $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
        $response = Http::get($url.'/datosSensor'); 
        $datosPIR = $response->json();
        return view('listadoPIR', compact('datosPIR'));
    }

    public function create(){
        return view('insercion');
    }


    public function save(Request $request){
        $request->validate([
            
            'name' => 'required',
            'app'=> 'required',
            'apm'=> 'required',
            'date' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);


        $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
        $response = Http::post($url. '/users', [
            'name' => $request-> name,
            'app' => $request-> app,
            'apm' => $request-> apm,
            'date' => $request-> date,
            'email' => $request-> email,
            'password' => $request-> password,
        ]);

        return redirect()->route('listado'); 
    }

    public function delete($id){
       
        $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
        $response = Http::delete($url.'/users/'.$id);

        return redirect ()->route('listado');
    }

    public function update($id){
       
        $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
        $response = Http::get($url.'/users/'.$id);
        $data = $response -> json();
        return view ('actualizacion', compact('data'));
    }

    public function updatesave(Request $request){
        $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
        $response = Http::put($url. '/users/'.$request->id, [
         
            'name' => $request-> name,
            'app' => $request-> app,
            'apm' => $request-> apm,
            'date' => $request-> date,
            'email' => $request-> email,
            'password' => $request-> password,
        ]);

        return redirect ()->route('listado');
    }

    public function login(){
        return view('Login/login');
    }

    public function ingresar(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
        $response = Http::post($url.'/usuarios/login', [
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ]);
    
        if ($response->successful()) {
            $data = $response->json();
    
            $token = $data['token']; // Suponiendo que la API devuelve un token de autenticación
            session()->put('external_api_token', $token); // Guardar el token en la sesión
    
            $userData = [
                'id' => $data['id'],
                'name' => $data['name'],
                'app' => $data['app'],
                'apm' => $data['apm'],
                'date' => $data['date'],
                'email' => $data['email'],
                'role' => $data['role']
            ];// Suponiendo que la API devuelve los datos del usuario
            session()->put('user_data', $userData); // Guardar los datos del usuario en la sesión
    
            $role = $userData['role']; // Obtener el rol del usuario
    
            if ($role === 'admin') {
                return redirect('/create');
            } elseif ($role === 'estudiante') {
                return redirect('/indexe');
            } elseif ($role === 'Profesor') {
                return redirect('/indexp');
            } else {
                return redirect('/pagina-general');
            }
        } else {
            return redirect('/login')->with('error', 'Credenciales inválidas');
        }
    }
    
    //---------------------------------------------perfil------------------------
    public function perfil()
    {
       // Aquí obtienes los datos necesarios para la vista
    $client = new Client();
    $response = $client->request('GET', 'https://api-mongodb-9be7.onrender.com/api/datosSensor');
    $data = json_decode($response->getBody(), true);
    $aula = 101;    
        
    $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
    $response = Http::get($url.'/apartadoEspacio/aula/'.$aula);
    $datos = $response->json();

    $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
    $response = Http::get($url.'/ultimosDatos');
    $ultimosDatos = $response->json();

    $temperatura = $ultimosDatos['temperatura'];
    $humedad = $ultimosDatos['humedad'];
    $movimiento = $ultimosDatos['movimiento'];

    $temperaturaData = [];
    $humedadData = [];
    $movimientoData = [];
    foreach ($data as $item) {
        $temperaturaData[] = $item['temperatura'];
        $humedadData[] = $item['humedad'];
        $movimientoData[] = $item['movimiento'];
    }

    // Luego, pasas los datos a la vista
    return view('profesores.detalles', compact('temperatura', 'humedad', 'movimiento','temperaturaData', 'humedadData', 'movimientoData', 'datos'));
    }
    
    
    //-----------------


    public function perfil2()
    {
       // Aquí obtienes los datos necesarios para la vista
    $client = new Client();
    $response = $client->request('GET', 'https://api-mongodb-9be7.onrender.com/api/datosSensor');
    $data = json_decode($response->getBody(), true);
    $aula = 102;    
        
    $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
    $response = Http::get($url.'/apartadoEspacio/aula/'.$aula);
    $datos = $response->json();

    $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
    $response = Http::get($url.'/ultimosDatos');
    $ultimosDatos = $response->json();

    $temperatura = $ultimosDatos['temperatura'];
    $humedad = $ultimosDatos['humedad'];
    $movimiento = $ultimosDatos['movimiento'];

    $temperaturaData = [];
    $humedadData = [];
    $movimientoData = [];
    foreach ($data as $item) {
        $temperaturaData[] = $item['temperatura'];
        $humedadData[] = $item['humedad'];
        $movimientoData[] = $item['movimiento'];
    }

    // Luego, pasas los datos a la vista
    return view('profesores.detalles2', compact('temperatura', 'humedad', 'movimiento','temperaturaData', 'humedadData', 'movimientoData', 'datos'));
    }
    
    //------------------


    public function perfil3()
    {
       // Aquí obtienes los datos necesarios para la vista
    $client = new Client();
    $response = $client->request('GET', 'https://api-mongodb-9be7.onrender.com/api/datosSensor');
    $data = json_decode($response->getBody(), true);
    $aula = 103;    
        
    $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
    $response = Http::get($url.'/apartadoEspacio/aula/'.$aula);
    $datos = $response->json();

    $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
    $response = Http::get($url.'/ultimosDatos');
    $ultimosDatos = $response->json();

    $temperatura = $ultimosDatos['temperatura'];
    $humedad = $ultimosDatos['humedad'];
    $movimiento = $ultimosDatos['movimiento'];

    $temperaturaData = [];
    $humedadData = [];
    $movimientoData = [];
    foreach ($data as $item) {
        $temperaturaData[] = $item['temperatura'];
        $humedadData[] = $item['humedad'];
        $movimientoData[] = $item['movimiento'];
    }

    // Luego, pasas los datos a la vista
    return view('profesores.detalles3', compact('temperatura', 'humedad', 'movimiento','temperaturaData', 'humedadData', 'movimientoData' , 'datos'));
    }

    //--------------------------------------------------------------------------------------

    public function register(){
        return view('Login/register');
    }
    public function registro(Request $request){
        $request->validate([
            
            'name' => 'required',
            'app'=> 'required',
            'apm'=> 'required',
            'date' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
        $response = Http::post($url. '/usuarios/', [
            'name' => $request-> name,
            'app' => $request-> app,
            'apm' => $request-> apm,
            'date' => $request-> date,
            'email' => $request-> email,
            'password' => $request-> password,
        ]);

            // Verifica si la solicitud fue exitosa (código de respuesta en el rango 2xx)
            if ($response->successful()) {
                // Si es exitosa, verifica el contenido de la respuesta
                $data = $response->json();
        
                if (isset($data['message']['code']) && $data['message']['code'] == 11000) {
                    // Si el código de error indica duplicado, muestra un mensaje de error
                    return redirect()->back()->withInput()->withErrors(['error' => 'El usuario ya está registrado']);
                } else {
                    // Si no hay errores específicos, redirige a la vista 'exito'
                    return view('Login.login')->with('mensaje', 'Registro exitoso');
                }
            } else {
                // Si hay un error en la solicitud, regresa al formulario de registro con un mensaje de error genérico
                return redirect()->back()->withInput()->withErrors(['error' => 'Hubo un problema al registrar el usuario']);
            }
    }

    public function cerrarSesion(){
        session()->forget('external_api_token');
        session()->forget('user_data');
        return view('Login.login');
    }


    //--------------------------------------------------Profesor--------------------------------
    public function indexp(){
        return view('profesores.index');
    }
    public function explorar(){
        return view('profesores.explorar');
    }
    public function detalles(){
        $client = new Client();
        $response = $client->request('GET', 'https://api-mongodb-9be7.onrender.com/api/datosSensor');
        $data = json_decode($response->getBody(), true);

        $temperaturaData = [];
        $humedadData = [];
        $movimientoData = [];
        foreach ($data as $item) {
            $temperaturaData[] = $item['temperatura'];
            $humedadData[] = $item['humedad'];
            $movimientoData[] = $item['movimiento'];
        }

        return view('profesores.detalles', compact('temperaturaData', 'humedadData', 'movimientoData'));
    }

    public function reserva(){
        $userData = session()->get('user_data');
        
        if ($userData) {
            // Los datos del usuario están disponibles, haz lo que necesites con ellos
            return view('profesores.Reserva', ['userData' => $userData]);
        } else {
            // Los datos del usuario no están disponibles en la sesión, maneja el caso según tu lógica
            return redirect('/login')->with('error', 'Debes iniciar sesión primero');
        }
    }
    
    public function guardarDatos(Request $request){
        $request->validate([
            
            'fechaRegistro' => 'required',
            'fechaUtilizar'=> 'required',
            'horaInicio'=> 'required',
            'horaFinal' => 'required',
            'aula' => 'required',
            'user_id' => 'required',
            'user_name' => 'required',
            'user_app' => 'required',
            'user_apm' => 'required',
        ]);

       
        $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
        $response = Http::post($url. '/apartadoEspacio/', [
            'fechaRegistro' => $request-> fechaRegistro,
            'fechaUtilizar' => $request-> fechaUtilizar,
            'horaInicio' => $request-> horaInicio,
            'horaFinal' => $request-> horaFinal,
            'aula' => $request-> aula,
            'idUsuario' => $request-> user_id, 
            'nombreUsuario' => $request->user_name ." ". $request->user_app ." " . $request->user_apm,
        ]);

        return redirect()->route('indexp');  

    }
   

    
   
    

    public function historial(){

         $userData = session()->get('user_data');
         
        
        $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
        $response = Http::get($url.'/apartadoEspacio/id/'.$userData['id']);
        $datos = $response->json();
        return view('profesores.historial',['userData' => $userData], compact('datos'));
    }

    
    public function registerteacher(){
        return view('Login/registerteacher');
    }
    public function registroteacher(Request $request){
        $request->validate([
            'name' => 'required',
            'app'=> 'required',
            'apm'=> 'required',
            'date' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'huellaId' => 'required',
        ]);

        $client = new Client();
        try {
            $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
                // Realiza la solicitud POST a la API
            $response = $client->request('POST', $url.'/usuarios/profesores', [
                'json'=>[
                    'name' => $request->name,
                    'app' => $request->app,
                    'apm' => $request->apm,
                    'date' => $request->date,
                    'email' => $request->email,
                    'password' => $request->password,
                    'huellaId' => $request->huellaId,
                ]
        ]);
        if ($response->getStatusCode() == 200) {
            return redirect('/error');
        
        } else {
            return redirect ('/login');
        }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            if ($e->getResponse()->getStatusCode() == 400) {
                // Si el ID de la huella ya está en uso, redirige al formulario
                return redirect('/registerteacher')->withErrors(['huellaId' => 'El ID de la huella ya está en uso.']);
            } else {
                // Para otros errores, redirige a la página de error
                return redirect('/error');
            }
        }
        
/*         // Verifica si la solicitud fue exitosa (código de respuesta en el rango 2xx)
        if ($response->successful()==200) {
            // Si es exitosa, redirige a la vista 'exito'
            return view('Login.login')->with('mensaje', 'Registro exitoso');
        } else {
            // Si la respuesta tiene un estado 400, es probable que el huellaId ya esté en uso
            if ($response->status() == 400) {
                $errorData = $response->json();
                if (isset($errorData['message']) && $errorData['message'] == 'El ID de la huella dactilar ya está en uso.') {
                    // Redirige al formulario con un mensaje de error específico
                    return redirect()->back()->withInput()->withErrors(['huellaId' => 'El ID de la huella dactilar ya está en uso.']);
                }
            }
            // Para otros errores, redirige a la página de error con un mensaje genérico
            return redirect()->back()->withInput()->withErrors(['error' => 'Hubo un problema al registrar el usuario']);
        } */
    }
    

    public function allRecervas(){

        $userData = session()->get('user_data');
        
       
       $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
       $response = Http::get($url.'/apartadoEspacio');
       $datos = $response->json();
       return view('profesores.allRecervas', compact('datos'));
   }



    //-------------------------------------------------Estudiantes-----------------------------------

    public function indexe(){
        return view('estudiantes.index');
    }

    public function detalle(){
        $client = new Client();
        $response = $client->request('GET', 'https://api-mongodb-9be7.onrender.com/api/datosSensor');
        $data = json_decode($response->getBody(), true);

        $aula = 101;    
        
        $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
        $response = Http::get($url.'/apartadoEspacio/aula/'.$aula);
        $datos = $response->json();
    
        $temperaturaData = [];
        $humedadData = [];
        $movimientoData = [];
        foreach ($data as $item) {
            $temperaturaData[] = $item['temperatura'];
            $humedadData[] = $item['humedad'];
            $movimientoData[] = $item['movimiento'];
        }
    
        // Luego, pasas los datos a la vista
        return view('estudiantes.detalle', compact('temperaturaData', 'humedadData', 'movimientoData' , 'datos'));
        
    }

    //-----------


    public function detalle2(){
        $client = new Client();
        $response = $client->request('GET', 'https://api-mongodb-9be7.onrender.com/api/datosSensor');
        $data = json_decode($response->getBody(), true);

        $aula = 102;    
        
        $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
        $response = Http::get($url.'/apartadoEspacio/aula/'.$aula);
        $datos = $response->json();
    
        $temperaturaData = [];
        $humedadData = [];
        $movimientoData = [];
        foreach ($data as $item) {
            $temperaturaData[] = $item['temperatura'];
            $humedadData[] = $item['humedad'];
            $movimientoData[] = $item['movimiento'];
        }
    
        // Luego, pasas los datos a la vista
        return view('estudiantes.detalle2', compact('temperaturaData', 'humedadData', 'movimientoData' , 'datos'));
        
    }

    //------------------


    public function detalle3(){
        $client = new Client();
        $response = $client->request('GET', 'https://api-mongodb-9be7.onrender.com/api/datosSensor');
        $data = json_decode($response->getBody(), true);

        $aula = 103;    
        
        $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
        $response = Http::get($url.'/apartadoEspacio/aula/'.$aula);
        $datos = $response->json();
    
        $temperaturaData = [];
        $humedadData = [];
        $movimientoData = [];
        foreach ($data as $item) {
            $temperaturaData[] = $item['temperatura'];
            $humedadData[] = $item['humedad'];
            $movimientoData[] = $item['movimiento'];
        }
    
        // Luego, pasas los datos a la vista
        return view('estudiantes.detalle3', compact('temperaturaData', 'humedadData', 'movimientoData' , 'datos'));
        
    }
    public function calendario(){
        return view('estudiantes.explorar');
    }
   
    public function allRecervasE(){

        $userData = session()->get('user_data');
        
       
       $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
       $response = Http::get($url.'/apartadoEspacio');
       $datos = $response->json();
       return view('estudiantes.allRecervas', compact('datos'));
   }
}
