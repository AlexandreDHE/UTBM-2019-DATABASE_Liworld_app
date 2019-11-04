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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/entreprise', 'AdminController@index_entreprise')->name('admin');
Route::post('/entreprise', 'AdminController@postFormEntreprise')->name('entrepriseFORM');

Route::get('/typePoste', 'AdminController@index_typePoste')->name('adminnistrateur');
Route::post('/typePoste', 'AdminController@postFormTypePoste')->name('typePosteFORM');
