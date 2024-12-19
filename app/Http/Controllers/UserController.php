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
        // Obtiene todos los usuarios y devuelve como JSON
        $users = User::all();

        return response()->json([
            'message' => 'Lista de usuarios obtenida exitosamente',
            'users' => $users,
        ]);
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
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Creación del usuario con datos validados
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Encripta la contraseña
        ]);

        return response()->json([
            'message' => 'Usuario creado exitosamente',
            'user' => $user,
        ], 201); // Código HTTP 201: Creación exitosa
    }

    /**
     * Muestra un usuario específico.
     *
     * @param  string  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $id)
    {
        // Busca el usuario por ID
        $user = User::find($id);

        if (!$user) {
            // Respuesta si no se encuentra el usuario
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json([
            'message' => 'Usuario obtenido exitosamente',
            'user' => $user,
        ]);
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
        // Busca el usuario por ID
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        // Validación de los datos de entrada
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|string|min:8|confirmed',
        ]);

        // Actualiza los campos solo si están presentes en la solicitud
        $user->name = $request->name ?? $user->name;
        $user->email = $request->email ?? $user->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save(); // Guarda los cambios en la base de datos

        return response()->json([
            'message' => 'Usuario actualizado correctamente',
            'user' => $user,
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
        // Busca el usuario por ID
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $user->delete(); // Elimina el usuario

        return response()->json([
            'message' => 'Usuario eliminado exitosamente',
        ]);
    }

    /**
     * Busca usuarios por nombre.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        // Validación de la búsqueda
        $request->validate([
            'name' => 'required|string',
        ]);

        // Busca usuarios cuyo nombre coincida (case insensitive)
        $users = User::where('name', 'LIKE', '%' . $request->name . '%')->get();

        if ($users->isEmpty()) {
            return response()->json(['message' => 'No se encontraron usuarios con ese nombre'], 404);
        }

        return response()->json([
            'message' => 'Usuarios encontrados',
            'users' => $users,
        ]);
    }
}

