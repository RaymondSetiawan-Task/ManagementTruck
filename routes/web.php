<?php
$root = '\App\Http\Controllers';

use Illuminate\Support\Facades\Route;

Route::get('/', $root. '\DashboardController@show');

Route::get('/trip', $root . '\TripsController@showTripIndex');
Route::get('/trips', $root . '\TripsController@showTrip');
Route::post('/trips/showDriverName', $root . '\TripsController@showDriver');
Route::post('/trips/add', $root . '\TripsController@storeTrip');

Route::post('/trips/delete/', $root . '\TripsController@delete_trip');
Route::get('/trips/update/{id}', $root . '\TripsController@edittrip');
Route::put('/trips/update/', $root . '\TripsController@updatetrip');

route::get('/counttrip', $root. '\TripsController@countTrip');

//Test API
Route::get('/triplimit', $root . '\TestAPI@showTripIndexLimit');
Route::get('/trippage', $root . '\TestAPI@showTripIndexPaginate');




