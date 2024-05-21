<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homepageController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\userController;
use App\Http\Controllers\productController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\StripePaymentController;
Route::controller(StripePaymentController::class)->group(function()
{
    Route::get('stripe','stripe')->name('stripe');
    Route::post('stripe','stripePost')->name('stripe.post');
});

// Route::get('/login', [homepageController::class, 'login'])->name('home.login');
// Route::get('/reg',[homepageController::class, 'signup'])->name('home.signup');
Route::get('/login', [homepageController::class, 'login'])->name('home.login');
Route::get('/reg', [homepageController::class, 'signup'])->name('home.signup');
Route::get('/{user_id?}', [homepageController::class, 'index'])->name('home.index');

// login user
Route::post('/login', [loginController::class, 'login'])->name('login.index');
Route::post('/signup', [loginController::class, 'signup'])->name('login.signup');
Route::get('/logout',[loginController::class,'logout'])->name('login.logout');
Route::get('/login/forget', [loginController::class, 'showforget'])->name('login.forget');
Route::post('/login/forget', [loginController::class, 'forget'])->name('login.forget');
Route::post('/login/{id}/forgetdone', [loginController::class, 'forgetdone'])->name('login.forgetdone');
// user
// Route::get('/userlogout', [UserController::class, 'logout'])->name('user.logout');
// Route::view('/registration', 'registration');
//product
Route::get('product/{id}/cart', [productController::class, 'buycart'])->name('product.buycart');
Route::get('product/login',[productController::class,'buycarterror'])->name('product.error');
Route::get('product/{id}/{user?}', [productController::class, 'showproduct'])->name('product.show');
Route::get('productaddcart/{id}/{user_id}', [ProductController::class, 'addcart'])->name('home.addcart');
Route::get('productdeletecart/{id}/{user_id}',[ProductController::class,'delete'])->name('cart.delete');
Route::post('/buy/cart/{user}', [ProductController::class, 'buy'])->name('buy.cart');
Route::get('/buy/cart/{id}/{user}',[ProductController::class,'buySingle'])->name('buySingle.cart');
Route::get('/buy/order/{user}',[ProductController::class,'show_order'])->name('showOrder.buy');
Route::get('/cancle/order/{id}/{user_id}', [ProductController::class, 'cancle_order'])->name('cancle.buy');
Route::post('/search/product/{user_id?}',[ProductController::class,'search_product'])->name('search.product');
Route::get('/home/products/{user_id?}',[ProductController::class,'products'])->name('product.home');
// admin
Route::get('admin/{id}/productadd', [adminController::class, 'add'])->name('admin.addproduct');
Route::post('/admin/{id}/addproduct', [adminController::class, 'adddata'])->name('admin.productadd');
Route::get('/adming/{id}/showproduct', [adminController::class, 'show'])->name('admin.showproduct');
Route::get('/admin/{id}/{id1}/update', [adminController::class, 'update'])->name('admin.updated');
Route::post('/admin/{id}/update', [adminController::class, 'updatedata'])->name('admin.update');
Route::get('/admin/{id}/delete', [adminController::class, 'delete'])->name('admin.delete');
Route::get('/admin/{id}/order',[adminController::class,'order'])->name('product.order');
//homepage
Route::get('home/cart/{id?}', [homepageController::class, 'cartshow'])->name('home.cart');

//payment
