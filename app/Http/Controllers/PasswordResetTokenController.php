<?php

namespace App\Http\Controllers;

use App\Models\PasswordResetToken;
use Illuminate\Http\Request;

class PasswordResetTokenController extends Controller
{
    // Crear un nuevo token de restablecimiento de contraseña
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required|string',
        ]);

        $passwordResetToken = PasswordResetToken::create([
            'email' => $request->email,
            'token' => $request->token,
            'created_at' => now(),
        ]);

        return response()->json(['message' => 'Token creado exitosamente', 'data' => $passwordResetToken], 201);
    }

    // Obtener el token de restablecimiento de contraseña por correo electrónico
    public function show($email)
    {
        $passwordResetToken = PasswordResetToken::where('email', $email)->first();

        if ($passwordResetToken) {
            return response()->json($passwordResetToken);
        }

        return response()->json(['message' => 'Token no encontrado'], 404);
    }

    // Eliminar el token de restablecimiento de contraseña por correo electrónico
    public function destroy($email)
    {
        $passwordResetToken = PasswordResetToken::where('email', $email)->first();

        if ($passwordResetToken) {
            $passwordResetToken->delete();
            return response()->json(['message' => 'Token eliminado exitosamente']);
        }

        return response()->json(['message' => 'Token no encontrado'], 404);
    }
}
