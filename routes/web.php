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
Route::get('/', 'TodoController@mainSite')->name('home');
Route::get('/todoList', 'TodoController@todoList')->middleware('auth');
Route::get('/todo', 'TodoController@getUserTodoList')->middleware('auth');
Route::post('/todo/addTodo', 'TodoController@addTodo')->middleware('auth');
Route::post('/todo/deleteTodo', 'TodoController@deleteTodo');
Route::post('/todo/toggleTodo', 'TodoController@toggleTodo');


//Route::get('/home', 'HomeController@index')->name('home');
