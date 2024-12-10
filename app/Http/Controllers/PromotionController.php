<?php

// App\Http\Controllers\PromotionController.php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        return Promotion::all();
    }

    public function show($id)
    {
        return Promotion::findOrFail($id);
    }
}
