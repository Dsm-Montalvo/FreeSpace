<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class proyectoController extends Controller
{
    public function index(){
        return view('inicio');
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

    public function ingresar(Request $request){
       
                    // Validar las credenciales del usuario
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Realizar la solicitud a la API externa para iniciar sesión
        $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
        $response = Http::post($url.'/usuarios/login', [
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ]);

       /* 
        $this->validate($request,[
            'email' => 'required',
            'password'=> 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
        $response = Http::get($url.'/usuarios/' . $email . '/' . $password);

        if ($response=="null") {
            // Si la consulta es exitosa, renderiza la vista 'exito'
            return view('Login.login');
        } else {
            // Si la consulta no es exitosa, renderiza la vista 'error'
            return view('insercion');
        } */
        
    // Verificar si la solicitud a la API fue exitosa y si las credenciales son válidas
    if ($response->successful()) {
        $token = $response->json()['token']; // Suponiendo que la API devuelve un token de autenticación
        session()->put('external_api_token', $token); // Guardar el token en la sesión

        // Redirigir al usuario a la página de inicio, dashboard, o cualquier otra página deseada
        $role = $response->json()['role']; // Suponiendo que el rol del usuario está disponible en la respuesta

        // Redirigir según el rol del usuario
        if ($role === 'admin') {
            return redirect('/create');
        } elseif ($role === 'estudiante') {
            return redirect('/indexe');
        } elseif ($role === 'Profesor') {
            return redirect('/indexp');
        }else {
            // Manejar cualquier otro tipo de rol
            return redirect('/pagina-general');
        }
    } else {
        // Las credenciales proporcionadas son inválidas
        return redirect('/login')->with('error', 'Credenciales inválidas');
    }

    }

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
        return view('profesores.detalles');
    }
    public function reserva(){
        return view('profesores.Reserva');
    }
    public function historial(){
        return view('profesores.historial');
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
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $url = env('URL_SERVER_API','https://api-mongodb-9be7.onrender.com');
        $response = Http::post($url. '/usuarios/profesores', [
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


    //-------------------------------------------------Estudiantes-----------------------------------

    public function indexe(){
        return view('estudiantes.index');
    }

    public function detalle(){
        return view('estudiantes.detalle');
    }
    public function calendario(){
        return view('estudiantes.index');
    }
   

}
