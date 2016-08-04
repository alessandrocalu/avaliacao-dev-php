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
Route::get('authors/delete/{id}', 'AuthorController@delete');
Route::get('authors/destroy/{id}', 'AuthorController@destroy');

Route::post('authors/store', 'AuthorController@store');
Route::post('authors/update', 'AuthorController@update');




Route::get('dictionars', 'DictionarController@index');
Route::get('dictionars/create', 'DictionarController@create');
Route::get('dictionars/edit/{id}', 'DictionarController@edit');
Route::get('dictionars/delete/{id}', 'DictionarController@delete');
Route::get('dictionars/destroy/{id}', 'DictionarController@destroy');

Route::post('dictionars/store', 'DictionarController@store');
Route::post('dictionars/update', 'DictionarController@update');




Route::get('books', 'BookController@index');
Route::get('books/create', 'BookController@create');
Route::get('books/edit/{id}', 'BookController@edit');
Route::get('books/delete/{id}', 'BookController@delete');
Route::get('books/destroy/{id}', 'BookController@destroy');

Route::post('books/store', 'BookController@store');
Route::post('books/update', 'BookController@update');




Route::get('magazines', 'MagazineController@index');
Route::get('magazines/create', 'MagazineController@create');
Route::get('magazines/edit/{id}', 'MagazineController@edit');
Route::get('magazines/delete/{id}', 'MagazineController@delete');
Route::get('magazines/destroy/{id}', 'MagazineController@destroy');

Route::post('magazines/store', 'MagazineController@store');
Route::post('magazines/update', 'MagazineController@update');

