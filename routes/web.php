<?php

use App\Category;
use App\Http\Controllers\Admin\CategoryController;
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

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function() {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('posts', 'PostController');

        Route::get('posts/{slug}', 'PostController@show')->name('posts.show');
        
        Route::get('categories', 'CategoryController@index')->name('categories.index');
        Route::get('categories/{slug}', 'CategoryController@show')->name('categories.show');

        Route::get('tags', 'CategoryController@index')->name('tags.index');
        Route::get('tags/{slug}', 'CategoryController@show')->name('tags.show');
    });

Route::get('{any?}', function() {
    return view('guest.home');
})->where('any', '.*');