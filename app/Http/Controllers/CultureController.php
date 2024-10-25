<?php

namespace App\Http\Controllers;

use App\Models\Culture;
use Illuminate\Http\Request;

class CultureController extends Controller
{
    public function index()
    {
        return Culture::all();
    }

    public function show($id)
    {
        return Culture::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            // Otros campos necesarios
        ]);

        return Culture::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $cultura = Culture::findOrFail($id);
        $cultura->update($request->all());

        return $cultura;
    }

    public function destroy($id)
    {
        $cultura = Culture::findOrFail($id);
        $cultura->delete();

        return response()->noContent();
    }
}
