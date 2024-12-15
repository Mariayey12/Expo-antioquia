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
use App\Http\Controllers\{
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

// Autenticación
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
// Ruta protegida para obtener datos del usuario autenticado
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Ruta protegida con autorización específica para el dashboard (solo administradores)
Route::middleware(['auth:sanctum', 'can:access-dashboard'])->get('/dashboard', function () {
    return response()->json(['message' => 'Bienvenido al Dashboard']);
});
// Administradores
Route::middleware(['auth:sanctum', 'can:access-dashboard'])->group(function () {
    Route::apiResource('admins', AdminController::class);
    Route::get('/dashboard', fn () => response()->json(['message' => 'Bienvenido al Dashboard']));
});

// Proveedores
Route::middleware(['auth:sanctum', 'check.provider'])->group(function () {
    Route::apiResource('providers', ProviderController::class);
    Route::get('/provider-area', fn () => response()->json(['message' => 'Área exclusiva para proveedores']));
});
