<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::all();

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => $services
            ], 200);
        }

        return view('services.index', compact('services'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cost' => 'required|numeric',
            'duration' => 'nullable|string',
            'image_url' => 'nullable|url',
            'video_url' => 'nullable|url',
            'google_maps' => 'nullable|url',
            'provider_name' => 'nullable|string',
            'location' => 'nullable|string',
            'is_available' => 'boolean',
            'available_from' => 'nullable|date',
            'available_until' => 'nullable|date',
            'contact_info' => 'nullable|string',
            'status' => 'nullable|string',
            'reviews_count' => 'nullable|integer',
            'average_rating' => 'nullable|numeric',
        ]);

        $service = Service::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Service created successfully!',
            'data' => $service,
        ], 201);
    }

    public function show(Request $request, $id)
    {
        $service = Service::find($id);

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'Service not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $service,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $service = Service::find($id);

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'Service not found',
            ], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cost' => 'required|numeric',
            'duration' => 'nullable|string',
            'image_url' => 'nullable|url',
            'video_url' => 'nullable|url',
            'google_maps' => 'nullable|url',
            'provider_name' => 'nullable|string',
            'location' => 'nullable|string',
            'is_available' => 'boolean',
            'available_from' => 'nullable|date',
            'available_until' => 'nullable|date',
            'contact_info' => 'nullable|string',
            'status' => 'nullable|string',
            'reviews_count' => 'nullable|integer',
            'average_rating' => 'nullable|numeric',
        ]);

        $service->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Service updated successfully!',
            'data' => $service,
        ], 200);
    }

    public function destroy($id)
    {
        $service = Service::find($id);

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'Service not found',
            ], 404);
        }

        $service->delete();

        return response()->json([
            'success' => true,
            'message' => 'Service deleted successfully!',
        ], 200);
    }
}

