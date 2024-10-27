<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ComerceController;
use App\Http\Controllers\HandicraftController; // Controlador para artesanías
use App\Http\Controllers\CultureController; // Controlador para cultura
use App\Http\Controllers\GastronomyController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RelaxationPlaceController;
use App\Http\Controllers\TouristPlaceController;
use App\Http\Controllers\PlaceController;

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
// Rutas para lugares

Route::apiResource('places', PlaceController::class);

// Rutas para hoteles
Route::apiResource('hoteles', HotelController::class);

// Rutas para cultura
Route::apiResource('cultura', CultureController::class);

// Rutas para artesanías
Route::apiResource('artesanias', HandicraftController::class);

// Rutas para lugares de relajación
Route::apiResource('lugares-relajacion', RelaxationPlaceController::class);

// Rutas para lugares turísticos
Route::apiResource('lugares-turisticos', TouristPlaceController::class);

// Rutas para usuarios
Route::resource('usuarios', UserController::class); // Rutas de usuarios

// Rutas para comentarios
Route::resource('comentarios', CommentController::class); // Rutas de comentarios

// Rutas para reservas
Route::resource('reservas', ReservationController::class); // Rutas de reservas

// Rutas para servicios
Route::resource('servicios', ServiceController::class); // Rutas de servicios


// Rutas para comercios
Route::apiResource('comercios', ComerceController::class);

// Rutas para gastronomía
Route::apiResource('gastronomia', GastronomyController::class); // Rutas de gastronomía

// Rutas para restaurantes
Route::apiResource('restaurantes', RestaurantController::class); // Rutas de restaurantes

// Ruta principal (inicio)
Route::get('/', function () {
    return view('welcome'); // Vista de bienvenida
});
