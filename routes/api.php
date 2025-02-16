<?php

use Illuminate\Http\Request;
Use App\Users;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::get('users', 'UserController@index');
Route::get('users/{user}', 'UserController@show');
Route::get('auth/', 'UserController@authorization');
Route::post('users/image', 'UserController@update_avatar');
Route::post('users', 'UserController@store');
Route::delete('users/{user}', 'UserController@delete');
Route::post('register', 'Auth\RegisterController@register');