<?php

use Illuminate\Support\Facades\Route;

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

Route::get('login', 'AuthController@openLogin');
Route::get('register', 'AuthController@openRegister');

Route::post('request-login', 'AuthController@requestLogin');
Route::post('request-register', 'AuthController@requestRegister');

Route::get('principal', 'AuthController@principal');
Route::get('principal', 'PublicationController@index');

Route::get('comments/{id}', 'CommentController@index');

Route::get('newComment/{id_publication}/{id_user}', 'CommentController@openAddComment');
Route::get('newPublication', 'PublicationController@openAddPublication');

Route::post('request-newComment', 'CommentController@store');
Route::post('request-newPublication', 'PublicationController@store');

Route::get('logout', 'AuthController@logout');
