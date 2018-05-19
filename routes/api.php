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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

# ------------------
# Places API Methods
# ------------------
Route::get('places/list', 'Api\PlaceController@getList')->name('api_get_places_list');
Route::get('place/{id}', 'Api\PlaceController@getPlaceById')->name('api_get_place_by_id');

# ------------------
# Tables API Methods
# ------------------
Route::get('tables/{place_id}', 'Api\TableController@getPlaceById')->name('api_get_tables_by_place_id');
