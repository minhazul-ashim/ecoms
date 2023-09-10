<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/dashboard', 'index');
        });
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::prefix('category')->group(function () {
            Route::get('allCategory', 'index')->name('allCategory');
            Route::get('addCategory', 'add')->name('addCategory');
        });
    });

    Route::controller(SubCategoryController::class)->group(function () {
        Route::prefix('subCategory')->group(function () {
            Route::get('allSubCategory', 'index')->name('allSubCategory');
            Route::get('addSubCategory', 'add')->name('addSubCategory');
        });
    });

    Route::controller(ProductController::class)->group(function () {
        Route::prefix('product')->group(function () {
            Route::get('allProducts', 'index')->name('allProducts');
            Route::get('addProducts', 'add')->name('addProducts');
        });
    });

    Route::controller(OrderController::class)->group(function () {
        Route::prefix('order')->group(function () {
            Route::get('allOrders', 'index')->name('allOrders');
            Route::get('addOrders', 'add')->name('addOrders');
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
