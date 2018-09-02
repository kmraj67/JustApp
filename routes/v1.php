<?php

/*
|--------------------------------------------------------------------------
| Apis V1 Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Apis V1 routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "v1" middleware group. Now create something great!
|
*/

Route::resource('users', 'Api\V1\UsersController');