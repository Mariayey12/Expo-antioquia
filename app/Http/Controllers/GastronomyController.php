<?php

namespace App\Http\Controllers;

use App\Models\Gastronomy;
use Illuminate\Http\Request;

class GastronomyController extends Controller
{
    public function index()
    {
        return Gastronomy::all();
    }

    public function store(Request $request)
    {
        $gastronomy = Gastronomy::create($request->all());
        return response()->json($gastronomy, 201);
    }

    public function show($id)
    {
        return Gastronomy::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $gastronomy = Gastronomy::findOrFail($id);
        $gastronomy->update($request->all());
        return response()->json($gastronomy, 200);
    }

    public function destroy($id)
    {
        Gastronomy::destroy($id);
        return response()->json(null, 204);
    }
}
