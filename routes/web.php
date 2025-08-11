<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\EventController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::group(['middleware' => 'auth'], function () {
    Route::resource('events',EventController::class);
});
