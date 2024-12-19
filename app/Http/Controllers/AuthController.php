<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Mostrar formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Mostrar formulario de registro
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Lógica para registrar un usuario
    public function register(Request $request)
    {
        // Validar los datos del registro
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Si la validación falla
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Crear el usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Iniciar sesión al usuario recién creado
        Auth::login($user);

        return redirect()->route('home');  // Redirigir al usuario a la página principal
    }

    // Lógica para iniciar sesión
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Redirigir a la página principal si el inicio de sesión es exitoso
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }

    // Lógica para cerrar sesión
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login'); // Redirigir al formulario de inicio de sesión
    }
}

