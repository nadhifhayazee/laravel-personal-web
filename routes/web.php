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
    // return redirect('/blog');
});

Route::get('/blog', 'BlogController@index');
Route::get('/blog/login-admin', 'BlogController@login');
Route::post('/blog/loginProses', 'BlogController@loginProses');
Route::get('/blog/search', 'BlogController@search');
Route::get('/blog/post/{id}', 'BlogController@showPost');
Route::get('/blog/category/{id}', 'BlogController@showPostCat');
Route::get('/admin', 'AdminController@home');

Route::get('/admin/create-post', 'AdminController@create');
Route::post('/admin', 'AdminController@upload');

Route::get('/admin/kategori', 'AdminController@kategori');
Route::post('/admin/kategori', 'AdminController@addKategori');
Route::get('/admin/kategori/editkat/{id}', 'AdminController@editCat');
Route::put('/admin/kategori/{id}', 'AdminController@updateCat');

Route::delete('/admin/kategori/{id}', 'AdminController@destroyCat');

Route::get('/admin/profil', 'AdminController@profil');
Route::put('/admin/profil/{id}', 'AdminController@profilUpdate');

Route::get('/admin/edit/{id}', 'AdminController@edit');
Route::put('/admin/{id}', 'AdminController@update');



Route::delete('/admin/{id}', 'AdminController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
