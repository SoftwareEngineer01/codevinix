<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Categories
Route::get('/categories', [CategoryController::class, 'listCategories']);
Route::post('/categories', [CategoryController::class, 'addCategory']);

//tags
Route::get('/tags', [TagController::class, 'listTags']);
Route::post('/tags', [TagController::class, 'addTag']);
