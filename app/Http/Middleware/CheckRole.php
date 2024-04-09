<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        // Verificar si el usuario tiene el rol requerido
        if ($request->user()->role !== $role) {
            abort(403, 'Acceso no autorizado.');
        }

        return $next($request);
    }
}
