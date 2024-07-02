<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::prefix('admin/product_category')
    ->name('admin.product_category.')
    ->controller(ProductCategoryController::class)
    ->middleware('check.user.admin')->group(function () {
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('index', 'index')->name('index');
        Route::post('slug', 'makeSlug')->name('slug');
        Route::post('destroy/{productCategory}', 'destroy')->name('destroy');
        Route::post('restore/{id}',  'restore')->name('restore');
        Route::get('detail/{productCategory}', 'detail')->name('detail');
        Route::post('update/{productCategory}', 'update')->name('update');
    });
Route::name('admin')->resource('admin/product', ProductController::class)->middleware('check.user.admin');
Route::get('admin/dashboard', [DashboardController::class, 'index'])->middleware('check.user.admin')->name('admin.dashboard');
