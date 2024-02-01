<?php

namespace App\Http\Controllers;

use App\Models\RequestAprove;
use Illuminate\Http\Request;

class HomeController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
    }

  
    public function index()
    {
        $user  = RequestAprove::all();
        return view('admin.pages.main',compact('user'));
    }
    
}
