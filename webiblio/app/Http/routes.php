<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'AuthorController@index');
Route::get('authors', 'AuthorController@index');
Route::get('dictionars', 'DictionarController@index');
Route::get('books', 'BookController@index');
