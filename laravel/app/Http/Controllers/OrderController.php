<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // ---Get /api/orders
    public function getOrders() {
        $orders = Order::all();
        return response()->json(['orders' => $orders]);
    }
}
