<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ComerceController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProviderController; // Agregar controlador para proveedor
use App\Http\Controllers\CategoryController;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Aquí es donde puedes registrar las rutas web para tu aplicación. Estas
| rutas se cargan a través del RouteServiceProvider y todas ellas se
| asignarán al grupo de middleware "web". ¡Haz algo genial!
|
*/


// Rutas para usuarios (si es necesario en la web)
Route::resource('users', UserController::class);

// Rutas para administradores
Route::resource('admins', AdminController::class);

// Rutas para proveedores
Route::resource('providers', ProviderController::class); // Si quieres que se pueda gestionar desde la web

// Rutas para lugares
Route::resource('places', PlaceController::class);

// Rutas para servicios
Route::resource('services', ServiceController::class);

// Rutas para comercios
Route::resource('comerces', ComerceController::class);

// Rutas RESTful para la entidad Category
Route::apiResource('categories', CategoryController::class);

// Ruta principal (inicio)
Route::get('/', function () {
    return view('welcome'); // Vista de bienvenida
});
