<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\Service;
use App\Models\Product;
use App\Models\Category;
use App\Models\Place;
use App\Models\Reservation;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Mostrar una lista de todos los proveedores.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::with(['services', 'products', 'categories', 'places'])->get();
        return response()->json($providers);
    }

    /**
     * Crear un nuevo proveedor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:providers,email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'description' => 'nullable|string',
            'profile_picture' => 'nullable|image',
            'website' => 'nullable|url',
            'company_name' => 'nullable|string',
            'contact_person' => 'required|string',
        ]);

        $provider = Provider::create($request->all());

        return response()->json($provider, 201); // Retorna el proveedor creado
    }

    /**
     * Mostrar un proveedor específico.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        // Cargar relaciones para obtener los servicios, productos, lugares, etc.
        $provider->load(['services', 'products', 'categories', 'places', 'ads', 'reservations']);

        return response()->json($provider);
    }

    /**
     * Actualizar un proveedor existente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:providers,email,' . $provider->id,
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'description' => 'nullable|string',
            'profile_picture' => 'nullable|image',
            'website' => 'nullable|url',
            'company_name' => 'nullable|string',
            'contact_person' => 'required|string',
        ]);

        $provider->update($request->all());

        return response()->json($provider);
    }

    /**
     * Eliminar un proveedor.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();

        return response()->json(['message' => 'Provider deleted successfully.']);
    }

    /**
     * Asociar un servicio a un proveedor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function addService(Request $request, Provider $provider)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
        ]);

        $service = Service::find($request->service_id);

        $provider->services()->save($service);

        return response()->json($provider->services);
    }

    /**
     * Asociar un producto a un proveedor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function addProduct(Request $request, Provider $provider)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $product = Product::find($request->product_id);

        $provider->products()->save($product);

        return response()->json($provider->products);
    }

    /**
     * Asociar una categoría a un proveedor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function addCategory(Request $request, Provider $provider)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
        ]);

        $category = Category::find($request->category_id);

        $provider->categories()->save($category);

        return response()->json($provider->categories);
    }

    /**
     * Obtener todas las reservas de un proveedor.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function reservations(Provider $provider)
    {
        $provider->load('reservations');
        return response()->json($provider->reservations);
    }

    /**
     * Obtener todos los anuncios de un proveedor.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function ads(Provider $provider)
    {
        $provider->load('ads');
        return response()->json($provider->ads);
    }

    /**
     * Buscar proveedores por nombre.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $providers = Provider::byName($request->name)->get();

        return response()->json($providers);
    }
}
