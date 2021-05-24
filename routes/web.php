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

use App\Http\Controllers\CategoryNewsController;
use App\Http\Controllers\WorldCategoryController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;




Route::get('/welcome', [WelcomeController::class, 'index'])
    ->name('welcome');

Route::get('/category', [CategoryNewsController::class, 'index'])
    ->name('category');

Route::get('/category/world', [WorldCategoryController::class, 'index'])
    ->name('category/world');


//Route::get('/hello/{name}', function (string $name) {
//    return "Hello, " . $name;
//});
//
//Route::get('/welcome/{name}', function (string $name) {
//    return "Welcome to the laravel " . $name;
//});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});


Route::get('/news', [NewsController::class, 'index'])
    ->name('news');
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');

Route::get('/about/', function() {
    return "This page is about laravel project Many News";
});

