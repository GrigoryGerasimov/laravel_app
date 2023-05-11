<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => '\App\Http\Controllers\Todo'], function() {
    Route::group(['namespace' => 'Api'], function() {
        Route::get('/todos', 'IndexController')->name('api.todo.index');
        Route::get('/todo/{todo}', 'ShowController')->name('api.todo.show');
        Route::post('/todos', 'StoreController')->name('api.todo.store');
        Route::patch('/todo/{todo}', 'UpdateController')->name('api.todo.update');
        Route::delete('/todo/{todo}', 'DestroyController')->name('api.todo.destroy');
        Route::get('/todo/{todo}/restore', 'RestoreController')->name('api.todo.restore');
    });
});
