<?php
// app/Http/Controllers/PlaceController.php
namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    // Mostrar los servicios de un lugar
    public function showServices($id)
    {
        $place = Place::findOrFail($id);
        return response()->json($place->services); // Devuelve los servicios asociados a ese lugar
    }
}
