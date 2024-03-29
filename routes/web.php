<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\Frontend\FrontendController;

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//-----------------------Frontend---------------------------------------------------
Route::get('/', [\App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/collections', [FrontendController::class, 'categories']);
Route::get('/collections/{category_slug}', [FrontendController::class, 'products']);
Route::get('/collections/{category_slug}/{product_slug}', [FrontendController::class, 'productView']);

//-----------------------Home------------------------------------------------------
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//-----------------------Admin-------------------------------------------------
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

//-----------------------Admin/Dashboard----------------------------------------------
    Route::get('dashboard', [DashboardController::class, 'index']);

//-----------------------Admin/Category----------------------------------------------
    Route::controller(CategoryController::class)->group(function () {
        Route::get('category', 'index');
        Route::get('category/create1', 'create');
        Route::post('category', 'store');
        Route::get('category/{category}', 'show');
        Route::get('category/{category}/edit', 'edit');
        Route::patch('category/{category}', 'update');
        Route::delete('category/{category}', 'destroy');
    });

//-----------------------Admin/Brand----------------------------------------------
//    Route::controller(BrandController::class)->group(function () {
//        Route::get('brand','index');
//        Route::post('brand','store');
//        Route::patch('brand/{brand}','update');
//        Route::delete('brand/{brand}','destroy');
//    });
    Route::get('/brand', \App\Http\Livewire\Admin\Brand\Index::class);

//-----------------------Admin/Product----------------------------------------------
    Route::controller(\App\Http\Controllers\ProductController::class)->group(function () {
        Route::get('products', 'index');
        Route::get('products/create2', 'create');
        Route::post('products', 'store');
        Route::get('products/{product}', 'show');
        Route::get('products/{product}/edit', 'edit');
        Route::patch('products/{product}', 'update');
        Route::delete('products/{product}', 'destroy');
        Route::get('products/{image}/delete', 'deleteImage');
        Route::post('product-color/{product_color_id}', 'productColorQuantity');
        Route::get('product-color/{product_color_id}/delete', 'deleteProductColor');
    });

//-----------------------Admin/Color----------------------------------------------
    Route::controller(\App\Http\Controllers\ColorController::class)->group(function () {
        Route::get('color', 'index');
        Route::get('color/create', 'create');
        Route::post('color', 'store');
        Route::get('color/{color}', 'show');
        Route::get('color/{color}/edit', 'edit');
        Route::patch('color/{color}', 'update');
        Route::delete('color/{color}', 'destroy');
    });

//-----------------------Admin/Slider----------------------------------------------
    Route::controller(\App\Http\Controllers\SliderController::class)->group(function () {
        Route::get('sliders', 'index');
        Route::get('sliders/create3', 'create');
        Route::post('sliders', 'store');
        Route::get('sliders/{slider}', 'show');
        Route::get('sliders/{slider}/edit', 'edit');
        Route::patch('sliders/{slider}', 'update');
        Route::delete('sliders/{slider}', 'destroy');
    });
});

