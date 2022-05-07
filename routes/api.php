<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PetController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Categories
Route::get('/categories', [CategoryController::class, 'listCategories']);
Route::post('/categories', [CategoryController::class, 'addCategory']);

//Tags
Route::get('/tags', [TagController::class, 'listTags']);
Route::post('/tags', [TagController::class, 'addTag']);

//Pets
Route::get('/pets', [PetController::class, 'listPets']);
Route::post('/pet', [PetController::class, 'addPet']);
Route::get('/pet/findByStatus', [PetController::class, 'getPetsByStatus']);
Route::get('/pet/{petId}', [PetController::class, 'getPetById']);