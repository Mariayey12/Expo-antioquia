<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommerceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\GastronomyController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ReviewsCalificationController;
use App\Http\Controllers\MediaGalleryController;
use App\Http\Controllers\ChatController;

Route::middleware(['web'])->group(function () {

    // Rutas para usuarios (si es necesario en la web)
    Route::resource('users', UserController::class);

    // Rutas para administradores
    Route::resource('admins', AdminController::class);

    // Rutas para proveedores
    Route::resource('providers', ProviderController::class);

    // Rutas para lugares
    Route::resource('places', PlaceController::class);

    // Rutas para servicios
    Route::resource('services', ServiceController::class);

    // Rutas para comercios
    Route::resource('commerces', CommerceController::class);

    // Rutas para gastronomía
    Route::resource('gastronomies', GastronomyController::class);

    // Rutas para eventos
    Route::resource('events', EventController::class);

    // Rutas para promociones
    Route::resource('promotions', PromotionController::class);

    // Rutas para reservas
    Route::resource('reservations', ReservationController::class);

    // Rutas para comentarios
    Route::resource('comments', CommentController::class);

    // Rutas para testimonios
    Route::resource('testimonials', TestimonialController::class);

    // Rutas para calificaciones y reseñas
    Route::resource('reviews-califications', ReviewsCalificationController::class);

    // Rutas para galería multimedia
    Route::resource('media_gallery', MediaGalleryController::class);

    // Rutas para mensajes de chat
    Route::resource('chat_messages', ChatController::class);

    // Ruta principal (inicio)
    Route::get('/', function () {
        return view('welcome'); // Vista de bienvenida
    });

    // Ruta para obtener datos del usuario autenticado
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

});
