<?php

use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('header', function () {
    return view('client.blocks.header');
});
Route::get('about', function () {
    return view('client.pages.about');
});
Route::get('index', function () {
    return view('client.layout.master');
});
Route::get('home', function () {
    return view('client.pages.home');
});
Route::get('contact', function () {
    return view('client.pages.contact');
});
Route::get('blog', function () {
    return view('client.pages.blog');
});
// Route::get('home', [HomeController::class, 'index'])->name('home');
Route::post('cart/add-product', [CartController::class, 'add'])->name('cart.add.product');
Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::get('cart/delete-cart', [CartController::class, 'destroy'])->name('cart.destroy');
