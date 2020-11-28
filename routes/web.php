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

use Illuminate\Routing\RouteRegistrar;

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
    Route::delete('delete/{suplier}','SuplierController@destroy')->name('data.suplier.delete');

});

Route::group(['prefix' => 'databarangs'], function(){
    Route::get('index','DatabarangController@index')->name('data.barang.index');
    Route::get('create','DatabarangController@create')->name('data.barang.create');
    Route::post('save', 'DatabarangController@store')->name('data.barang.save');
    Route::get('edit/{databarang}','DatabarangController@edit')->name('data.barang.edit');
    Route::patch('update/{databarang}','DatabarangController@update')->name('data.barang.update');
    Route::delete('delete/{databarang}','DatabarangController@destroy')->name('data.barang.delete');
});

Route::group(['prefix' => 'barangmasuks'], function(){
    Route::get('index','BarangmasukController@index')->name('barangmasuk.index');
    Route::get('create','BarangmasukController@create')->name('barangmasuk.create');
    Route::post('store','BarangmasukController@store')->name('barangmasuk.store');
    Route::get('edit/{barangmasuk}','BarangmasukController@edit')->name('barangmasuk.edit');
    Route::put('update/{barangmasuk}','BarangmasukController@update')->name('barangmasuk.update');
    Route::delete('delete/{barangmasuk}','BarangmasukController@destroy')->name('barangmasuk.delete');
});

Route::group(['prefix' => 'barangkeluars'], function(){
    Route::get('index','BarangkeluarController@index')->name('barangkeluar.index');
    Route::get('create','BarangkeluarController@create')->name('barangkeluar.create');
    Route::post('store','BarangkeluarController@store')->name('barangkeluar.store');
    Route::get('edit/{barangkeluar}','BarangkeluarController@edit')->name('barangkeluar.edit');
    Route::put('update/{barangkeluar}','BarangkeluarController@update')->name('barangkeluar.update');
    Route::delete('delete/{barangkeluar}','BarangkeluarController@destroy')->name('barangkeluar.delete');
});
