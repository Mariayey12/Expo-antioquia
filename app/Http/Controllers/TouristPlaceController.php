<?php

namespace App\Http\Controllers;

use App\Models\TouristPlace;
use Illuminate\Http\Request;

class TouristPlaceController extends Controller
{
    public function index()
    {
        return TouristPlace::all();
    }

    public function store(Request $request)
    {
        $touristPlace = TouristPlace::create($request->all());
        return response()->json($touristPlace, 201);
    }

    public function show($id)
    {
        return TouristPlace::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $touristPlace = TouristPlace::findOrFail($id);
        $touristPlace->update($request->all());
        return response()->json($touristPlace, 200);
    }

    public function destroy($id)
    {
        TouristPlace::destroy($id);
        return response()->json(null, 204);
    }
}

