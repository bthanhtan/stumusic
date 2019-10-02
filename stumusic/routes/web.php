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

Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
    Route::get('/collection', 'CollectionController@index')->name('collection_index');
    Route::get('/collection/create', 'CollectionController@create')->name('collection_create');
    Route::post('/collection/store', 'CollectionController@store')->name('collection_store');
    Route::get('/collection/edit/{id}', 'CollectionController@edit')->name('collection_edit');
    Route::put('/collection/update/{id}', 'CollectionController@update')->name('collection_update');
    Route::delete('/collection/delete/{id}', 'CollectionController@destroy')->name('collection_delete');


    Route::get('/song', 'SongController@index')->name('song_index');
    Route::get('/song/create', 'SongController@create')->name('song_create');
    Route::post('/song/store', 'SongController@store')->name('song_store');
    Route::get('/song/edit/{id}', 'SongController@edit')->name('song_edit');
    Route::put('/song/update/{id}', 'SongController@update')->name('song_update');
    Route::delete('/song/delete/{id}', 'SongController@destroy')->name('song_delete');
});


