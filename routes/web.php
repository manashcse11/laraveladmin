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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::resource('user', 'UserController')->middleware('auth');
Route::get('user/{user}/delete', 'UserController@delete')->name('user.delete')->middleware('auth'); // Manually delete using GET method

Route::resource('role', 'RoleController')->middleware('auth');
Route::get('role/{role}/delete', 'RoleController@delete')->name('role.delete')->middleware('auth'); // Manually delete using GET method

Route::resource('permission', 'PermissionController')->middleware('auth');
Route::get('permission/{permission}/delete', 'PermissionController@delete')->name('permission.delete')->middleware('auth'); // Manually delete using GET method

Route::resource('category', 'CategoryController')->middleware('auth');
Route::get('category/{category}/delete', 'CategoryController@delete')->name('category.delete')->middleware('auth'); // Manually delete using GET method
