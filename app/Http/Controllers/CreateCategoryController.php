<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CreateCategoryController extends Controller
{

    public function getCategory() : JsonResponse
    {
        $category = Category::all();
        return response()->json($category);
    }

    public function store(CategoryRequest $categoryRequest) : JsonResponse
    {
        $category = Category::create($categoryRequest->validated());
        return response()->json(['message' => 'success', 'category' => $category]);
    }
}
