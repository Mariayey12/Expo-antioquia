<?php

namespace App\Http\Controllers;

use App\Models\Handicraf;
use Illuminate\Http\Request;

class HandicrafController extends Controller
{
    public function index()
    {
        return Handicraf::all();
    }

    public function show($id)
    {
        return Handicraf::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            // Otros campos necesarios
        ]);

        return Handicraf::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $handicraf = Handicraf::findOrFail($id);
        $handicraf->update($request->all());

        return $handicraf;
    }

    public function destroy($id)
    {
        $handicraf = Handicraf::findOrFail($id);
        $handicraf->delete();

        return response()->noContent();
    }
}
