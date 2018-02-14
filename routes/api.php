<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');*/
Route::resource('regions', 'RegionAPIController');

Route::group(['namespace' => 'API'], function () {
 
    Route::resource('regions', 'RegionAPIController');

    Route::resource('regions', 'RegionAPIController');

    Route::resource('regions', 'RegionAPIController');

    Route::resource('regions', 'RegionAPIController');
    
    Route::get('districts/{id}', 'DistrictAPIController@getDistricts')->name('api.districts')->where(['id'=> '[0-9]+']);
    Route::resource('districts', 'DistrictAPIController');

    Route::resource('factory_types', 'FactoryTypeAPIController');

    Route::resource('species', 'SpecieAPIController');

    Route::resource('colleges', 'CollegeAPIController');

    Route::resource('forests', 'ForestAPIController');

    Route::resource('forest_species', 'ForestSpecieAPIController');

    Route::resource('applicants', 'ApplicantAPIController');

    Route::resource('logging_trucks', 'LoggingTruckAPIController');

    Route::resource('applicant_forests', 'ApplicantForestAPIController');

    Route::resource('applicant_species', 'ApplicantSpecieAPIController');

    Route::resource('dealer_categories', 'DealerCategoryAPIController');

    Route::resource('clients', 'ClientAPIController');

    Route::resource('client_categories', 'ClientCategoryAPIController');

    Route::resource('bills', 'BillAPIController');

    Route::resource('divisions', 'DivisionAPIController');

    Route::resource('ranges', 'RangeAPIController');

    Route::resource('compartments', 'CompartmentAPIController');

    Route::resource('plots', 'PlotAPIController');

    Route::resource('compartment_species', 'CompartmentSpecieAPIController');

    Route::resource('bill_plots', 'BillPlotAPIController');

    Route::resource('licenses', 'LicenseAPIController');

    Route::resource('checkpoints', 'CheckpointAPIController');

    Route::resource('checkpoint_licenses', 'CheckpointLicenseAPIController');

    Route::resource('forest_products', 'ForestProductAPIController');

    Route::resource('transit_passes', 'TransitPassAPIController');

    Route::resource('checkpoint_books', 'CheckpointBookAPIController');

    Route::resource('harvest_licenses', 'HarvestLicenseAPIController');

    Route::resource('transit_passes', 'TransitPassAPIController');

    Route::resource('tp_checkpoints', 'TpCheckpointAPIController');
});

Route::resource('video_categories', 'VideoCategoryAPIController');

Route::resource('audio_categories', 'AudioCategoryAPIController');

Route::resource('videos', 'VideoAPIController');



