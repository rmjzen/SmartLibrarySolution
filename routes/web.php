<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware('guest')->group(function () {
Route::get('/login', [LoginController::class, 'viewlogin'])->name('login');
Route::get('/register', [RegisterController::class, 'view'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');
Route::post('/login', [LoginController::class, 'login'])->name('login.store');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth')->name('dashboard');
// });

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login')->with('success', 'You have been logged out.');
})->name('logout');


Route::get('/barcode', function () {
    return view('barcodegenerator');
})->middleware('auth')->name('barcode');
