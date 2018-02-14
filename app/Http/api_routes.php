



Route::resource('device_users', 'DeviceUserAPIController');
Route::get('download/{file_path}', 'DocumentAPIController@downloadDoc' );
Route::resource('documents', 'DocumentAPIController');

Route::resource('categories', 'CategoryAPIController');


Route::resource('audio', 'audioAPIController');