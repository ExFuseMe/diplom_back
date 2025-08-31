<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\EventController;
use App\Http\Controllers\Web\EventFormController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login.view');
})->name('home');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/login', [AuthController::class, 'login_view'])->name('login.view');
Route::group(['middleware' => 'auth'], function () {
    Route::resource('events',EventController::class);
});

//Route::get('/csrf', function () {
//    return csrf_token();
//});
//Route::post('/test', [EventFormController::class, 'store']);
