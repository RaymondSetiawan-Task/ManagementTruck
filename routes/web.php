<?php
$root = '\App\Http\Controllers';

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/trip', $root . '\TripsController@showTripIndex');
Route::get('/trips', $root . '\TripsController@showTrip');
Route::post('/trips/showDriverName', $root . '\TripsController@showDriver');
Route::post('/trips/add', $root . '\TripsController@storeTrip');
// Route::post('/updateStatus/showHAWB', $root . '\Status_Controller@ShowHAWB');

route::get('/home', $root. '\DashboardController@show');
route::get('/counttrip', $root. '\TripsController@countTrip');
