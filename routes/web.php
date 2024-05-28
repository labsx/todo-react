<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

// api/
// Route::group(['prefix' => 'api'], function() {
//     Route::post('/task', [TaskApiController::class, 'saveTask']);
// });
