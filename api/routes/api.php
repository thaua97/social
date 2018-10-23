<?php

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
Route::post('/cadastro', 'UserController@register');

Route::post('/login', 'UserController@login');

Route::middleware('auth:api')->get('/user', 'UserController@user');

Route::middleware('auth:api')->put('/perfil', 'UserController@perfil');