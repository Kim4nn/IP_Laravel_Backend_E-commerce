<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderProduct;

class OrderProductController extends Controller
{
    // ---Get /api/order-products
    public function getOrderProducts() {
        $orderProducts = OrderProduct::all();
        return response()->json(['orderProducts' => $orderProducts]);
    }
}
