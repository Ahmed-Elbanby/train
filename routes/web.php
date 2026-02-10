<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\AdminProfileController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\TaskController;



Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [
        'localeSessionRedirect',
        'localizationRedirect',
        'localeViewPath'
    ]
], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');

    Route::middleware('auth:admin')->group(function () {
        Route::view('/dashboard', 'dashboard.index')->name('dashboard.index');
        Route::view('/profile', 'dashboard.profile')->name('dashboard.profile');
        Route::post('/admin/profile/update', [AdminProfileController::class, 'update'])->name('admin.profile.update');

        // Products Management
        Route::get('/admins/products', [ProductController::class, 'index'])->name('admins.products.index');
        Route::get('/admins/products/data', [ProductController::class, 'data'])->name('admins.products.data');
        Route::post('/admins/products', [ProductController::class, 'store'])->name('admins.products.store');
        Route::get('/admins/products/{product}', [ProductController::class, 'show'])->name('admins.products.show');
        Route::match(['post', 'put'], '/admins/products/{product}', [ProductController::class, 'update'])->name('admins.products.update');
        Route::delete('/admins/products/{product}', [ProductController::class, 'destroy'])->name('admins.products.destroy');
        // Get Sub-Categories for a Category
        Route::get('/categories/{category}/subcategories', function (App\Models\Category $category) {
            return response()->json($category->children()->with('translations')->get());
        })->name('categories.subcategories');

        // Admins Management
        Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
        Route::post('/admins', [AdminController::class, 'store'])->name('admins.store');
        Route::get('/admins/{admin}/edit', [AdminController::class, 'edit'])->name('admins.edit');
        Route::match(['post', 'put'], '/admins/{admin}', [AdminController::class, 'update'])->name('admins.update');
        Route::delete('/admins/{admin}', [AdminController::class, 'destroy'])->name('admins.destroy');
        
        // Categories Management
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::match(['get', 'post'], '/categories/data', [CategoryController::class, 'data'])->name('categories.data');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::match(['post', 'put'], '/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        
        // Modals
        Route::get('/products/create-modal', [ProductController::class, 'createModal'])->name('products.create-modal');
        Route::get('/products/{id}/edit-modal', [ProductController::class, 'editModal'])->name('products.edit-modal');
        Route::get('/categories/create-modal', [CategoryController::class, 'createModal'])->name('categories.create-modal');
        Route::get('/categories/{id}/edit-modal', [CategoryController::class, 'editModal'])->name('categories.edit-modal');

        // Task
        Route::get('/task', [TaskController::class, 'index'])->name('task.index');
    });

    Route::post('/login', [AdminLoginController::class, 'login']);
    Route::post('/register', [AdminRegisterController::class, 'register']);
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');


});

require __DIR__ . '/auth.php';
