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

Route::get('/', function () {
    return view('welcome');
});


Route::post('/check-code', 'FormController@checkCode');
Route::get('/forms/{key}/create', 'FormController@create');
Route::get('/forms/{key}/edit', 'FormController@edit');
Route::get('/forms/{key}/response', 'FormController@response');
Route::put('/forms/{key}', 'FormController@update');
Route::post('/forms', 'FormController@store');

Auth::routes();

Route::get('/dashboard', 'AdminController@index');
// Route::get('/admin/forms/{id}', 'AdminController@formDetail');
Route::get('/admin/forms/{id}/delete', 'AdminController@deleteForm');
Route::get('/admin/codes', 'AdminController@showCodes');
Route::post('/admin/codes', 'AdminController@generateCode');
Route::get('/admin/codes/{id}/delete', 'AdminController@deleteCode');

//
Route::get('/users', 'UserController@index');
Route::get('/users/register', 'UserController@create');
Route::post('/users', 'UserController@store');


Route::get('/api/forms',"AdminController@apiForms");




