<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['namespace' => 'App\Http\Controllers\Todo', 'middleware' => ['auth', 'verified']], function() {
    Route::group(['namespace' => 'Web'], function() {
        Route::get('/todos', 'IndexController')->name('todo.index');
        Route::get('/todos/create', 'CreateController')->name('todo.create');
        Route::post('/todos', 'StoreController')->name('todo.store');
        Route::get('/todo/{todo}', 'EditController')->name('todo.edit');
        Route::patch('/todo/{todo}', 'UpdateController')->name('todo.update');
        Route::get('/todo/{todo}/delete', 'DestroyController')->name('todo.destroy');
        Route::patch('/todo/{todo}/done', 'DoneController')->name('todo.done');
        Route::get('/done', 'DoneIndexController')->name('todo.done.index');
    });
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
