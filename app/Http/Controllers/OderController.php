<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oder;
use App\Models\OderItem;
use App\Models\Cart;
use Auth;


class OderController extends Controller
{
    public function index()
    {
        return view('admin.pages.alll-oders');
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = 1; // You can modify this based on your needs

        // Check if the product is already in the cart for the current user
        $existingCart = Cart::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if ($existingCart) {
            // If the product is already in the cart, update the quantity
            $existingCart->increment('quantity', $quantity);
        } else {
            // If the product is not in the cart, add it to the cart
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        // Redirect back to the cart page or wherever you want to go
        return redirect()->back()->with('success', 'Product added to cart');
    }

    
    

}
