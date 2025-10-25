<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index']);
Route::get('/filter/{id}', [FrontendController::class, 'filterByCategory'])->name('filter.category');
Route::get('/item/{id}', [FrontendController::class, 'getItemDetail'])->name('item.detail');
Route::get('/item/detail/{id}', [FrontendController::class, 'showDetailPage'])->name('item.show');
