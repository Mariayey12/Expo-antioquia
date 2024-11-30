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
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProviderController; // Agregar controlador para proveedor

// Rutas públicas para usuarios
Route::resource('users', UserController::class);

// Rutas para administradores (autenticación + autorización para roles específicos)
Route::middleware(['auth:sanctum', 'can:access-dashboard'])->apiResource('admins', AdminController::class);

// Rutas para proveedores (autenticación + autorización para proveedores)
Route::middleware(['auth:sanctum', 'check.provider'])->apiResource('providers', ProviderController::class);

// Rutas públicas para lugares, comercios y servicios
Route::apiResource('places', PlaceController::class);
Route::apiResource('comerces', ComerceController::class);
Route::apiResource('services', ServiceController::class);

// Ruta protegida para obtener datos del usuario autenticado
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Ruta protegida con autorización específica para el dashboard (solo administradores)
Route::middleware(['auth:sanctum', 'can:access-dashboard'])->get('/dashboard', function () {
    return response()->json(['message' => 'Bienvenido al Dashboard']);
});

// Ruta protegida para proveedores (ejemplo de autorización personalizada)
Route::middleware(['auth:sanctum', 'check.provider'])->get('/provider-area', function () {
    return response()->json(['message' => 'Área exclusiva para proveedores']);
});
