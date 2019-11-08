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

Route::get('/entreprises', 'AdminController@index_entreprise')->name('entreprises');
Route::get('/typesContrats', 'AdminController@index_types_Contrats')->name('typesContrats');


Route::post('/entreprises', 'AdminController@postFormEntreprise')->name('entrepriseFORM');
Route::post('/typesContrats', 'AdminController@postTypes_Contrats')->name('typesContratsFORM');















Route::get('/experience', 'ExperienceProController@index')->name('experiencePro');
