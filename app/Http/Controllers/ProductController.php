<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function getProducts() : JsonResponse
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function store(ProductRequest $productRequest) : JsonResponse
    {
        $image = $productRequest->file('img');
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $filename); 
        $product = Product::create([
            ...$productRequest->validated(),
            'img' => $filename
        ]);

        return response()->json(['message' => 'success', 'product' => $product ]);
    }

    public function destroy($id) : JsonResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully'], 204);
    }
}
