<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('sign-up',[AuthController::class,'signUp'])->name('sign-up');
Route::post('register-user',[AuthController::class,'registerUser'])->name('register-user');
Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('login',[AuthController::class,'checkLogin'])->name('checkLogin');
