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
Route::group(['middleware' => ['isadmin']], function () {
    //author
Route::get('authors/create','AuthorController@create');
Route::post('authors/store','AuthorController@store');
//book
Route::get('books/create','BookController@create');
Route::post('books/store','BookController@store');
Route::get('books/edit/{book}','BookController@edit');
Route::post('books/update/{book}','BookController@update');
Route::get('books/delete/{book}','BookController@delete');
});


//register
Route::get('users/register','UserController@registerform');
Route::post('users/handleregister','UserController@handleregister');
//login
Route::get('users/login','UserController@loginform');
Route::post('users/handlelogin','UserController@handlelogin');
//home
Route::get('users/home','UserController@home');
//contact us
Route::post('messages/store','MessageController@store');
//logout
Route::get('users/logout','UserController@logout');
