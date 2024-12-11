<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    // Mostrar todos los proveedores
    public function index()
    {
        $providers = Provider::all();
        return response()->json($providers);
    }

    // Crear un nuevo proveedor
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:providers,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'contact_person' => 'required|string|max:255',
        ]);

        $provider = Provider::create($request->all());

        return response()->json($provider, 201);
    }

    // Mostrar un proveedor específico
    public function show($id)
    {
        $provider = Provider::findOrFail($id);
        return response()->json($provider);
    }

    // Actualizar un proveedor existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:providers,email,' . $id,
            'phone' => 'sometimes|required|string|max:20',
            'address' => 'sometimes|required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'contact_person' => 'sometimes|required|string|max:255',
        ]);

        $provider = Provider::findOrFail($id);
        $provider->update($request->all());

        return response()->json($provider);
    }

    // Eliminar un proveedor
    public function destroy($id)
    {
        Provider::destroy($id);
        return response()->json(null, 204);
    }
}
