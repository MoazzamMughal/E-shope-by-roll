<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Auth;
class CheckoutController extends Controller
{
  public function index(){
    $user = Auth::user();
    $cartItems = Cart::with('product')->where('user_id', $user->id)->get();
    return view('user.pages.checkout', compact('cartItems'));
    
  }
}
