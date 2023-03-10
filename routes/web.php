<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::controller(CategoryController::class)->group(function () {
        Route::get('category', 'index');
        Route::get('category/create', 'create');
        Route::post('category', 'store');
        Route::get('category/{category}', 'show');
        Route::get('category/{category}/edit', 'edit');
        Route::patch('category/{category}', 'update');
        Route::delete('category/{category}', 'destroy');
    });
//    Route::controller(BrandController::class)->group(function () {
//        Route::get('brand','index');
//        Route::post('brand','store');
//        Route::patch('brand/{brand}','update');
//        Route::delete('brand/{brand}','destroy');
//    });
    Route::get('/brand', \App\Http\Livewire\Admin\Brand\Index::class);
    Route::controller(\App\Http\Controllers\ProductController::class)->group(function () {
        Route::get('products', 'index');
        Route::get('products/create2', 'create');
        Route::post('products', 'store');
        Route::get('products/{product}','show');
        Route::get('products/{product}/edit','edit');
        Route::patch('products/{product}','update');
        Route::delete('products/{product}','destroy');
    });
});

