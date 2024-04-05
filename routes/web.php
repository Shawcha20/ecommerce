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
// admin
Route::get('admin/productadd', [adminController::class, 'add'])->name('admin.addproduct');
