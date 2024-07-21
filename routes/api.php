<?php

use App\Http\Controllers\User\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('get-search-users',[DashboardController::Class,'getSearchUsers']);
