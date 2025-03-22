<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    // ---Get /api/payments
    public function getPayments() {
        $payments = Payment::all();
        return response()->json(['payments' => $payments]);
    }
}
