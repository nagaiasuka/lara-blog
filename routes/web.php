<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/create', function () {
//     return view('posts.create');
// });

Route::get('/posts','PostController@index')->name('index');
Route::get('/posts/create','PostController@create')->name('create');
Route::post('/posts','PostController@store')->name('store');
Route::get('/posts/{id}','PostController@show')->name('show');
Route::get('/posts/{id}/edit','PostController@edit')->name('edit');
Route::put('/posts/{id}/','PostController@update')->name('update');