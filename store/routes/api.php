<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderItemController;





Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('user_list', [UserController::class, 'user_list']);
Route::post('add-user', [UserController::class, 'add_user']);
Route::put('update/{id}', [UserController::class, 'update_user']);
Route::delete('delete-user/{id}', [UserController::class, "delete_user"]);


Route::apiResource('categories', CategoryController::class);
Route::get('/categories', [CategoryController::class, "index"]);

Route::apiResource('tags', TagController::class);
Route::apiResource('products', ProductController::class);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('addresses', AddressController::class);
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/order-items', [OrderItemController::class, 'index']);
    Route::get('/order-items/{id}', [OrderItemController::class, 'show']);
});

