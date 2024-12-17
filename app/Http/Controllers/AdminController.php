<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

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
            'permissions' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'notes' => 'nullable|string|max:500',
            'user.name' => 'required|string|max:255',
            'user.email' => 'required|email|unique:users,email',
            'user.password' => 'required|string|min:8',
        ]);

        try {
            // Crear el administrador
            $admin = Admin::create($request->only(['permissions', 'department', 'notes']));

            // Crear el usuario relacionado con la relación polimórfica
            $user = new User([
                'name' => $request->input('user.name'),
                'email' => $request->input('user.email'),
                'password' => bcrypt($request->input('user.password')), // Encriptar contraseña
            ]);
            $user->userable()->associate($admin);
            $user->save();

            return response()->json(['admin' => $admin, 'user' => $user], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear el administrador: ' . $e->getMessage()], 500);
        }
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
        $request->validate([
            'permissions' => 'sometimes|string|max:255',
            'department' => 'sometimes|string|max:255',
            'notes' => 'nullable|string|max:500',
            'user.name' => 'sometimes|string|max:255',
            'user.email' => 'sometimes|email|unique:users,email,' . $id,
            'user.password' => 'sometimes|string|min:8',
        ]);

        try {
            $admin = Admin::with('user')->findOrFail($id);

            // Actualizar datos del administrador
            $admin->update($request->only(['permissions', 'department', 'notes']));

            // Actualizar datos del usuario relacionado (si se envían)
            if ($request->has('user')) {
                $user = $admin->user;
                $user->update([
                    'name' => $request->input('user.name', $user->name),
                    'email' => $request->input('user.email', $user->email),
                    'password' => $request->has('user.password') ? bcrypt($request->input('user.password')) : $user->password,
                ]);
            }

            return response()->json($admin->load('user'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el administrador: ' . $e->getMessage()], 500);
        }
    }

    // Eliminar un administrador
    public function destroy($id)
    {
        try {
            $admin = Admin::with('user')->findOrFail($id);

            // Eliminar el usuario relacionado
            $admin->user->delete();

            // Eliminar el administrador
            $admin->delete();

            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar el administrador: ' . $e->getMessage()], 500);
        }
    }

    public function renderVuePage()
    {
        return Inertia::render('PageName');  // Reemplaza 'PageName' con el nombre de tu componente de Vue
    }
}
