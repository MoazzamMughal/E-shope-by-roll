<?php

namespace App\Http\Controllers;

use App\Models\Cart; // Change "app" to "App"
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

        return view('user.pages.cart', compact('cartItems'));
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

    public function updateCart(Request $request)
    {
        $user = Auth::user();
        $cartItemId = $request->input('cart_item_id');
        $quantity = $request->input('quantity');

        // Check if the cart item belongs to the logged-in user
        $cartItem = Cart::find($cartItemId);

        if ($cartItem && $cartItem->user_id == $user->id) {
            // Update the quantity
            $cartItem->quantity = $quantity;
            $cartItem->save();

            // Optionally, you can add a success message or perform other actions
            return redirect()->route('user.cart')->with('success', 'Cart updated successfully');
        }

        // If the cart item doesn't exist or doesn't belong to the user, handle accordingly
        return redirect()->route('user.cart')->with('error', 'Unable to update cart');
    }

    public function deleteItem($id)
    {
        // Find the cart item by its ID
        $cartItem = Cart::find($id);

        // Check if the cart item belongs to the logged-in user
        if ($cartItem && $cartItem->user_id == Auth::id()) {
            // Delete the cart item
            $cartItem->delete();
            // Optionally, you can add a success message or perform other actions
            return redirect()->route('user.cart')->with('success', 'Item removed from cart');
        }

        // If the cart item doesn't exist or doesn't belong to the user, handle accordingly
        return redirect()->route('user.cart')->with('error', 'Unable to remove item from cart');
    }




}
