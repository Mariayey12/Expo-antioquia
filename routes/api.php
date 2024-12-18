<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
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
    AdController,
    CultureController,
    CraftController,
    SportController,
    NewsController,
    DepartmentController,
    MunicipalityController
};

// ** Rutas públicas **
Route::post('login', [AuthController::class, 'login']);
// Ruta para la vista de inicio de sesión con Inertia.js
Route::get('/login', function () {
    return Inertia::render('Auth/Login'); // Renderiza el componente Vue Login.vue
})->name('login');


Route::post('register', [AuthController::class, 'register']);

// Recursos públicos
Route::apiResource('users', UserController::class)->names([
    'index' => 'users.public.index',
    'show' => 'users.public.show',
    'store' => 'users.public.store',
    'update' => 'users.public.update',
    'destroy' => 'users.public.destroy',
]);
Route::apiResource('places', PlaceController::class)->names([
    'index' => 'places.public.index',
    'show' => 'places.public.show',
    'store' => 'places.public.store',
    'update' => 'places.public.update',
    'destroy' => 'places.public.destroy',
]);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('commerces', CommerceController::class);
Route::apiResource('services', ServiceController::class);
Route::apiResource('gastronomies', GastronomyController::class);
Route::apiResource('events', EventController::class);
Route::apiResource('blogs', BlogController::class);
Route::apiResource('ads', AdController::class);
Route::apiResource('cultures', CultureController::class);
Route::apiResource('crafts', CraftController::class);
Route::apiResource('sports', SportController::class);
Route::apiResource('news', NewsController::class);
Route::apiResource('departments', DepartmentController::class);
Route::apiResource('municipalities', MunicipalityController::class);

// Productos
Route::apiResource('products', ProductController::class);
Route::post('products/{id}/reviews', [ProductController::class, 'addReview']);

// ** Rutas protegidas por autenticación **
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::apiResource('reservations', ReservationController::class);
    Route::apiResource('comments', CommentController::class);
    Route::apiResource('testimonials', TestimonialController::class);
    Route::apiResource('reviews-califications', ReviewsCalificationController::class);
    Route::apiResource('media-galleries', MediaGalleryController::class);
    Route::apiResource('chat-messages', ChatController::class);
    Route::apiResource('shopping-carts', ShoppingCartController::class);
    Route::get('/user', fn (Request $request) => $request->user());
});

// ** Rutas específicas de administración **
Route::middleware(['auth:sanctum', 'can:access-dashboard'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::apiResource('users', UserController::class)->names([
            'index' => 'admin.users.index',
            'show' => 'admin.users.show',
            'store' => 'admin.users.store',
            'update' => 'admin.users.update',
            'destroy' => 'admin.users.destroy',
        ]);
        Route::apiResource('places', PlaceController::class)->names('admin.places');
        Route::apiResource('admins', AdminController::class);
        Route::get('/dashboard', fn () => response()->json(['message' => 'Bienvenido al Dashboard']));
    });
});

// ** Rutas específicas de proveedores **
Route::middleware(['auth:sanctum', 'check.provider'])->group(function () {
    Route::prefix('providers')->group(function () {
        Route::apiResource('/', ProviderController::class)->names('providers');
        Route::post('{provider}/add-service', [ProviderController::class, 'addService']);
        Route::post('{provider}/add-product', [ProviderController::class, 'addProduct']);
        Route::post('{provider}/add-category', [ProviderController::class, 'addCategory']);
        Route::get('{provider}/reservations', [ProviderController::class, 'reservations']);
        Route::get('{provider}/ads', [ProviderController::class, 'ads']);
        Route::post('search', [ProviderController::class, 'search']);
    });
});

// ** Rutas de recuperación de contraseñas **
Route::prefix('password-reset')->group(function () {
    Route::post('tokens', [PasswordResetTokenController::class, 'store']);
    Route::get('tokens/{email}', [PasswordResetTokenController::class, 'show']);
    Route::delete('tokens/{email}', [PasswordResetTokenController::class, 'destroy']);
});

// ** Rutas de reservas **
Route::post('/bookings', [BookingController::class, 'store']);



