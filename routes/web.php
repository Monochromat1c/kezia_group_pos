<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;

use Illuminate\Support\Facades\Route;

// Login Routes
Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('/user/process/login', [UserController::class, 'processLogin']);


Route::get('/logout', function () {
    return view('logout.logout');
});

//-------USER ROUTES -------//
Route::get('/users', [UserController::class, 'list']);
Route::get('/users/show/{id}', [UserController::class, 'show']);
Route::get('/users/create', [UserController::class, 'create']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::get('/user/delete/{id}', [UserController::class, 'delete']);

Route::post('/user/store', [UserController::class, 'store']);
Route::put('/user/update/{user}', [UserController::class, 'update']);
Route::delete('/user/destroy/{user}', [UserController::class, 'destroy']);


//--------GENDERS ROUTESS
Route::get('/genders', [GenderController::class, 'list']); 
Route::get('/gender/create', [GenderController::class, 'create']);
Route::get('/gender/show/{id}', [GenderController::class, 'show']);
Route::get('/gender/edit/{id}', [GenderController::class, 'edit']);
Route::get('/gender/delete/{id}', [GenderController::class, 'delete']);


Route::post('/gender/store', [GenderController::class, 'store']);
Route::put('/gender/update/{gender}', [GenderController::class, 'update']);
Route::delete('/gender/destroy/{gender}', [GenderController::class, 'destroy']);



//-------ROLE ROUTES----------
Route::get('/roles', [RoleController::class, 'list']); 
Route::get('/role/create', [RoleController::class, 'create']);
Route::get('/role/show/{id}', [RoleController::class, 'show']);
Route::get('/role/edit/{id}', [RoleController::class, 'edit']);
Route::get('/role/delete/{id}', [RoleController::class, 'delete']);


Route::post('/role/store', [RoleController::class, 'store']);
Route::put('/role/update/{role}', [RoleController::class, 'update']);
Route::delete('/role/destroy/{role}', [RoleController::class, 'destroy']);


//-------PRODUCT ROUTES -------//
Route::get('/products', [ProductController::class, 'list']); 
Route::get('/products/create', [ProductController::class, 'create']);
Route::get('/product/show/{id}', [ProductController::class, 'show']);
Route::get('/product/edit/{id}', [ ProductController::class, 'edit']);
Route::get('/product/delete/{id}', [ProductController::class, 'delete']);

Route::post('/product/store', [ProductController::class, 'store']);
Route::put('/product/update/{product}', [ ProductController::class, 'update']);
Route::delete('/product/destroy/{product}', [ProductController::class, 'destroy']);

//-------SupplierS ROUTES -------//
Route::get('/suppliers', [SupplierController::class, 'list']); 
Route::get('/suppliers/create', [SupplierController::class, 'create']);
Route::get('/supplier/show/{id}', [SupplierController::class, 'show']);
Route::get('/supplier/edit/{id}', [ SupplierController::class, 'edit']);
Route::get('/supplier/delete/{id}', [SupplierController::class, 'delete']);

Route::post('/supplier/store', [SupplierController::class, 'store']);
Route::put('/supplier/update/{supplier}', [ SupplierController::class, 'update']);
Route::delete('/supplier/destroy/{supplier}', [SupplierController::class, 'destroy']);

Route::get('/home', [HomeController::class, 'home']);


Route::controller(UserController::class)-> group(function(){
    Route::get('/users', 'list');
    Route::get('/user/process/logout', 'processLogout');
    Route::get('/logout', 'logout');
});



// Route::get('/cart/order', function () {
//     return view('cart.add_order');
// });

Route::get('/cart/order', [CartController::class, 'showProduct']);
// Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
// Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/cart', [CartController::class, 'showProduct'])->name('cart');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/receipt', [CartController::class, 'receipt'])->name('receipt');
// Route::get('/checkout', function() {
// return view('checkout.checkout');
// })->name('checkout');


Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('order.place');



// Route::get('/home', function () {
//     return view('home');
// });



