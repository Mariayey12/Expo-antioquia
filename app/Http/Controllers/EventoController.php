<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        return Evento::all();
    }

    public function show($id)
    {
        return Evento::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            // Otros campos necesarios
        ]);

        return Evento::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $evento = Evento::findOrFail($id);
        $evento->update($request->all());

        return $evento;
    }

    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);
        $evento->delete();

        return response()->noContent();
    }
}
