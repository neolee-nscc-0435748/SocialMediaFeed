<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\PostController;
use \App\Http\Controllers\ThemeChangeController;

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
    return redirect()->route('post.index');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/theme', [ThemeChangeController::class, 'change']);
Route::get('/post', [PostController::class, 'index'])->name('post.index');

Route::group(
    [
        'prefix' => 'admin',
        'middleware' => ["role:Admin", "role:User Administrator"]
    ],
    function() {
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
    }
);

Route::group(
    [
        'prefix' => 'admin',
        'middleware' => ["role:Theme Manager"]
    ],
    function() {
        Route::resource('themes', ThemeController::class);
    }
);

Route::group(
    [
        'prefix' => 'posts',
    ],
    function() {
        Route::resource('posts', PostController::class);
    }
);

