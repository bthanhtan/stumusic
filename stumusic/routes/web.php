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

Route::get('/abc', function () {
    return view('listener.master');
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

    


    Route::post('/image/check_file', 'ImageController@check_file')->name('image_check_file');
    Route::post('/image/check_image', 'ImageController@check_image')->name('image_check_image');


    Route::get('/genre', 'GenreController@index')->name('genre_index');
    Route::get('/genre/create', 'GenreController@create')->name('genre_create');
    Route::post('/genre/store', 'GenreController@store')->name('genre_store');
    Route::get('/genre/edit/{id}', 'GenreController@edit')->name('genre_edit');
    Route::put('/genre/update/{id}', 'GenreController@update')->name('genre_update');
    Route::delete('/genre/delete/{id}', 'GenreController@destroy')->name('genre_delete');

    Route::get('/artist', 'ArtistController@index')->name('artist_index');
    Route::get('/artist/create', 'ArtistController@create')->name('artist_create');
    Route::post('/artist/store', 'ArtistController@store')->name('artist_store');
    Route::get('/artist/edit/{id}', 'ArtistController@edit')->name('artist_edit');
    Route::put('/artist/update/{id}', 'ArtistController@update')->name('artist_update');
    Route::delete('/artist/delete/{id}', 'ArtistController@destroy')->name('artist_delete');

    Route::get('/author', 'AuthorController@index')->name('author_index');
    Route::get('/author/create', 'AuthorController@create')->name('author_create');
    Route::post('/author/store', 'AuthorController@store')->name('author_store');
    Route::get('/author/edit/{id}', 'AuthorController@edit')->name('author_edit');
    Route::put('/author/update/{id}', 'AuthorController@update')->name('author_update');
    Route::delete('/author/delete/{id}', 'AuthorController@destroy')->name('author_delete');

    Route::get('/song', 'SongController@index')->name('song_index');
    Route::get('/song/create', 'SongController@create')->name('song_create');
    Route::post('/song/store', 'SongController@store')->name('song_store');
    Route::get('/song/edit/{id}', 'SongController@edit')->name('song_edit');
    Route::put('/song/update/{id}', 'SongController@update')->name('song_update');
    Route::delete('/song/delete/{id}', 'SongController@destroy')->name('song_delete');

    Route::get('/mylist', 'MylistController@index')->name('mylist_index');
    Route::get('/mylist/create', 'MylistController@create')->name('mylist_create');
    Route::post('/mylist/store', 'MylistController@store')->name('mylist_store');
    Route::get('/mylist/edit/{id}', 'MylistController@edit')->name('mylist_edit');
    Route::put('/mylist/update/{id}', 'MylistController@update')->name('mylist_update');
    Route::delete('/mylist/delete/{id}', 'MylistController@destroy')->name('mylist_delete');

    Route::get('/mylist_detail', 'Mylist_detailController@index')->name('mylist_detail_index');
    Route::get('/mylist_detail/create', 'Mylist_detailController@create')->name('mylist_detail_create');
    Route::post('/mylist_detail/store', 'Mylist_detailController@store')->name('mylist_detail_store');
    Route::get('/mylist_detail/edit/{id}', 'Mylist_detailController@edit')->name('mylist_detail_edit');
    Route::put('/mylist_detail/update/{id}', 'Mylist_detailController@update')->name('mylist_detail_update');
    Route::delete('/mylist_detail/delete/{id}', 'Mylist_detailController@destroy')->name('mylist_detail_delete');
});




Route::group(['prefix'=>'listener','as'=>'listener.'], function(){
    Route::get('/', 'ListenerController@index')->name('listener_index');
});






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

