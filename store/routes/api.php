<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('user_list', [UserController::class, 'user_list']);
Route::post('add-user', [UserController::class, 'add_user']);
Route::put('update/{id}', [UserController::class, 'update_user']);
Route::delete('delete-user/{id}', [UserController::class, "delete_user"]);


Route::apiResource('categories', CategoryController::class);

Route::get('/categories/{id}',[CategoryController::class,'show']);
