<?php

use App\Http\Controllers\DetailPenjualanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Route resource untuk fitur utama
Route::resource('/detailpenjualans', \App\Http\Controllers\DetailPenjualanController::class);
Route::resource('/penjualans', \App\Http\Controllers\PenjualanController::class);
Route::resource('/produks', \App\Http\Controllers\ProdukController::class);
Route::resource('/pelanggans', \App\Http\Controllers\PelangganController::class);


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/', function () {
    return view('welcome');
})->name('home');
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
