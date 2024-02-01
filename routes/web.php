<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RequestAproveController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OderController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Auth;


Auth::routes();
Route::post('login', [LoginController::class, 'Login'])->name('log');
////////////////////////////ADMIN VANDOR & USER ACCESS ROUTE///////////////////////////////////////

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('request-aproved/{id}', [App\Http\Controllers\RequestAproveController::class, 'view'])->name('view');

Route::get('sent-request/{id}', [RequestAproveController::class, 'view']);
Route::get('/approve-request/{id}', [RequestAproveController::class, 'approve'])->name('approve.request');
Route::post('/cancel-request/{id}', [RequestAproveController::class, 'cancelRequest'])->name('cancel.request');


///////////////////////////////////Admin Products ROUTES///////////////////////////////////////
Route::get('product', [ProductController::class, 'index'])->name('products.index');
Route::get('/add-product', [ProductController::class, 'create'])->name('add.product');
Route::post('/store-product', [ProductController::class, 'store'])->name('store.product');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
Route::get('/products/{id}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');

////////////////////////////////////////////Admin Oders/////////////////////////////////////////
Route::get('oder', [OderController::class, 'index'])->name('oder.index');






///////////////////////////////////Admin Categories ROUTES//////////////////////////////////////

Route::get('category', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/add-category', [CategoryController::class, 'create'])->name('add.category');
Route::post('/store-category', [CategoryController::class, 'store'])->name('store.category');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
Route::get('/categories/{id}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');



/////////////////////////////////////User Routes////////////////////////////////////////////////
                          /////////////User Index page/////////////////
Route::get('index', [UserController::class, 'index'])->name('user.index');



//////////////////////////////////User View Pages//////////////////////////////////////////////
Route::view('contactus', 'user.pages.contactus')->name('user.contactus');



////////////////////////////////////ADD tO CART///////////////////////////////////////////
Route::get('cart', [CartController::class, 'index'])->name('user.cart');
Route::post('cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('cart/delete/{id}', [CartController::class, 'deleteItem'])->name('cart.delete');
Route::post('cart/update', [CartController::class, 'updateCart'])->name('cart.update');

////////////////////////////////////Checkout //////////////////////////////////////////////////
Route::get('checkout', [CheckoutController::class, 'index'])->name('user.chackout');

/////////////////////////////////////////////////////////////////////////////////////////

// Route::post('/place-oder'. [OderController::class, 'placeOder'])->name('place.oder');



Route::view('P_details', 'user.pages.product_details')->name('user.P_detail');

// Route::get('/add-user', [App\Http\Controllers\UserController::class, 'create'])->name('add.user');
// Route::post('/store-user', [App\Http\Controllers\UserController::class,'store'])->name('store.user');
// Route::get('/users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
// Route::put('/users/{id}/update', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');