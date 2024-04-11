<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homepageController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\userController;
use App\Http\Controllers\productController;
use App\Http\Controllers\adminController;
Route::get('/home', [homepageController::class, 'index'])->name('home.index');
Route::get('/login', [homepageController::class, 'login'])->name('home.login');
Route::get('/reg',[homepageController::class, 'signup'])->name('home.signup');
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
// admin
Route::get('admin/{id}/productadd', [adminController::class, 'add'])->name('admin.addproduct');
Route::post('/admin/{id}/addproduct', [adminController::class, 'adddata'])->name('admin.productadd');
Route::get('/adming/{id}/showproduct', [adminController::class, 'show'])->name('admin.showproduct');
Route::get('/admin/{id}/{id1}/update', [adminController::class, 'update'])->name('admin.updated');
Route::post('/admin/{id}/update', [adminController::class, 'updatedata'])->name('admin.update');
Route::get('/admin/{id}/delete', [adminController::class, 'delete'])->name('admin.delete');
