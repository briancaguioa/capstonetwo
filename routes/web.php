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
//movie form and add movie
// Route::get('/addMovies', "MoviesController@showAddMovieForm");



Route::get('/menu/clearcart', "CartController@clearCart");
Route::patch('/menu/mycart/{id}/changeQty', "CartController@updateCart");
Route::get('/mycart', "CartController@showCart");  
Route::post('/addToCart/{id}',"CartController@addToCart");     
// Route::get('menu/categories/{id}', "CategoryController@findItems");

Route::middleware("auth")->group(function() {
	Route::post('/addCategory', "CategoryController@saveCategory");
	Route::resource('movies', "MoviesController");
	Route::resource('orders', "OrderController");
	Route::get('/menu/mycart/{id}/delete', "CartController@deleteCart"); 
	Route::resource('users', "UsersController");
	Route::get("/checkout", "CartController@checkout");
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
