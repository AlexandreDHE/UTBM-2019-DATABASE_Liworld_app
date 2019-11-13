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
Route::get('/domaines', 'AdminController@index_domaines')->name('domaines');
Route::get('/experiencePro', 'ExperienceProController@index_form')->name('experiencePro');
Route::get('/fileActualité', 'FileActualieController@index')->name('fileActualité');


Route::post('/entreprises', 'AdminController@postFormEntreprise')->name('entrepriseFORM');
Route::post('/typesContrats', 'AdminController@postTypes_Contrats')->name('typesContratsFORM');
Route::post('/domaines', 'AdminController@postDomaines')->name('domainesFORM');
Route::post('/experiencePro', 'ExperienceProController@postFormExperiencePro')->name('experienceProFORM');
















Route::get('/experience', 'ExperienceProController@index')->name('experiencePro');
