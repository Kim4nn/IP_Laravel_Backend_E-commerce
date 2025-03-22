<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Cart routes
Route::controller(CartController::class)->prefix('carts')->group(function () {
    Route::get('/', 'getCarts');
})

// Category routes
Route::controller(CategoryController::class)->prefix('categories')->group(function () {
    Route::get('/', 'getCategories');
    Route::post('/', 'createCategory');
    Route::get('/{categoryId}', 'getCategory');
    Route::patch('/{categoryId}', 'updateCategory');
    Route::delete('/{categoryId}', 'deleteCategory');
});

// Customer routes
Route::controller(CustomerController::class)->prefix('customers')->group(function () {
    Route::get('/', 'getCustomers');
});

// Order routes
Route::controller(OrderController::class)->prefix('orders')->group(function () {
    Route::get('/', 'getOrders');
});

// OrderProduct routes
Route::controller(OrderProductController::class)->prefix('order-products')->group(function () {
    Route::get('/', 'getOrderProducts');
});

// Payment routes
Route::controller(PaymentController::class)->prefix('payments')->group(function () {
    Route::get('/', 'getPayments');
});

// Product routes
Route::controller(ProductController::class)->prefix('products')->group(function () {
    Route::get('/', 'getProducts');
    Route::post('/', 'createProduct');
    Route::get('/{productId}', 'getProduct');
    Route::patch('/{productId}', 'updateProduct');
    Route::delete('/{productId}', 'deleteProduct');
});
Route::get('/categories/{categoryId}/products', [ProductController::class, 'getProductsByCategoryId']);

// Wishlist routes
Route::controller(WishlistController::class)->prefix('wishlists')->group(function () {
    Route::get('/', 'getWishlists');
});
