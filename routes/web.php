<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return "Welcome to Wallet Master Laravel";

//    return view('welcome');
});

//Route::get('/posts', function () {
//
//    return 'Testing Posts';
//
////    return view('welcome');
//});

Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index']);

Route::get('/products', [\App\Http\Controllers\ProductController::class,'products']);

