<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [EventController::class, 'index']);

Route::resource('events', EventController::class);

Route::get('/', [GuestController::class, 'index']);

Route::resource('guests', GuestController::class);