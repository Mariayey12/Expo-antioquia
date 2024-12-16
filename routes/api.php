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
    ShoppingCartController,
    PasswordResetTokenController,
    BookingController,
    BlogController,
    AdController
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
Route::apiResource('blogs', BlogController::class); // Rutas de Blog
Route::apiResource('ads', AdController::class); // Rutas de Anuncios

// Endpoints específicos de productos
Route::get('products/{id}', [ProductController::class, 'show']); // Producto específico con reseñas
Route::post('products/{id}/reviews', [ProductController::class, 'addReview']); // Crear reseña

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
    // Operaciones específicas para proveedores
    Route::post('providers/{provider}/add-service', [ProviderController::class, 'addService']);
    Route::post('providers/{provider}/add-product', [ProviderController::class, 'addProduct']);
    Route::post('providers/{provider}/add-category', [ProviderController::class, 'addCategory']);
    Route::get('providers/{provider}/reservations', [ProviderController::class, 'reservations']);
    Route::get('providers/{provider}/ads', [ProviderController::class, 'ads']);
    Route::post('providers/search', [ProviderController::class, 'search']);
});

// Rutas para recuperación de contraseñas
Route::prefix('password-reset')->group(function () {
    Route::post('tokens', [PasswordResetTokenController::class, 'store']); // Crear un nuevo token
    Route::get('tokens/{email}', [PasswordResetTokenController::class, 'show']); // Obtener el token
    Route::delete('tokens/{email}', [PasswordResetTokenController::class, 'destroy']); // Eliminar el token
});

// Rutas de reservas y productos
Route::post('/bookings', [BookingController::class, 'store']); // Crear una nueva reserva

// Manejo de productos, estas rutas ya están agrupadas
Route::apiResource('products', ProductController::class);
Route::get('products/{id}', [ProductController::class, 'show']);
Route::post('products', [ProductController::class, 'store']);
Route::put('products/{id}', [ProductController::class, 'update']);
Route::delete('products/{id}', [ProductController::class, 'destroy']);
