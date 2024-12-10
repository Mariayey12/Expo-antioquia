<?php
namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    // Mostrar todos los proveedores
    public function index()
    {
        $proveedores = Proveedor::all();
        return response()->json($proveedores);
    }

    // Crear un nuevo proveedor
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
        ]);

        $proveedor = Proveedor::create($request->all());

        return response()->json($proveedor, 201);
    }

    // Mostrar un proveedor específico
    public function show($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return response()->json($proveedor);
    }

    // Actualizar un proveedor existente
    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($request->all());

        return response()->json($proveedor);
    }

    // Eliminar un proveedor
    public function destroy($id)
    {
        Proveedor::destroy($id);
        return response()->json(null, 204);
    }
}
