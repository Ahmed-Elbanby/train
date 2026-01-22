<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\AdminProfileController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\AdminController;



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
        Route::post('/admin/profile/update', [AdminProfileController::class, 'update'])
            ->name('admin.profile.update');
        Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
        Route::post('/admins', [AdminController::class, 'store'])->name('admins.store');
        Route::get('/admins/{admin}/edit', [AdminController::class, 'edit'])->name('admins.edit');
        // Accept both POST and PUT so forms using method override work and AJAX POSTs also match
        Route::match(['post', 'put'], '/admins/{admin}', [AdminController::class, 'update'])->name('admins.update');
        Route::delete('/admins/{admin}', [AdminController::class, 'destroy'])->name('admins.destroy');
    });

    Route::post('/login', [AdminLoginController::class, 'login']);
    Route::post('/register', [AdminRegisterController::class, 'register']);
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');


});

require __DIR__ . '/auth.php';
