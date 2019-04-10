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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/dish', 'DishController@index')->name('dish');
Route::post('/dish', 'DishController@store')->name('dish.add');
Route::post('/dish/update', 'DishController@update')->name('dish.update');
Route::post('/dish/delete', 'DishController@destroy')->name('dish.delete');
Route::get('/dish/list', 'DishController@getList')->name('dish.list');

Route::get('/category', 'CategoryController@index')->name('category');
Route::post('/category', 'CategoryController@store')->name('category.add');
Route::post('/category/update', 'CategoryController@update')->name('category.update');
Route::post('/category/delete', 'CategoryController@destroy')->name('category.delete');
Route::get('/category/list', 'CategoryController@getList')->name('category.list');

Route::get('/employee', 'EmployeeController@index')->name('employee');
Route::post('/employee', 'EmployeeController@store')->name('employee.add');
Route::post('/employee/update', 'EmployeeController@update')->name('employee.update');
Route::post('/employee/delete', 'EmployeeController@destroy')->name('employee.delete');
Route::get('/employee/list', 'EmployeeController@getList')->name('employee.list');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
