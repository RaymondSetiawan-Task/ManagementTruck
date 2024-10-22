<?php

use Illuminate\Support\Facades\Route;

Route::get('/trip', function () {
    return view('trips');
});
