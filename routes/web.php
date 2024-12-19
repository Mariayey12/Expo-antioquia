<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\{
    UserController,
    PlaceController,
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

// ** Rutas públicas (sin autenticación) **
Route::middleware(['web'])->group(function () {
    // Página principal
    Route::get('/', fn () => Inertia::render('Home'));

    // Página de lugares
    Route::get('/places', fn () => Inertia::render('Places'));

    // Recursos públicos
    Route::resource('users', UserController::class);
    Route::resource('places', PlaceController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('commerces', CommerceController::class);
    Route::resource('gastronomies', GastronomyController::class);
    Route::resource('events', EventController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('ads', AdController::class);
    Route::resource('cultures', CultureController::class);
    Route::resource('crafts', CraftController::class);
    Route::resource('sports', SportController::class);
    Route::resource('news', NewsController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('municipalities', MunicipalityController::class);
    Route::resource('promotions', PromotionController::class);
    Route::resource('products', ProductController::class);

    // Reviews para productos
    Route::post('products/{id}/reviews', [ProductController::class, 'addReview']);

    // Crear reservas
    Route::post('bookings', [BookingController::class, 'store']);

    // Rutas para restablecimiento de contraseñas
    Route::prefix('password-reset')->group(function () {
        Route::post('tokens', [PasswordResetTokenController::class, 'store']);
        Route::get('tokens/{email}', [PasswordResetTokenController::class, 'show']);
        Route::delete('tokens/{email}', [PasswordResetTokenController::class, 'destroy']);
    });
});

// ** Rutas protegidas (requieren autenticación) **
Route::middleware('auth:sanctum')->group(function () {
    // Rutas generales para usuarios autenticados
    Route::get('/user', fn (Request $request) => $request->user());
    Route::resource('reservations', ReservationController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('reviews-califications', ReviewsCalificationController::class);
    Route::resource('media_gallery', MediaGalleryController::class);
    Route::resource('chat_messages', ChatController::class);

    // Operaciones específicas para proveedores
    Route::prefix('providers')->group(function () {
        Route::post('{provider}/add-service', [ProviderController::class, 'addService']);
        Route::post('{provider}/add-product', [ProviderController::class, 'addProduct']);
        Route::post('{provider}/add-category', [ProviderController::class, 'addCategory']);
        Route::get('{provider}/reservations', [ProviderController::class, 'reservations']);
        Route::get('{provider}/ads', [ProviderController::class, 'ads']);
        Route::post('search', [ProviderController::class, 'search']);
    });

    // Área de proveedores
    Route::get('/provider-area', fn () => response()->json(['message' => 'Área exclusiva para proveedores']));
});

// ** Rutas específicas para administradores (dashboard) **
Route::middleware(['auth:sanctum', 'can:access-dashboard'])->prefix('admin')->group(function () {
    Route::resource('admins', AdminController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('places', PlaceController::class)->names('admin.places');
    Route::get('/dashboard', fn () => Inertia::render('Dashboard'));
});
