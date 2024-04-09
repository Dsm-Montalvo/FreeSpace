<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Fecades\Http;

class CheckExternalAPILogin
{
    
        public function handle($request, Closure $next)
        {
             // Verifica si el usuario tiene una sesión activa con la API externa
            if (!session()->has('external_api_token')) 
            {
                return redirect('/login');
            }

            // Continúa con la solicitud si el usuario está autenticado
            return $next($request);
        }
       
    
}
