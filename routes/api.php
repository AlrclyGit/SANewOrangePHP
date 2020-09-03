<?php

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

Route::get('banner/{id}', 'BannerController@getBanner');

Route::get('theme', 'ThemeController@getSimpleList');
Route::get('theme/{id}', 'ThemeController@getComplexOne');

Route::get('product/recent','ProductController@getRecent');
Route::get('product/by_category','ProductController@getAllInCategory');
Route::get('product/{id}','ProductController@getOne');

Route::get('category/all', 'CategoryController@getAllCategories');

Route::post('token/user', 'TokenController@getToken');

