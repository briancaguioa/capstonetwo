<?php

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


//category form and add movie
Route::post('/addCategory', "CategoryController@saveCategory");
//movie form and add movie
// Route::get('/addMovies', "MoviesController@showAddMovieForm");

Route::resource('movies', "MoviesController");

Route::resource('users', "UsersController");

// Route::get('/category/{id}', "CategoryController@findItems");


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
