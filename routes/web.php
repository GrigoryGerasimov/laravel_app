<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Todo'], function() {
    Route::get('/', 'IndexController')->name('todo.index');
    Route::get('/todo/create', 'CreateController')->name('todo.create');
    Route::post('/', 'StoreController')->name('todo.store');
    Route::get('/todo/{todo}', 'EditController')->name('todo.edit');
    Route::patch('/todo/{todo}', 'UpdateController')->name('todo.update');
    Route::get('/todo/{todo}/delete', 'DestroyController')->name('todo.destroy');
    Route::patch('/todo/{todo}/done', 'DoneController')->name('todo.done');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
