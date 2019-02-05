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

Route::get('/menu/mycart/{id}/delete', "CartController@deleteCart"); 
Route::get('/menu/clearcart', "CartController@clearCart");
Route::patch('/menu/mycart/{id}/changeQty', "CartController@updateCart");
   
Route::resource('users', "UsersController");
// Route::post('/addToCart/{id}', "CartController@store");

Route::get('/mycart', "CartController@showCart"); 
// Route::get('/categories/{id}', "CategoryController@findItems"); 
Route::post('/addToCart/{id}',"CartController@addToCart");     
// Route::get('/category/{id}', "CategoryController@findItems");


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
