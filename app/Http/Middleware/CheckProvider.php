<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class CheckProvider
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verificar si el usuario tiene el rol de proveedor
        if (auth()->user() && auth()->user()->role != 'provider') {
            // Si no tiene el rol 'provider', devolver un error 403
            return response()->json(['error' => 'No tiene acceso'], 403);
        }

        // Si el usuario tiene el rol adecuado, continuar con la solicitud
        return $next($request);
    }
}
