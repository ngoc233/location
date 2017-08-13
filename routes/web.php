<?php
use Illuminate\Auth\Middleware\Authenticate;
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

// Admin

Route::group(['prefix'=>'admin','middleware'=>'auth'],function()
{
	Route::resource('cate','CateController');
	Route::resource('place','PlaceController');
	Route::resource('user','UserController');
});
Auth::routes();

// User
Route::get('/', 'PageController@index');
Route::get('cate/{id}','PageController@content');
Route::get('cateAjax','PageController@ajax');

