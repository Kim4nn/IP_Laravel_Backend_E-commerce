<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    // ---Get /api/wishlists
    public function getWishlists() {
        $wishlists = Wishlist::all();
        return response()->json(['wishlists' => $wishlists]);
    }
}
