<?php



/*
|---------------------------------------------------------------------------
| API Routes
|---------------------------------------------------------------------------
|
| Aquí es donde puedes registrar las rutas API para tu aplicación. Estas
| rutas se cargan a través del RouteServiceProvider y todas ellas se
| asignarán al grupo de middleware "api". ¡Haz algo genial!
|
*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComerceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\UserController;



// Rutas para usuarios
Route::resource('users', UserController::class);
// Rutas para lugares
Route::apiResource('places', PlaceController::class);

// Rutas para comercios
Route::apiResource('comerces', ComerceController::class);

// Rutas para servicios
Route::apiResource('services', ServiceController::class);

// Ruta para obtener el usuario autenticado
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
