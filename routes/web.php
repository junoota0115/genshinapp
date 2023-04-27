<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Top
Route::get('/index', [App\Http\Controllers\CharactersController::class, 'index'])->name('index');

//登録ページ
Route::get('/create', [App\Http\Controllers\CharactersController::class, 'create'])->name('create');
//登録
Route::post('/upload', [App\Http\Controllers\CharactersController::class, 'upload'])->name('upload');
//詳細ページ
Route::get('/detail/{id}', [App\Http\Controllers\CharactersController::class, 'detail'])->name('detail');
//削除
Route::get('/delete/{id}', [App\Http\Controllers\CharactersController::class, 'delete'])->name('delete');

Route::get('/edit/{id}', [App\Http\Controllers\CharactersController::class, 'edit'])->name('edit');
Route::post('/update', [App\Http\Controllers\CharactersController::class, 'update'])->name('update');


