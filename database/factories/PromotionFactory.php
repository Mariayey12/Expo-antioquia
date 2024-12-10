<?php

// database/factories/PromotionFactory.php

// App\Http\Controllers\EventController.php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return Event::all();
    }

    public function show($id)
    {
        return Event::findOrFail($id);
    }
}
