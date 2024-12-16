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
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PasswordResetTokenController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BlogController; // Asegúrate de importar el controlador BlogController
use App\Http\Controllers\AdController; // Asegúrate de importar el controlador AdController

Route::middleware(['web'])->group(function () {

    // Rutas públicas para usuarios
    Route::resource('users', UserController::class);

    // Rutas para administradores
    Route::middleware(['auth:sanctum', 'can:access-dashboard'])->resource('admins', AdminController::class);

    // Rutas para proveedores
    Route::middleware(['auth:sanctum', 'check.provider'])->resource('providers', ProviderController::class);

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
    Route::middleware('auth:sanctum')->resource('reservations', ReservationController::class);

    // Rutas para comentarios
    Route::middleware('auth:sanctum')->resource('comments', CommentController::class);

    // Rutas para testimonios
    Route::middleware('auth:sanctum')->resource('testimonials', TestimonialController::class);

    // Rutas para calificaciones y reseñas
    Route::middleware('auth:sanctum')->resource('reviews-califications', ReviewsCalificationController::class);

    // Rutas para galería multimedia
    Route::middleware('auth:sanctum')->resource('media_gallery', MediaGalleryController::class);

    // Rutas para mensajes de chat
    Route::middleware('auth:sanctum')->resource('chat_messages', ChatController::class);

    // Rutas para productos
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::post('/products/{id}/reviews', [ProductController::class, 'addReview']);
    Route::post('products', [ProductController::class, 'store']);
    Route::put('products/{id}', [ProductController::class, 'update']);
    Route::delete('products/{id}', [ProductController::class, 'destroy']);

    // Rutas para el blog
    Route::resource('blogs', BlogController::class); // Ruta para los blogs

    // Rutas para los anuncios
    Route::resource('ads', AdController::class); // Ruta para los anuncios

    // Ruta principal de la aplicación
    Route::get('/', function () {
        return view('welcome');
    });

    // Ruta para obtener los datos del usuario autenticado
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    // Ruta para el dashboard (solo administradores)
    Route::middleware(['auth:sanctum', 'can:access-dashboard'])->get('/dashboard', function () {
        return response()->json(['message' => 'Bienvenido al Dashboard']);
    });

    // Ruta para el área de proveedores
    Route::middleware(['auth:sanctum', 'check.provider'])->get('/provider-area', function () {
        return response()->json(['message' => 'Área exclusiva para proveedores']);


    });
});
 // Operaciones específicas para proveedores
 Route::post('providers/{provider}/add-service', [ProviderController::class, 'addService']);
 Route::post('providers/{provider}/add-product', [ProviderController::class, 'addProduct']);
 Route::post('providers/{provider}/add-category', [ProviderController::class, 'addCategory']);
 Route::get('providers/{provider}/reservations', [ProviderController::class, 'reservations']);
 Route::get('providers/{provider}/ads', [ProviderController::class, 'ads']);
 Route::post('providers/search', [ProviderController::class, 'search']);
// Rutas para restablecer la contraseña
Route::prefix('password-reset')->group(function () {
    Route::post('tokens', [PasswordResetTokenController::class, 'store']);
    Route::get('tokens/{email}', [PasswordResetTokenController::class, 'show']);
    Route::delete('tokens/{email}', [PasswordResetTokenController::class, 'destroy']);
});

// Rutas para la creación de reservas
Route::post('/bookings', [BookingController::class, 'store']);
