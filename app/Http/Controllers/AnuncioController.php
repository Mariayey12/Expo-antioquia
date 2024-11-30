<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Http\Request;

class AnuncioController extends Controller
{
    // Método para obtener todos los anuncios
    public function index()
    {
        $anuncios = Anuncio::all();  // Obtener todos los anuncios
        return response()->json($anuncios);
    }

    // Método para crear un nuevo anuncio
    public function store(Request $request)
    {
        // Validar los datos antes de crear el anuncio
        $validated = $request->validate([
            'area' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
            'contenido' => 'nullable|string',
            'precio' => 'nullable|numeric',
            'autor' => 'nullable|string|max:255',
            'imagen_url' => 'nullable|url',
            'link_externo' => 'nullable|url',
            'nombre' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'telefono' => 'nullable|string|max:15',
            'acepto_condiciones' => 'boolean',
            'fecha_publicacion' => 'nullable|date',
        ]);

        // Crear un nuevo anuncio
        $anuncio = Anuncio::create($validated);

        return response()->json($anuncio, 201);  // Retorna el anuncio creado
    }

    // Método para mostrar un anuncio por su ID
    public function show($id)
    {
        $anuncio = Anuncio::find($id);

        if (!$anuncio) {
            return response()->json(['message' => 'Anuncio no encontrado'], 404);
        }

        return response()->json($anuncio);
    }

    // Método para actualizar un anuncio
    public function update(Request $request, $id)
    {
        $anuncio = Anuncio::find($id);

        if (!$anuncio) {
            return response()->json(['message' => 'Anuncio no encontrado'], 404);
        }

        // Validar los datos
        $validated = $request->validate([
            'area' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
            'contenido' => 'nullable|string',
            'precio' => 'nullable|numeric',
            'autor' => 'nullable|string|max:255',
            'imagen_url' => 'nullable|url',
            'link_externo' => 'nullable|url',
            'nombre' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'telefono' => 'nullable|string|max:15',
            'acepto_condiciones' => 'boolean',
            'fecha_publicacion' => 'nullable|date',
        ]);

        // Actualizar el anuncio
        $anuncio->update($validated);

        return response()->json($anuncio);
    }

    // Método para eliminar un anuncio
    public function destroy($id)
    {
        $anuncio = Anuncio::find($id);

        if (!$anuncio) {
            return response()->json(['message' => 'Anuncio no encontrado'], 404);
        }

        $anuncio->delete();

        return response()->json(['message' => 'Anuncio eliminado con éxito']);
    }
}
