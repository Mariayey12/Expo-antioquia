<?php

namespace App\Http\Controllers;

use App\Models\Commerce;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CommerceController extends Controller
{
    /**
     * Muestra una lista de comercios.
     * API: GET /api/commerces
     * Web: GET /commerces
     */
    public function index(Request $request)
    {
        $commerces = Commerce::all();

        if ($request->wantsJson()) {
            return $this->respondWithSuccess($commerces);
        }

        return view('commerces.index', compact('commerces'));
    }

    /**
     * Almacena un nuevo comercio en la base de datos.
     * API: POST /api/commerces
     * Web: POST /commerces
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'image_url' => 'nullable|url',
            'video_url' => 'nullable|url',
            'google_maps' => 'nullable|url',
            'contact_number' => 'nullable|string',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            
        ]);

        $commerce = Commerce::create($validatedData);

        // Si hay categorías, asociarlas al comercio
        if ($request->has('categories')) {
            $commerce->categories()->sync($request->categories);
        }

        if ($request->wantsJson()) {
            return $this->respondWithSuccess($commerce, 'Commerce created successfully!', 201);
        }

        return redirect()->route('commerces.index')->with('success', 'Commerce created successfully!');
    }

    /**
     * Muestra un comercio específico.
     * API: GET /api/commerces/{id}
     * Web: GET /commerces/{id}
     */
    public function show(Request $request, $id)
    {
        try {
            $commerce = Commerce::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            if ($request->wantsJson()) {
                return $this->respondWithError('Commerce not found', 404);
            }

            abort(404);
        }

        if ($request->wantsJson()) {
            return $this->respondWithSuccess($commerce);
        }

        return view('commerces.show', compact('commerce'));
    }

    /**
     * Actualiza un comercio.
     * API: PUT /api/commerces/{id}
     * Web: PUT /commerces/{id}
     */
    public function update(Request $request, $id)
    {
        try {
            $commerce = Commerce::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return $this->respondWithError('Commerce not found', 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'image_url' => 'nullable|url',
            'video_url' => 'nullable|url',
            'google_maps' => 'nullable|url',
            'category' => 'nullable|string',
            'contact_number' => 'nullable|string',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'categories' => 'nullable|array|exists:categories,id', // Validación de categorías
        ]);

        $commerce->update($validatedData);

        // Si hay categorías, actualizar las relaciones
        if ($request->has('categories')) {
            $commerce->categories()->sync($request->categories);
        }

        return $this->respondWithSuccess($commerce, 'Commerce updated successfully!');
    }

    /**
     * Elimina un comercio.
     * API: DELETE /api/commerces/{id}
     * Web: DELETE /commerces/{id}
     */
    public function destroy(Request $request, $id)
    {
        try {
            $commerce = Commerce::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return $this->respondWithError('Commerce not found', 404);
        }

        $commerce->delete();

        if ($request->wantsJson()) {
            return $this->respondWithSuccess(null, 'Commerce deleted successfully!');
        }

        return redirect()->route('commerces.index')->with('success', 'Commerce deleted successfully!');
    }

    /**
     * Responde con éxito.
     *
     * @param mixed $data
     * @param string $message
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    private function respondWithSuccess($data = null, $message = 'Operation successful', $status = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    /**
     * Responde con error.
     *
     * @param string $message
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    private function respondWithError($message, $status = 400)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $status);
    }
}
