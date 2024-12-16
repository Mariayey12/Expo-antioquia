<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    PlaceController,
    UserController,
    AdminController,
    ProviderController,
    CategoryController,
    CommerceController,
    ServiceController,
    GastronomyController,
    EventController,
    PromotionController,
    ReservationController,
    CommentController,
    TestimonialController,
    ReviewsCalificationController,
    MediaGalleryController,
    ChatController,
    ProductController,
    ClientController,
    FavoriteController,
    ShoppingCartController
};

// Rutas de autenticación
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('register', [AuthController::class, 'register']);

// Rutas públicas
Route::apiResource('users', UserController::class);
Route::apiResource('places', PlaceController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('commerces', CommerceController::class);
Route::apiResource('services', ServiceController::class);
Route::apiResource('gastronomies', GastronomyController::class);
Route::apiResource('events', EventController::class);
Route::apiResource('products', ProductController::class);
Route::apiResource('favorites', FavoriteController::class);

// Endpoints específicos de productos
Route::get('/products/{id}', [ProductController::class, 'show']); // Producto específico con reseñas
Route::post('/products/{id}/reviews', [ProductController::class, 'addReview']); // Crear reseña

// Rutas protegidas
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('reservations', ReservationController::class);
    Route::apiResource('comments', CommentController::class);
    Route::apiResource('testimonials', TestimonialController::class);
    Route::apiResource('reviews-califications', ReviewsCalificationController::class);
    Route::apiResource('media-galleries', MediaGalleryController::class);
    Route::apiResource('chat-messages', ChatController::class);
    Route::apiResource('shopping-carts', ShoppingCartController::class);
    Route::get('/user', fn (Request $request) => $request->user());
});

// Rutas para administradores
Route::middleware(['auth:sanctum', 'can:access-dashboard'])->group(function () {
    Route::apiResource('admins', AdminController::class);
    Route::get('/dashboard', fn () => response()->json(['message' => 'Bienvenido al Dashboard']));
});

// Rutas para proveedores
Route::middleware(['auth:sanctum', 'check.provider'])->group(function () {
    Route::apiResource('providers', ProviderController::class);
    Route::get('/provider-area', fn () => response()->json(['message' => 'Área exclusiva para proveedores']));
});
