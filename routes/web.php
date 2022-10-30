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

Route::get('/','welcomecontroller@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
route::resource('categories','categoriescontroller')->middleware('auth');
route::resource('posts','postcontroller')->middleware('auth');
route::resource('tags','tagscontroller')->middleware('auth');
Route::get('/dashboard', 'dashboardcontroller@index')->name('dashboard')->middleware('auth','admin');;


route::get('/users','usercontroller@index')->name('users.index')->middleware('auth','admin');
route::get('/users/create','usercontroller@create')->name('users.create')->middleware('auth','admin');
