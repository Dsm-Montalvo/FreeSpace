<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class proyectoController extends Controller
{
    public function index(){
        return view('inicio');
    }

    public function prueba(){
        return view('index');
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


}
