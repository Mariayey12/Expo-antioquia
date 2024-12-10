<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Muestra una lista de todos los usuarios.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $users = User::all(); // Obtiene todos los usuarios
        return response()->json($users); // Devuelve los usuarios en formato JSON
    }

    /**
     * Almacena un nuevo usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validación de los datos de entrada
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email', // Cambié 'usuarios' a 'users'
            'password' => 'required|string|min:8|confirmed', // La contraseña debe ser confirmada
        ]);

        // Creación del usuario con datos validados
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Encripta la contraseña
        ]);

        return response()->json([
            'message' => 'Usuario creado exitosamente',
            'user' => $user
        ], 201); // Devuelve un código HTTP 201 para creación exitosa
    }

    /**
     * Muestra un usuario específico.
     *
     * @param  string  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $id)
    {
        $user = User::find($id); // Busca el usuario por ID

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404); // Código HTTP 404 si no se encuentra
        }

        return response()->json($user); // Devuelve el usuario en formato JSON
    }

    /**
     * Actualiza la información de un usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id); // Busca el usuario por ID

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404); // Código HTTP 404 si no se encuentra
        }

        // Validación de los datos de entrada
        $request->validate([
            'name' => 'sometimes|string|max:255', // 'sometimes' permite que el campo sea opcional
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|string|min:8|confirmed', // Opcional, pero si está presente, debe ser confirmado
        ]);

        // Actualización de los datos del usuario
        $user->name = $request->name ?? $user->name; // Si no se envía el campo, conserva el valor existente
        $user->email = $request->email ?? $user->email;

        if ($request->password) {
            $user->password = Hash::make($request->password); // Encripta la nueva contraseña
        }

        $user->save(); // Guarda los cambios

        return response()->json([
            'message' => 'Usuario actualizado correctamente',
            'user' => $user
        ]);
    }

    /**
     * Elimina un usuario.
     *
     * @param  string  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(string $id)
    {
        $user = User::find($id); // Busca el usuario por ID

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404); // Código HTTP 404 si no se encuentra
        }

        $user->delete(); // Elimina el usuario

        return response()->json(['message' => 'Usuario eliminado exitosamente']);
    }
}
