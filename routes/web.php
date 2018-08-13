<?php

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

Route::get('/blog', 'BlogController@index');

Route::get('/blog/search', 'BlogController@search');

Route::get('/admin', 'AdminController@home');
Route::get('/admin/create-post', 'AdminController@create');
Route::post('/admin', 'AdminController@upload');

Route::get('/admin/edit/{id}', 'AdminController@edit');

Route::delete('/admin/{id}', 'AdminController@destroy');
