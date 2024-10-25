<?php

namespace App\Http\Controllers;

use App\Models\RelaxationPlace;
use Illuminate\Http\Request;

class RelaxationPlaceController extends Controller
{
    public function index()
    {
        return RelaxationPlace::all();
    }

    public function store(Request $request)
    {
        $relaxationPlace = RelaxationPlace::create($request->all());
        return response()->json($relaxationPlace, 201);
    }

    public function show($id)
    {
        return RelaxationPlace::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $relaxationPlace = RelaxationPlace::findOrFail($id);
        $relaxationPlace->update($request->all());
        return response()->json($relaxationPlace, 200);
    }

    public function destroy($id)
    {
        RelaxationPlace::destroy($id);
        return response()->json(null, 204);
    }
}
