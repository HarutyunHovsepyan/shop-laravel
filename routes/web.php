<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(
    [
        'confirm' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]
);



Route::middleware(['auth'])->group(function () {
    // Main Routes


    // Cart Routes
    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'cart'])->name('cart');
        Route::post('/add/{id}', [CartController::class, 'cartAdd'])->name('cart-add');
        Route::post('/place', [CartController::class, 'cartConfirm'])->name('cart-confirm');
        Route::post('/minus/{id}', [CartController::class, 'cartMinus'])->name('cart-minus');
    });
    Route::get('/cart-place', [CartController::class, 'cartPlace'])->name('cart-place');

    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('/categories', [MainController::class, 'categories'])->name('categories');
    Route::get('/{category}', [MainController::class, 'category'])->name('category');
    // Route::get('/{category}/:id', [MainController::class, 'category'])->name('category');

    Route::get('/{category}/{product}', [MainController::class, 'product'])->name('product');
});

// For Admin

Route::middleware(['auth', 'admin'])->prefix('admin/dashboard')->group(function () {
    Route::get('/order', [AdminController::class, 'order'])->name('admin.dashboard');
    Route::post('/update-order-status/{id}', [AdminController::class, 'updateStatus'])->name('update-order-status');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}/change-role', [UserController::class, 'changeRole'])->name('user.changeRole');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});
