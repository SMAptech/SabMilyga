<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('d','admin/master');
Route::view('dashboard','admin/dashboard')->name('dashboard');
Route::view('category','admin/category')->name("category.show");

