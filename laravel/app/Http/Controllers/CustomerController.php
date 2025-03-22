<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    // ---Get /api/customers
    public function getCustomers() {
        $customers = Customer::all();
        return response()->json(['customers' => $customers]);
    }
}
