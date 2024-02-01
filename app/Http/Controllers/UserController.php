<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class UserController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('user.pages.main', compact('products' ,'categories' ));
    }
}
