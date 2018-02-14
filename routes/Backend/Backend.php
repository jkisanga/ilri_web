<?php

Route::resource('deviceUsers', 'DeviceUserController');


Route::get('documents/downloadFile/{id}', 'DocumentController@downloadFile')->name('documents.downloadFile');
Route::get('documents/delete/{id}', 'DocumentController@destroy')->name('documents.delete');
Route::resource('documents', 'DocumentController');

Route::get('categories/doc/{id}', 'CategoryController@doc')->name('categories.doc');
Route::resource('categories', 'CategoryController');

Route::get('dataCategories/data/{id}', 'DataCategoryController@data')->name('dataCategories.data');
Route::resource('dataCategories', 'DataCategoryController');


Route::get('rawDatas/downloadFile/{id}', 'RawDataController@downloadFile')->name('rawDatas.downloadFile');
Route::get('rawDatas/delete/{id}', 'RawDataController@destroy')->name('rawDatas.delete');
Route::resource('rawDatas', 'RawDataController');

Route::get('audioCategories/audio/{id}', 'AudioCategoryController@audio')->name('audioCategories.audio');
Route::resource('audioCategories', 'AudioCategoryController');

Route::get('videoCategories/video/{id}', 'VideoCategoryController@video')->name('videoCategories.video');
Route::resource('videoCategories', 'VideoCategoryController');


Route::get('audio/delete/{id}', 'AudioController@destroy')->name('audio.delete');
Route::get('audio/downloadFile/{id}', 'AudioController@downloadFile')->name('audio.downloadFile');
Route::resource('audio', 'AudioController');


Route::get('videos/delete/{id}', 'VideoController@destroy')->name('videos.delete');
Route::get('videos/downloadFile/{id}', 'VideoController@downloadFile')->name('videos.downloadFile');
Route::resource('videos', 'VideoController');

Route::resource('news', 'NewsController');

Route::resource('profiles', 'ProfileController');