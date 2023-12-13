<?php

use App\Http\Controllers\Admin\Post\IndexController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\NewsController;
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

Route::get('/', [NewsController::class, 'index'])->name('home');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', [LoginController::class, 'index'])->name('admin.login');
    Route::post('/submitForm', [LoginController::class, 'submitForm'])->name('submitForm');

    Route::group(['middleware' => 'auth', 'namespace' => 'Post'], function () {
        Route::get('/post', [IndexController::class, 'index'])->name('admin.post.index');
        Route::get('/form', [IndexController::class, 'form'])->name('admin.post.form');
        Route::post('/create', [IndexController::class, 'createPost'])->name('admin.post.create');
        Route::put('/edit', [IndexController::class, 'updateThePost'])->name('admin.post.update');
        Route::get('/post/{id}', [IndexController::class, 'goToID'])->name('admin.post.edit');
    });
});
