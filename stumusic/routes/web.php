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

    Route::get('/singer', 'SingerController@index')->name('singer_index');
    Route::get('/singer/create', 'SingerController@create')->name('singer_create');
    Route::post('/singer/store', 'SingerController@store')->name('singer_store');
    Route::get('/singer/edit/{id}', 'SingerController@edit')->name('singer_edit');
    Route::put('/singer/update/{id}', 'SingerController@update')->name('singer_update');
    Route::delete('/singer/delete/{id}', 'SingerController@destroy')->name('singer_delete');

    Route::get('/musician', 'MusicianController@index')->name('musician_index');
    Route::get('/musician/create', 'MusicianController@create')->name('musician_create');
    Route::post('/musician/store', 'MusicianController@store')->name('musician_store');
    Route::get('/musician/edit/{id}', 'MusicianController@edit')->name('musician_edit');
    Route::put('/musician/update/{id}', 'MusicianController@update')->name('musician_update');
    Route::delete('/musician/delete/{id}', 'MusicianController@destroy')->name('musician_delete');

    Route::get('/song', 'SongController@index')->name('song_index');
    Route::get('/song/create', 'SongController@create')->name('song_create');
    Route::post('/song/store', 'SongController@store')->name('song_store');
    Route::get('/song/edit/{id}', 'SongController@edit')->name('song_edit');
    Route::put('/song/update/{id}', 'SongController@update')->name('song_update');
    Route::delete('/song/delete/{id}', 'SongController@destroy')->name('song_delete');
    Route::post('/song/check_file', 'SongController@check_file')->name('song_check_file');
    Route::post('/song/check_image', 'SongController@check_image')->name('song_check_image');





    Route::get('/genre', 'GenreController@index')->name('genre_index');
    Route::get('/genre/create', 'GenreController@create')->name('genre_create');
    Route::post('/genre/store', 'GenreController@store')->name('genre_store');
    Route::get('/genre/edit/{id}', 'GenreController@edit')->name('genre_edit');
    Route::put('/genre/update/{id}', 'GenreController@update')->name('genre_update');
    Route::delete('/genre/delete/{id}', 'GenreController@destroy')->name('genre_delete');

    Route::get('/artist', 'SingerController@index')->name('singer_index');
    Route::get('/artist/create', 'SingerController@create')->name('singer_create');
    Route::post('/artist/store', 'SingerController@store')->name('singer_store');
    Route::get('/artist/edit/{id}', 'SingerController@edit')->name('singer_edit');
    Route::put('/artist/update/{id}', 'SingerController@update')->name('singer_update');
    Route::delete('/artist/delete/{id}', 'SingerController@destroy')->name('singer_delete');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

