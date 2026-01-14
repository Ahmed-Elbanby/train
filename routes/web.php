<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\AdminProfileController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth:admin')->group(function () {
    Route::view('/dashboard', 'dashboard.index')->name('dashboard.index');
    Route::view('/profile', 'dashboard.profile')->name('dashboard.profile');
    Route::post('/admin/profile/update', [AdminProfileController::class, 'update'])
        ->name('admin.profile.update');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::post('/login', [AdminLoginController::class, 'login']);
Route::post('/register', [AdminRegisterController::class, 'register']);
Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

// Route::middleware('auth')->group(function () {
//     Route::post('/login', [AdminLoginController::class, 'login'])->name('login');
//     Route::post('/register', [AdminRegisterController::class, 'register'])->name('register');
//     Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');
// });

require __DIR__.'/auth.php';
