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

//ADMIN SITE 
Route::get('/typesContrats', 'AdminController@index_types_Contrats')->name('typesContrats');
Route::get('/domaines', 'AdminController@index_domaines')->name('domaines');
Route::get('/entreprises', 'AdminController@index_entreprise')->name('entreprises');

Route::post('/entreprises', 'AdminController@postFormEntreprise')->name('entrepriseFORM');
Route::post('/typesContrats', 'AdminController@postTypes_Contrats')->name('typesContratsFORM');
Route::post('/domaines', 'AdminController@postDomaines')->name('domainesFORM');






Route::get('/autocomplete', 'ProfilController@search');
Route::post('/searchProfil', 'ProfilController@getProfil')->name('searchProfil');
Route::get('/monProfil', 'ProfilController@getMonProfil')->name('showMyProfil');
Route::get('/getformExperiencePro', 'ProfilController@getFormExperiencePro')->name('getFormExperiencePro');
Route::get('/postformExperiencePro', 'ProfilController@postFormExperiencePro')->name('postFormExperiencePro');

Route::get('/autocomplete', 'ProfilController@search');
Route::post('/searchProfil', 'ProfilController@getProfil')->name('searchProfil');
Route::get('/monProfil', 'ProfilController@getMonProfil')->name('showMyProfil');









/************ SERT A RIEN */
Route::get('/homeAdmin', 'AdminController@home')->name('homeAdmin');
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/getformFormation', 'ProfilController@getFormFormation')->name('getFormFormation');









Route::post('/formationform', 'FormationController@postFormFormation')->name('formationFORM');

Route::get('/user', 'ProfilController@ajouterUneConnexion')->name('ajouterUneConnexion');
Route::get('/delete', 'ProfilController@annulerUneConnexion')->name('annulerUneConnexion');

Route::get('/confirmer', 'ProfilController@confirmerUneConnexion')->name('confirmerUneConnexion');
















