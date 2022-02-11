<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicial', function () {
    return view('inicial');
});

// Rotas de Products
Route::get('/product', [ProductController::class, 'index'])->name('indexProduct');
Route::get('/product/create', [ProductController::class, 'create'])->name('createProduct');//->middleware('auth')
Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('showProduct');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('editProduct');
Route::post('/product/store', [ProductController::class, 'store'])->name('storeProduct');
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('updateProduct');
Route::delete('product/{id}', [ProductController::class, 'destroy'])->name('deleteProduct');
