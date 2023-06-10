<?php

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
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/libros', 'LibrosController@index')->name('libro.index');
    Route::get('/libros/mislibros', 'LibrosController@mislibros')->name('libro.mislibros');
    Route::get('/libro/{libro}', 'LibrosController@show')->name('libro.show');
    Route::post('/libro', 'LibrosController@store')->name('libro.store');
    Route::get('/libro/{libro}/edit', 'LibrosController@edit')->name('libro.edit');
    Route::patch('/libro/{libro}', 'LibrosController@update')->name('libro.update');
    Route::get('/libro/{libro}/update', 'LibrosController@updateEstado')->name('libro.updateEstado');
    Route::get('/libro/{libro}/{valor}/valorar', 'LibrosController@updateValoracion')->name('libro.updateValoracion');
    Route::get('/libro/{libro}/comprar', 'LibrosController@comprar')->name('libro.comprar');
    Route::patch('/libro/{libro}/prestar', 'LibrosController@prestar')->name('libro.prestar');
    Route::patch('/libro/{libro}/comentar', 'LibrosController@comentar')->name('libro.comentar');
    Route::delete('/libro/{libro}', 'LibrosController@destroy')->name('libro.destroy');
    Route::get('/libro', 'LibrosController@create')->name('libro.create');
    Route::get('/libros/buscador', 'LibrosController@buscador')->name('libro.buscador');

    Route::get('/usuarios', 'UsersController@index')->name('usuario.index');
    Route::post('/usuario', 'UsersController@store')->name('usuario.store');
    Route::get('/usuario/{usuario}/edit', 'UsersController@edit')->name('usuario.edit');
    Route::patch('/usuario/{usuario}', 'UsersController@update')->name('usuario.update');
    Route::delete('/usuario/{usuario}', 'UsersController@destroy')->name('usuario.destroy');
    Route::get('/usuario', 'UsersController@create')->name('usuario.create');
});

require __DIR__.'/auth.php';
