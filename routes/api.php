<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/posts', 'Api\PostController@index')->name('api.posts.index');
Route::get('/posts/{slug}', 'Api\PostController@show')->name('api.posts.show');
Route::get('/tags/{slug}', 'Api\TagController@show')->name('api.tags.show');
Route::get('/tags', 'Api\TagController@index')->name('api.tags.index');
Route::post('/leads', 'Api\LeadController@store')->name('api.leads.store');