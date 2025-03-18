<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // ---Get /api/categories
    public function getCategories() {
        $categories = Category::all();
        return response()->json(['categories' => $categories]);
    }

    // ---Post /api/categories
    public function createCategory(Request $request) {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return response()->json($category);
    }

    // ---Get /api/categories/{categoryId}
    public function getCategory($categoryId) {
        $category = Category::find($categoryId);
        return response()->json($category);
    }

    // ---Patch /api/categories/{categoryId}
    public function updateCategory(Request $request, $categoryId) {
        $category = Category::find($categoryId);
        $category->name = $request->name;
        $category->save();
        return response()->json($category);
    }

    // ---Delete /api/categories/{categoryId}
    public function deleteCategory($categoryId) {
        $category = Category::find($categoryId);
        $category->delete();
        return response()->json(['message' => 'Category deleted']);
    }
}
