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

Route::get('/', 'BookController@index');

Route::get('authors', 'AuthorController@index');
Route::get('authors/create', 'AuthorController@create');
Route::get('authors/edit/{id}', 'AuthorController@edit');
Route::get('authors/destroy/{id}', 'AuthorController@destroy');

Route::get('dictionars', 'DictionarController@index');
Route::get('dictionars/create', 'DictionarController@create');
Route::get('dictionars/edit/{id}', 'DictionarController@edit');
Route::get('dictionars/destroy/{id}', 'DictionarController@destroy');

Route::get('books', 'BookController@index');
Route::get('books/create', 'BookController@create');
Route::get('books/edit/{id}', 'BookController@edit');
Route::get('books/destroy/{id}', 'BookController@destroy');

