<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ListProductController;
use App\Http\Controllers\GoogleController;
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
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('contact', function () {
    return view('client.pages.contact');
});

Route::get('/product', [ListProductController::class, 'index'])->name('products.index');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');


Route::prefix('cart')->controller(CartController::class)->name('cart.')->middleware('auth')->group(function () {
    Route::post('add-product', 'add')->name('add');
    Route::get('',  'index')->name('index');
    Route::delete('delete/{productId}', 'delete')->name('delete');
    Route::get('add-product-item-cart/{productId}/{qty?}',  'addProductItem')->name('add.product.item');
    Route::get('delete-item-cart/{productId}', 'deleteItem')->name('delete.item.cart');
    Route::get('destroy', 'destroy')->name('destroy');
    Route::get('checkout', 'checkout')->name('checkout');
});
Route::post('placeOrder', [CartController::class, 'placeOrder'])->name('checkout.placeOrder')->middleware('auth');

Route::get('/google/redirect', [GoogleController::class, 'redirect'])->name('google.redirect');

Route::get('/google/callback', [GoogleController::class, 'callback'])->name('google.callback');

Route::get('vnpay_callback', [CartController::class, 'vnpayCallback'])->name('vnpay_callback');

Route::get('/search/{keySearch}', [ProductController::class, 'search'])->name('product.search');
