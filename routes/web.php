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
Route::get('/vue', function () {
    return view('welcome');
});

Route::get('/', 'PostController@index');
Route::get('/store', 'PostController@store');
Route::get('/{slug}', 'PostController@details');

Route::get('/tag/{category}', 'TagController@index');
Route::get('/category/{category}', 'TagController@category');
Route::get('/tags/all', 'TagController@tagsPage');
Route::get('/{category}', 'TagController@categoryPage');

Route::get('/contact/help-desk', 'PagesController@contact');
Route::post('/contact/help-desk', 'PagesController@postContact');