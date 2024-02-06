<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/about-us',[AboutController::class, 'xyz']);


Route::get('/category/form', [\App\Http\Controllers\CategoryController::class, 'form'])->name('category.form');
Route::post('/category/process', [\App\Http\Controllers\CategoryController::class, 'process'])->name('form.process');
Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');

Route::get('/category/item', [\App\Http\Controllers\ItemController::class, 'create'])->name('item.create');
Route::post('/category/item', [\App\Http\Controllers\ItemController::class, 'store'])->name('item.store');
