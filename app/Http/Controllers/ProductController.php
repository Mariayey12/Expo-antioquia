<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ReviewCalification;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Listar todos los productos.
     */
    public function index()
    {
        $products = Product::with('reviews')->get();
        return response()->json($products);
    }

    /**
     * Mostrar un producto específico con sus reseñas.
     */
    public function show($id)
    {
        $product = Product::with('reviews')->findOrFail($id);
        return response()->json($product);
    }

    /**
     * Crear una nueva reseña para un producto.
     */
    public function addReview(Request $request, $productId)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string',
        ]);

        $product = Product::findOrFail($productId);

        $review = new ReviewCalification([
            'user_id' => $validated['user_id'],
            'rating' => $validated['rating'],
            'review' => $validated['review'],
        ]);

        $product->reviews()->save($review);

        return response()->json(['message' => 'Review added successfully!', 'review' => $review]);
    }
}
