<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', action: [HomeController::class,'index'])->name('home');
Route::get('/google/redirect', [HomeController::class,'redirect'])->name('google.redirect');
Route::get('/google/callback', [HomeController::class,'callback'])->name('google.callback');


Route::get('/landing', action: [HomeController::class,'landing'])->name('home.landing');


