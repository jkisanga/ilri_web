<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/28/2017
 * Time: 12:14 AM
 */


Route::get('change_pin/{user_id}/{pin}', 'DeviceUserAPIController@changePIN');
Route::resource('device_users', 'DeviceUserAPIController');

Route::get('document/{file}', 'DocumentAPIController@downloadDoc' );


//Route::resource('documents/{category_id}', 'DocumentAPIController@getDocByCategoryId');
Route::resource('documents', 'DocumentAPIController');
Route::resource('categories', 'CategoryAPIController');


Route::resource('data_categories', 'DataCategoryAPIController');

Route::resource('raw_datas', 'RawDataAPIController');

Route::resource('video_categories', 'VideoCategoryAPIController');

Route::resource('audio_categories', 'AudioCategoryAPIController');

Route::resource('videos', 'VideoAPIController');

Route::resource('audios', 'audioAPIController');

Route::resource('news', 'NewsAPIController');

Route::resource('profiles', 'ProfileAPIController');