<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CustomerAuth;



Route::get('login',[AuthController::class,"preLogin"]);
// Route::view('dashboard','admin/dashboard')->name('dashboard');
Route::view('category','admin/category')->name("category.show");

Route::post('loginPost',[AuthController::class,"login"]);

Route::get('logout',[AuthController::class,'logout']);

Route::get("dashboard",[AuthController::class,"dashboard"])->name('dashboard');




Route::middleware(['isAdmin'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
  
});  


