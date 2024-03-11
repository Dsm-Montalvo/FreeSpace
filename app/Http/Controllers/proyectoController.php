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
        $url = env('URL_SERVER_API','http://127.0.0.1');
        $response = Http::get($url.'/users');
        $datos = $response->json();
        return view('listado', compact('datos'));
    }

    public function listadoPIR(){
        $url = env('URL_SERVER_API','http://127.0.0.1');
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


        $url = env('URL_SERVER_API','http://127.0.0.1');
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
       
        $url = env('URL_SERVER_API','http://127.0.0.1');
        $response = Http::delete($url.'/users/'.$id);

        return redirect ()->route('listado');
    }

    public function update($id){
       
        $url = env('URL_SERVER_API','http://127.0.0.1');
        $response = Http::get($url.'/users/'.$id);
        $data = $response -> json();
        return view ('actualizacion', compact('data'));
    }

    public function updatesave(Request $request){
        $url = env('URL_SERVER_API','http://127.0.0.1');
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
       
        $this->validate($request,[
            'email' => 'required',
            'password'=> 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $url = env('URL_SERVER_API','http://127.0.0.1');
        $response = Http::get($url.'/usuarios/' . $email . '/' . $password);
       
        if ($response=="null") {
            // Si la consulta es exitosa, renderiza la vista 'exito'
            return view('Login.login');
        } else {
            // Si la consulta no es exitosa, renderiza la vista 'error'
            return view('insercion');
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
        
        $url = env('URL_SERVER_API','http://127.0.0.1');
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


}
