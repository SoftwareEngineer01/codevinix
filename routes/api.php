<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Http\Controllers\CategoryController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Categories
Route::get('/categories', [CategoryController::class, 'listCategories']);
Route::post('/categories', [CategoryController::class, 'addCategory']);
