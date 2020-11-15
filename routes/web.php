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

Route::group(['prefix' => 'supliers'], function(){
    Route::get('index', 'SuplierController@index')->name('data.suplier.index');
    Route::get('create', 'SuplierController@create')->name('data.suplier.create');
    Route::post('save', 'SuplierController@store')->name('data.suplier.save');
    Route::get('show-formEdit/{suplier}', 'SuplierController@edit')->name('data.suplier.show-formEdit');
    Route::patch('update/{suplier}','SuplierController@update')->name('data.suplier.update');

});
