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

Route::get('/hello/{name}', function (string $name) {
    return "Hello, " . $name;
});

Route::get('/welcome/{name}', function (string $name) {
    return "Welcome to the laravel " . $name;
});

Route::get('/news/{name}', function(string $name) {
    return "Any news for you " . $name;
});

Route::get('/about/', function() {
    return "This page is about laravel project Many News";
});

