<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
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

Route::get('/products',[ProductsController::class,'index']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::delete('/eliminar/{id}',[ProductsController::class,'destroy'])->name('eliminar');
Route::get('/trash',[ProductsController::class,'trash']);
Route::post('/restore',[ProductsController::class,'restore']);
Route::get('/create',[ProductsController::class,'create']);
Route::post('/store',[ProductsController::class,'store'])->name('store');
Route::get('/edit/{id}',[ProductsController::class,'edit'])->name('edit');
Route::post('/update/{id}',[ProductsController::class,'update'])->name('update');

