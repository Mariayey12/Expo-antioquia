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
use App\Http\Controllers\HotelController;
use App\Http\Controllers\TouristPlaceController;
use App\Http\Controllers\RelaxationPlaceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HandicraftController;
use App\Http\Controllers\CultureController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\GastronomyController;
use App\Http\Controllers\EventoController; // Asegúrate de que este nombre esté correcto

// Rutas para lugares
Route::apiResource('places', PlaceController::class);

// Rutas para hoteles
Route::apiResource('hotels', HotelController::class);

// Rutas para lugares turísticos
Route::apiResource('tourist-places', TouristPlaceController::class);

// Rutas para lugares de relajación
Route::apiResource('relaxation-places', RelaxationPlaceController::class);

// Rutas para reservas
Route::apiResource('reservations', ReservationController::class);

// Rutas para comentarios
Route::apiResource('comments', CommentController::class);

// Rutas para usuarios
Route::apiResource('users', UserController::class);

// Rutas para artesanías
Route::apiResource('handicrafts', HandicraftController::class);

// Rutas para cultura
Route::apiResource('culture', CultureController::class);

// Rutas para restaurantes
Route::apiResource('restaurants', RestaurantController::class);

// Rutas para gastronomía
Route::apiResource('gastronomy', GastronomyController::class);

// Rutas para eventos
Route::apiResource('eventos', EventoController::class); // Corrige el nombre si es necesario

// Rutas para comercios
Route::apiResource('comercios', ComerceController::class);

// Rutas para servicios
Route::apiResource('services', ServiceController::class);

// Ruta para obtener el usuario autenticado
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
