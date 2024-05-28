<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('save-task', 'App\Http\Controllers\Api\TaskApiController@store');
Route::get('get-task', 'App\Http\Controllers\Api\TaskApiController@index');
Route::put('mark-as-done/{id}', 'App\Http\Controllers\Api\TaskApiController@markAsDone');
Route::delete('delete-task/{id}', 'App\Http\Controllers\Api\TaskApiController@destroy');