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


Auth::routes();
Route::get('/', 'TodoContoller@mainSite')->name('home');
Route::get('/todo/{userId}', 'TodoController@getUserTodoList');
Route::post('/todo/{userId}/addTodo', 'TodoController@addTodo');
Route::post('/todo/{userId}/deleteTodo', 'TodoController@deleteTodo');
Route::post('/todo/{userId}/doneTodo', 'TodoController@doneTodo');


//Route::get('/home', 'HomeController@index')->name('home');
