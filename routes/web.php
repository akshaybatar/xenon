<?php

use App\Middleware\Auth;
use App\Services\Route;
use App\Middleware\Guest;

Route::get('','HomeController','index');
Route::get('login','LoginController','index',[Guest::class]);

Route::post('submit-login','LoginController','login');

Route::get('logout','DashboardController','logout');
Route::get('dashboard','DashboardController','index',[Auth::class]);
Route::get('register','RegisterController','index',[Guest::class]);

Route::post('register-submit','RegisterController','register');