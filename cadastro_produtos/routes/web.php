<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;
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
    //return view('welcome');
    return redirect()->route('inicial');
});

Route::get('/inicial', function () {
    return view('inicial');
})->name('inicial');

// Rotas de Products
Route::prefix('product')->middleware('auth')->group(function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/', 'index')->name('indexProduct');
        Route::get('/create',  'create')->name('createProduct');
        Route::get('/show/{id}',  'show')->name('showProduct');
        Route::get('/edit/{id}',  'edit')->name('editProduct');
        Route::post('/store',  'store')->name('storeProduct');
        Route::post('/update/{id}',  'update')->name('updateProduct');
        Route::delete('/{id}',  'destroy')->name('deleteProduct');
        Route::get('/destroy/{idProduto}/{idTag}',  'detachProduto')->name('destroyProduct');
    });
});


// Rotas de Tags
Route::prefix('tag')->middleware('auth')->group(function () {
    Route::controller(TagController::class)->group(function () {
        Route::get('/',  'index')->name('indexTag');
        Route::get('/create',  'create')->name('createTag');
        Route::get('/show/{id}',  'show')->name('showTag');
        Route::get('/edit/{id}',  'edit')->name('editTag');
        Route::post('/store',  'store')->name('storeTag');
        Route::post('/update/{id}',  'update')->name('updateTag');
        Route::delete('/{id}',  'destroy')->name('deleteTag');
        Route::get('/relatorio',  'relatorio')->name('relatorio');
        Route::get('/gera_pdf',  'geraPDF')->name('geraPDF');
        Route::get('/gera_sql',  'geraSQL')->name('geraSQL');
    });
});



Route::get('/dashboard', function () {
    $user = auth()->user();
    return view('dashboard', ['user' => $user]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
