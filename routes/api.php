<?php

use Illuminate\Http\Request;

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

// Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
//     Route::resource('companies', 'CompaniesController', ['except' => ['create', 'edit']]);
// });

Route::group(['middleware'=>'api'],function(){
     Route::get('contact', 'ContactController@index');
     Route::post('contact/store', 'ContactController@store');
     Route::patch('contact/{id}', 'ContactController@update');
     Route::delete('contact/{id}', 'ContactController@destroy');
    // Route::resource('contact', 'ContactController');
});




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
