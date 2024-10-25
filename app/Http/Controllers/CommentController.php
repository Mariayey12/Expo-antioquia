<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     * Muestra una lista de todos los comentarios.
     */
    public function index()
    {
        $comments = Comment::all();
        return response()->json($comments);
    }

    /**
     * Store a newly created resource in storage.
     * Almacena un nuevo comentario.
     */
    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|integer|exists:usuarios,id',
            'servicio_id' => 'required|integer|exists:servicios,id',
            'contenido' => 'required|string|max:1000',
            'calificacion' => 'required|integer|min:1|max:5',
        ]);

        $comment = Comment::create([
            'usuario_id' => $request->usuario_id,
            'servicio_id' => $request->servicio_id,
            'contenido' => $request->contenido,
            'calificacion' => $request->calificacion,
        ]);

        return response()->json(['message' => 'Comentario creado exitosamente', 'comment' => $comment], 201);
    }

    /**
     * Display the specified resource.
     * Muestra un comentario específico.
     */
    public function show(string $id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response()->json(['message' => 'Comentario no encontrado'], 404);
        }

        return response()->json($comment);
    }

    /**
     * Update the specified resource in storage.
     * Actualiza un comentario específico.
     */
    public function update(Request $request, string $id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response()->json(['message' => 'Comentario no encontrado'], 404);
        }

        $request->validate([
            'contenido' => 'sometimes|string|max:1000',
            'calificacion' => 'sometimes|integer|min:1|max:5',
        ]);

        $comment->contenido = $request->contenido ?? $comment->contenido;
        $comment->calificacion = $request->calificacion ?? $comment->calificacion;
        $comment->save();

        return response()->json(['message' => 'Comentario actualizado correctamente', 'comment' => $comment]);
    }

    /**
     * Remove the specified resource from storage.
     * Elimina un comentario.
     */
    public function destroy(string $id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response()->json(['message' => 'Comentario no encontrado'], 404);
        }

        $comment->delete();

        return response()->json(['message' => 'Comentario eliminado exitosamente']);
    }
}
