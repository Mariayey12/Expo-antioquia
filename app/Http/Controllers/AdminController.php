<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Mostrar todos los administradores
    public function index()
    {
        $admins = Admin::with('user')->get(); // Incluir la relación con User
        return response()->json($admins);
    }

    // Crear un nuevo administrador
    public function store(Request $request)
    {
        $request->validate([
            'permissions' => 'required|string',
            'department' => 'required|string',
            'notes' => 'nullable|string',
            'user' => 'required|array', // Datos para crear un usuario relacionado
        ]);

        // Crear el administrador
        $admin = Admin::create($request->only(['permissions', 'department', 'notes']));

        // Crear el usuario relacionado con la relación polimórfica
        $user = new User($request->input('user')); // Datos del usuario
        $user->userable()->associate($admin); // Asociar con el modelo Admin
        $user->save();

        return response()->json(['admin' => $admin, 'user' => $user], 201);
    }

    // Mostrar un administrador específico
    public function show($id)
    {
        $admin = Admin::with('user')->findOrFail($id); // Incluir la relación con User
        return response()->json($admin);
    }

    // Actualizar un administrador
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id); // Buscar el administrador por ID

        $request->validate([
            'permissions' => 'required|string',
            'department' => 'required|string',
            'notes' => 'nullable|string',
            'user' => 'sometimes|array', // Datos opcionales para actualizar el usuario
        ]);

        // Actualizar los datos del administrador
        $admin->update($request->only(['permissions', 'department', 'notes']));

        // Actualizar los datos del usuario relacionado (si se envían)
        if ($request->has('user')) {
            $admin->user->update($request->input('user'));
        }

        return response()->json($admin->load('user')); // Devolver el administrador con la relación cargada
    }

    // Eliminar un administrador
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id); // Buscar el administrador por ID

        // Eliminar el usuario relacionado
        $admin->user()->delete();

        // Eliminar el administrador
        $admin->delete();

        return response()->json(null, 204); // Responder con estado 204 (sin contenido)
    }
}
