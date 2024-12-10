<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Mostrar todos los administradores
    public function index()
    {
        $admins = Admin::all();  // Obtener todos los registros de administradores
        return response()->json($admins);
    }

    // Crear un nuevo administrador
    public function store(Request $request)
    {
        $request->validate([
            'permissions' => 'required|string',
            'department' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $admin = Admin::create($request->all());  // Crear un nuevo administrador

        return response()->json($admin, 201);
    }

    // Mostrar un administrador específico
    public function show($id)
    {
        $admin = Admin::findOrFail($id);  // Buscar un administrador por ID
        return response()->json($admin);
    }

    // Actualizar un administrador
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);  // Buscar el administrador por ID

        // Validar los datos
        $request->validate([
            'permissions' => 'required|string',
            'department' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $admin->update($request->all());  // Actualizar los datos del administrador

        return response()->json($admin);
    }

    // Eliminar un administrador
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);  // Buscar el administrador por ID
        $admin->delete();  // Eliminar el administrador

        return response()->json(null, 204);  // Responder con estado 204 (sin contenido)
    }
}

