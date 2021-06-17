<?php

use Illuminate\Support\Facades\Auth;
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
use App\Http\Controllers\testController;
use App\Http\Controllers\CategoryNewsController;
use App\Http\Controllers\WorldCategoryController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;


Route::get('/test', [testController::class, 'index'])
    ->name('test');

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

//account
Route::group(['middleware' =>'auth'], function () {
    Route::group(['prefix' => 'account'], function() {
        Route::get('/',AccountController::class)->name('account');
        Route::get('/logout', function() {
            \Auth::logout();
            return redirect()->route('login');
        })->name('account.logout');
    });
    //admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/sources', AdminSourceController::class);
    Route::resource('/news', AdminNewsController::class);
    Route::resource('/customers/feedback', AdminFeedbackController::class);
    Route::resource('/customers/order', AdminOrderController::class);
});
});

Route::get('/news', [NewsController::class, 'index'])
    ->name('news');
Route::get('/news/{news}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');

Route::get('/about/', function() {
    return "This page is about laravel project Many News";
});

//Route::get('/collections', function() {
//    $collection = collect([
//        10, 15, 20, 25, 30, 50, 75, 100
//    ]);
//
//    dd($collection->map(function ($item) {
//        return $item * 2;
//    }));

    Route::get('/sessions', function() {
        session(['newssession' => 'example text']);
        if(session()->has('newssession')) {
            //dd(session()->get('newssession'));
            session()->remove('newssession');
            //dd(session()->all());
        }
        echo "Сессия не установлена";

    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
