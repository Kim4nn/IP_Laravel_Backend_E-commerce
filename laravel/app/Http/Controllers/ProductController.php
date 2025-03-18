<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // ---Get /api/products
    public function getProducts() {
        $product = Product::all();
        return response()->json(['products' => $product]);
    }

    // ---Post /api/products
    public function createProduct(Request $request) {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->pricing = $request->pricing;
        $product->category_id = $validated['category_id'];
        $product->description = $request->description;
        $product->images = $request->images;
        $product->save();
        return response()->json($product);
    }

    // ---Get /api/products/{productId}
    public function getProduct($productId) {
        $product = Product::find($productId);
        return response()->json($product);
    }

    // ---Patch /api/products/{productId}
    public function updateProduct(Request $request, $productId) {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
        ]);
        $product = Product::find($productId);
        $product->name = $request->name;
        $product->pricing = $request->pricing;
        $product->category_id = $validated['category_id'];
        $product->description = $request->description;
        $product->images = $request->images;
        $product->save();
        return response()->json($product);
    }

    // ---Delete /api/products/{productId}
    public function deleteProduct($productId) {
        $product = Product::find($productId);
        $product->delete();
        return response()->json(['message' => 'Product deleted']);
    }

    // ---Get /api/categories/{categoryId}/products
    public function getProductsByCategoryId($categoryId) {
        $products = Product::where('category_id', $categoryId)->get();
        return response()->json(['products' => $products]);
    }
}
