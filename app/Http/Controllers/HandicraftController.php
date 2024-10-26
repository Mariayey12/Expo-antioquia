<?php

namespace App\Http\Controllers;

use App\Models\Handicraft;
use Illuminate\Http\Request;

class HandicraftController extends Controller
{
    public function index()
    {
        return Handicraft::all();
    }

    public function show($id)
    {
        return Handicraft::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            // Otros campos necesarios
        ]);

        return Handicraft::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $handicraf = Handicraft::findOrFail($id);
        $handicraf->update($request->all());

        return $handicraft;
    }

    public function destroy($id)
    {
        $handicraf = Handicraft::findOrFail($id);
        $handicraf->delete();

        return response()->noContent();
    }
}
