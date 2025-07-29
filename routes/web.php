<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return Auth::check()
        ? redirect('/dashboard')  // change this to your actual dashboard route
        : redirect('/login');
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

Route::get('/barcoderesult', [BorrowerController::class, 'barcodeResult'])->middleware('auth')->name('barcode.result');


Route::get('/barcode', function () {
    return view('barcodegenerator');
})->middleware('auth')->name('barcode');

Route::post('/barcode/generate', function (Request $request) {

    return $request->all();
    // Logic to generate barcode
    return response()->json(['message' => 'Barcode generated successfully']);
})->middleware('auth')->name('barcode.generate');


Route::post('/generate-barcode', [BorrowerController::class, 'store'])->name('barcode.generate');
