<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaypalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\GroupMemberController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('cache_clear',function(){
    \Artisan::call('key:generate');
});

Route::get('sign-up',[AuthController::class,'signUp'])->name('sign-up');
Route::post('register-user',[AuthController::class,'registerUser'])->name('register-user');
Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('login',[AuthController::class,'checkLogin'])->name('checkLogin');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
Route::group(['prefix'=>'user','middleware'=>'auth','as'=>'user.'],function(){
    Route::get('dashboard',[DashboardController::class,'dashboard']);
    Route::get('my-groups',[DashboardController::class,'myGroups'])->name('my-groups');
    Route::get('create-group',[DashboardController::class,'createGroup'])->name('create-group');
    Route::post('store-group',[DashboardController::class,'storeGroup'])->name('store-group');
    Route::get('edit-group',[DashboardController::class,'editGroup'])->name('edit-group');
    Route::post('update-group',[DashboardController::class,'updateGroup'])->name('update-group');
    Route::get('add-member',[DashboardController::class,'addMember'])->name('add-member');
    Route::get('invite-members',[DashboardController::class,'inviteMembers'])->name('invite-members');
    Route::get('search-members',[DashboardController::class,'searchMembers'])->name('search-members');
    Route::get('group-request',[GroupMemberController::class,'groupRequest'])->name('group-request');
    Route::get('accept-group-request',[GroupMemberController::class,'acceptGroupRequest'])->name('accept-group-request');
    Route::get('add-member-to-group',[GroupMemberController::class,'addMemberToGroup'])->name('add-member-to-group');
    Route::get('my-group-member',[GroupMemberController::class,'myGroupMember'])->name('my-group-member');
    Route::get('remove-group-members',[GroupMemberController::class,'removeGroupMembers'])->name('remove-group-members');
    Route::get('my-active-groups',[GroupMemberController::class,'myActiveGroups'])->name('my-active-groups');
    Route::get('pay-for-group',[GroupMemberController::class,'payForGroup'])->name('pay-for-group');
});

Route::group(['as'=>'paypal.','prefix'=>'paypal'],function(){
    Route::get('create', [PaypalController::class, 'createPayment'])->name('create');
    Route::get('success', [PayPalController::class, 'executePayment'])->name('success');
    Route::get('cancel', [PayPalController::class, 'cancelPayment'])->name('cancel');
});

