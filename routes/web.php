<?php

use Illuminate\Support\Facades\Input;

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

//pages
Route::get('/', 'PagesController@home');
Route::get('/faq', 'PagesController@faq');
Route::get('/translations', 'PagesController@translations');
Route::get('/contact', 'PagesController@contact');
Route::get('/extras', 'PagesController@extras');

//dashboard
Route::get('/dashboard', 'DashboardController@index');

//routes
Route::resource('routes', 'RoutesController');

//locations
Route::resource('locations', 'LocationsController');

Route::post('/comments', 'CommentsController@add');


Auth::routes();
// Route::get('/dashboard', 'DashboardController@index')->name('home');
